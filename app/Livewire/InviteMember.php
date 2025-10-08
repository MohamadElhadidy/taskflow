<?php

namespace App\Livewire;

use App\Mail\MemberInvited;
use App\Models\Team;
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

        $invite = $this->team->invite($this->email);


        Mail::to($this->email)->queue(new MemberInvited($invite));

        $this->notifySuccess('Invitaion sent!', $this->email . ' can now find the invitaion in the mail.');

        $this->reset();

    }

    public function render()
    {
        return view('livewire.invite-member');
    }
}
