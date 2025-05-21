create:<x-app-layout>
    <x-slot name="header">
        <h2 class="text-2xl font-bold text-gray-800 dark:text-white leading-tight">
            Ajouter un Joueur
        </h2>
    </x-slot>

    <div class="py-12 ">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 p-6 rounded-lg shadow-md">

                @if ($errors->any())
                    <div class="mb-4 text-red-600">
                        <ul class="list-disc list-inside">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form action="{{ route('players.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
                    @csrf

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <label for="nom" class="block font-medium text-sm text-gray-800 dark:text-white">Nom</label>
                            <input type="text" name="nom" class="mt-1 block w-full rounded-md border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-900 text-gray-800 dark:text-white shadow-sm" value="{{ old('nom') }}">
                        </div>
                        <div>
                            <label for="prenom" class="block font-medium text-sm text-gray-800 dark:text-white">Prénom</label>
                            <input type="text" name="prenom" class="mt-1 block w-full rounded-md border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-900 text-gray-800 dark:text-white shadow-sm" value="{{ old('prenom') }}">
                        </div>
                    </div>

                    <div>
                        <label for="poste" class="block font-medium text-sm text-gray-800 dark:text-white">Poste</label>
                        <input type="text" name="poste" class="mt-1 block w-full rounded-md border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-900 text-gray-800 dark:text-white shadow-sm" value="{{ old('poste') }}">
                    </div>

                    <div>
                        <label for="numero" class="block font-medium text-sm text-gray-800 dark:text-white">Numéro</label>
                        <input type="number" name="numero" class="mt-1 block w-full rounded-md border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-900 text-gray-800 dark:text-white shadow-sm" value="{{ old('numero') }}">
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <label for="naissance_at" class="block font-medium text-sm text-gray-800 dark:text-white">Date de naissance</label>
                            <input type="date" name="naissance_at" class="mt-1 block w-full rounded-md border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-900 text-gray-800 dark:text-white shadow-sm" value="{{ old('naissance_at') }}">
                        </div>
                        <div>
                            <label for="fin_contrat_at" class="block font-medium text-sm text-gray-800 dark:text-white">Fin de contrat</label>
                            <input type="date" name="fin_contrat_at" class="mt-1 block w-full rounded-md border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-900 text-gray-800 dark:text-white shadow-sm" value="{{ old('fin_contrat_at') }}">
                        </div>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <label for="poids" class="block font-medium text-sm text-gray-800 dark:text-white">Poids (kg)</label>
                            <input type="number" step="0.01" name="poids" class="mt-1 block w-full rounded-md border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-900 text-gray-800 dark:text-white shadow-sm" value="{{ old('poids') }}">
                        </div>
                        <div>
                            <label for="taille" class="block font-medium text-sm text-gray-800 dark:text-white">Taille (m)</label>
                            <input type="number" step="0.01" name="taille" class="mt-1 block w-full rounded-md border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-900 text-gray-800 dark:text-white shadow-sm" value="{{ old('taille') }}">
                        </div>
                    </div>

                    <div>
                        <label for="club" class="block font-medium text-sm text-gray-800 dark:text-white">Club</label>
                        <input type="text" name="club" class="mt-1 block w-full rounded-md border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-900 text-gray-800 dark:text-white shadow-sm" value="{{ old('club') }}">
                    </div>

                    <div>
                        <label for="valeur" class="block font-medium text-sm text-gray-800 dark:text-white">Valeur marchande</label>
                        <input type="number" step="0.01" name="valeur" class="mt-1 block w-full rounded-md border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-900 text-gray-800 dark:text-white shadow-sm" value="{{ old('valeur') }}">
                    </div>

                    <div>
                        <label for="image" class="block font-medium text-sm text-gray-800 dark:text-white">Photo</label>
                        <input type="file" name="image" class="mt-1 block w-full text-gray-800 dark:text-white">
                    </div>

                    <div class="flex justify-end space-x-4">
                        <button type="submit"
                                class="bg-green-600 hover:bg-green-700 text-white font-semibold px-6 py-2 rounded shadow">
                            Enregistrer
                        </button>
                        <a href="{{ route('players.index') }}"
                           class="bg-gray-400 hover:bg-gray-500 text-white font-semibold px-6 py-2 rounded shadow">
                            Annuler
                        </a>
                    </div>
                </form>

            </div>
        </div>
    </div>
</x-app-layout>