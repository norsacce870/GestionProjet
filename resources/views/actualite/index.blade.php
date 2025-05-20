<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800 dark:text-gray-200">
            {{ __('Liste des actualités') }}
        </h2>
    </x-slot>

    <div class="min-h-screen bg-gray-100 py-8">
        <div class="max-w-6xl mx-auto px-4">
            <h2 class="text-2xl font-bold mb-6 text-gray-800 text-center">Liste des Actualités</h2>

            <div class="overflow-x-auto bg-white rounded-lg shadow">
                <div class="flex justify-end p-4">
                    <a href="{{ route('actualite.create') }}" class="bg-green-600 hover:bg-green-700 text-white font-semibold py-2 px-4 rounded shadow">
                        Ajouter une Actualité
                    </a>
                </div>

                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-green-600">
                        <tr>
                            <th class="px-6 py-3 text-left text-xs font-medium text-white uppercase tracking-wider">#</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-white uppercase tracking-wider">Nom</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-white uppercase tracking-wider">Auteur</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-white uppercase tracking-wider">Contenu</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-white uppercase tracking-wider">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-100">
                        @forelse ($actualites as $actu)
                            <tr class="hover:bg-gray-50 transition">
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700">{{ $loop->iteration }}</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $actu->nom }}</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $actu->auteur }}</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700">{{ Str::limit($actu->contenu, 50) }}</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm flex space-x-2">
                                    <a href="{{ route('actualite.edit', $actu->id) }}" class="text-blue-600 hover:underline">Modifier</a>
                                    <form action="{{ route('actualite.destroy', $actu->id) }}" method="POST" onsubmit="return confirm('Confirmer la suppression ?');" class="inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="text-red-600 hover:underline">Supprimer</button>
                                    </form>
                                    <a href="{{ route('actualite.show', $actu->id) }}" class="text-green-600 hover:underline">Afficher</a>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="px-6 py-4 text-center text-gray-400">Aucune actualité enregistrée.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>
