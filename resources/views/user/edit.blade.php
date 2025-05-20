{{-- filepath: c:\Users\H P\Desktop\gestion projet\GestionProjet\resources\views\user\edit.blade.php --}}
<x-app-layout>

<div class="min-h-screen flex items-center justify-center bg-gray-100 py-8">
    <div class="w-full max-w-lg">
        <div class="bg-white shadow-lg rounded-lg p-8">
            <h2 class="text-2xl font-bold mb-6 text-gray-800 text-center">Modifier l'Utilisateur</h2>
            <form action="{{ route('user.update', $user) }}" method="POST" class="space-y-5">
                @csrf
                @method('PUT')
                <div>
                    <label for="nom" class="block text-gray-700 font-medium mb-2">Nom</label>
                    <input type="text" name="nom" id="nom" value="{{ old('nom', $user->nom) }}"
                        class="w-full border border-gray-300 rounded px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-400 "
                        placeholder="Entrez le nom">
                    @error('nom')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>
                <div>
                    <label for="prenom" class="block text-gray-700 font-medium mb-2">Prénom</label>
                    <input type="text" name="prenom" id="prenom" value="{{ old('prenom', $user->prenom) }}"
                        class="w-full border border-gray-300 rounded px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-400 "
                        placeholder="Entrez le prénom">
                    @error('prenom')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>
                <div>
                    <label for="email" class="block text-gray-700 font-medium mb-2">Email</label>
                    <input type="email" name="email" id="email" value="{{ old('email', $user->email) }}"
                        class="w-full border border-gray-300 rounded px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-400 "
                        placeholder="Entrez l'email">
                    @error('email')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>
                <div>
                    <label for="password" class="block text-gray-700 font-medium mb-2">Nouveau mot de passe</label>
                    <input type="password" name="password" id="password"
                        class="w-full border border-gray-300 rounded px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-400 "
                        placeholder="Laissez vide pour ne pas changer">
                    @error('password')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>
                <div>
                    <label for="password_confirmation" class="block text-gray-700 font-medium mb-2">Confirmer le mot de passe</label>
                    <input type="password" name="password_confirmation" id="password_confirmation"
                        class="w-full border border-gray-300 rounded px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-400"
                        placeholder="Confirmez le mot de passe">
                </div>
                <div>
                    <button type="submit"
                        class="w-full bg-blue-600 hover:bg-blue-700 text-white font-semibold py-2 px-4 rounded transition duration-200">
                        Mettre à jour
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
</x-app-layout>
