<nav class="shrink-0 w-56 py-12 bg-sidebar flex overflow-y-auto">
    <h2 class="sr-only">Navigation</h2>
    <ul class="flex flex-col">
        <li>
            <a href="{{ route('home') }}" class="@if (route('home') === url()->current() ) bg-active @endif flex items-center text-white group px-12 py-4 rounded-r-full" title="Vers la page d'accueil">
                <svg class="mr-2 stroke-white" xmlns="http://www.w3.org/2000/svg" width="25" height="25" viewBox="0 0 24 24" fill="none">
                    <path d="M3 9L12 2L21 9V20C21 20.5304 20.7893 21.0391 20.4142 21.4142C20.0391 21.7893 19.5304 22 19 22H5C4.46957 22 3.96086 21.7893 3.58579 21.4142C3.21071 21.0391 3 20.5304 3 20V9Z" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                    <path d="M9 22V12H15V22" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                </svg>
                <span class="font-medium">
                    Accueil
                </span>
            </a>
        </li>
        <li>
            <a href="{{ route('finances.general') }}" class="{{ request()->is('finances','finances'.'/*')?'bg-active':'' }} flex items-center text-white group px-12 rounded-r-full py-4" title="Vers la page des finances">
                <svg class="mr-2 stroke-white" xmlns="http://www.w3.org/2000/svg" width="25" height="25" viewBox="0 0 32 32" fill="none">
                    <path d="M29 8H3C2.44772 8 2 8.44772 2 9V23C2 23.5523 2.44772 24 3 24H29C29.5523 24 30 23.5523 30 23V9C30 8.44772 29.5523 8 29 8Z" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                    <path d="M16 20C18.2091 20 20 18.2091 20 16C20 13.7909 18.2091 12 16 12C13.7909 12 12 13.7909 12 16C12 18.2091 13.7909 20 16 20Z" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                    <path d="M22 8L30 15" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                    <path d="M22 24L30 17" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                    <path d="M10 8L2 15" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                    <path d="M10 24L2 17" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                </svg>
                <span class="font-medium">
                    Finances
                </span>
            </a>
        </li>
        <li>
            <a href="{{ route('draw') }}" class="@if (route('draw') === url()->current() ) bg-active @endif flex items-center text-white group px-12 rounded-r-full py-4" title="Vers la page des détentes">
                <svg class="mr-2 stroke-white" xmlns="http://www.w3.org/2000/svg" width="25" height="25" viewBox="0 0 32 32" fill="none">
                    <path d="M24 5H8C6.34315 5 5 6.34315 5 8V24C5 25.6569 6.34315 27 8 27H24C25.6569 27 27 25.6569 27 24V8C27 6.34315 25.6569 5 24 5Z" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                    <path d="M11.5 12C12.3284 12 13 11.3284 13 10.5C13 9.67157 12.3284 9 11.5 9C10.6716 9 10 9.67157 10 10.5C10 11.3284 10.6716 12 11.5 12Z" fill="white"/>
                    <path d="M20.5 12C21.3284 12 22 11.3284 22 10.5C22 9.67157 21.3284 9 20.5 9C19.6716 9 19 9.67157 19 10.5C19 11.3284 19.6716 12 20.5 12Z" fill="white"/>
                    <path d="M11.5 17.5C12.3284 17.5 13 16.8284 13 16C13 15.1716 12.3284 14.5 11.5 14.5C10.6716 14.5 10 15.1716 10 16C10 16.8284 10.6716 17.5 11.5 17.5Z" fill="white"/>
                    <path d="M20.5 17.5C21.3284 17.5 22 16.8284 22 16C22 15.1716 21.3284 14.5 20.5 14.5C19.6716 14.5 19 15.1716 19 16C19 16.8284 19.6716 17.5 20.5 17.5Z" fill="white"/>
                    <path d="M11.5 23C12.3284 23 13 22.3284 13 21.5C13 20.6716 12.3284 20 11.5 20C10.6716 20 10 20.6716 10 21.5C10 22.3284 10.6716 23 11.5 23Z" fill="white"/>
                    <path d="M20.5 23C21.3284 23 22 22.3284 22 21.5C22 20.6716 21.3284 20 20.5 20C19.6716 20 19 20.6716 19 21.5C19 22.3284 19.6716 23 20.5 23Z" fill="white"/>
                </svg>
                <span class="font-medium">
                    Détente
                </span>
            </a>
        </li>
        <li class="mb-4 mt-auto">
            <form method="POST" action="/logout" class="text-white group pl-12">
                @csrf
                <button class="font-medium group-hover:text-yellow flex items-center" type="submit">
                    <svg class="mr-2 stroke-white group-hover:stroke-yellow" xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 32 32" fill="none">
                        <path d="M21.75 10.75L27 16L21.75 21.25" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                        <path d="M13 16H27" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                        <path d="M13 27H6C5.73478 27 5.48043 26.8946 5.29289 26.7071C5.10536 26.5196 5 26.2652 5 26V6C5 5.73478 5.10536 5.48043 5.29289 5.29289C5.48043 5.10536 5.73478 5 6 5H13" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
                    D&eacute;connexion
                </button>
            </form>
        </li>
    </ul>
</nav>
