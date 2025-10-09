<?php

namespace App\Livewire;

use App\Models\Team;
use App\Traits\NotifiesUser;
use Livewire\Component;
use Livewire\WithPagination;

class Members extends Component
{
    use NotifiesUser, WithPagination;

    public Team $team;


    protected $paginationTheme = 'tailwind';

    public function mount(Team $team)
    {
        $this->team = $team;
    }


    public function kick($memberId)
    {

        $this->team->members()->detach($memberId);
        $this->notifySuccess('Member kicked!');

        $members = $this->team->members()->paginate(5);

        if ($members->isEmpty() && $this->paginators > 1) {
            $this->previousPage();
        }



    }

    public function render()
    {
        $members = $this->team->members()->paginate(5);

        return view('livewire.members', [
            'members' => $members
        ]);
    }
}
