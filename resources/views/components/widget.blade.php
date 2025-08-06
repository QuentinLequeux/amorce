<div class="flex flex-wrap gap-4">
    @foreach($funds as $fund)
        <div class="mt-10 p-6 w-[300px] h-auto shadow-lg rounded-2xl flex items-center dark:bg-[#000] max-sm:w-[95%]">
            <div class="px-4">
                <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24"
                     stroke="currentColor" stroke-width="2" stroke-linecap="round"
                     stroke-linejoin="round" class="lucide lucide-landmark-icon lucide-landmark">
                    <path d="M10 18v-7"/>
                    <path
                        d="M11.12 2.198a2 2 0 0 1 1.76.006l7.866 3.847c.476.233.31.949-.22.949H3.474c-.53 0-.695-.716-.22-.949z"/>
                    <path d="M14 18v-7"/>
                    <path d="M18 18v-7"/>
                    <path d="M3 22h18"/>
                    <path d="M6 18v-7"/>
                </svg>
            </div>
            <div>
                <p class="font-bold">{{ $fund->total / 100 }}<span class="ml-1">€</span></p>
                <p>{{ $fund->name }}</p>
            </div>
        </div>
    @endforeach
</div>
