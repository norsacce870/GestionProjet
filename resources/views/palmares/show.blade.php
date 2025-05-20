<x-app-layout>

    @foreach ($palmares as $item)
    <div class="min-h-screen flex items-center justify-center bg-gray-100 py-8">
        <div class="w-full max-w-lg">
            <div class="bg-white shadow-lg rounded-lg p-8">
                <h2 class="text-2xl font-bold mb-6 text-gray-800 text-center">Détails du palmarès</h2>
                <p class="text-gray-700 mb-4"><strong>Valeur:</strong> {{ $item->valeur }}</p>
                <p class="text-gray-700 mb-4"><strong>Titre:</strong> {{ $item->titre }}</p>
                <p class="text-gray-700 mb-4"><strong>Sous-titre:</strong> {{ $item->sous_titre }}</p>
            </div>
        </div>
    </div>
@endforeach

</x-app-layout>
