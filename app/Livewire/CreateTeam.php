<?php

namespace App\Livewire;

use App\Models\Team;
use App\Traits\NotifiesUser;
use Livewire\Attributes\Validate;
use Livewire\Component;

class CreateTeam extends Component
{
    use NotifiesUser;

    #[Validate('required|min:3|max:255')]
    public string $name = '';


    public function save()
    {
        $this->validate();

        $team = Team::create(['name' => $this->name]);

        $team->addManager();

        $this->reset();

        $this->dispatch('team-created');

        $this->notifySuccess('Team created!', 'It is now active.');

    }
    public function render()
    {
        return view('livewire.create-team');
    }



}
