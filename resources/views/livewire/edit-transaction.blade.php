<div>
    @if($show)
        <div x-data="{ open: @entangle('show') }"
             x-show="open">
            <div class="absolute left-1/4 top-1/2 flex flex-col bg-gray-500 p-6 rounded-xl max-w-3xl gap-2 justify-center items-center"
                 @click.away="open = false">
                <form wire:submit.prevent="update">
                    @csrf
                    <div>
                        <x-label for="date">
                            Date&nbsp;*
                        </x-label>
                        <input class="border rounded mt-2 p-2"
                               type="date"
                               id="date"
                               wire:model.defer="date">
                    </div>
                    <div>
                        <x-label for="description">
                            Description&nbsp;*
                        </x-label>
                        <input class="border rounded mt-2 p-2"
                               type="text"
                               id="description"
                               wire:model.defer="description"
                               placeholder="Don">
                        @error('description')
                        <span>
                    {{ $message }}
                    </span>
                        @enderror
                    </div>
                    <div>
                        <x-label for="type">
                            Type&nbsp;*
                        </x-label>
                        <select class="p-2 mt-2 rounded"
                                id="type"
                                wire:model.change="donation_type">
                            @foreach(\App\Enums\DonationType::cases() as $donationType)
                                <option value="{{ $donationType }}">{{ $donationType }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div>
                        <x-label for="fund_type">
                            Fond&nbsp;*
                        </x-label>
                        <select class="p-2 mt-2 rounded"
                                id="fund_type"
                                wire:model.change="fund_type">
                            @foreach(\App\Enums\FundType::cases() as $fundType)
                                <option value="{{ $fundType }}">{{ $fundType }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div>
                        <x-label for="amount">
                            Montant&nbsp;*
                        </x-label>
                        <input class="border rounded mt-2 p-2"
                               type="number"
                               id="amount"
                               wire:model.defer="amount"
                               placeholder="20.00€">
                        @error('amount')
                        <span>
            {{ $message }}
        </span>
                        @enderror
                    </div>
                    <x-button>
                        Modifier
                    </x-button>
                </form>
                <button class="py-2 px-12 bg-sidebar rounded text-white font-bold w-fit" wire:click="$set('show', false)">
                    Annuler
                </button>
            </div>
        </div>
    @endif
</div>
