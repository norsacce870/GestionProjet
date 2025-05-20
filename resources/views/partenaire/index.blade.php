<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Liste des partenaires') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="flex">
                <div class="flex-1 p-6">
                    <h1 class="text-xl font-semibold">Liste des Partenaires</h1>

                    <div class="bg-gray-100 p-6">
                        <div class="max-w-6xl mx-auto">
                            <!-- Header -->
                            <div class="flex justify-between items-center mb-6">
                                <a href="{{ route('partenaire.create') }}" class="flex items-center gap-2 bg-blue-500 text-white px-4 py-2 rounded-md">
                                    + Ajouter un partenaire
                                </a>
                                <div class="relative">
                                    <input
                                        type="text"
                                        placeholder="Rechercher..."
                                        id="searchInput"
                                        class="pl-8 pr-4 py-2 rounded-md border w-80"
                                        oninput="searchPartners()">
                                    <svg class="absolute left-2 top-2.5 w-5 h-5 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.5 4.5a6 6 0 100 12 6 6 0 000-12zM19 19l-3.5-3.5"/>
                                    </svg>
                                </div>
                            </div>

                            <!-- Showing Count -->
                            <div class="flex justify-between items-center mb-4">
                                <p class="text-gray-700">Affichage de <span class="font-semibold">{{ count($partenaires) }}</span> partenaires</p>
                            </div>

                            <!-- Table -->
                            <div class="bg-white shadow-md rounded-lg p-4">
                                <table class="w-full text-left border-collapse">
                                    <thead>
                                        <tr class="border-b">
                                            <th class="p-3">Nom</th>
                                            <th class="p-3">Logo</th>
                                            <th class="p-3">Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($partenaires as $partenaire)
                                        <tr class="border-b">
                                            <td class="p-3">{{ $partenaire->nom }}</td>
                                            <td class="p-3">
                                                @if ($partenaire->getFirstMediaUrl())
                                                    <img src="{{ $partenaire->getFirstMediaUrl() }}" alt="Logo" class="h-12 w-auto rounded">
                                                @else
                                                    <span class="text-gray-400 italic">Aucun logo</span>
                                                @endif
                                            </td>
                                            <td class="py-2 px-4 border-b space-x-1">
                                                <a href="{{ route('partenaire.edit', $partenaire->id) }}" class="bg-blue-500 text-white px-2 py-1 rounded">Modifier</a>

                                                <form action="{{ route('partenaire.destroy', $partenaire->id) }}" method="POST" class="inline-block">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="bg-red-500 text-white px-2 py-1 rounded" onclick="return confirm('Êtes-vous sûr de vouloir supprimer ce partenaire ?')">
                                                        Supprimer
                                                    </button>
                                                </form>

                                                <a href="{{ route('partenaire.show', $partenaire->id) }}" class="bg-green-500 text-white px-2 py-1 rounded">Voir</a>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
