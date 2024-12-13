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

    public function mount(Fund $fund)
    {
        $this->fund = $fund;
    }

//    public function render()
//    {
//        return view('livewire.create-fund');
//    }

    public function rules()
    {
        return [
            'name' => 'required|string|unique:funds,name|max:255',
        ];
    }

    public function save()
    {
        $this->authorize('create', $this->fund);

        $this->validate();

        $this->fund->create([
            'name' => $this->name,
        ]);

        $this->show = false;
    }

    #[On('visibleModal')]
    public function visibleModal()
    {
        $this->show = true;
    }
}
