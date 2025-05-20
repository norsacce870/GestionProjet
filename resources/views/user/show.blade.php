{{-- filepath: c:\Users\H P\Desktop\gestion projet\GestionProjet\resources\views\user\show.blade.php --}}
<x-app-layout>
    <div class="min-h-screen flex items-center justify-center bg-gray-100 py-8">
        <div class="w-full max-w-xl">
            <div class="bg-white shadow-lg rounded-lg p-8">
                <h2 class="text-2xl font-bold mb-6 text-gray-800 text-center">Détail de l'Utilisateur</h2>
                <div class="mb-4 flex justify-center">
                    @if($user->getFirstMediaUrl('image'))
                        <img src="{{ $user->getFirstMediaUrl('image') }}" alt="Avatar" class="w-24 h-24 rounded-full object-cover border shadow">
                    @else
                        <div class="w-24 h-24 rounded-full bg-gray-200 flex items-center justify-center text-3xl text-gray-400">
                            <i class="bi bi-person"></i>
                        </div>
                    @endif
                </div>
                <div class="mb-4">
                    <span class="font-semibold text-gray-700">Nom :</span>
                    <span class="ml-2 text-gray-900">{{ $user->nom }}</span>
                </div>
                <div class="mb-4">
                    <span class="font-semibold text-gray-700">Prénom :</span>
                    <span class="ml-2 text-gray-900">{{ $user->prenom }}</span>
                </div>
                <div class="mb-4">
                    <span class="font-semibold text-gray-700">Email :</span>
                    <span class="ml-2 text-gray-900">{{ $user->email }}</span>
                </div>
                <div class="mb-4">
                    <span class="font-semibold text-gray-700">Créé le :</span>
                    <span class="ml-2 text-gray-900">{{ $user->created_at ? $user->created_at->format('d/m/Y H:i') : '-' }}</span>
                </div>
                <div class="flex justify-between mt-8">
                    <a href="{{ route('user.edit', $user) }}"
                       class="bg-blue-600 hover:bg-blue-700 text-white font-semibold py-2 px-4 rounded shadow transition duration-200">
                        Modifier
                    </a>
                    <a href="{{ route('user.index') }}"
                       class="bg-gray-200 hover:bg-gray-300 text-gray-800 font-semibold py-2 px-4 rounded shadow transition duration-200">
                        Retour à la liste
                    </a>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
