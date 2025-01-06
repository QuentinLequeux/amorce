<?php

namespace App\Livewire;

use App\Models\Fund;
use Livewire\Attributes\On;
use Livewire\Attributes\Validate;
use Livewire\Component;

class CreateFund extends Component
{
    public Fund $fund;
    public $show = false;
    #[Validate]
    public $name;

    public function mount(Fund $fund): void
    {
        $this->fund = $fund;
    }

    public function rules(): array
    {
        return [
            'name' => 'required|string|unique:funds,name|max:255',
        ];
    }

    public function save(): void
    {
        $this->authorize('create', $this->fund);

        $this->validate();

        $this->fund->create([
            'name' => $this->name,
        ]);

        $this->show = false;
    }

    #[On('visibleModal')]
    public function visibleModal(): void
    {
        $this->show = true;
    }
}

// TODO : Rafraichir composant pour afficher le nouveau fond.
