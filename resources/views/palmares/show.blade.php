<x-app-layout>
    <div class="min-h-screen flex items-center justify-center bg-gray-100 dark:bg-gray-900 py-8">
        <div class="w-full max-w-lg">
            <div class="bg-white dark:bg-gray-800 shadow-lg rounded-lg p-8">
                <h2 class="text-2xl font-bold mb-6 text-gray-800 dark:text-white text-center">
                    Détails du palmarès
                </h2>
                <p class="text-gray-700 dark:text-gray-300 mb-4">
                    <strong>Valeur:</strong> {{ $palmares->valeur }}
                </p>
                <p class="text-gray-700 dark:text-gray-300 mb-4">
                    <strong>Titre:</strong> {{ $palmares->titre }}
                </p>
                <p class="text-gray-700 dark:text-gray-300 mb-4">
                    <strong>Sous-titre:</strong> {{ $palmares->sous_titre }}
                </p>


                    <h2 class="text-2xl font-bold mb-6 text-gray-800 dark:text-white text-center my-5">Image</h2>
                    <img src="{{ asset('storage/' . $palmares->image) }}" alt="Image"
                        class="w-full h-auto mb-6 object-cover rounded">


                <a href="{{ route('palmares.index') }}"
                    class="bg-green-600 hover:bg-green-700 text-white font-semibold py-2 px-4 rounded shadow">
                    retour
                </a>
                <a href="{{ route('palmares.edit', $palmares) }}"
                    class="bg-orange-600 hover:bg-orange-700 text-white font-semibold py-2 px-4 rounded shadow ml-5">
                    Modifier
                </a>

            </div>

        </div>
    </div>
</x-app-layout>
