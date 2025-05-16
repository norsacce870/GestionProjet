<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Liste des vidéos') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="flex">
                <div class="flex-1 p-6">
                    <h1 class="text-xl font-semibold">Liste des Vidéos</h1>

                    <div class="bg-gray-100 p-6">
                        <div class="max-w-6xl mx-auto">
                            <!-- Header -->
                            <div class="flex justify-between items-center mb-6">
                                <a href="{{ route('video.create') }}" class="flex items-center gap-2 bg-blue-500 text-white px-4 py-2 rounded-md">
                                    + Ajouter une vidéo
                                </a>
                                <div class="relative">
                                    <input
                                        type="text"
                                        placeholder="Rechercher..."
                                        id="searchInput"
                                        class="pl-8 pr-4 py-2 rounded-md border w-80"
                                        oninput="searchVideos()">
                                    <svg class="absolute left-2 top-2.5 w-5 h-5 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.5 4.5a6 6 0 100 12 6 6 0 000-12zM19 19l-3.5-3.5"/>
                                    </svg>
                                </div>
                            </div>

                            <!-- Showing Count -->
                            <div class="flex justify-between items-center mb-4">
                                <p class="text-gray-700">Affichage de <span class="font-semibold">{{ count($videos) }}</span> vidéos</p>
                            </div>

                            <!-- Vidéo Table -->
                            <div class="bg-white shadow-md rounded-lg p-4">
                                <table class="w-full text-left border-collapse">
                                    <thead>
                                        <tr class="border-b">
                                            <th class="p-3">Titre</th>
                                            <th class="p-3">Lien</th>
                                            <th class="p-3">Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($videos as $video)
                                        <tr class="border-b">
                                            <td class="p-3">{{ $video->titre }}</td>
                                            <td class="p-3">
                                                @if ($video->lien)
                                                    <a href="{{ $video->lien }}" target="_blank" class="text-blue-500 underline">Voir la vidéo</a>
                                                @else
                                                    <span class="text-gray-400 italic">Aucun lien</span>
                                                @endif
                                            </td>
                                            <td class="py-2 px-4 border-b space-x-1">
                                                <a href="{{ route('video.edit', $video->id) }}" class="bg-blue-500 text-white px-2 py-1 rounded">Modifier</a>

                                                <form action="{{ route('video.destroy', $video->id) }}" method="POST" class="inline-block">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="bg-blue-500 text-white px-2 py-1 rounded">Supprimer</button>
                                                </form>

                                                <a href="{{ route('video.show', $video->id) }}" class="bg-green-500 text-white px-2 py-1 rounded">Voir</a>
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
