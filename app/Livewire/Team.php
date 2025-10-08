<?php

namespace App\Livewire;

use App\Traits\NotifiesUser;
use Livewire\Component;
use \App\Models\Team as TeamModel;

class Team extends Component
{
    use NotifiesUser;
    public $team;
    public $successMessage;


    public function mount(TeamModel $team)
    {
        $this->team = $team->load('members');

        $this->successMessage = session('success');
        if ($this->successMessage) {
            $this->notifySuccess($this->successMessage);
        }
    }
    public function render()
    {
        return view('livewire.team');
    }
}
