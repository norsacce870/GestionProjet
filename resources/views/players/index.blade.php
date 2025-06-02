<x-app-layout>
    <x-slot name="header">
        <h2 class="text-2xl font-bold text-gray-800 dark:text-white leading-tight">
            Liste des Joueurs
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-900 p-6 rounded-lg shadow-md">

                @if(session('success'))
                    <div class="mb-4 text-green-600 font-medium">
                        {{ session('success') }}
                    </div>
                @endif

                <div class="flex justify-end items-center mb-6">
                    <a href="{{ route('players.create') }}"
                       class="bg-blue-600 hover:bg-blue-700 text-white font-semibold px-5 py-2 rounded-full shadow transition">
                        Ajouter un Joueur
                    </a>
                </div>

                <div class="overflow-x-auto">
                    <table class="min-w-full text-sm text-left text-gray-700">
                        <thead class="text-xs uppercase bg-gray-100 text-gray-600 dark:bg-gray-700 dark:text-gray-100">
                            <tr>
                                <th class="px-6 py-3">ID</th>
                                <th class="px-6 py-3">Image</th>
                                <th class="px-6 py-3">Nom</th>
                                <th class="px-6 py-3">Prénom</th>
                                <th class="px-6 py-3">Poste</th>
                                <th class="px-6 py-3">Numéro</th>
                                <th class="px-6 py-3">Ajouté</th>
                                <th class="px-6 py-3 text-center">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($players as $player)
                                <tr class="text-gray-600 dark:text-gray-100 bg-white dark:bg-gray-800 transition">
                                    <td class="px-6 py-4">{{ $player->id }}</td>
                                    <td class="px-6 py-4">
                                        <img src="{{ $player->getFirstMediaUrl('players', 'small') ?: asset('images/default.jpg') }}"
                                             alt="Photo de {{ $player->nom }}"
                                             class="w-12 h-12 object-cover rounded-full border border-gray-300 dark:border-gray-600">
                                    </td>
                                    <td class="px-6 py-4 font-medium">{{ $player->nom }}</td>
                                    <td class="px-6 py-4">{{ $player->prenom }}</td>
                                    <td class="px-6 py-4">{{ $player->poste }}</td>
                                    <td class="px-6 py-4">{{ $player->numero }}</td>
                                    <td class="px-6 py-4">{{ $player->created_at->diffForHumans() }}</td>
                                    <td class="px-6 py-4 text-center space-x-2">
                                        <a href="{{ route('players.show', $player) }}"
                                            class="text-green-600 dark:text-green-400 hover:underline text-2xl hover:text-gray-400 duration-500 ">
                                            <i class="bi bi-eye"></i></a>
                                        </a>
                                        <a href="{{ route('players.edit', $player) }}"
                                            class="text-[#EA580C] dark:text-orange-400 hover:text-gray-400 duration-500 hover:underline text-2xl">
                                            <i class="bi bi-pencil-square"></i></a>
                                        </a>
                                        <form action="{{ route('players.destroy', $player) }}" method="POST" class="inline"
                                              onsubmit="return confirm('Confirmer la suppression ?')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit"
                                                class="text-red-700 dark:text-red-500 hover:text-gray-400 duration-500 hover:underline ml-2 text-2xl"><i
                                                class="bi bi-trash"></i></button>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="8" class="px-6 py-4 text-center text-gray-500">
                                        Aucun joueur enregistré.
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>

                    <div class="mt-6">
                        {{ $players->links() }}
                    </div>
                </div>

            </div>
        </div>
    </div>
</x-app-layout>
