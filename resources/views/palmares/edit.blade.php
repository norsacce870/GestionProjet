<x-app-layout>
    <div class="min-h-screen flex items-center justify-center bg-gray-100 dark:bg-gray-900 py-8">
        <div class="w-full max-w-lg">
            <div class="bg-white dark:bg-gray-800 shadow-lg rounded-lg p-8">
                <h2 class="text-2xl font-bold mb-6 text-gray-800 dark:text-white text-center">
                    Modifier un palmarès
                </h2>
                <form action="{{ route('palmares.update', $palmares) }}" method="POST" enctype="multipart/form-data"
                    class="space-y-5">
                    @csrf
                    @method('PUT')

                    <div>
                        <label for="valeur"
                            class="block text-gray-700 dark:text-gray-300 font-medium mb-2">Valeur</label>
                        <input type="number" name="valeur" id="valeur"
                            value="{{ old('valeur', $palmares->valeur) }}"
                            class="w-full border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-700 text-gray-900 dark:text-white rounded px-4 py-2 focus:outline-none focus:ring-2 focus:ring-[#EA580C]"
                            placeholder="Entrez une valeur">
                    </div>

                    <div>
                        <label for="titre"
                            class="block text-gray-700 dark:text-gray-300 font-medium mb-2">Titre</label>
                        <input type="text" name="titre" id="titre" value="{{ old('titre', $palmares->titre) }}"
                            class="w-full border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-700 text-gray-900 dark:text-white rounded px-4 py-2 focus:outline-none focus:ring-2 focus:ring-[#EA580C]"
                            placeholder="Entrez un titre">
                    </div>

                    <div>
                        <label for="sous_titre"
                            class="block text-gray-700 dark:text-gray-300 font-medium mb-2">Sous-titre</label>
                        <input type="text" name="sous_titre" id="sous_titre"
                            value="{{ old('sous_titre', $palmares->sous_titre) }}"
                            class="w-full border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-700 text-gray-900 dark:text-white rounded px-4 py-2 focus:outline-none focus:ring-2 focus:ring-[#EA580C]"
                            placeholder="Entrez un sous-titre">
                    </div>

                    <div>
                        <label for="image"
                            class="block text-gray-700 dark:text-gray-300 font-medium mb-2">Image</label>
                        <input type="file" name="image" id="image" value="{{ old('image', $palmares->image) }}"
                            class="w-full border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-700 text-gray-900 dark:text-white rounded px-4 py-2 focus:outline-none focus:ring-2 focus:ring-[#EA580C]"
                            placeholder="Entrez un sous-titre">
                        @if ($palmares->image)
                            <div class="mt-4">
                                <p class="text-gray-700 dark:text-gray-300 mb-2">Image actuelle :</p>
                                <img src="{{ asset('storage/' . $palmares->image) }}" alt="Image actuelle"
                                    class="w-32 h-32 object-cover rounded border border-gray-300 dark:border-gray-600">
                            </div>
                        @endif

                    </div>

                    <div>
                        <button type="submit"
                            class="w-full bg-[#EA580C] hover:bg-orange-700 text-white font-semibold py-2 px-4 rounded transition duration-200">
                            Modifier
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
