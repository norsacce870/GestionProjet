{{-- filepath: c:\Users\H P\Desktop\gestion projet\GestionProjet\resources\views\coordonnee\show.blade.php --}}
<x-app-layout>
<div class="min-h-screen flex items-center justify-center bg-gray-100 py-8">
    <div class="w-full max-w-xl">
        <div class="bg-white shadow-lg rounded-lg p-8">
            <h2 class="text-2xl font-bold mb-6 text-gray-800 text-center">Détail de la Coordonnée</h2>
            <div class="mb-4">
                <span class="font-semibold text-gray-700">Nom :</span>
                <span class="ml-2 text-gray-900">{{ $coordonnee->nom ?? '-' }}</span>
            </div>
            <div class="mb-4">
                <span class="font-semibold text-gray-700">Icône :</span>
                <span class="ml-2">
                    @if($coordonnee->icone)
                        <i class="{{ $coordonnee->icone }} text-2xl align-middle"></i>
                        <span class="ml-2 text-gray-600 text-sm">{{ $coordonnee->icone }}</span>
                    @else
                        <span class="text-gray-400">-</span>
                    @endif
                </span>
            </div>
            <div class="mb-4">
                <span class="font-semibold text-gray-700">Utilisateur :</span>
                <span class="ml-2 text-gray-900">{{ $coordonnee->user->nom ?? '-' }} {{ $coordonnee->user->prenom ?? '' }}</span>
            </div>
            <div class="mb-4">
                <span class="font-semibold text-gray-700">Créée le :</span>
                <span class="ml-2 text-gray-900">{{ $coordonnee->created_at ? $coordonnee->created_at->format('d/m/Y H:i') : '-' }}</span>
            </div>
            <div class="flex justify-between mt-8">
                <a href="{{ route('coordonnee.edit', $coordonnee) }}"
                   class="bg-blue-600 hover:bg-blue-700 text-white font-semibold py-2 px-4 rounded shadow transition duration-200">
                    Modifier
                </a>
                <a href="{{ route('coordonnee.index') }}"
                   class="bg-gray-200 hover:bg-gray-300 text-gray-800 font-semibold py-2 px-4 rounded shadow transition duration-200">
                    Retour à la liste
                </a>
            </div>
        </div>
    </div>
</div>
</x-app-layout>
