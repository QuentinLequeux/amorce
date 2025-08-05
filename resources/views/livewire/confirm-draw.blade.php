<div>
    @if('show')
        <div x-show="open" x-data="{ open : @entangle('show')}" class="fixed inset-0 bg-gradient-to-t from-gray-950">
            <div class="p-10 bg-white fixed inset-0 w-fit h-fit m-auto rounded" @click.away="open = false">
                <p class="text-xl font-bold">
                    Pas assez de participants
                </p>
                <button wire:click="$set('show', false)" class="bg-yellow2 py-2 px-6 mt-4 rounded font-semibold mx-auto block">
                    Fermer
                </button>
            </div>
        </div>
    @endif
</div>
