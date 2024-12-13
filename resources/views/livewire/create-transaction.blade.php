<div class="p-6 shadow-xl h-fit absolute right-0 bg-white dark:text-black rounded"
     x-show="open"
     @click.away="open = false"
     x-transition:enter="transition-transform transition-opacity ease-out duration-300"
     x-transition:enter-start="opacity-0 transform translate-x-2"
     x-transition:enter-end="opacity-100 transform translate-y-0"
     x-transition:leave="transition ease-in duration-300"
     x-transition:leave-end="opacity-0 transform -translate-x-2">
    <form class="flex flex-col" wire:submit.prevent="store">
        @csrf
        <x-label for="date">
            Date&nbsp;<span class="text-orange-500">*</span>
        </x-label>
        <input class="border rounded mt-2 p-2"
               type="date"
               id="date"
               wire:model.defer="date">
        <x-label for="description">
            Description&nbsp;<span class="text-orange-500">*</span>
        </x-label>
        <input class="border rounded mt-2 p-2"
               type="text"
               id="description"
               wire:model.defer="description"
               placeholder="Don">
        @error('description')
        <span class="text-red-500">
            {{ $message }}
        </span>
        @enderror
        <x-label for="donation_type">
            Type&nbsp;<span class="text-orange-500">*</span>
        </x-label>
        <select class="p-2 mt-2 rounded border-2"
                id="donation_type"
                wire:model.defer="donation_type">
            <option>--S&eacute;lectionner--</option>
            @foreach(\App\Enums\DonationType::cases() as $donationType)
                <option value="{{ $donationType->value }}">{{ $donationType->value }}</option>
            @endforeach
        </select>
        <x-label for="fund_type">
            Fond&nbsp;<span class="text-orange-500">*</span>
        </x-label>
        <select class="p-2 mt-2 rounded border-2"
                id="fund_type"
                wire:model.defer="fund_type">
            <option>--S&eacute;lectionner--</option>
            @foreach(\App\Models\Fund::all() as $fund)
                <option value="{{ $fund->name }}">{{ $fund->name }}</option>
            @endforeach
            {{--            @foreach(\App\Enums\FundType::cases() as $fundType)--}}
            {{--                <option value="{{ $fundType->value }}">{{ $fundType->value }}</option>--}}
            {{--            @endforeach--}}
        </select>
        <x-label for="amount">
            Montant&nbsp;<span class="text-orange-500">*</span>
        </x-label>
        <div class="relative">
            <input class="border rounded mt-2 p-2"
                   type="number"
                   id="amount"
                   wire:model.defer="amount"
                   placeholder="20.00€">
            <span class="absolute right-10 top-1/3">€</span>
            @error('amount')
            <span class="text-red-500">
            {{ $message }}
        </span>
            @enderror
        </div>
        <x-button>
            Ajouter
        </x-button>
    </form>
</div>
