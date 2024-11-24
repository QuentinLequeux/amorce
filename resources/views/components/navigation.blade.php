<div class="flex">
    <x-link url="/finances/create/import" title="Importer un CSV">
        Import&nbsp;CSV
    </x-link>
    <div x-data="{ open: false }">
        <button type="button" title="Ajouter une transaction" @click="open = ! open" class="bg-sidebar p-2 rounded text-white font-bold">
            Ajouter
        </button>
        <livewire:create-transaction/>
    </div>
</div>
