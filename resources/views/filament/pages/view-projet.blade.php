
<x-filament::page>
    <style>
        .px-6{
            padding-right: 2rem;
        }
        .overflow-x-auto.rounded-lg.shadow-sm.border.border-gray-100.bg-white {
    width: fit-content;
} 
    </style>
    <h1 class="text-2xl font-bold text-gray-800 mb-2">Détails du Projet</h1>
    <p class="text-gray-600">Titre du Projet: <span class="font-semibold">{{ $record->titre_projet }}</span></p>
    <p class="text-gray-600 mb-6">État: <span class="font-semibold">{{ $record->etat_projet }}</span></p>

    <h2 class="text-xl font-bold text-gray-800 mt-6 mb-4">Travaux du Projet</h2>

    <div class="overflow-x-auto rounded-lg shadow-sm border border-gray-100 bg-white">
        <table class="min-w-full text-sm text-left">
            <thead class="bg-gray-50 text-gray-500 uppercase text-xs">
                <tr>
                    <th class="px-6 py-3">Titre</th>
                    <th class="px-6 py-3">Description</th>
                    <th class="px-6  py-3">Latitude</th>
                    <th class="px-6 py-3">Longitude</th>
                    <th class="px-6 py-3">Statut</th>
                </tr>
            </thead>
            <tbody class="text-gray-700 divide-y divide-gray-100">
                @forelse ($travaux as $travail)
                    <tr class="hover:bg-gray-50 transition">
                        <td class="px-6 py-4 font-medium">{{ $travail->title }}</td>
                        <td class="px-6 py-4">{{ $travail->description }}</td>
                        <td class="px-6 py-4">{{ $travail->latitude }}</td>
                        <td class="px-6 py-4">{{ $travail->longitude }}</td>
                        <td class="px-6 py-4">
                            <span class="inline-flex items-center rounded-full px-3 py-1 text-xs font-semibold 
                                {{ $travail->status == 'En Cours' ? 'bg-blue-100 text-blue-700' : ($travail->status == 'Terminé' ? 'bg-green-100 text-green-700' : 'bg-red-100 text-red-700') }}">
                                {{ $travail->status }}
                            </span>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="px-6 py-4 text-center text-gray-400">Aucun travail trouvé</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</x-filament::page>


