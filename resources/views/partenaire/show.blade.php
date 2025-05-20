<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Détails du partenaire') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <div class="max-w-3xl mx-auto mt-10 p-6 bg-white rounded-lg shadow-md">
                <div class="text-gray-700 space-y-4">
                    <p><span class="font-medium">Nom du partenaire :</span> {{ $partenaire->nom }}</p>

                    <p>
                        <span class="font-medium">Logo :</span><br>
                        @if ($partenaire->getFirstMediaUrl())
                            <img src="{{ $partenaire->getFirstMediaUrl() }}" alt="Logo du partenaire" class="mt-2 h-24 w-auto rounded shadow">
                        @else
                            <span class="text-gray-400 italic">Aucun logo disponible</span>
                        @endif
                    </p>
                </div>

                <div class="mt-6 flex justify-between">
                    <a href="{{ route('partenaire.index') }}" class="text-sm text-gray-600 hover:underline">
                        ← Retour à la liste
                    </a>

                    <a href="{{ route('partenaire.edit', $partenaire->id) }}" class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded">
                        Modifier
                    </a>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
