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
                    <h1 class="text-xl font-semibold mb-4">Liste des Vidéos</h1>

                    <div class="bg-gray-100 p-6 rounded">
                        <div class="max-w-6xl mx-auto">

                            <!-- Header -->
                            <div class="flex justify-between items-center mb-6">
                                <a href="{{ route('video.create') }}" class="flex items-center gap-2 bg-blue-500 text-white px-4 py-2 rounded-md">
                                    + Ajouter une vidéo
                                </a>
                                <div class="flex items-center gap-2">
                                    <!-- Search Input -->
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

                                    <!-- Sort Button -->
                                    <button onclick="sortVideos()" class="bg-gray-300 hover:bg-gray-400 text-gray-800 px-3 py-2 rounded-md">
                                        Trier par date d'ajout ↓
                                    </button>
                                </div>
                            </div>

                            <!-- Showing Count -->
                            <div class="flex justify-between items-center mb-4">
                                <p class="text-gray-700">Affichage de <span class="font-semibold">{{ count($videos) }}</span> vidéos</p>
                            </div>

                            <!-- Vidéo Table -->
                            <div class="bg-white shadow-md rounded-lg p-4 overflow-x-auto">
                                <table class="w-full text-left border-collapse" id="videoTable">
                                    <thead>
                                        <tr class="border-b bg-gray-200">
                                            <th class="p-3">Titre</th>
                                            <th class="p-3">Lien</th>
                                            <th class="p-3">Ajoutée le</th>
                                            <th class="p-3">Modifiée le</th>
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
                                            <td class="p-3">{{ $video->created_at->format('d/m/Y H:i') }}</td>
                                            <td class="p-3">
                                                @if ($video->updated_at->gt($video->created_at))
                                                    Modifiée {{ $video->updated_at->diffForHumans() }}
                                                @else
                                                    Jamais modifiée
                                                @endif
                                            </td>
                                            <td class="py-2 px-4 border-b space-x-1">
                                                <a href="{{ route('video.edit', $video->id) }}" class="bg-blue-500 text-white px-2 py-1 rounded">Modifier</a>
                                                <form action="{{ route('video.destroy', $video->id) }}" method="POST" class="inline-block">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="bg-red-500 text-white px-2 py-1 rounded" onclick="return confirm('Êtes-vous sûr de vouloir supprimer cette vidéo ?')">Supprimer</button>
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

    <!-- JS -->
    <script>
        function searchVideos() {
            let input = document.getElementById("searchInput").value.toLowerCase();
            let rows = document.querySelectorAll("#videoTable tbody tr");

            rows.forEach(row => {
                let title = row.querySelector("td:first-child").textContent.toLowerCase();
                row.style.display = title.includes(input) ? "" : "none";
            });
        }

        function sortVideos() {
            const table = document.getElementById("videoTable").querySelector("tbody");
            const rows = Array.from(table.rows);

            rows.sort((a, b) => {
               
                const dateA = parseDateFR(a.cells[2].textContent.trim());
                const dateB = parseDateFR(b.cells[2].textContent.trim());
                return dateB - dateA;
            });

            rows.forEach(row => table.appendChild(row));
        }


        function parseDateFR(str) {
            // Ex : "21/05/2025 14:30"
            let [datePart, timePart] = str.split(' ');
            let [day, month, year] = datePart.split('/');
            let [hours = "0", minutes = "0"] = timePart ? timePart.split(':') : [];
            return new Date(year, month - 1, day, hours, minutes);
        }
    </script>
</x-app-layout>
