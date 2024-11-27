<div>
    <div x-data="{ open: false }"
         x-init="
              $wire.on('importCompleted', () => {
              open = true;
              setTimeout(() => { open = false }, 3000);
              })
              "
         x-show="open"
         class="fixed inset-0 flex items-center justify-center bg-gray-800 bg-opacity-50"
         x-transition:enter="transition transform ease-out duration-300"
         x-transition:enter-start="opacity-0 scale-95"
         x-transition:enter-end="opacity-100 scale-100"
         x-transition:leave="transition transform ease-in duration-300"
         x-transition:leave-start="opacity-100 scale-100"
         x-transition:leave-end="opacity-0 scale-95">
        <div class="bg-white p-6 rounded shadow-xl">
            <p>Hello&nbsp;</p>
        </div>
    </div>
    <div class="absolute right-0 bg-white shadow-xl"
         x-show="open"
         @click.away="open = false"
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
                   accept=".csv">
            <x-button>
                Envoyer
            </x-button>
        </form>
    </div>
</div>
