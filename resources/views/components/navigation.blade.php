<div class="flex gap-2">
    <div x-data="{ open: false }">
        <button type="button" title="Ajouter un CSV" @click="open = ! open" class="bg-sidebar py-2 px-6 rounded text-white font-bold">
            Import&nbsp;CSV
        </button>
        <livewire:csv-import/>
    </div>
    <div x-data="{ open: false }">
        <button type="button" title="Ajouter une transaction" @click="open = ! open" class="bg-sidebar py-2 px-6 rounded text-white font-bold">
            Ajouter
        </button>
        <livewire:create-transaction/>
    </div>
</div>
