<div x-show="open" class="bg-gradient-to-t from-gray-950 inset-0 fixed h-screen w-screen z-10">
    <div class="inset-0 fixed w-fit h-fit m-auto bg-white shadow-xl dark:text-black rounded"
         x-show="open"
         @click.away="open = false; $wire.set('csv', null); $wire.set('fileSize', null);"
         x-transition:enter="transition-transform transition-opacity ease-out duration-300"
         x-transition:enter-start="opacity-0 transform translate-x-2"
         x-transition:enter-end="opacity-100 transform translate-y-0"
         x-transition:leave="transition ease-in duration-300"
         x-transition:leave-end="opacity-0 transform -translate-x-2">
        <form class="p-8 rounded flex flex-col gap-2" wire:submit.prevent="import"
              enctype="multipart/form-data">
            @csrf
            <p class="font-bold text-xl mb-4">
                Importer un fichier
            </p>
            <div class="border mb-2"></div>
            <label for="csv" class="text-gray-500">
                Uniquement format .csv
            </label>
            <input
                class="border-2 rounded file:px-4 file:py-2 file:border-0 file:font-semibold file:bg-yellow2 hover:file:bg-yellow"
                type="file"
                id="csv"
                wire:model="csv"
                accept=".csv"
                required>
            @if($fileSize)
                <p>Taille du fichier : {{ $fileSize }} KB</p>
            @endif
            @error('csv')
            <x-error>
                {{ $message }}
            </x-error>
            @enderror
            <div class="text-center">
                <button type="button" class="font-bold border px-10 mt-2 rounded-xl py-2 border-black"
                        @click="open = false; $wire.set('csv', null); $wire.set('fileSize', null);">
                    Annuler
                </button>
                <button type="submit" class="mt-2 bg-yellow2 px-10 py-2 text-black font-bold rounded-xl" @click="open = false">
                    Envoyer
                </button>
            </div>
        </form>
    </div>
    {{--    <div x-data="{ open: {{session('message') ? 'true' : 'false'}} }"--}}
    {{--         x-init="if (open) { timer = setTimeout(() => open = false, 3000);}">--}}
    {{--        <div class="fixed top-1/4 left-1/2 px-12 p-6 bg-green-600 shadow-xl rounded"--}}
    {{--             x-show="open"--}}
    {{--             x-transition:enter="transition transform ease-in duration-500"--}}
    {{--             x-transition:enter-start="opacity-0 translate-y-20"--}}
    {{--             x-transition:enter-end="opacity-100 translate-y-0"--}}
    {{--             x-transition:leave="transition transform ease-in duration-500"--}}
    {{--             x-transition:leave-start="opacity-100 translate-y-0"--}}
    {{--             x-transition:leave-end="opacity-0 translate-y-20"--}}
    {{--            --}}{{--     x-transition.duration.500ms--}}
    {{--            --}}{{--     @click.away="open = false"--}}{{-->--}}
    {{--            <p class="text-center font-bold">{{ session('message') }}</p>--}}
    {{--        </div>--}}
    {{--    </div>--}}
</div>

<!-- TODO : modale importation -->
