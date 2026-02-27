<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Colocation;
use App\Models\Expense;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{

    public function index()
    {
        $activeColocsCount = Colocation::where('status', 'active')->count();
        $usersCount = User::count();
        $totalExpenses = Expense::sum('amount');
        $bannedUsersCount = User::where('is_active', false)->count();

        $users = User::orderBy('created_at', 'desc')->get();

        $colocations = Colocation::withCount(['users' => function($query) {
            $query->where('colocation_user.left_at', null);
        }])->latest()->take(10)->get();

        return view('admin.dashboard', compact(
            'activeColocsCount',
            'usersCount',
            'totalExpenses',
            'bannedUsersCount',
            'users',
            'colocations'
        ));
    }

    public function ban(Request $request, User $user)
    {
        if ($user->id === Auth::id()) return back()->withErrors(['error' => 'You cannot ban yourself.']);

        $user->update(['is_active' => false]);
        return back()->with('success', $user->name . ' has been banned.');
    }

    public function unban(User $user)
    {
        $user->update(['is_active' => true]);
        return back()->with('success', $user->name . ' has been unbanned.');
    }
}
