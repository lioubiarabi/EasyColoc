<?php

namespace App\Http\Controllers;

use App\Models\Expense;
use App\Models\Settlement;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ExpenseController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $colocation = $user->colocations()->wherePivotNull('left_at')->first();

        if (!$colocation) {
            return redirect()->route('dashboard')->withErrors(['error' => 'You must be in an active colocation to view expenses.']);
        }

        $expenses = Expense::with(['user', 'category'])
            ->where('colocation_id', $colocation->id)
            ->latest()
            ->get();

        $categories = Category::all();
        $members = $colocation->users()->wherePivotNull('left_at')->get();
        $isOwner = $colocation->pivot->is_admin;

        $currentMonthExpenses = $expenses->where('created_at', '>=', now()->startOfMonth());
        $totalThisMonth = $currentMonthExpenses->sum('amount');
        $totalEver = $expenses->sum('amount');
        $avgPerMember = $members->count() > 0 ? $totalThisMonth / $members->count() : 0;
        $countThisMonth = $currentMonthExpenses->count();

        $expensesByCategory = $currentMonthExpenses->groupBy('category.name')->map->sum('amount');

        $spenders = $members->map(function($member) use ($expenses) {
            $member->total_spent = $expenses->where('user_id', $member->id)->sum('amount');
            return $member;
        })->sortByDesc('total_spent');

        return view('expenses.index', compact(
            'colocation', 'expenses', 'categories', 'members', 'isOwner',
            'totalThisMonth', 'totalEver', 'avgPerMember', 'countThisMonth',
            'expensesByCategory', 'spenders'
        ));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:220',
            'amount' => 'required|numeric|min:0.01',
            'category_id' => 'required|exists:categories,id',
        ]);

        $user = Auth::user();
        $colocation = $user->colocations()->wherePivotNull('left_at')->first();

        if (!$colocation) {
            return back()->withErrors(['error' => 'You must be in an active colocation to add expenses.']);
        }

        $expense = Expense::create([
            'title' => $request->title,
            'amount' => $request->amount,
            'category_id' => $request->category_id,
            'colocation_id' => $colocation->id,
            'user_id' => $user->id,
            'created_at' => now(),
        ]);

        $activeMembers = $colocation->users()->wherePivotNull('left_at')->get();
        $splitAmount = $expense->amount / $activeMembers->count();

        foreach ($activeMembers as $member) {
            Settlement::create([
                'amount' => $splitAmount,
                'paid_at' => $member->id === $user->id ? now() : null,
                'user_id' => $member->id,
                'expense_id' => $expense->id,
            ]);
        }

        return back()->with('success', 'Expense added and split among ' . $activeMembers->count() . ' members!');
    }

    public function destroy(Expense $expense)
    {
        $user = Auth::user();
        $colocation = $expense->colocation;

        $isOwner = $colocation->users()->where('user_id', $user->id)->wherePivot('is_admin', true)->exists();
        $isPayer = $expense->user_id === $user->id;

        if (!$isOwner && !$isPayer) {
            abort(403, 'Only the colocation owner or the payer can delete this expense.');
        }

        $expense->delete();

        return back()->with('success', 'Expense deleted successfully.');
    }
}
