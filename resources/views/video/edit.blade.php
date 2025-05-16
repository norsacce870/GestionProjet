<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="max-w-lg mx-auto bg-white p-6 rounded-lg shadow-md mt-10">
                <h1 class="text-2xl font-bold mb-6 text-pink-600 text-center">Modifier la vidéo</h1>

                <form action="{{ route('video.update', $video->id) }}" method="POST" class="space-y-5">
                    @csrf
                    @method('PUT')

                    <div>
                        <label for="titre" class="block text-gray-700 font-medium">Titre de la vidéo :</label>
                        <input type="text" name="titre" id="titre"
                            class="form-input w-full mt-2 border border-gray-300 rounded-md p-2 focus:ring-pink-500 focus:border-pink-500"
                            value="{{ old('titre', $video->titre) }}" required>
                        @error('titre')
                            <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="lien" class="block text-gray-700 font-medium">Lien de la vidéo :</label>
                        <input type="url" name="lien" id="lien"
                            class="form-input w-full mt-2 border border-gray-300 rounded-md p-2 focus:ring-pink-500 focus:border-pink-500"
                            value="{{ old('lien', $video->lien) }}">
                        @error('lien')
                            <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                        @enderror
                    </div>

                    <button type="submit"
                        class="bg-pink-500 hover:bg-pink-600 text-white px-4 py-2 rounded w-full transition duration-200">
                        Mettre à jour la vidéo
                    </button>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
