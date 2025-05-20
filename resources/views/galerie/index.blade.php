<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800 dark:text-gray-200">
            {{ __('Liste des évènements') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="px-4 mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="flex justify-end mb-4">
                <a href="{{ route('galerie.create') }}"
                    class="px-4 py-2 font-bold text-white bg-blue-700 rounded hover:bg-blue-500">
                    + Ajouter un évènement
                </a>
            </div>

            <div class="overflow-hidden bg-white shadow-md dark:bg-gray-800 sm:rounded-lg">
                <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700">
                    <thead class="bg-gray-100 dark:bg-gray-700">
                        <tr>
                            <th class="px-6 py-3 text-sm font-medium text-left text-gray-700 dark:text-gray-200">Nom
                                évènement</th>
                            <th class="px-6 py-3 text-sm font-medium text-left text-gray-700 dark:text-gray-200">
                                Description</th>
                            <th class="px-6 py-3 text-sm font-medium text-left text-gray-700 dark:text-gray-200">Photo
                                de couverture</th>
                            <th class="px-6 py-3 text-sm font-medium text-left text-gray-700 dark:text-gray-200">Photos
                            </th>
                            <th class="px-6 py-3 text-sm font-medium text-left text-gray-700 dark:text-gray-200">Actions
                            </th>
                        </tr>
                    </thead>
                    <tbody class="bg-white dark:bg-gray-800">
                        @forelse ($galeries as $galerie)
                            <tr class="border-b border-gray-200 dark:border-gray-700">
                                <td class="px-6 py-4 text-gray-900 dark:text-white">{{ $galerie->nom }}</td>
                                <td class="px-6 py-4 text-gray-900 dark:text-white">
                                    {{ Str::limit($galerie->description_event, 30) }}</td>
                                <td class="px-6 py-4 text-gray-900 dark:text-white">
                                    <img src="{{ $galerie->getFirstMediaUrl('cover') }}" alt="photo couv"
                                        class="object-cover w-20 h-20">
                                </td>
                                <td class="px-6 py-4 text-gray-900 dark:text-white">
                                    <div class="flex items-center space-x-1">
                                        @php
                                            $photos = $galerie->getMedia('photos');
                                            $previewPhotos = $photos->take(3); // maximum 3 miniatures
                                        @endphp

                                        @forelse($previewPhotos as $photo)
                                            <img src="{{ $photo->getUrl() }}" alt="photo"
                                                class="object-cover w-10 h-10 rounded shadow">
                                        @empty
                                            <span class="text-sm text-gray-500 dark:text-gray-400">Aucune</span>
                                        @endforelse

                                        @if ($photos->count() > 3)
                                            <span
                                                class="text-sm text-gray-600 dark:text-gray-300">+{{ $photos->count() - 3 }}
                                                autre{{ $photos->count() - 3 > 1 ? 's' : '' }}</span>
                                        @endif
                                    </div>
                                </td>


                                <td class="px-6 py-4 space-x-4">
                                    <a href="{{ route('galerie.show', $galerie) }}"
                                        class="text-yellow-500 hover:underline"><i class="bi bi-eye-fill">Voir</i></a>
                                    <a href="{{ route('galerie.edit', $galerie) }}"
                                        class="text-indigo-500 hover:underline"><i
                                            class="bi bi-pencil-fill">Modifier</i></a>
                                    <form action="{{ route('galerie.destroy', $galerie) }}" method="POST"
                                        class="inline" onsubmit="return confirm('Supprimer cette galerie ?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="text-red-600 hover:underline"><i
                                                class="bi bi-trash-fill">Supprimer</i></button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="px-6 py-4 text-center text-gray-500 dark:text-gray-300">
                                    Aucun évènement enregistré.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>
