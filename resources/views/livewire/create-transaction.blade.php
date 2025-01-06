<div x-show="open" class="bg-gradient-to-t from-gray-950 w-screen h-screen inset-0 fixed z-10">
    <div class="p-10 shadow-xl h-fit fixed inset-0 w-fit z-10 m-auto bg-white dark:text-black rounded-xl"
         x-show="open"
         @click.away="open = false"
         x-transition:enter="transition-transform transition-opacity ease-out duration-300"
         x-transition:enter-start="opacity-0 transform translate-x-2"
         x-transition:enter-end="opacity-100 transform translate-y-0"
         x-transition:leave="transition ease-in duration-300"
         x-transition:leave-end="opacity-0 transform -translate-x-2">
        <p class="font-bold text-xl mb-4">
            Cr&eacute;er&nbsp;une&nbsp;transaction
        </p>
        <div class="border mb-2"></div>
        <form class="flex flex-col" wire:submit.prevent="store">
            @csrf
            <x-label for="date">
                Date&nbsp;<x-mandatory/>
            </x-label>
            {{--            <x-input type="date" id="date" wire:model.defer="date"/>--}}
            <input class="border rounded mt-2 p-2"
                   type="date"
                   id="date"
                   wire:model.defer="date"
                   required>
            <x-label for="description">
                Description&nbsp;<x-mandatory/>
            </x-label>
            <input class="border rounded mt-2 p-2"
                   type="text"
                   id="description"
                   wire:model.defer="description"
                   placeholder="Ex : don en liquide"
                   required>
            @error('description')
            <x-error>
                {{ $message }}
            </x-error>
            @enderror
            <x-label for="donation_type">
                Type&nbsp;<x-mandatory/>
            </x-label>
            <select class="p-2 mt-2 rounded border"
                    id="donation_type"
                    wire:model.defer="donation_type"
                    required>
                <option>--S&eacute;lectionner--</option>
                @foreach(\App\Enums\DonationType::cases() as $donationType)
                    <option value="{{ $donationType->value }}">{{ $donationType->value }}</option>
                @endforeach
            </select>
            <x-label for="fund_id">
                Fond&nbsp;<x-mandatory/>
            </x-label>
            <select class="p-2 mt-2 rounded border"
                    id="fund_id"
                    wire:model.defer="fund_id"
                    required>
                <option>--S&eacute;lectionner--</option>
                @foreach($funds as $fund)
                    <option value="{{ $fund->id }}">{{ $fund->name }}</option>
                @endforeach
            </select>
            <x-label for="amount">
                Montant&nbsp;<x-mandatory/>
            </x-label>
            <div class="relative">
                <input class="border rounded mt-2 p-2 w-full mb-2"
                       type="number"
                       id="amount"
                       wire:model.defer="amount"
                       placeholder="20.00€"
                       {{--                       step=".01"--}}
                       required>
                <span class="absolute right-10 top-1/3">
                    €
                </span>
            </div>
            @error('amount')
            <x-error>
                {{ $message }}
            </x-error>
            @enderror
            <div>
                <button type="button" class="px-10 mt-2 rounded-xl border py-2 font-bold border-black"
                        @click="open = false">
                    Annuler
                </button>
                <x-button>
                    Ajouter
                </x-button>
            </div>
        </form>
    </div>
</div>
