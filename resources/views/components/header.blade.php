<header class="flex fixed w-full bg-white dark:bg-gray-900 text-black dark:text-white">
    <div class="bg-yellow px-6 py-4 w-56 flex justify-center shrink-0 max-mobile:w-14">
        <a href="/" title="Vers la page d'accueil" class="text-black font-bold text-2xl max-mobile:hidden">Amorce</a>
    </div>
    <div class="py-4 px-12 w-full flex justify-end shadow-md max-mobile:justify-between">
        <livewire:theme-switcher/>
        <div class="relative" x-data="{ open: false }">
            <button class="mr-10" type="button" @click="open = ! open">
                <svg class="dark:stroke-white" xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 32 32" fill="none" stroke="black">
                    <path d="M7.0249 13C7.02323 11.8145 7.25613 10.6403 7.71018 9.54522C8.16423 8.45009 8.83046 7.45561 9.67049 6.61906C10.5105 5.78251 11.5078 5.12042 12.6048 4.67093C13.7018 4.22144 14.8769 3.99342 16.0624 4.00002C21.0124 4.03752 24.9749 8.15002 24.9749 13.1125V14C24.9749 18.475 25.9124 21.075 26.7374 22.5C26.825 22.6518 26.8712 22.8239 26.8714 22.9991C26.8715 23.1744 26.8256 23.3466 26.7383 23.4985C26.6509 23.6504 26.5252 23.7767 26.3737 23.8647C26.2221 23.9527 26.0501 23.9994 25.8749 24H6.1249C5.94966 23.9994 5.77766 23.9527 5.62613 23.8647C5.4746 23.7767 5.34886 23.6504 5.26151 23.4985C5.17416 23.3466 5.12826 23.1744 5.12842 22.9991C5.12857 22.8239 5.17478 22.6518 5.2624 22.5C6.0874 21.075 7.0249 18.475 7.0249 14V13Z" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                    <path d="M12 24V25C12 26.0609 12.4214 27.0783 13.1716 27.8284C13.9217 28.5786 14.9391 29 16 29C17.0609 29 18.0783 28.5786 18.8284 27.8284C19.5786 27.0783 20 26.0609 20 25V24" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                </svg>
            </button>
            <livewire:notifications/>
        </div>
        <a href="/profile" title="Vers le profil" class="flex items-center font-bold">
            <span class="mr-2">{{ $user->name }}</span>
            <svg class="dark:stroke-white" xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 32 32" fill="none" stroke="black">
                <path d="M16 28C22.6274 28 28 22.6274 28 16C28 9.37258 22.6274 4 16 4C9.37258 4 4 9.37258 4 16C4 22.6274 9.37258 28 16 28Z" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                <path d="M16 20C18.7614 20 21 17.7614 21 15C21 12.2386 18.7614 10 16 10C13.2386 10 11 12.2386 11 15C11 17.7614 13.2386 20 16 20Z" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                <path d="M7.9751 24.925C8.72749 23.4431 9.87555 22.1984 11.292 21.3289C12.7085 20.4595 14.3381 19.9993 16.0001 19.9993C17.6621 19.9993 19.2917 20.4595 20.7082 21.3289C22.1246 22.1984 23.2727 23.4431 24.0251 24.925" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
            </svg>
        </a>
    </div>
</header>
