<x-app-layout>

    <div class="min-h-screen flex items-center justify-center bg-gray-100 py-8">
        <div class="w-full max-w-lg">
            <div class="bg-white shadow-lg rounded-lg p-8">
                <h2 class="text-2xl font-bold mb-6 text-gray-800 text-center">Détails du palmarès</h2>
                <p class="text-gray-700 mb-4"><strong>Valeur:</strong> {{ $palmares->valeur }}</p>
                <p class="text-gray-700 mb-4"><strong>Titre:</strong> {{ $palmares->titre }}</p>
                <p class="text-gray-700 mb-4"><strong>Sous-titre:</strong> {{ $palmares->sous_titre }}</p>
            </div>
        </div>
    </div>


</x-app-layout>
