<div class="flex flex-col h-screen">
    <main class="flex grow mt-[calc(70px)] bg-white dark:bg-gray-900 text-black dark:text-white">
        <x-sidebar></x-sidebar>
        <div class="p-6 flex flex-col w-full max-mobile:w-[calc(130%-224px)] ml-56 max-mobile:ml-14 max-mobile:pr-0">
            <h1 class="flex items-center gap-2 text-2xl font-bold">
                <svg class="mr-2 stroke-gray-600 dark:stroke-white" xmlns="http://www.w3.org/2000/svg" width="40"
                     height="40"
                     viewBox="0 0 32 32" fill="none">
                    <path
                        d="M24 5H8C6.34315 5 5 6.34315 5 8V24C5 25.6569 6.34315 27 8 27H24C25.6569 27 27 25.6569 27 24V8C27 6.34315 25.6569 5 24 5Z"
                        stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                    <path
                        d="M11.5 12C12.3284 12 13 11.3284 13 10.5C13 9.67157 12.3284 9 11.5 9C10.6716 9 10 9.67157 10 10.5C10 11.3284 10.6716 12 11.5 12Z"/>
                    <path
                        d="M20.5 12C21.3284 12 22 11.3284 22 10.5C22 9.67157 21.3284 9 20.5 9C19.6716 9 19 9.67157 19 10.5C19 11.3284 19.6716 12 20.5 12Z"/>
                    <path
                        d="M11.5 17.5C12.3284 17.5 13 16.8284 13 16C13 15.1716 12.3284 14.5 11.5 14.5C10.6716 14.5 10 15.1716 10 16C10 16.8284 10.6716 17.5 11.5 17.5Z"/>
                    <path
                        d="M20.5 17.5C21.3284 17.5 22 16.8284 22 16C22 15.1716 21.3284 14.5 20.5 14.5C19.6716 14.5 19 15.1716 19 16C19 16.8284 19.6716 17.5 20.5 17.5Z"/>
                    <path
                        d="M11.5 23C12.3284 23 13 22.3284 13 21.5C13 20.6716 12.3284 20 11.5 20C10.6716 20 10 20.6716 10 21.5C10 22.3284 10.6716 23 11.5 23Z"/>
                    <path
                        d="M20.5 23C21.3284 23 22 22.3284 22 21.5C22 20.6716 21.3284 20 20.5 20C19.6716 20 19 20.6716 19 21.5C19 22.3284 19.6716 23 20.5 23Z"/>
                </svg>
                D&eacute;tente
            </h1>
            <div class="m-auto border p-6 rounded-xl flex flex-col">
                <h2 class="m-auto font-bold text-2xl mb-4">
                    Détente
                </h2>
                @role('admin')
                    <button dusk="draw-button" wire:click="confirm" class="bg-yellow2 px-6 py-2 rounded w-fit h-fit text-black m-auto mb-6">
                        Tirage au sort
                    </button>
                @endrole
                @if($winners)
                    <ul>
                        @foreach($winners as $index => $winner)
                            <li>
                                <a href="mailto:{{ $winner['email'] }}" title="Envoyer un email" class="hover:border-b-2 hover:border-yellow2">
                                {{ $index + 1 }}){{ $winner['name'] }}
{{--                                <button wire:click="individual" class="bg-yellow2 px-4 py-2 text-black rounded mb-2">--}}
{{--                                    Tirage individuel--}}
{{--                                </button>--}}
                                </a>
                            </li>
                        @endforeach
                    </ul>
                @endif
            </div>
            @if($history && count($history) > 0)
                <div class="mt-8">
                    <h3 aria-level="3" role="heading" class="text-xl font-bold mb-4">
                        Historique des d&eacute;tentes
                    </h3>
                    <ul class="space-y-4">
                        @foreach($history as $draws => $draw)
                            <li class="border rounded-xl p-6">
                                <strong>D&eacute;tente du {{ \Carbon\Carbon::parse($draw['date'])->translatedFormat('d F Y') }}</strong>
                                <ul class="mt-2">
                                    @foreach($draw['winners'] as $index => $winner)
                                        <li>
                                           <a href="mailto:{{ $winner['email'] }}" title="Envoyer un email" class="hover:border-b-2 hover:border-yellow2">
                                                {{ $index + 1 }}) {{ $winner['name'] }}
                                           </a>
                                        </li>
                                    @endforeach
                                </ul>
                            </li>
                        @endforeach
                    </ul>
                </div>
            @endif
        </div>
    </main>
</div>
