<x-filament::page>
    <x-filament::card>
        <div class="px-4 py-6">
            <h1 class="text-2xl font-bold mb-4">{{ $this->record->name }}</h1>
            
            <div class="space-y-2">
                <p><span class="font-semibold">CMP:</span> {{ $this->record->cmp }}</p>
                <p><span class="font-semibold">Entreprise:</span> {{ $this->record->entreprise}}</p>
            </div>

            <div class="mt-8">
                <h2 class="text-xl font-semibold mb-4">Devis Estimatif</h2>
                @if($this->record->devis)
                    <!-- عرض بيانات Devis -->
                @else
                    <div class="bg-gray-50 p-4 rounded-lg text-center">
                        <p class="text-gray-600">Aucun devis créé</p>
                        <x-filament::button 
                            wire:click="createDevis"
                            class="mt-2"
                            color="primary"
                        >
                            Créer un Devis
                        </x-filament::button>
                    </div>
                @endif
            </div>
        </div>
    </x-filament::card>
</x-filament::page>