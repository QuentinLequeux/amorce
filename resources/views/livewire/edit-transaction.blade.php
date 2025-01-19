<div>
    @if($show)
        <div x-data="{ open: @entangle('show') }"
             x-show="open"
             class="inset-0 fixed bg-gradient-to-t from-gray-950 h-screen w-screen">
            <div class="fixed inset-0 w-fit h-fit bg-white p-10 rounded-xl gap-2 m-auto shadow-xl"
                 @click.away="open = false">
                <p class="font-bold text-xl mb-4">
                    Modifier&nbsp;une&nbsp;transaction
                </p>
                <div class="border mb-2"></div>
                <form wire:submit.prevent="update" class="flex flex-col">
                    @csrf
                    <div class="flex flex-col">
                        <x-label for="date">
                            Date&nbsp;<x-mandatory/>
                        </x-label>
                        <input class="border rounded mt-2 p-2"
                               type="date"
                               id="date"
                               wire:model.defer="date"
                               required>
                    </div>
                    <div class="flex flex-col">
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
                    </div>
                    <div class="flex flex-col">
                        <x-label for="type">
                            Type&nbsp;<x-mandatory/>
                        </x-label>
                        <select class="p-2 mt-2 rounded border"
                                id="type"
                                wire:model.change="donation_type"
                                required>
                            <option>--S&eacute;lectionner--</option>
                            @foreach(\App\Enums\DonationType::cases() as $donationType)
                                <option value="{{ $donationType }}">{{ $donationType }}</option>
                            @endforeach
                        </select>
                        @error('donation_type')
                        <x-error>
                            {{ $message }}
                        </x-error>
                        @enderror
                    </div>
                    <div class="flex flex-col">
                        <x-label for="fund_type">
                            Fond&nbsp;<x-mandatory/>
                        </x-label>
                        <select class="p-2 mt-2 rounded border"
                                id="fund_type"
                                wire:model.change="fund_id"
                                required>
                            <option>--S&eacute;lectionner--</option>
                            @foreach($funds as $fund)
                                <option value="{{ $fund->id }}">{{ $fund->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="flex flex-col relative">
                        <x-label for="amount">
                            Montant&nbsp;<x-mandatory/>
                        </x-label>
                        <input class="border rounded my-2 p-2"
                               type="number"
                               id="amount"
                               wire:model.defer="amount"
                               placeholder="20.00€"
                               required>
                        <span class="absolute right-10 top-12">
                            €
                        </span>
                    </div>
                    @error('amount')
                    <x-error>
                        {{ $message }}
                    </x-error>
                    @enderror
                    <div>
                        <button type="button" class="py-2 px-10 border border-black rounded-xl font-bold"
                                wire:click="$set('show', false)">
                            Annuler
                        </button>
                        <x-button>
                            Modifier
                        </x-button>
                    </div>
                </form>
            </div>
        </div>
    @endif
</div>
