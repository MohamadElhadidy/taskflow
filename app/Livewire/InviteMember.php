<?php

namespace App\Livewire;

use App\Mail\MemberInvited;
use App\Models\Team;
use App\Models\TeamInvitation;
use App\Traits\NotifiesUser;
use Illuminate\Support\Facades\Mail;
use Livewire\Attributes\Validate;
use Livewire\Component;

class InviteMember extends Component
{
    use NotifiesUser;

    #[Validate('required|email')]
    public $email = '';
    public Team $team;

    public function mount(Team $team)
    {
        $this->team = $team;
    }

    public function sendEmail()
    {
        $this->validate();

        $exists = $this->team->members()->where('email', $this->email)->first();

        if ($exists) {
            $this->notifyWarning('Member already exists!');
            return;
        }


        $active = TeamInvitation::where('email', $this->email)->active()->first();

        if ($active) {
            $this->notifyWarning('Invitaion already sent!', $this->email . ' can find the invitaion in the inbox or spam .');
            return;
        }





        $invite = $this->team->invite($this->email);


        Mail::to($this->email)->queue(new MemberInvited($invite));

        $this->notifySuccess('Invitaion sent!', $this->email . ' can now find the invitaion in the mail.');

        $this->reset('email');

    }

    public function revoke($invitationId)
    {
        $revoked = TeamInvitation::find($invitationId)->delete();

        if ($revoked) {
            $this->notifySuccess('Invitaion revoked!');
        }

    }

    public function render()
    {
        return view('livewire.invite-member');
    }
}
