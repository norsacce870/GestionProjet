<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800 dark:text-gray-200">
            {{ __('Liste des actualités') }}
        </h2>
    </x-slot>

    <div class="min-h-screen py-8 bg-gray-100">
        <div class="max-w-6xl px-4 mx-auto">
            <h2 class="mb-6 text-2xl font-bold text-center text-gray-800">Liste des Actualités</h2>

            {{-- Message de succès --}}
            @if (session('success'))
                <div class="p-4 mb-4 text-green-800 bg-green-100 rounded shadow">
                    {{ session('success') }}
                </div>
            @endif

            <div class="overflow-x-auto bg-white rounded-lg shadow">
                <div class="flex justify-end p-4">
                    <a href="{{ route('actualite.create') }}"
                        class="px-4 py-2 font-semibold text-white bg-green-600 rounded shadow hover:bg-green-700">
                        Ajouter une Actualité
                    </a>
                </div>

                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-green-600">
                        <tr>
                            <th class="px-6 py-3 text-xs font-medium tracking-wider text-left text-white uppercase">#
                            </th>
                            <th class="px-6 py-3 text-xs font-medium tracking-wider text-left text-white uppercase">
                                Image</th>
                            <th class="px-6 py-3 text-xs font-medium tracking-wider text-left text-white uppercase">Nom
                            </th>
                            <th class="px-6 py-3 text-xs font-medium tracking-wider text-left text-white uppercase">
                                Auteur</th>
                            <th class="px-6 py-3 text-xs font-medium tracking-wider text-left text-white uppercase">
                                Contenu</th>
                            <th class="px-6 py-3 text-xs font-medium tracking-wider text-left text-white uppercase">
                                Modifiée il y a</th>
                            <th class="px-6 py-3 text-xs font-medium tracking-wider text-left text-white uppercase">
                                Actions</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-100">
                        @forelse ($actualites as $actu)
                            <tr class="transition hover:bg-gray-50">
                                <td class="px-6 py-4 text-sm text-gray-700">
                                    {{ $loop->iteration + ($actualites->currentPage() - 1) * $actualites->perPage() }}
                                </td>
                                <td class="px-6 py-4 text-sm text-gray-700">
                                    {{-- @if ($actu->image)
                                        <img src="{{ asset('storage/images/' . $actu->image) }}" alt="image actu" class="object-cover w-16 h-16 rounded">
                                    @else
                                        <span class="italic text-gray-400">Aucune</span>
                                    @endif --}}

                                    @if ($actu->hasMedia('images'))
                                        <img src="{{ $actu->getFirstMediaUrl('images') }}"
                                            class="object-cover w-16 h-16 rounded shadow">
                                    @else
                                        <span class="italic text-gray-400">Aucune image</span>
                                    @endif
                                </td>
                                <td class="px-6 py-4 text-sm text-gray-900">
                                    {{ $actu->nom }}
                                </td>
                                <td class="px-6 py-4 text-sm text-gray-900">
                                    {{ $actu->auteur }}
                                </td>
                                <td class="px-6 py-4 text-sm text-gray-700">
                                    {{ Str::limit($actu->contenu, 50) }}
                                </td>
                                <td class="px-6 py-4 text-sm text-gray-600">
                                    {{ $actu->updated_at->diffForHumans() }}
                                </td>
                                <td class="flex px-6 py-4 space-x-2 text-sm">
                                    <a href="{{ route('actualite.edit', $actu->id) }}"
                                        class="text-blue-600 hover:underline">Modifier</a>
                                    <form action="{{ route('actualite.destroy', $actu->id) }}" method="POST"
                                        onsubmit="return confirm('Confirmer la suppression ?');" class="inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="text-red-600 hover:underline">Supprimer</button>
                                    </form>
                                    <a href="{{ route('actualite.show', $actu->id) }}"
                                        class="text-green-600 hover:underline">Afficher</a>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="7" class="px-6 py-4 text-center text-gray-400">
                                    Aucune actualité enregistrée.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>

                {{-- Pagination --}}
                <div class="p-4">
                    {{ $actualites->links() }}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
