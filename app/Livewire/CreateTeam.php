<?php

namespace App\Livewire;

use App\Models\Team;
use Livewire\Attributes\Validate;
use Livewire\Component;

class CreateTeam extends Component
{

    #[Validate('required|min:3|max:255')]
    public string $name = '';


    public function save()
    {
        $this->validate();

        $team = Team::create(['name' => $this->name]);

        $team->manage();

        $this->dispatch('team-created');
    }
    public function render()
    {
        return view('livewire.create-team');
    }
}
