<?php

namespace App\Http\Controllers;

use App\Models\Expense;
use App\Models\Settlement;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $colocation = $user->colocations()->wherePivotNull('left_at')->first();

        $totalSpentThisMonth = 0;
        $owedAmount = 0;
        $toReceiveAmount = 0;
        $recentTransactions = collect();
        $categorySpending = collect();

        if ($colocation) {
            // 1. Total spent by the entire colocation this month
            $totalSpentThisMonth = Expense::where('colocation_id', $colocation->id)
                ->where('created_at', '>=', now()->startOfMonth())
                ->sum('amount');

            // 2. How much the authenticated user owes others
            $owedAmount = Settlement::where('user_id', $user->id)
                ->whereNull('paid_at')
                ->whereHas('expense', fn($q) => $q->where('colocation_id', $colocation->id)->where('user_id', '!=', $user->id))
                ->sum('amount');

            // 3. How much others owe the authenticated user
            $toReceiveAmount = Settlement::whereHas('expense', fn($q) => $q->where('colocation_id', $colocation->id)->where('user_id', $user->id))
                ->where('user_id', '!=', $user->id)
                ->whereNull('paid_at')
                ->sum('amount');

            // 4. Recent Expenses
            $recentTransactions = Expense::with(['category', 'user'])
                ->where('colocation_id', $colocation->id)
                ->latest()
                ->take(6)
                ->get();

            // 5. Spending by Category for the "Savings Goals" bars
            $categorySpending = Expense::with('category')
                ->where('colocation_id', $colocation->id)
                ->where('created_at', '>=', now()->startOfMonth())
                ->get()
                ->groupBy('category.name')
                ->map(fn($expenses) => $expenses->sum('amount'))
                ->take(3); // Grab the top 3 categories
        }

        return view('dashboard', compact(
            'colocation',
            'totalSpentThisMonth',
            'owedAmount',
            'toReceiveAmount',
            'recentTransactions',
            'categorySpending'
        ));
    }
}
