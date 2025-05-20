<x-app-layout>
<div class="min-h-screen flex items-center justify-center bg-gray-100 py-8">
    <div class="w-full max-w-xl">
        <div class="bg-white shadow-lg rounded-lg p-8">
            <h2 class="text-2xl font-bold mb-6 text-gray-800 text-center">Détail de l'Actualité</h2>

            <div class="mb-4">
                <span class="font-semibold text-gray-700">Nom :</span>
                <span class="ml-2 text-gray-900">{{ $actualite->nom ?? '-' }}</span>
            </div>

            <div class="mb-4">
                <span class="font-semibold text-gray-700">Auteur :</span>
                <span class="ml-2 text-gray-900">{{ $actualite->auteur ?? '-' }}</span>
            </div>

            <div class="mb-4">
                <span class="font-semibold text-gray-700">Contenu :</span>
                <p class="ml-2 text-gray-900 whitespace-pre-line">{{ $actualite->contenu ?? '-' }}</p>
            </div>

            <div class="mb-4">
                <span class="font-semibold text-gray-700">Créée le :</span>
                <span class="ml-2 text-gray-900">{{ $actualite->created_at ? $actualite->created_at->format('d/m/Y H:i') : '-' }}</span>
            </div>

            <div class="flex justify-between mt-8">
                <a href="{{ route('actualite.edit', $actualite) }}"
                   class="bg-blue-600 hover:bg-blue-700 text-white font-semibold py-2 px-4 rounded shadow transition duration-200">
                    Modifier
                </a>
                <a href="{{ route('actualite.index') }}"
                   class="bg-gray-200 hover:bg-gray-300 text-gray-800 font-semibold py-2 px-4 rounded shadow transition duration-200">
                    Retour à la liste
                </a>
            </div>
        </div>
    </div>
</div>
</x-app-layout>
