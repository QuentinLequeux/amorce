<?php

namespace App\Livewire;

use Livewire\Attributes\On;
use Livewire\Component;

class Exist extends Component
{
    public $show = false;

    #[On('showError')]
    public function showError(): void
    {
        $this->show = true;
    }

    public function hide()
    {
        $this->show = false;
    }

    public function render()
    {
        return view('livewire.exist');
    }
}
