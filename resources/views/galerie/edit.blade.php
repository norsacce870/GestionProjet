<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Modifier l\'évènement') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 p-6 rounded-lg shadow-md">
                <form method="POST" action="{{ route('galerie.update', $galerie->id) }}" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <!-- Nom de l'évènement -->
                    <div class="mb-4">
                        <label for="nom" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Nom de l'évènement</label>
                        <input type="text" name="nom" id="nom" value="{{ old('nom', $galerie->nom) }}" required
                               class="mt-1 block w-full rounded-md shadow-sm border-gray-300 focus:border-indigo-500 focus:ring focus:ring-indigo-200 dark:bg-gray-900 dark:text-white" />
                        @error('nom')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Description -->
                    <div class="mb-4">
                        <label for="description_event" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Description</label>
                        <textarea name="description_event" id="description_event" rows="4"
                                  class="mt-1 block w-full rounded-md shadow-sm border-gray-300 focus:border-indigo-500 focus:ring focus:ring-indigo-200 dark:bg-gray-900 dark:text-white">{{ old('description_event', $galerie->description_event) }}</textarea>
                        @error('description_event')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Photo de couverture actuelle -->
                    <div class="mb-4">
                        <p class="block text-sm font-medium text-gray-700 dark:text-gray-300">Photo de couverture actuelle :</p>
                        @if ($galerie->getFirstMediaUrl('photo_couv'))
                            <img src="{{ $galerie->getFirstMediaUrl('photo_couv') }}" alt="Photo de couverture" class="w-40 h-auto rounded shadow mt-2">
                        @else
                            <p class="text-gray-500">Aucune photo disponible.</p>
                        @endif
                    </div>

                    <!-- Nouvelle photo de couverture -->
                    <div class="mb-4">
                        <label for="photo_couv" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Changer la photo de couverture</label>
                        <input type="file" name="photo_couv" id="photo_couv" accept="image/*"
                               class="mt-1 block w-full rounded-md shadow-sm border-gray-300 focus:border-indigo-500 focus:ring focus:ring-indigo-200 dark:bg-gray-900 dark:text-white" />
                        @error('photo_couv')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Photos supplémentaires actuelles -->
                    <div class="mb-4">
                        <p class="block text-sm font-medium text-gray-700 dark:text-gray-300">Photos actuelles :</p>
                        <div class="flex flex-wrap gap-2 mt-2">
                            @forelse ($galerie->getMedia('photos') as $media)
                                <img src="{{ $media->getUrl() }}" alt="Photo" class="w-24 h-24 object-cover rounded shadow">
                            @empty
                                <p class="text-gray-500">Aucune photo supplémentaire.</p>
                            @endforelse
                        </div>
                    </div>

                    <!-- Ajouter de nouvelles photos -->
                    <div class="mb-4">
                        <label for="photos" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Ajouter d'autres photos</label>
                        <input type="file" name="photos[]" id="photos" accept="image/*" multiple
                               class="mt-1 block w-full rounded-md shadow-sm border-gray-300 focus:border-indigo-500 focus:ring focus:ring-indigo-200 dark:bg-gray-900 dark:text-white" />
                        @error('photos')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                        @if ($errors->has('photos.*'))
                            @foreach ($errors->get('photos.*') as $messages)
                                @foreach ($messages as $message)
                                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                @endforeach
                            @endforeach
                        @endif
                    </div>

                    <!-- Bouton -->
                    <div class="flex justify-end">
                        <button type="submit"
                                class="bg-indigo-600 hover:bg-indigo-700 text-white font-semibold px-6 py-2 rounded">
                            Mettre à jour
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
