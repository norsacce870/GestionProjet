<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __("Ajout d'un évènement") }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 p-6 rounded-lg shadow-md">
                <form method="POST" action="{{ route('galerie.store') }}" enctype="multipart/form-data">
                    @csrf

                    <!-- Nom de l'évènement -->
                    <div class="mb-4">
                        <label for="nom_event" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Nom de l'évènement</label>
                        <input type="text" name="nom_event" id="nom_event" value="{{ old('nom_event') }}" required
                               class="mt-1 block w-full rounded-md shadow-sm border-gray-300 focus:border-indigo-500 focus:ring focus:ring-indigo-200 dark:bg-gray-900 dark:text-white" />
                        @error('nom_event')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Description -->
                    <div class="mb-4">
                        <label for="description_event" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Description</label>
                        <textarea name="description_event" id="description_event" rows="4"
                                  class="mt-1 block w-full rounded-md shadow-sm border-gray-300 focus:border-indigo-500 focus:ring focus:ring-indigo-200 dark:bg-gray-900 dark:text-white">{{ old('description_event') }}</textarea>
                        @error('description_event')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Photo de couverture -->
                    <div class="mb-4">
                        <label for="photo_couv" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Photo de couverture</label>
                        <input type="file" name="photo_couv" id="photo_couv" accept="image/*" required
                               class="mt-1 block w-full rounded-md shadow-sm border-gray-300 focus:border-indigo-500 focus:ring focus:ring-indigo-200 dark:bg-gray-900 dark:text-white" />
                        @error('photo_couv')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Photos supplémentaires -->
                    <div class="mb-4">
                        <label for="photos" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Photos supplémentaires</label>
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
                                class="bg-blue-600 hover:bg-blue-700 text-white font-semibold px-6 py-2 rounded">
                            Enregistrer
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
