<x-app-layout>
    <div class="min-h-screen flex items-center justify-center bg-gray-100 dark:bg-gray-900 py-8">
        <div class="w-full max-w-lg">
            <div class="bg-white dark:bg-gray-800 shadow-lg rounded-lg p-8">
                <h2 class="text-2xl font-bold mb-6 text-gray-800 dark:text-white text-center">Ajouter une valeur</h2>

                <form action="{{ route('palmares.store') }}" method="POST" enctype="multipart/form-data" class="space-y-5">
                    @csrf

                    <div>
                        <label for="valeur"
                            class="block text-gray-700 dark:text-gray-200 font-medium mb-2">Valeur</label>
                        <input type="number" name="valeur" id="valeur" value="{{ old('valeur') }}"
                            class="w-full border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-700 text-gray-900 dark:text-white rounded px-4 py-2 focus:outline-none focus:ring-2 focus:ring-green-600"
                            placeholder="Entrez une valeur">
                    </div>

                    <div>
                        <label for="titre"
                            class="block text-gray-700 dark:text-gray-200 font-medium mb-2">Titre</label>
                        <input type="text" name="titre" id="titre" value="{{ old('titre') }}"
                            class="w-full border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-700 text-gray-900 dark:text-white rounded px-4 py-2 focus:outline-none focus:ring-2 focus:ring-green-600"
                            placeholder="Entrez un titre">
                    </div>

                    <div>
                        <label for="sous-titre"
                            class="block text-gray-700 dark:text-gray-200 font-medium mb-2">Sous-titre</label>
                        <input type="text" name="sous_titre" id="sous_titre" value="{{ old('sous_titre') }}"
                            class="w-full border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-700 text-gray-900 dark:text-white rounded px-4 py-2 focus:outline-none focus:ring-2 focus:ring-green-600"
                            placeholder="Entrez un sous_titre">
                    </div>
                    <input type="file" name="image" accept="image/*">

                        <button type="submit"
                            class="w-full bg-green-600 hover:bg-green-700 text-white font-semibold py-2 px-4 rounded transition duration-200">
                            Ajouter
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
