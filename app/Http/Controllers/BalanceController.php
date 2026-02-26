<?php

namespace App\Http\Controllers;

use App\Models\Expense;
use App\Models\Settlement;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BalanceController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $colocation = $user->colocations()->wherePivotNull('left_at')->first();

        if (!$colocation) {
            return redirect()->route('dashboard')->withErrors(['error' => 'You must be in an active colocation to view balances.']);
        }

        $members = $colocation->users()->wherePivotNull('left_at')->get();

        foreach ($members as $member) {
            $totalPaid = Expense::where('colocation_id', $colocation->id)->where('user_id', $member->id)->sum('amount');
            $totalShare = Settlement::whereHas('expense', fn($q) => $q->where('colocation_id', $colocation->id))->where('user_id', $member->id)->sum('amount');

            $member->net_balance = $totalPaid - $totalShare;
            $member->total_paid = $totalPaid;
            $member->total_share = $totalShare;
        }
        $myStats = $members->firstWhere('id', Auth::id());

        $myDebts = Settlement::with(['expense.user', 'expense.category'])
            ->where('user_id', Auth::id())
            ->whereNull('paid_at')
            ->whereHas('expense', function($q) use ($colocation) {
                $q->where('colocation_id', $colocation->id)
                    ->where('user_id', '!=', Auth::id());
            })->get();

        $owedToMe = Settlement::with(['user', 'expense.category'])
            ->where('user_id', '!=', Auth::id())
            ->whereNull('paid_at')
            ->whereHas('expense', function($q) use ($colocation) {
                $q->where('colocation_id', $colocation->id)
                    ->where('user_id', Auth::id());
            })->get();

        $history = Settlement::with(['user', 'expense.user', 'expense.category'])
            ->whereNotNull('paid_at')
            ->whereHas('expense', fn($q) => $q->where('colocation_id', $colocation->id))
            ->where(function($q) {
                $q->where('user_id', Auth::id())
                    ->orWhereHas('expense', fn($q2) => $q2->where('user_id', Auth::id()));
            })
            ->latest('paid_at')
            ->take(10)
            ->get();

        return view('balances.index', compact('colocation', 'members', 'myStats', 'myDebts', 'owedToMe', 'history'));
    }

    public function pay(Request $request)
    {
        $request->validate([
            'settlement_id' => 'required|exists:settlement,id',
        ]);

        $settlement = Settlement::findOrFail($request->settlement_id);

        if ($settlement->user_id !== Auth::id() && $settlement->expense->user_id !== Auth::id()) {
            abort(403, 'Unauthorized to mark this settlement as paid.');
        }

        $settlement->update([
            'paid_at' => now(),
        ]);

        return back()->with('success', 'Settlement marked as paid! Balances have been updated.');
    }
}
