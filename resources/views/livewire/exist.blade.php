<div>
    @if($show)
        <div x-show="open" class="fixed inset-0 flex justify-center items-center bg-gradient-to-t from-gray-950"
             x-data="{ open : @entangle('show')}">
            <div class="bg-white p-10" @click.away="open = false">
                <h2>
                    Existe déja
                </h2>
                <button type="button" class="px-6 py-2 bg-yellow2 border" @click="open = false">
                    Fermer
                </button>
            </div>
        </div>
    @endif
</div>
