<x-head>
    <div class="flex flex-col h-screen">
        <x-header :user="$user"></x-header>
        <x-main>
            <x-title>
                Finances / Ajout
            </x-title>
            <div class="p-6 shadow-xl h-fit">
                <form class="flex flex-col" method="POST" action="{{ route('transaction.store') }}">
                    @csrf
                    <x-label for="date">
                        Date&nbsp;*
                    </x-label>
                    <x-input type="date"
                             id="date"
                             name="date"></x-input>
                    <x-label for="description">
                        Description&nbsp;*
                    </x-label>
                    <x-input type="text"
                             id="description"
                             name="description"
                             placeholder="Don"></x-input>
                    <x-label for="type">
                        Type&nbsp;*
                    </x-label>
                    <select class="p-2 mt-2 rounded"
                            id="type"
                            name="donation_type"
                            required>
                        <option value="Virement" selected>Virement</option>
                        <option value="Liquide">Liquide</option>
                    </select>
                    <x-label for="fund_type">
                        Fond&nbsp;*
                    </x-label>
                    <select class="p-2 mt-2 rounded"
                            id="fund_type"
                            name="fund_type"
                            required>
                        <option value="Fond général" selected>Fond&nbsp;général</option>
                        <option value="Fond de fonctionnement">Fond de fonctionnement</option>
                        <option value="Fond spécifique">Fond sp&eacute;cifique</option>
                    </select>
                    <x-label for="amount">
                        Montant&nbsp;*
                    </x-label>
                    <x-input type="number"
                             id="amount"
                             name="amount"
                             placeholder="20.00€"></x-input>
                    <x-button>
                        Ajouter
                    </x-button>
                </form>
            </div>
        </x-main>
    </div>
</x-head>
