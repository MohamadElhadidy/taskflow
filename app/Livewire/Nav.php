<?php

namespace App\Livewire;

use App\Models\Team;
use App\Traits\NotifiesUser;
use Livewire\Attributes\On;
use Livewire\Component;

class Nav extends Component
{
    use NotifiesUser;
    public $myTeams;
    public $otherTeams;

    public ?Team $team;

    public $createModel = false;

    #[On('team-changed')]
    public function mount()
    {
        $this->myTeams = auth()->user()->myTeams();
        $this->otherTeams = auth()->user()->otherTeams();

        $this->createModel = false;
    }
    
    public function editTeam($teamId)
    {
        $this->team = auth()->user()->myTeams()->where('id', $teamId)->first();
        $this->createModel = true;
    }

    public function deleteTeam($teamId)
    {
        Team::find($teamId)->delete();
        $this->createModel = false;

        $this->notifyError('Team deleted!', );

        $this->dispatch('team-changed');
    }

    public function showCreateModel()
    {
        $this->createModel = true;
    }

    public function render()
    {
        return view('livewire.nav');
    }
}
