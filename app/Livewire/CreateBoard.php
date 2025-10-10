<?php

namespace App\Livewire;

use App\Models\Board;
use App\Models\Team;
use App\Traits\NotifiesUser;
use Livewire\Attributes\Validate;
use Livewire\Component;

class CreateBoard extends Component
{
    use NotifiesUser;

    #[Validate('required|min:3|max:255')]
    public string $name = '';

    #[Validate('required')]
    public string $color = '';
    public array $colors =  [
            ['name' => 'Black', 'value' => '#111827'], // deep gray-black
            ['name' => 'Slate', 'value' => '#475569'], // darker slate for contrast
            ['name' => 'Stone', 'value' => '#57534E'], // earthy dark gray-brown
            ['name' => 'Sky', 'value' => '#0284C7'], // medium-dark blue
            ['name' => 'Teal', 'value' => '#0D9488'], // rich teal
            ['name' => 'Emerald', 'value' => '#059669'], // darker green
            ['name' => 'Lime', 'value' => '#4D7C0F'], // olive lime for white text contrast
            ['name' => 'Amber', 'value' => '#B45309'], // dark amber / bronze
            ['name' => 'Orange', 'value' => '#EA580C'], // strong orange
            ['name' => 'Red', 'value' => '#DC2626'], // dark red
            ['name' => 'Rose', 'value' => '#BE123C'], // deep rose
            ['name' => 'Violet', 'value' => '#6D28D9'], // deep violet
            ['name' => 'Indigo', 'value' => '#4338CA'], // dark indigo
        ];

    public Team $team;

    public function mount(Team $team)
    {
        $this->team = $team;
    }

    public function save()
    {
        $this->validate();

        Board::create(['name' => $this->name, 'color' => $this->color, 'team_id' => $this->team->id]);

        $this->dispatch('board-created');

        $this->notifySuccess($this->name . ' created!', 'It is now active.');

        $this->reset();


    }


    public function render()
    {
        return view('livewire.create-board');
    }
}
