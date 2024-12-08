<div>
    <div class="absolute right-0 bg-white shadow-xl dark:text-black rounded"
         x-show="open"
         @click.away="open = false; $wire.set('csv', null); $wire.set('fileSize', null);"
         x-transition:enter="transition-transform transition-opacity ease-out duration-300"
         x-transition:enter-start="opacity-0 transform translate-x-2"
         x-transition:enter-end="opacity-100 transform translate-y-0"
         x-transition:leave="transition ease-in duration-300"
         x-transition:leave-end="opacity-0 transform -translate-x-2">
        <form class="shadow-xl p-6 rounded flex flex-col gap-2" wire:submit.prevent="import"
              enctype="multipart/form-data">
            @csrf
            <label for="csv">
                Uniquement format .csv
            </label>
            <input class="border-2 rounded"
                   type="file"
                   id="csv"
                   wire:model="csv"
                   accept=".csv"
                   required>
            @if($fileSize)
                <p>Taille du fichier : {{ $fileSize }} KB</p>
            @endif
            @error('csv')
                <p class="text-red-500">{{ $message }}</p>
            @enderror
            <x-button>
                Envoyer
            </x-button>
        </form>
    </div>
    {{--    @if(session()->has('message'))--}}
    {{--        <div class="fixed bottom-1/2 left-1/2 p-12 bg-green-600 shadow-xl rounded"--}}
    {{--             x-show="open"--}}
    {{--             x-transition.duration.500ms--}}
    {{--             @click.away="open = false">--}}
    {{--            <p class="text-center font-bold">--}}
    {{--                {{ session('message') }}--}}
    {{--            </p>--}}
    {{--        </div>--}}
    {{--    @endif--}}
    <div x-data="{ open: {{session('message') ? 'true' : 'false'}} }"
         x-init="if (open) { timer = setTimeout(() => open = false, 3000);}">
        <div class="fixed top-1/4 left-1/2 px-12 p-6 bg-green-600 shadow-xl rounded"
             x-show="open"
             x-transition:enter="transition transform ease-in duration-500"
             x-transition:enter-start="opacity-0 translate-y-20"
             x-transition:enter-end="opacity-100 translate-y-0"
             x-transition:leave="transition transform ease-in duration-500"
             x-transition:leave-start="opacity-100 translate-y-0"
             x-transition:leave-end="opacity-0 translate-y-20"
            {{--     x-transition.duration.500ms--}}
            {{--     @click.away="open = false"--}}>
            <p class="text-center font-bold">{{ session('message') }}</p>
        </div>
    </div>
</div>
