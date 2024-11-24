<div class="p-6 shadow-xl h-fit absolute right-0 bg-white" x-show="open"
     @click.away="open = false"
     x-transition:enter="transition-transform transition-opacity ease-out duration-300"
     x-transition:enter-start="opacity-0 transform translate-x-2"
     x-transition:enter-end="opacity-100 transform translate-y-0"
     x-transition:leave="transition ease-in duration-300"
     x-transition:leave-end="opacity-0 transform -translate-x-2">
    <form class="flex flex-col" wire:submit.prevent="store">
        @csrf
        <x-label for="date">
            Date&nbsp;*
        </x-label>
        <input class="border rounded mt-2 p-2"
               type="date"
               id="date"
               wire:model.blur="date"
               required>
        <x-label for="description">
            Description&nbsp;*
        </x-label>
        <input class="border rounded mt-2 p-2"
               type="text"
               id="description"
               wire:model.blur="description"
               required
               placeholder="Don">
        <x-label for="type">
            Type&nbsp;*
        </x-label>
        <select class="p-2 mt-2 rounded"
                id="type"
                required
                wire:model.blur="donation_type">
            @foreach(\App\Enums\DonationType::cases() as $donationType)
                <option value="{{ $donationType }}">{{ $donationType }}</option>
            @endforeach
        </select>
        <x-label for="fund_type">
            Fond&nbsp;*
        </x-label>
        <select class="p-2 mt-2 rounded"
                id="fund_type"
                wire:model.blur="fund_type"
                required>
            @foreach(\App\Enums\FundType::cases() as $fundType)
                <option value="{{ $fundType }}">{{ $fundType }}</option>
            @endforeach
        </select>
        <x-label for="amount">
            Montant&nbsp;*
        </x-label>
        <input class="border rounded mt-2 p-2"
               type="number"
               id="amount"
               wire:model.blur="amount"
               placeholder="20.00€">
        <x-button>
            Ajouter
        </x-button>
    </form>
</div>
