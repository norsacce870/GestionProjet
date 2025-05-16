<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Ajout de vidéo') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

        <h1 class="text-2xl font-bold mb-4 text-pink-600 text-center">Ajouter une nouvelle vidéo</h1>

        <form action="{{ route('video.store') }}" method="POST" class="space-y-4">
            @csrf

            <div>
                <label for="titre" class="block text-gray-700">Titre de la vidéo :</label>
                <input type="text" name="titre" id="titre" class="form-input w-full mt-1 border border-gray-300 rounded-md p-2" required>
                @error('titre')
                    <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="lien" class="block text-gray-700">Lien de la vidéo (URL) :</label>
                <input type="url" name="lien" id="lien" class="form-input w-full mt-1 border border-gray-300 rounded-md p-2" placeholder="https://exemple.com/video">
                @error('lien')
                    <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                @enderror
            </div>

            <button type="submit" class="bg-pink-500 hover:bg-pink-600 text-white px-4 py-2 rounded w-full">
                Enregistrer
            </button>
        </form>
    </div>
        </div>
   
</x-app-layout>
