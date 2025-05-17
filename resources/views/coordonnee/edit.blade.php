{{-- filepath: c:\Users\H P\Desktop\gestion projet\GestionProjet\resources\views\coordonnee\edit.blade.php --}}
<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800 dark:text-gray-200">
            {{ __('Modifier une coordonnée') }}
        </h2>
    </x-slot>
<div class="min-h-screen flex items-center justify-center bg-gray-100 py-8">
    <div class="w-full max-w-lg">
        <div class="bg-white shadow-lg rounded-lg p-8">
            <h2 class="text-2xl font-bold mb-6 text-gray-800 text-center">Modifier la Coordonnée</h2>
            <form action="{{ route('coordonnee.update', $coordonnee) }}" method="POST" class="space-y-5">
                @csrf
                @method('PUT')
                <div>
                    <label for="nom" class="block text-gray-700 font-medium mb-2">Nom</label>
                    <input type="text" name="nom" id="nom" value="{{ old('nom', $coordonnee->nom) }}"
                        class="w-full border border-gray-300 rounded px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-400 "
                        placeholder="Entrez le nom">
                    @error('nom')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>
                <div>
                    <label for="icone" class="block text-gray-700 font-medium mb-2">Icône (classe Bootstrap, ex: bi bi-telephone)</label>
                    <input type="text" name="icone" id="icone" value="{{ old('icone', $coordonnee->icone) }}"
                        class="w-full border border-gray-300 rounded px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-400 "
                        placeholder="Ex: bi bi-telephone">
                    @error('icone')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
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
