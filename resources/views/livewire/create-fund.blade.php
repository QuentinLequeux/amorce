<div>
    @if($show)
        <div dusk="create-modal" class="fixed inset-0 flex justify-center items-center w-screen h-screen bg-gradient-to-t from-gray-950"
             x-data="{ open: @entangle('show')}"
             x-show="open">
            <div class="bg-white p-8 w-96 rounded self-center"
                 @click.away="open = false">
                <form wire:submit.prevent="save">
                    @csrf
                    <p class="font-bold text-xl mb-4">
                        Cr&eacute;er un fond
                    </p>
                    <div class="border mb-2"></div>
                    <div class="flex flex-col">
                        <x-label for="name">
                            Nom&nbsp;<x-mandatory/>
                        </x-label>
                        <input class="p-2 border-2 rounded my-2"
                               name="name"
                               type="text"
                               wire:model="name"
                               id="name"
                               placeholder="Ex : Fond général"
                               required>
                        @error('name')
                        <x-error>
                            {{ $message }}
                        </x-error>
                        @enderror
                    </div>
                    <div class="text-center">
                        <button class="px-10 py-2 rounded-xl border border-black font-bold"
                                @click="open = false">
                            Annuler
                        </button>
                        <button dusk="confirm-button" class="mt-2 bg-yellow2 px-10 py-2 rounded-xl text-black font-bold" type="submit">
                            Cr&eacute;er
                        </button>
                    </div>
                </form>
            </div>
        </div>
    @endif
</div>
