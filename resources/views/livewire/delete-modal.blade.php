<div>
    @if($show)
        <div class="absolute inset-0 w-full h-full bg-opacity-50 bg-black"
             x-data="{ open: @entangle('show') }"
             x-show="open">
            <div class="fixed top-1/2 left-1/2 px-12 py-6 bg-white shadow-xl rounded-xl"
                 @click.away="open = false">
                <p class="m-4">
                    Etes vous sur de vouloir supprimer&nbsp;?
                </p>
                <div class="flex justify-center gap-6">
                    <button class="px-6 py-2 bg-red-500 rounded text-white font-bold" wire:click="destroy">Oui</button>
                    <button class="px-6 py-2 bg-green-600 rounded text-white font-bold" wire:click="$set('show', false)">Non</button>
                </div>
            </div>
        </div>
    @endif
</div>
