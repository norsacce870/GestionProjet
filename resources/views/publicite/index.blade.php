
<x-app-layout>
    <div class="min-h-screen bg-gray-100 py-10">
        <div class="max-w-6xl mx-auto px-4">
            <h2 class="text-3xl font-extrabold mb-8 text-gray-800 text-center">🎯 Mes Publicités</h2>

            <div class="bg-white shadow-md rounded-lg overflow-hidden">
                <div class="flex justify-between items-center p-5 border-b border-gray-200">
                    <h3 class="text-lg font-semibold text-gray-700">Liste des Publicités</h3>
                    <a href="{{ route('publicite.create') }}" class="inline-flex items-center bg-blue-600 hover:bg-blue-700 text-white font-medium py-2 px-4 rounded-lg shadow transition duration-200">
                        + Ajouter
                    </a>
                </div>

                <div class="overflow-x-auto">
                    <table class="min-w-full divide-y divide-gray-200 text-sm text-gray-700">
                        <thead class="bg-blue-600 text-white uppercase text-xs font-semibold">
                            <tr>
                                <th class="px-6 py-3 text-left">Image</th>
                                <th class="px-6 py-3 text-left">Nom</th>
                                <th class="px-6 py-3 text-left">Description</th>
                                <th class="px-6 py-3 text-left">Action</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-100">
                            @forelse($publicites as $publicite)
                                <tr class="hover:bg-gray-50 transition">
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        @if($publicite->hasMedia('image'))
                                           <img src="{{ $publicite->getFirstMediaUrl('image', 'small') }}"
                                            alt="{{ $publicite->nom }}"
                                            class="w-16 h-16 object-cover rounded-md border">
                                        @else
                                            <span class="text-gray-400 italic">Pas d'image</span>
                                        @endif
                                    </td>
                                    <td class="px-6 py-4">{{ $publicite->nom }}</td>
                                    <td class="px-6 py-4">{{ $publicite->description }}</td>
                                    <td class="px-6 py-4">
                                        <div class="flex items-center space-x-3">
                                            <a href="{{ route('publicite.edit', $publicite) }}"
                                               class="text-indigo-600 hover:text-indigo-800 font-medium transition">Modifier</a>
                                            <form action="{{ route('publicite.destroy', $publicite) }}" method="POST"
                                                  onsubmit="return confirm('Êtes-vous sûr de vouloir supprimer cette publicité ?');">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="text-red-600 hover:text-red-800 font-medium transition">
                                                    Supprimer
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="4" class="text-center py-6 text-gray-500">Aucune publicité disponible.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>


{{--  --}}
