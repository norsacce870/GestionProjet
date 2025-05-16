<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800 dark:text-gray-200">
            {{ __('Ajout d\'un utilisateur') }}
        </h2>
    </x-slot>
    <div class="flex items-center justify-center min-h-screen py-8 bg-gray-100">
        <div class="w-full max-w-lg">
            <div class="p-8 bg-white rounded-lg shadow-lg">
                <h2 class="mb-6 text-2xl font-bold text-center text-gray-800">Ajouter un Utilisateur</h2>
                <form action="{{ route('user.store') }}" method="POST" class="space-y-5" enctype="multipart/form-data">
                    @csrf
                    <div>
                        <label for="nom" class="block mb-2 font-medium text-gray-700">Nom</label>
                        <input type="text" name="nom" id="nom" value="{{ old('nom') }}"
                            class="w-full px-4 py-2 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-blue-400 "
                            placeholder="Entrez le nom">
                        @error('nom')
                            <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                        @enderror
                    </div>
                    <div>
                        <label for="prenom" class="block mb-2 font-medium text-gray-700">Prénom</label>
                        <input type="text" name="prenom" id="prenom" value="{{ old('prenom') }}"
                            class="w-full px-4 py-2 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-blue-400 "
                            placeholder="Entrez le prénom">
                        @error('prenom')
                            <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                        @enderror
                    </div>
                    <div>
                        <label for="image" class="block mb-2 font-medium text-gray-700">Image</label>
                        <input type="file" name="image" id="image"
                            class="w-full px-4 py-2 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-blue-400 ">
                        @error('image')
                            <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                        @enderror
                    </div>
                    <div>
                        <label for="email" class="block mb-2 font-medium text-gray-700">Email</label>
                        <input type="email" name="email" id="email" value="{{ old('email') }}"
                            class="w-full px-4 py-2 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-blue-400 "
                            placeholder="Entrez l'email">
                        @error('email')
                            <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                        @enderror
                    </div>
                    <div>
                        <label for="password" class="block mb-2 font-medium text-gray-700">Mot de passe</label>
                        <input type="password" name="password" id="password"
                            class="w-full px-4 py-2 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-blue-400 "
                            placeholder="Entrez le mot de passe">
                        @error('password')
                            <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                        @enderror
                    </div>
                    <div>
                        <label for="password_confirmation" class="block mb-2 font-medium text-gray-700">Confirmer le mot
                            de
                            passe</label>
                        <input type="password" name="password_confirmation" id="password_confirmation"
                            class="w-full px-4 py-2 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-blue-400"
                            placeholder="Confirmez le mot de passe">
                    </div>
                    <div>
                        <button type="submit"
                            class="w-full px-4 py-2 font-semibold text-white transition duration-200 bg-blue-600 rounded hover:bg-blue-700">
                            Ajouter
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
