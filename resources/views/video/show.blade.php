<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Détails de la vidéo') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <div class="max-w-3xl mx-auto mt-10 p-6 bg-white rounded-lg shadow-md">
                <div class="text-gray-700 space-y-4">
                    <p><span class="font-medium">Titre de la vidéo :</span> {{ $video->titre }}</p>
                    <p><span class="font-medium">Lien de la vidéo :</span>
                        <a href="{{ $video->lien }}" target="_blank" class="text-blue-500 hover:underline">
                            {{ $video->lien }}
                        </a>
                    </p>
                </div>

                <div class="mt-6 flex justify-between">
                    <a href="{{ route('video.index') }}" class="text-sm text-gray-600 hover:underline">
                        ← Retour à la liste
                    </a>

                    <a href="{{ route('video.edit', $video->id) }}" class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded">
                        Modifier
                    </a>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
