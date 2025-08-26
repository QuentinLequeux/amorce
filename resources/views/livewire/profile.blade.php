<div class="flex flex-col h-screen">
    {{--    <x-header :user="$user"></x-header>--}}
    <main class="flex grow mt-[calc(70px)] bg-white dark:bg-gray-900 text-black dark:text-white">
        <x-sidebar></x-sidebar>
        <div
            class="p-6 flex flex-col w-full max-mobile:w-[calc(130%-224px)] ml-56 max-mobile:ml-14 max-mobile:pr-0">
            <h1 class="flex items-center gap-2 text-2xl font-bold">
                <svg class="mr-2 stroke-gray-600 dark:stroke-white" xmlns="http://www.w3.org/2000/svg" width="40"
                     height="40" viewBox="0 0 32 32" fill="none">
                    <path
                        d="M16 28C22.6274 28 28 22.6274 28 16C28 9.37258 22.6274 4 16 4C9.37258 4 4 9.37258 4 16C4 22.6274 9.37258 28 16 28Z"/>
                    <path
                        d="M16 20C18.7614 20 21 17.7614 21 15C21 12.2386 18.7614 10 16 10C13.2386 10 11 12.2386 11 15C11 17.7614 13.2386 20 16 20Z"/>
                    <path
                        d="M7.9751 24.925C8.72749 23.4431 9.87555 22.1984 11.292 21.3289C12.7085 20.4595 14.3381 19.9993 16.0001 19.9993C17.6621 19.9993 19.2917 20.4595 20.7082 21.3289C22.1246 22.1984 23.2727 23.4431 24.0251 24.925"/>
                </svg>
                Profil
            </h1>
            <div class="mx-auto w-96 my-10">
                @if(session()->has('success'))
                    <p class="text-green-500">
                        {{ session('success') }}
                    </p>
                @endif
                <h3 class="font-bold mb-4 text-xl" aria-level="3" role="heading">
                    Adresse email
                </h3>
                <form class="flex flex-col" wire:submit.prevent="updateEmail()">
                    @csrf
                    <label class="mb-2" for="email">
                        Email
                    </label>
                    <input required name="email" type="email" id="email" wire:model="email"
                           class="mb-2 rounded bg-white dark:bg-gray-600 dark:text-white p-2 border border-gray-400 max-sm:w-[300px]">
                    @error('email')
                    <x-error>
                        {{ $message }}
                    </x-error>
                    @enderror
                    <button dusk="modify-email" title="Modifier" type="submit" class="bg-yellow2 rounded w-28 text-black py-2 font-semibold mt-4">
                        Modifier
                    </button>
                </form>
            </div>
            <div class="mx-auto w-96">
                <h3 class="font-bold mb-4 text-xl" aria-level="3" role="heading">
                    Changer le mot de passe
                </h3>
                <p class="text-sm mb-4">
                    Votre mot de passe doit contenir minimum 8 caractères
                </p>
                <form class="flex flex-col" wire:submit.prevent="updatePassword()">
                    @csrf
                    <label class="mb-2" for="current_password">
                        Mot de passe actuel :
                    </label>
                    <input type="password"
                           name="current-password"
                           class="mb-2 rounded bg-white dark:bg-gray-600 dark:text-white p-2 border border-gray-400 max-sm:w-[300px]"
                           wire:model="current_password"
                           id="current_password"
                           required>
                    @error('current_password')
                    <x-error>
                        {{ $message }}
                    </x-error>
                    @enderror
                    <label class="mb-2" for="password">
                        Nouveau mot de passe :
                    </label>
                    <input type="password"
                           name="password"
                           class="mb-2 rounded bg-white dark:bg-gray-600 dark:text-white p-2 border border-gray-400 max-sm:w-[300px]"
                           wire:model="password"
                           id="password"
                           required>
                    @error('password')
                    <x-error>
                        {{ $message }}
                    </x-error>
                    @enderror
                    <label class="mb-2" for="new_password">
                        Confirmer le mot de passe :
                    </label>
                    <input type="password"
                           name="new-password"
                           class="mb-6 rounded bg-white dark:bg-gray-600 dark:text-white p-2 border border-gray-400 max-sm:w-[300px]"
                           wire:model="password_confirmation"
                           id="new_password"
                           required>
                    @error('password_confirmation')
                    <x-error>
                        {{ $message }}
                    </x-error>
                    @enderror
                    <button dusk="modify-password" title="Modifier" type="submit" class="bg-yellow2 rounded w-28 text-black py-2 font-semibold">
                        Modifier
                    </button>
                </form>
            </div>
        </div>
    </main>
</div>
