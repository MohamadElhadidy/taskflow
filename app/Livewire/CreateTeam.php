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
    public ?Team $team = null;


    public function mount()
    {
        if ($this->team) {
            $this->name = $this->team->name;
        }
    }

    public function save()
    {
        $this->validate();

        if ($this->team) {
            $this->team->update(['name' => $this->name]);

            $this->notifySuccess('Team updated!', 'Changes have been saved.');
        } else {
            $team = Team::create(['name' => $this->name]);
            $team->addManager();

            $this->notifySuccess('Team created!', 'It is now active.');
        }


        $this->reset();

        $this->dispatch('team-changed');
    }
    public function render()
    {
        return view('livewire.create-team');
    }



}
