<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800 dark:text-gray-200">
            {{ __('Ajout de vidéo') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">

            <h1 class="mb-4 text-2xl font-bold text-center text-pink-600">Ajouter une nouvelle vidéo</h1>

            <form action="{{ route('video.store') }}" method="POST" class="space-y-4">
                @csrf

                <div>
                    <label for="titre" class="block text-gray-700">Titre de la vidéo :</label>
                    <input type="text" name="titre" id="titre"
                        class="w-full p-2 mt-1 border border-gray-300 rounded-md form-input" required>
                    @error('titre')
                        <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="lien" class="block text-gray-700">Lien de la vidéo (URL) :</label>
                    <input type="url" name="lien" id="lien"
                        class="w-full p-2 mt-1 border border-gray-300 rounded-md form-input"
                        placeholder="https://exemple.com/video">
                    @error('lien')
                        <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                    @enderror
                </div>

                <button type="submit" class="w-full px-4 py-2 text-white bg-pink-500 rounded hover:bg-pink-600">
                    Enregistrer
                </button>
            </form>
        </div>
    </div>

</x-app-layout>
