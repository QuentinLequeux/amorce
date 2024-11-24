<x-head>
    <div class="flex flex-col h-screen">
        <x-header :user="$user"></x-header>
        <x-main>
            <x-title>
                Finances / Import
            </x-title>
            <form class="shadow-xl p-6 rounded flex flex-col gap-2" method="POST"
                  action="{{ route('csv-import.store') }}">
                <label for="file">
                    Uniquement format .csv
                </label>
                <input class="border-2 rounded"
                       type="file"
                       id="file"
                       name="csv"
                       accept=".csv"
                       required>
                <x-button>
                    Envoyer
                </x-button>
            </form>
        </x-main>
    </div>
</x-head>
