<div>
    @if('show')
        <div dusk="draw-modal" x-show="open" x-data="{ open : @entangle('show') }" class="bg-gradient-to-t from-gray-950 fixed inset-0 h-screen w-screen">
            <div class="bg-white h-fit w-fit m-auto p-10 inset-0 rounded fixed" @click.away="open = false">
                <p class="text-center mb-4 font-bold">
                    Etes-vous sûr ?
                </p>
                <button dusk="draw-yes-button" class="py-2 px-6 bg-yellow2 rounded font-semibold mr-2" wire:click="randomDraw">
                    Oui
                </button>
                <button class="py-2 px-6 bg-yellow2 rounded font-semibold" wire:click="$set('show', false)">
                    Non
                </button>
            </div>
        </div>
    @endif
</div>
