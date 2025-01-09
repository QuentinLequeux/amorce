{{--<a class="hover:text-yellow2 font-medium dark:text-white dark:hover:text-yellow whitespace-nowrap"--}}
{{--   :class="active === 1 ? 'text-yellow2 dark:text-yellow2 border-b-2 border-yellow2': 'text-black'"--}}
{{--   href="{{ route('finances.general') }}" wire:navigate--}}
{{--   title="Vers le fond général"--}}
{{--   @click="active = 1">--}}
{{--    Fond g&eacute;n&eacute;ral--}}
{{--</a>--}}
{{--<a class="hover:text-yellow2 font-medium dark:text-white dark:hover:text-yellow2 whitespace-nowrap"--}}
{{--   :class="active === 2 ? 'text-yellow2 dark:text-yellow2 border-b-2 border-yellow2': 'text-black'"--}}
{{--   href="{{ route('finances.operating') }}" wire:navigate--}}
{{--   title="Vers le fond de fonctionnement"--}}
{{--   @click="active = 2">--}}
{{--    Fond de fonctionnement--}}
{{--</a>--}}
{{--<a class="hover:text-yellow2 font-medium dark:text-white dark:hover:text-yellow2 whitespace-nowrap"--}}
{{--   :class="active === 3 ? 'text-yellow2 dark:text-yellow2 border-b-2 border-yellow2': 'text-black'"--}}
{{--   href="{{ route('finances.specific') }}" wire:navigate--}}
{{--   title="Vers le fond spécifique"--}}
{{--   @click="active = 3">--}}
{{--    Fond sp&eacute;cifique--}}
{{--</a>--}}
@foreach(\App\Models\Fund::all() as $fund)
    <label for="fund_{{ $fund->id }}" tabindex="0" class="cursor-pointer">
        {{ str($fund->name)->toHtmlString() }}
    </label>
    <input type="radio" id="fund_{{ $fund->id }}" value="{{ $fund->id }}" class="hidden" wire:model.live="currentFund">
{{--    <button class="whitespace-nowrap"--}}
{{--    title="Vers {{ $fund->name }}">--}}
{{--        {{$fund->name}}--}}
{{--    </button>--}}
@endforeach
@role('admin')
    <button class="font-medium hover:text-sidebar dark:hover:text-yellow2 whitespace-nowrap" wire:click="$dispatch('visibleModal')">
        +&nbsp;Cr&eacute;er un fond
    </button>
@endrole


{{--<div class="flex gap-2 overflow-x-auto whitespace-nowrap text-main-text-on-yellow">--}}
{{--    @foreach($this->funds as $fund)--}}
{{--        <label for="fund_{{$fund->id}}" tabindex="0"--}}
{{--               class="app-tab {{$fund->id==$fundsFilter?'bg-main-selected':'bg-main'}}"--}}
{{--        >{{ str($fund->name)->replace('_',' ')->toHtmlString() }}</label>--}}
{{--        <input wire:model.live="fundsFilter" type="radio" id="fund_{{$fund->id}}" value="{{ $fund->id }}"--}}
{{--               class="hidden">--}}
{{--    @endforeach--}}
{{--    <a wire:click="openModal('FundsCreate')"--}}
{{--       class="app-tab">--}}
{{--        créer un fond</a>--}}
{{--</div>--}}
