<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Colocation;
use App\Models\Expense;
use App\Models\Settlement;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ColocationController extends Controller
{
    public function show()
    {
        $user = Auth::user();
        $colocation = $user->colocations()->wherePivotNull('left_at')->first();

        if (!$colocation) {
            return redirect()->route('dashboard')->withErrors(['error' => 'You are not in any active colocation.']);
        }

        $members = $colocation->users()->wherePivotNull('left_at')->get();

        $pendingInvitations = $colocation->invitations()->where('status', 'pending')->get();

        $isOwner = $colocation->pivot->is_admin;

        return view('colocations.show', compact('colocation', 'members', 'pendingInvitations', 'isOwner'));
    }

    public function store(Request $request)
    {
        $request->validate(['name' => 'required|string|max:50']);

        if (Auth::user()->hasActiveColocation()) {
            return back()->withErrors(['error' => 'You are already in a colocation.']);
        }

        $colocation = Colocation::create([
            'name' => $request->name,
            'status' => 'active'
        ]);

        $colocation->users()->attach(Auth::id(), [
            'is_admin' => true,
            'created_at' => now()
        ]);

        return redirect()->route('colocations.show')->with('success', 'Colocation created successfully !');
    }
    public function leave(Colocation $colocation)
    {
        $user = Auth::user();

        $totalPaid = Expense::where('colocation_id', $colocation->id)->where('user_id', $user->id)->sum('amount');
        $totalShare = Settlement::whereHas('expense', fn($q) => $q->where('colocation_id', $colocation->id))->where('user_id', $user->id)->sum('amount');

        if (( $totalPaid - $totalShare) < -0.01) {
            $user->decrement('reputation');
        } else {
            $user->increment('reputation');
        }

        $colocation->users()->updateExistingPivot($user->id, ['left_at' => now()]);

        return redirect()->route('dashboard')->with('success', 'You have left the colocation.');
    }

    public function removeMember(Colocation $colocation, User $user)
    {
        $authMembership = $colocation->users()->where('user_id', Auth::id())->first();
        if (!$authMembership || !$authMembership->pivot->is_admin) abort(403);

        $totalPaid = Expense::where('colocation_id', $colocation->id)->where('user_id', $user->id)->sum('amount');
        $totalShare = Settlement::whereHas('expense', fn($q) => $q->where('colocation_id', $colocation->id))->where('user_id', $user->id)->sum('amount');
        $netBalance = $totalPaid - $totalShare;

        if ($netBalance < -0.01) {
            $user->decrement('reputation');

            $category = Category::firstOrCreate(['name' => 'Debt Transfer']);

            $expense = Expense::create([
                'title' => 'Debt Transfer (Removal)',
                'amount' => abs($netBalance),
                'colocation_id' => $colocation->id,
                'category_id' => $category->id,
                'user_id' => $user->id,
                'created_at' => now(),
            ]);

            Settlement::create([
                'amount' => abs($netBalance),
                'user_id' => Auth::id(),
                'expense_id' => $expense->id,
                'created_at' => now()
            ]);

        } else {
            $user->increment('reputation');
        }

        $colocation->users()->updateExistingPivot($user->id, ['left_at' => now()]);

        return back()->with('success', 'Member removed. Reputation updated and debts transferred if applicable.');
    }
}
