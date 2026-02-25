<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Colocation;
use App\Models\Invitation;
use Ramsey\Uuid\Uuid;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class InvitationController extends Controller
{

    public function send(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'colocation_id' => 'required|exists:colocations,id'
        ]);

        $colocation = Colocation::findOrFail($request->colocation_id);

        $membership = $colocation->users()->where('user_id', Auth::id())->first();
        if (!$membership || !$membership->pivot->is_admin) {
            abort(403, 'Only the colocation owner can send invitations.');
        }

        $existingInvite = Invitation::where('email', $request->email)
            ->where('colocation_id', $colocation->id)
            ->where('status', 'pending')
            ->first();

        if ($existingInvite) {
            return back()->withErrors(['error' => 'An invitation is already pending for this email address.']);
        }

        $invitation = Invitation::create([
            'UUID' => (string) Uuid::uuid4(),
            'colocation_id' => $colocation->id,
            'email' => $request->email,
            'status' => 'pending'
        ]);

        return back()->with('success', 'Invitation sent successfully to ' . $request->email);
    }

    public function show($token)
    {
        $invitation = Invitation::with('colocation')->where('UUID', $token)->first();

        if ($invitation->status !== 'pending') {
            return redirect()->route('dashboard')->withErrors(['error' => 'This invitation is no longer valid or has already been processed.']);
        }

        if (Auth::user()->hasActiveColocation()) {
            return redirect()->route('dashboard')->withErrors(['error' => 'You already have an active colocation. You cannot accept new invitations.']);
        }

        return view('invitations.show', compact('invitation'));
    }

    public function accept($token)
    {
        $invitation = Invitation::where('UUID', $token)->first();

        if ($invitation->status !== 'pending') {
            return redirect()->route('dashboard')->withErrors(['error' => 'This invitation is no longer valid or has already been used.']);
        }

        $user = Auth::user();
        $activeColocation = $user->colocations()->wherePivotNull('left_at')->first();
        if ($activeColocation) {
            return redirect()->route('dashboard')->withErrors(['error' => 'You already have an active colocation. You must leave it before joining a new one.']);
        }

        $invitation->colocation->users()->attach($user->id, [
            'is_admin' => false,
            'created_at' => now()
        ]);

        $invitation->update([
            'status' => 'accepted',
            'updated_at' => now()
        ]);

        return redirect()->route('dashboard')->with('success', 'Welcome to your new colocation!');
    }

    public function decline($token)
    {
        $invitation = Invitation::where('UUID', $token)->first();

        if ($invitation->status !== 'pending') {
            return redirect()->route('dashboard')->withErrors(['error' => 'This invitation is no longer valid or has already been used.']);
        }

        $invitation->update([
            'status' => 'declined',
            'updated_at' => now()
        ]);

        return redirect()->route('dashboard')->with('success', 'Invitation declined.');
    }
}
