<div class="flex flex-col h-screen">
    <x-header :user="$this->user"></x-header>
    <main class="flex grow mt-[calc(70px)] bg-white dark:bg-gray-900 text-black dark:text-white">
        <x-sidebar></x-sidebar>
        <div class="p-6 flex flex-col w-full max-mobile:w-[calc(130%-224px)] ml-56 max-mobile:ml-14 max-mobile:pr-0">
            <div class="flex items-center justify-between max-mobile:flex-col max-mobile:items-start">
                <x-title>
                    Finances
                </x-title>
                <x-navigation></x-navigation>
            </div>
            <div x-data="{ active:1 }">
                <div class="flex gap-6 mt-8 overflow-x-auto">
                    <x-navigation-fund/>
                </div>
            </div>
            <div class="p-6 mt-4 shadow-md rounded-xl font-bold text-2xl max-mobile:pr-0 w-full">
                Total&nbsp;: {{ $totalGeneral / 100 }}€
            </div>
            <div class="mt-4">
                <h2 class="font-bold text-2xl my-2">
                    Transactions
                </h2>
                {{--                <livewire:transaction-search/>--}}
                <livewire:transactions-list :current-fund="$currentFund" wire:key="transactions-list-{{ $currentFund }}"/>
{{--                @livewire('transactions-list', ['currentFund' => $this->currentFund])--}}
            </div>
        </div>
    </main>
</div>
