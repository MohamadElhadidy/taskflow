<?php

namespace App\Livewire;

use Livewire\Component;
use \App\Models\Team as TeamModel;

class Team extends Component
{
    public $team;


    public function mount(TeamModel $team)
    {
        $this->team = $team->load('members');
    }
    public function render()
    {
        return view('livewire.team');
    }
}
