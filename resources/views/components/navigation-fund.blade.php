<a class="hover:text-sidebar font-medium dark:text-white dark:hover:text-yellow"
   :class="active === 1 ? 'text-sidebar dark:text-yellow2 border-b-2 border-yellow2': 'text-black'"
   href="{{ route('finances.general') }}" wire:navigate
   title="Vers le fond général"
   @click="active = 1">
    Fond g&eacute;n&eacute;ral
</a>
<a class="hover:text-sidebar font-medium dark:text-white dark:hover:text-sidebar"
   :class="active === 2 ? 'text-sidebar dark:text-sidebar border-b-2 border-sidebar': 'text-black'"
   href="{{ route('finances.operating') }}" wire:navigate
   title="Vers le fond de fonctionnement"
   @click="active = 2">
    Fond de fonctionnement
</a>
<a class="hover:text-sidebar font-medium dark:text-white dark:hover:text-sidebar"
   :class="active === 3 ? 'text-sidebar dark:text-sidebar border-b-2 border-sidebar': 'text-black'"
   href="{{ route('finances.specific') }}" wire:navigate
   title="Vers le fond spécifique"
   @click="active = 3">
    Fond sp&eacute;cifique
</a>
@role('admin')
<a class="font-medium hover:text-sidebar" href="#">
    +&nbsp;Cr&eacute;er un fond
</a>
@endrole
