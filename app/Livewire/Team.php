<?php

namespace App\Livewire;

use App\Traits\NotifiesUser;
use Livewire\Attributes\On;
use Livewire\Component;
use \App\Models\Team as TeamModel;

class Team extends Component
{
    use NotifiesUser;
    public $team;
    public $boards;
    public $successMessage;



    public function mount(TeamModel $team)
    {
        $this->fetchBoards();
        $this->team = $team->load('members');

        $this->successMessage = session('success');
        if ($this->successMessage) {
            $this->notifySuccess($this->successMessage);
        }
    }

    #[On('board-created')]
    public function fetchBoards()
    {
        $this->boards = $this->team->boards()->orderBy('order')->get();

    }
    public function render()
    {
        return view('livewire.team');
    }
}
