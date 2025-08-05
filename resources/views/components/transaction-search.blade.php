<div class="relative my-4">
    <input class="px-10 py-2 rounded font-bold border-2 text-black" type="search" placeholder="Recherche"
           wire:model.live="search"
           aria-label="Rechercher">
    <span class="absolute left-2 top-2">
            <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" viewBox="0 0 32 32" fill="none">
              <path
                  d="M14.5 25C20.299 25 25 20.299 25 14.5C25 8.70101 20.299 4 14.5 4C8.70101 4 4 8.70101 4 14.5C4 20.299 8.70101 25 14.5 25Z"
                  stroke="gray" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
              <path d="M21.9248 21.925L27.9998 28" stroke="gray" stroke-width="2" stroke-linecap="round"
                    stroke-linejoin="round"/>
            </svg>
    </span>
    {{--    <ul>--}}
    {{--        @forelse($transactions as $transaction)--}}
    {{--            <li>--}}
    {{--                {{ $transaction->description }}--}}
    {{--            </li>--}}
    {{--        @empty--}}
    {{--            <li>--}}
    {{--                Aucun résultat--}}
    {{--            </li>--}}
    {{--        @endforelse--}}
    {{--    </ul>--}}
</div>
