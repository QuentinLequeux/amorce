@role('admin')
<div class="flex gap-2 max-mobile:mt-6">
    <div x-data="{ open: false }">
        <button dusk="import-csv" type="button" title="Ajouter un CSV" @click="open = ! open"
                class="bg-yellow2 py-2 px-6 rounded text-black font-bold">
            Import&nbsp;CSV
        </button>
        <livewire:csv-import/>
    </div>
    <div x-data="{ open: false }">
        <button dusk="create-transaction" type="button" title="Ajouter une transaction" @click="open = ! open"
                class="bg-yellow2 py-2 px-6 rounded text-black font-bold">
            Ajouter
        </button>
        <livewire:create-transaction/>
    </div>
</div>
@endrole
