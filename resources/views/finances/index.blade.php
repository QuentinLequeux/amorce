<x-head>
    <div class="flex flex-col h-screen">
        <x-header :user="$user"></x-header>
        <main class="flex grow mt-[calc(70px)]">
            <x-sidebar></x-sidebar>
            <div class="p-6 flex flex-col w-full">
                <div class="flex items-center justify-between">
                    <x-title>
                        Finances / G&eacute;n&eacute;ral
                    </x-title>
                    <div>
                        <x-link url="/finances/create/import" title="Importer un CSV">
                            Import&nbsp;CSV
                        </x-link>
                        <x-link url="/finances/create/manual" title="Ajouter une transaction">
                            Ajouter
                        </x-link>
                    </div>
                </div>
                <div class="flex gap-6 mt-4" x-data="{ active:1 }">
                    <a class="hover:text-sidebar font-medium"
                       :class="active === 1 ? 'text-sidebar border-b-2 border-sidebar': 'text-black'"
                       href="/finances/general" wire:navigate
                       title="Vers le fond général"
                       @click="active = 1">
                        Fond g&eacute;n&eacute;ral
                    </a>
                    <a class="hover:text-sidebar font-medium"
                       :class="active === 2 ? 'text-sidebar border-b-2 border-sidebar': 'text-black'"
                       href="/finances/operating" wire:navigate
                       title="Vers le fond de fonctionnement"
                       @click="active = 2">
                        Fond de fonctionnement
                    </a>
                    <a class="hover:text-sidebar font-medium"
                       :class="active === 3 ? 'text-sidebar border-b-2 border-sidebar': 'text-black'"
                       href="/finances/specific" wire:navigate
                       title="Vers le fond spécifique"
                       @click="active = 3">
                        Fond sp&eacute;cifique
                    </a>
                </div>
                <div class="p-6 mt-4 shadow-md rounded-xl font-bold text-2xl">
                    Total&nbsp;: {{ $totalGeneral }}€
                </div>
                <div class="mt-4">
                    <h2 class="font-bold text-xl mt-2 mb-2">
                        Transactions
                    </h2>
                    <table class="w-full ">
                        <thead>
                        <tr class="text-left">
                            <th class="p-2">
                                Date
                            </th>
                            <th class="p-2">
                                Type
                            </th>
                            <th class="p-2">
                                Description
                            </th>
                            <th class="p-2">
                                Montant
                            </th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($transactions as $transaction)
                            <tr class="border-b-2">
                                <td class="p-4">
                                    {{ $transaction->date }}
                                </td>
                                <td>
                                    {{ $transaction->donation_type }}
                                </td>
                                <td>
                                    {{ $transaction->description }}
                                </td>
                                <td>
                                <span class="bg-green-600 p-2 rounded-3xl text-white font-bold">
                                {{ $transaction->amount }}€
                                </span>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
                {{ $transactions->links() }}
            </div>
        </main>
    </div>
</x-head>
