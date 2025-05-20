<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ $galerie->nom_event }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="flex flex-col md:flex-row h-full md:h-[500px]">
                    <!-- Photo de couverture -->
                    @if ($galerie->getFirstMediaUrl('photo_couv'))
                        <div class="md:w-1/3 h-full">
                            <img src="{{ $galerie->getFirstMediaUrl('photo_couv') }}" alt="Photo de couverture de {{ $galerie->nom_event }}"
                                class="w-full h-full object-cover rounded-t-md md:rounded-l-md md:rounded-tr-none">
                        </div>
                    @endif

                    <!-- Infos -->
                    <div class="p-6 md:w-2/3">
                        <h3 class="text-2xl font-bold text-gray-800 dark:text-gray-100 mb-2">
                            {{ $galerie->nom_event }}
                        </h3>

                        <p class="text-gray-700 dark:text-gray-200 leading-relaxed">
                            {{ $galerie->description_event }}
                        </p>
                    </div>
                </div>
            </div>

            <!-- Galerie de photos -->
            @if ($galerie->getMedia('photos')->count() > 0)
                <div class="mt-8 bg-white dark:bg-gray-800 p-6 rounded-lg shadow-sm">
                    <h4 class="text-lg font-semibold text-gray-800 dark:text-gray-100 mb-4">Photos de l'évènement</h4>
                    <div class="grid grid-cols-2 md:grid-cols-3 gap-4">
                        @foreach ($galerie->getMedia('photos') as $photo)
                            <img src="{{ $photo->getUrl() }}" alt="Photo de l'évènement"
                                class="w-full h-48 object-cover rounded shadow">
                        @endforeach
                    </div>
                </div>
            @endif

            <div class="mt-6 flex justify-end">
                <a href="{{ route('galerie.index') }}"
                    class="bg-gray-500 hover:bg-gray-600 text-white font-semibold px-4 py-2 rounded">
                    Retour à la liste
                </a>
            </div>
        </div>
    </div>
</x-app-layout>
