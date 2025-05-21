<x-app-layout>
    <x-slot name="header">
        <h2 class="text-2xl font-bold text-gray-800 dark:text-white leading-tight">
            Modifier le Joueur
        </h2>
    </x-slot>

    <div class="py-12 ">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 p-6 rounded-lg shadow-md">

                @if($errors->any())
                    <div class="mb-4 text-red-600">
                        <ul class="list-disc list-inside">
                            @foreach($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form action="{{ route('players.update', $player) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div>
                            <label for="nom" class="block font-medium text-sm text-gray-800 dark:text-white">Nom</label>
                            <input type="text" name="nom" value="{{ old('nom', $player->nom) }}" class="mt-1 block w-full rounded-md shadow-sm text-gray-800 dark:text-white border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-900">
                        </div>

                        <div>
                            <label for="prenom" class="block font-medium text-sm text-gray-800 dark:text-white">Prénom</label>
                            <input type="text" name="prenom" value="{{ old('prenom', $player->prenom) }}" class="mt-1 block w-full rounded-md shadow-sm text-gray-800 dark:text-white border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-900">
                        </div>

                        <div>
                            <label for="poste" class="block font-medium text-sm text-gray-800 dark:text-white">Poste</label>
                            <input type="text" name="poste" value="{{ old('poste', $player->poste) }}" class="mt-1 block w-full rounded-md shadow-sm text-gray-800 dark:text-white border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-900">
                        </div>

                        <div>
                            <label for="numero" class="block font-medium text-sm text-gray-800 dark:text-white">Numéro</label>
                            <input type="number" name="numero" value="{{ old('numero', $player->numero) }}" class="mt-1 block w-full rounded-md shadow-sm text-gray-800 dark:text-white border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-900">
                        </div>

                        <div>
                            <label for="naissance_at" class="block font-medium text-sm text-gray-800 dark:text-white">Date de naissance</label>
                            <input type="date" name="naissance_at" value="{{ old('naissance_at', $player->naissance_at) }}" class="mt-1 block w-full rounded-md shadow-sm text-gray-800 dark:text-white border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-900">
                        </div>

                        <div>
                            <label for="fin_contrat_at" class="block font-medium text-sm text-gray-800 dark:text-white">Fin de contrat</label>
                            <input type="date" name="fin_contrat_at" value="{{ old('fin_contrat_at', $player->fin_contrat_at) }}" class="mt-1 block w-full rounded-md shadow-sm text-gray-800 dark:text-white border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-900">
                        </div>

                        <div>
                            <label for="poids" class="block font-medium text-sm text-gray-800 dark:text-white">Poids (kg)</label>
                            <input type="number" step="0.01" name="poids" value="{{ old('poids', $player->poids) }}" class="mt-1 block w-full rounded-md shadow-sm text-gray-800 dark:text-white border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-900">
                        </div>

                        <div>
                            <label for="taille" class="block font-medium text-sm text-gray-800 dark:text-white">Taille (m)</label>
                            <input type="number" step="0.01" name="taille" value="{{ old('taille', $player->taille) }}" class="mt-1 block w-full rounded-md shadow-sm text-gray-800 dark:text-white border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-900">
                        </div>

                        <div class="col-span-1 md:col-span-2">
                            <label for="club" class="block font-medium text-sm text-gray-800 dark:text-white">Club</label>
                            <input type="text" name="club" value="{{ old('club', $player->club) }}" class="mt-1 block w-full rounded-md shadow-sm text-gray-800 dark:text-white border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-900">
                        </div>

                        <div class="col-span-1 md:col-span-2">
                            <label for="valeur" class="block font-medium text-sm text-gray-800 dark:text-white">Valeur marchande</label>
                            <input type="number" step="0.01" name="valeur" value="{{ old('valeur', $player->valeur) }}" class="mt-1 block w-full rounded-md shadow-sm text-gray-800 dark:text-white border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-900">
                        </div>


                    </div>

                    <div class="mt-6 flex justify-end space-x-2">
                        <button type="submit" class="bg-green-600 hover:bg-green-700 text-white font-semibold px-5 py-2 rounded shadow">Mettre à jour</button>
                        <a href="{{ route('players.index') }}" class="bg-gray-500 hover:bg-gray-600 text-white font-semibold px-5 py-2 rounded shadow">Annuler</a>
                    </div>
                </form>

            </div>
        </div>
    </div>
</x-app-layout>.