<a class="hover:text-sidebar font-medium dark:text-white dark:hover:text-yellow whitespace-nowrap"
   :class="active === 1 ? 'text-sidebar dark:text-yellow2 border-b-2 border-yellow2': 'text-black'"
   href="{{ route('finances.general') }}" wire:navigate
   title="Vers le fond général"
   @click="active = 1">
    Fond g&eacute;n&eacute;ral
</a>
<a class="hover:text-sidebar font-medium dark:text-white dark:hover:text-yellow2 whitespace-nowrap"
   :class="active === 2 ? 'text-sidebar dark:text-yellow2 border-b-2 border-yellow2': 'text-black'"
   href="{{ route('finances.operating') }}" wire:navigate
   title="Vers le fond de fonctionnement"
   @click="active = 2">
    Fond de fonctionnement
</a>
<a class="hover:text-sidebar font-medium dark:text-white dark:hover:text-yellow2 whitespace-nowrap"
   :class="active === 3 ? 'text-sidebar dark:text-yellow2 border-b-2 border-yellow2': 'text-black'"
   href="{{ route('finances.specific') }}" wire:navigate
   title="Vers le fond spécifique"
   @click="active = 3">
    Fond sp&eacute;cifique
</a>
@foreach(\App\Models\Fund::all() as $fund)
    <a class="whitespace-nowrap"
    href="#"
    title="Vers {{ $fund->name }}">
        {{$fund->name}}
    </a>
@endforeach
@role('admin')
<button class="font-medium hover:text-sidebar dark:hover:text-yellow2 whitespace-nowrap" wire:click="$dispatch('visibleModal')">
    +&nbsp;Cr&eacute;er un fond
</button>
@endrole
