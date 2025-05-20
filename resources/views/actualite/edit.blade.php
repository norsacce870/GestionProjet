<x-app-layout>
    <div class="min-h-screen flex items-center justify-center bg-gray-100 py-8">
        <div class="w-full max-w-lg">
            <div class="bg-white shadow-lg rounded-lg p-8">
                <h2 class="text-2xl font-bold mb-6 text-gray-800 text-center">Modifier l'Actualité</h2>

                <form action="{{ route('actualite.update', $actualite->id) }}" method="POST" enctype="multipart/form-data" class="space-y-5">
                    @csrf
                    @method('PUT')

                    <div>
                        <label for="nom" class="block text-gray-700 font-medium mb-2">Nom</label>
                        <input type="text" name="nom" id="nom" value="{{ old('nom', $actualite->nom) }}"
                            class="w-full border border-gray-300 rounded px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-400"
                            placeholder="Titre de l’actualité">
                        @error('nom')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="auteur" class="block text-gray-700 font-medium mb-2">Auteur</label>
                        <input type="text" name="auteur" id="auteur" value="{{ old('auteur', $actualite->auteur) }}"
                            class="w-full border border-gray-300 rounded px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-400"
                            placeholder="Nom de l’auteur">
                        @error('auteur')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="contenu" class="block text-gray-700 font-medium mb-2">Contenu</label>
                        <textarea name="contenu" id="contenu" rows="5"
                            class="w-full border border-gray-300 rounded px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-400"
                            placeholder="Contenu de l’actualité">{{ old('contenu', $actualite->contenu) }}</textarea>
                        @error('contenu')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <button type="submit"
                            class="w-full bg-blue-600 hover:bg-blue-700 text-white font-semibold py-2 px-4 rounded transition duration-200">
                            Mettre à jour l’actualité
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
