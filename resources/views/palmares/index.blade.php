<x-app-layout>
    <div class="min-h-screen bg-gray-100 dark:bg-gray-900 py-8">
        <div class="max-w-5xl mx-auto px-4">
            <h2 class="text-2xl font-bold mb-6 text-gray-800 dark:text-gray-100 text-center">Liste des Palmares</h2>
            <div class="overflow-x-auto bg-white dark:bg-gray-800 rounded-lg shadow">
                <div class="flex justify-end p-4">
                    <a href="{{ route('palmares.create') }}"
                        class="bg-green-600 text-xl text-white py-2 px-4 mb-4 mt-4 rounded shadow hover:bg-green-700">
                        Ajouter un palmares <i class="bi bi-plus"></i>
                    </a>
                </div>
                <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700">
                    <thead class="bg-[#EA580C] dark:bg-orange-700">
                        <tr>
                            <th class="px-6 py-3 text-left text-xs font-medium text-white uppercase tracking-wider">#
                            </th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-white uppercase tracking-wider">
                                Valeur</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-white uppercase tracking-wider">
                                Titre</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-white uppercase tracking-wider">
                                Sous-titre</th>

                            <th class="px-6 py-3 text-left text-xs font-medium text-white uppercase tracking-wider">
                                image</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-white uppercase tracking-wider">Créé
                                le</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-white uppercase tracking-wider">
                                Action</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white dark:bg-gray-800 divide-y divide-gray-100 dark:divide-gray-700">
                        @foreach ($palmares as $item)
                            <tr class="hover:bg-gray-50 dark:hover:bg-gray-700 transition">
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700 dark:text-gray-300">
                                    {{ $loop->iteration }}</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700 dark:text-gray-300">
                                    {{ $item->valeur }}</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700 dark:text-gray-300">
                                    {{ $item->titre }}</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700 dark:text-gray-300">
                                    {{ $item->sous_titre }}</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700 dark:text-gray-300">
                                    <img src="{{ asset('storage/' . $item->image) }}" alt="Image"
                                        class="w-16 h-16 object-cover rounded">


                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700 dark:text-gray-300">
                                    {{ $item->created_at ? $item->created_at->diffForHumans() : '-' }}
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm flex space-x-4">
                                    <a href="{{ route('palmares.edit', $item) }}"
                                        class="text-[#EA580C] dark:text-orange-400 hover:text-gray-400 duration-500 hover:underline text-2xl"><i
                                            class="bi bi-pencil-square"></i></a>
                                    <form action="{{ route('palmares.destroy', $item) }}" method="POST"
                                        onsubmit="return confirm('Êtes-vous sûr de vouloir supprimer ce palmarès ?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit"
                                            class="text-red-700 dark:text-red-500 hover:text-gray-400 duration-500 hover:underline ml-2 text-2xl"><i
                                                class="bi bi-trash"></i></button>
                                    </form>
                                    <a href="{{ route('palmares.show', $item) }}"
                                        class="text-green-600 dark:text-green-400 hover:underline text-2xl hover:text-gray-400 duration-500 "><i
                                            class="bi bi-eye"></i></a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>

                </table>
                @if ($palmares->hasPages())
                    <div class="p-4 flex justify-center bg-gray-50 rounded-b-lg">
                        <div class="inline-flex rounded-md shadow-sm" aria-label="Pagination">
                            {{ $palmares->onEachSide(1)->links('pagination::tailwind') }}
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </div>
</x-app-layout>
