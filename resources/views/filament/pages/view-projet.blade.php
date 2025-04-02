<x-filament::page>
    <h1 class="text-2xl font-bold">Détails du Projet</h1>
    <p>Titre du Projet: {{ $record->titre_projet }}</p>
    <p>État: {{ $record->etat_projet }}</p>

    <h2 class="text-xl font-bold mt-6 mb-4">Travaux du Projet</h2>

    <table class="table-auto w-full border-collapse border border-gray-300">
        <thead>
            <tr class="bg-gray-200">
                <th class="border border-gray-300 px-4 py-2">Title</th>
                <th class="border border-gray-300 px-4 py-2">Description</th>
                <th class="border border-gray-300 px-4 py-2">Latitude</th>
                <th class="border border-gray-300 px-4 py-2">Longitude</th>
                <th class="border border-gray-300 px-4 py-2">Status</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($travaux as $travail)
                <tr>
                    <td class="border border-gray-300 px-4 py-2">{{ $travail->title }}</td>
                    <td class="border border-gray-300 px-4 py-2">{{ $travail->description }}</td>
                    <td class="border border-gray-300 px-4 py-2">{{ $travail->latitude }}</td>
                    <td class="border border-gray-300 px-4 py-2">{{ $travail->longitude }}</td>
                    <td class="border border-gray-300 px-4 py-2">
                        <span class="px-2 py-1 rounded text-white {{ $travail->status == 'En Cours' ? 'bg-blue-500' : ($travail->status == 'Terminé' ? 'bg-green-500' : 'bg-red-500') }}">
                            {{ $travail->status }}
                        </span>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="5" class="border border-gray-300 px-4 py-2 text-center">Aucun travail trouvé</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</x-filament::page>
