<?php

namespace App\Livewire;

use Livewire\Component;

class Notifications extends Component
{
    public $isOpen = "false";

    public function openModal()
    {
        $this->isOpen = "true";
    }

    public function hideModal()
    {
        $this->isOpen = "false";
    }

    public function render()
    {
        return view('livewire.notifications');
    }
}
