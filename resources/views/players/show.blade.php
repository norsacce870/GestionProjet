<x-app-layout>
    <x-slot name="header">
        <h2 class="text-2xl font-bold text-gray-800 dark:text-white leading-tight">
            Détails du Joueur
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 p-6 rounded-lg shadow-md">
                <div class="space-y-4">
                    <div>
                        @if ($player->getFirstMediaUrl('players'))
                            <div class="mb-4">
                                <img src="{{ $player->getFirstMediaUrl('players') }}" alt="Photo du joueur"
                                    class="w-40 h-40 object-cover rounded-full mx-auto">
                            </div>
                        @endif
                        <h3 class="text-xl text-gray-800 dark:text-white font-semibold">{{ $player->prenom }}
                            {{ $player->nom }}</h3>
                    </div>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4 text-gray-800 dark:text-white">
                        <p><span class="font-semibold">Poste:</span> {{ $player->poste }}</p>
                        <p><span class="font-semibold">Numéro:</span> {{ $player->numero }}</p>
                        <p><span class="font-semibold">Date de naissance:</span> {{ $player->naissance_at }}</p>
                        <p><span class="font-semibold">Fin de contrat:</span> {{ $player->fin_contrat_at }}</p>
                        <p><span class="font-semibold">Poids:</span> {{ $player->poids }} kg</p>
                        <p><span class="font-semibold">Taille:</span> {{ $player->taille }} m</p>
                        <p><span class="font-semibold">Club:</span> {{ $player->club }}</p>
                        <p><span class="font-semibold">Valeur marchande:</span> {{ $player->valeur }} €</p>
                        <p><span class="font-semibold">Utilisateur associé:</span> {{ $player->user?->name ?? 'N/A' }}
                        </p>
                    </div>

                    <div class="flex space-x-4 pt-6">
                        <a href="{{ route('players.index') }}"
                            class="bg-gray-400 hover:bg-gray-500 text-white font-semibold px-6 py-2 rounded shadow">
                            Retour
                        </a>
                        <a href="{{ route('players.edit', $player) }}"
                            class="bg-yellow-500 hover:bg-yellow-600 text-white font-semibold px-6 py-2 rounded shadow">
                            Modifier
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
