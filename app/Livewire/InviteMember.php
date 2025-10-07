<?php

namespace App\Livewire;

use App\Mail\MemberInvited;
use Illuminate\Support\Facades\Mail;
use Livewire\Attributes\Validate;
use Livewire\Component;

class InviteMember extends Component
{
    #[Validate('required|email')]
    public $email = '';

    public function sendEmail()
    {
        $this->validate();

        Mail::to($this->email)->queue(new MemberInvited());

        

    }
    public function render()
    {
        return view('livewire.invite-member');
    }
}
