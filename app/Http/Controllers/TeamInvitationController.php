<?php

namespace App\Http\Controllers;

use App\Models\TeamInvitation;


class TeamInvitationController extends Controller
{
    public function accept($token)
    {
        $user = auth()->user();

        $invite = TeamInvitation::where('token', $token)->where('email', $user->email)->firstOrFail();

        if ($invite->isExpired()) {
            return redirect('dashboard')->with('error', 'Invitation expired.');
        }

        if (!$invite->team->members()->where('user_id', $user->id)->exists()) {
            $invite->team->addMember($user);
        }

        $invite->update(['accepted_at' => now()]);

        return redirect()->route('team', $invite->team->identifier)->with('success', 'You have joined the team!');
    }
}
