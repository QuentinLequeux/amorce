<div>
    @if($show)
        <div class="absolute top-0 left-0 flex justify-center items-center w-screen bg-opacity-50 bg-black h-screen"
             x-data="{ open: @entangle('show')}"
             x-show="open">
            <div class="bg-white p-12 w-96 rounded self-center"
                 @click.away="open = false">
                <form class="flex flex-col items-center gap-2" wire:submit.prevent="save">
                    @csrf
                    <div class="flex flex-col">
                        <label for="name">
                            Nom&nbsp;<span class="text-orange-500">*</span>
                        </label>
                        <input class="p-2 border-2 rounded" type="text" wire:model="name" id="name" placeholder="Fond..." required>
                        @error('name')
                            <p class="text-red-500">
                                {{ $message }}
                            </p>
                        @enderror
                    </div>
                    <button class="px-6 py-2 bg-sidebar rounded text-white font-bold w-fit" type="submit">
                        Créer
                    </button>
                </form>
            </div>
        </div>
    @endif
</div>
