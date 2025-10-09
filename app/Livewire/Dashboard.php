<?php

namespace App\Livewire;

use App\Traits\NotifiesUser;
use Livewire\Component;

class Dashboard extends Component
{
    use NotifiesUser;
    public $warningMessage;

    public function mount()
    {
        $this->warningMessage = session('warning');
        if ($this->warningMessage) {
            $this->notifyWarning($this->warningMessage);
        }
    }

    public function render()
    {
        return view('livewire.dashboard');
    }
}
