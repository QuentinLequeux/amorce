<x-head>
    <div class="flex flex-col h-screen">
        <main class="flex grow mt-[calc(70px)] bg-white dark:bg-gray-900 text-black dark:text-white">
            <x-sidebar></x-sidebar>
            <div
                class="p-6 flex flex-col w-full max-mobile:w-[calc(130%-224px)] ml-56 max-mobile:ml-14 max-mobile:pr-0">
                <h1 class="flex items-center gap-2 text-2xl font-bold">
                    <svg class="mr-2 stroke-gray-600 dark:stroke-white" xmlns="http://www.w3.org/2000/svg" width="40"
                         height="40" viewBox="0 0 24 24" fill="none">
                        <path
                            d="M3 9L12 2L21 9V20C21 20.5304 20.7893 21.0391 20.4142 21.4142C20.0391 21.7893 19.5304 22 19 22H5C4.46957 22 3.96086 21.7893 3.58579 21.4142C3.21071 21.0391 3 20.5304 3 20V9Z"/>
                        <path d="M9 22V12H15V22"/>
                    </svg>
                    Accueil
                </h1>
                <x-widget :funds="$funds"/>
            </div>
        </main>
    </div>
</x-head>
