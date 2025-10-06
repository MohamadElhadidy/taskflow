<?php

namespace App\Livewire;

use Livewire\Attributes\On;
use Livewire\Component;

class Nav extends Component
{
    public $myTeams;
    public $otherTeams;

    public $createModel;

    #[On('team-created')]
    public function mount()
    {
        $this->myTeams = auth()->user()->myTeams();
        $this->otherTeams = auth()->user()->otherTeams();

        $this->createModel = false;
    }

    public function toggleCreateModel()
    {
        $this->createModel = !$this->createModel;
    }
    public function render()
    {
        return view('livewire.nav');
    }
}
