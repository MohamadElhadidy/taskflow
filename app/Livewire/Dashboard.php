<?php

namespace App\Livewire;

use App\Traits\NotifiesUser;
use Livewire\Component;

class Dashboard extends Component
{
    use NotifiesUser;
    public $errorMessage;

    public function mount()
    {
        $this->errorMessage = session('error');
        if ($this->errorMessage) {
            $this->notifyError($this->errorMessage);
        }
    }

    public function render()
    {
        return view('livewire.dashboard');
    }
}
