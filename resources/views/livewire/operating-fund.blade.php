<div class="flex flex-col h-screen">
    <x-header :user="$user"></x-header>
    <main class="flex grow mt-[calc(70px)] bg-white dark:bg-gray-900 text-black dark:text-white">
        <x-sidebar></x-sidebar>
        <div class="p-6 flex flex-col w-full ml-56">
            <div class="flex items-center justify-between">
                <x-title>
                    Finances / Fonctionnement
                </x-title>
                <x-navigation></x-navigation>
            </div>
            <div class="flex gap-6 mt-6" x-data="{ active:2 }">
                <x-navigation-fund></x-navigation-fund>
            </div>
            <div class="p-6 mt-4 shadow-md rounded-xl font-bold text-2xl">
                Total&nbsp;: {{ $totalGeneral / 100 }}€
            </div>
            <div class="mt-4">
                <h2 class="font-bold text-xl mt-2 mb-2">
                    Transactions
                </h2>
            <livewire:transactions-list fundType="Fond de fonctionnement"/>
            </div>
        </div>
    </main>
</div>
