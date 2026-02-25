<?php

namespace App\Http\Controllers;

use App\Models\Colocation;
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

        $colocation->users()->updateExistingPivot($user->id, [
            'left_at' => now()
        ]);

        return redirect()->route('dashboard')->with('success', 'You have left the colocation.');
    }

    public function removeMember(Colocation $colocation, User $user)
    {
        $authMembership = $colocation->users()->where('user_id', Auth::id())->first();

        if (!$authMembership || !$authMembership->pivot->is_admin) {
            return redirect()->route('dashboard')->withErrors(['error' => 'not allowed action.']);
        }

        if ($user->id === Auth::id()) {
            return back()->withErrors(['error' => 'You can\'t remove yourself.']);
        }

        $colocation->users()->updateExistingPivot($user->id, [
            'left_at' => now()
        ]);

        return back()->with('success', 'Member removed with success.');
    }
}
