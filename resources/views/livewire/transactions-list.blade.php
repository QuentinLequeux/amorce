<div>
    <x-transaction-search/>
    <div class="overflow-x-auto">
        <table class="w-full">
            <thead>
            <tr class="text-left">
                <th class="p-2">
                    Date
                    <button wire:click="sortBy('date')">
                        @if($sortField === 'date')
                            @if($sortDirection === 'asc')
                                ↑
                            @else
                                ↓
                            @endif
                        @else
                            ↑↓
                        @endif
                    </button>
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
            @forelse($transactions as $transaction)
                <tr class="border-b-2 align-baseline" wire:key="{{ $transaction->id }}">
                    <td class="p-2">
                        {{ \Carbon\Carbon::parse($transaction->date)->translatedFormat('d F Y') }}
                    </td>
                    <td class="p-2 align-baseline">
                        {{ $transaction->donation_type }}
                    </td>
                    <td class="size-7/12 p-2 min-w-[500px]">
                        {{ $transaction->description }}
                    </td>
                    <td class="align-middle">
                        <span
                            class="{{ $transaction->amount > 0 ? "bg-green-600" : "bg-red-500"}} p-2 rounded-3xl text-white font-bold flex justify-center max-w-20 max-mobile:mr-2 my-2">
                            {{ $transaction->amount / 100 }}€
                        </span>
                    </td>
                    <td class="align-middle">
                        @can('edit transaction')
                            <button type="button" title="Modifier"
                                    wire:click="$dispatch('showModal', [{{$transaction->id}}])"
                                    class="max-mobile:mr-2">
                                <svg
                                    class="hover:stroke-orange-500 stroke-black dark:stroke-white dark:hover:stroke-orange-500"
                                    xmlns="http://www.w3.org/2000/svg" width="24"
                                    height="24" viewBox="0 0 24 24" fill="none">
                                    <path d="M16 3L21 8L8 21H3V16L16 3Z" stroke-width="2" stroke-linecap="round"
                                          stroke-linejoin="round"/>
                                </svg>
                            </button>
                        @endcan
                    </td>
                    <td class="align-middle">
                        @can('delete transaction')
                            <button type="button" title="Supprimer"
                                    wire:click="$dispatch('openmodal', [{{$transaction->id}}])">
                                <svg
                                    class="hover:stroke-red-500 stroke-black dark:stroke-white dark:hover:stroke-red-500"
                                    xmlns="http://www.w3.org/2000/svg" width="24"
                                    height="24" viewBox="0 0 24 24" fill="none">
                                    <path d="M3 6H5H21" stroke-width="2" stroke-linecap="round"
                                          stroke-linejoin="round"/>
                                    <path
                                        d="M8 6V4C8 3.46957 8.21071 2.96086 8.58579 2.58579C8.96086 2.21071 9.46957 2 10 2H14C14.5304 2 15.0391 2.21071 15.4142 2.58579C15.7893 2.96086 16 3.46957 16 4V6M19 6V20C19 20.5304 18.7893 21.0391 18.4142 21.4142C18.0391 21.7893 17.5304 22 17 22H7C6.46957 22 5.96086 21.7893 5.58579 21.4142C5.21071 21.0391 5 20.5304 5 20V6H19Z"
                                        stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                    <path d="M10 11V17" stroke-width="2" stroke-linecap="round"
                                          stroke-linejoin="round"/>
                                    <path d="M14 11V17" stroke-width="2" stroke-linecap="round"
                                          stroke-linejoin="round"/>
                                </svg>
                            </button>
                        @endcan
                    </td>
                </tr>
            @empty
                <tr>
                    <td class="p-8" colspan="4">
                        <div class="flex justify-center items-center">
                            <svg class="mr-2" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                 viewBox="0 0 24 24"
                                 fill="none">
                                <path
                                    d="M12 22C17.5228 22 22 17.5228 22 12C22 6.47715 17.5228 2 12 2C6.47715 2 2 6.47715 2 12C2 17.5228 6.47715 22 12 22Z"
                                    stroke="gray" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                <path d="M4.93 4.93L19.07 19.07" stroke="gray" stroke-width="2" stroke-linecap="round"
                                      stroke-linejoin="round"/>
                            </svg>
                            <p class="text-xl text-gray-500">
                                Aucun r&eacute;sultats
                            </p>
                        </div>
                    </td>
                </tr>
            @endforelse
            </tbody>
        </table>
    </div>
    <div>
        {{ $this->transactions->links('pagination::tailwind') }}
    </div>
</div>
