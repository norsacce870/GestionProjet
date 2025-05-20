{{-- filepath: c:\Users\H P\Desktop\gestion projet\GestionProjet\resources\views\coordonnee\index.blade.php --}}
<x-app-layout>
<div class="min-h-screen bg-gray-100 py-8">
    <div class="max-w-5xl mx-auto px-4">
        <h2 class="text-2xl font-bold mb-6 text-gray-800 text-center">Liste des Palmares</h2>
        <div class="overflow-x-auto bg-white rounded-lg shadow">
            <div class="flex justify-end p-4">
                <a href="{{ route('palmares.create') }}" class="bg-blue-600 hover:bg-blue-700 text-white font-semibold py-2 px-4 rounded shadow">
                    Ajouter un palmares
                </a>
            </div>
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-blue-600">
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-medium text-white uppercase tracking-wider">Valeur</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-white uppercase tracking-wider">Titre</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-white uppercase tracking-wider">Sous-titre</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-white uppercase tracking-wider">Action</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-100">
                    @foreach($palmares as $palmares)
                        <tr class="hover:bg-gray-50 transition">
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700">{{ $palmares->valeur}}</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700">{{ $palmares->titre }}</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700">{{ $palmares->sous_titre }}</td>

                            <td class="px-6 py-4 whitespace-nowrap text-sm flex space-x-2">
                                <a href="{{ route('palmares.edit', $palmares) }}" class="text-blue-600 hover:underline">Modifier</a>
                                <form action="{{ route('palmares.destroy', $palmares) }}" method="POST" onsubmit="return confirm('Êtes-vous sûr de vouloir supprimer ce palmares ?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-600 hover:underline ml-2">Supprimer</button>
                                </form>
                                <a href="{{ route('palmares.show', $palmares) }}" class="text-blue-600 hover:underline">voir</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
</x-app-layout>
