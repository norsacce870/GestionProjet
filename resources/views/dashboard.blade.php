<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 mb-10">
                <!-- Cartes des statistiques -->
                <div class="bg-white dark:bg-gray-700 p-6 rounded-lg shadow text-center">
                    <h3 class="text-lg font-semibold text-gray-700 dark:text-gray-300">Utilisateurs</h3>
                    <p class="text-4xl font-bold text-indigo-500 mt-2">{{ $userCount }}</p>
                </div>
                <div class="bg-white dark:bg-gray-700 p-6 rounded-lg shadow text-center">
                    <h3 class="text-lg font-semibold text-gray-700 dark:text-gray-300">Vidéos</h3>
                    <p class="text-4xl font-bold text-indigo-500 mt-2">{{ $videoCount }}</p>
                </div>
                <div class="bg-white dark:bg-gray-700 p-6 rounded-lg shadow text-center">
                    <h3 class="text-lg font-semibold text-gray-700 dark:text-gray-300">Joueurs</h3>
                    <p class="text-4xl font-bold text-indigo-500 mt-2">{{ $playerCount }}</p>
                </div>
                <div class="bg-white dark:bg-gray-700 p-6 rounded-lg shadow text-center">
                    <h3 class="text-lg font-semibold text-gray-700 dark:text-gray-300">Publicités</h3>
                    <p class="text-4xl font-bold text-indigo-500 mt-2">{{ $pubCount }}</p>
                </div>
                <div class="bg-white dark:bg-gray-700 p-6 rounded-lg shadow text-center">
                    <h3 class="text-lg font-semibold text-gray-700 dark:text-gray-300">Palmarès</h3>
                    <p class="text-4xl font-bold text-indigo-500 mt-2">{{ $palmaresCount }}</p>
                </div>
            </div>

            <!-- Graphique -->
            <div class="bg-white dark:bg-gray-800 rounded-lg shadow p-6">
                <h3 class="text-lg font-semibold text-gray-800 dark:text-gray-200 mb-4">Statistiques générales</h3>
                <canvas id="statsChart" height="100"></canvas>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        const ctx = document.getElementById('statsChart').getContext('2d');
        const statsChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: ['Utilisateurs', 'Vidéos', 'Joueurs', 'Publicités', 'Palmarès'],
                datasets: [{
                    label: 'Nombre total',
                    data: [{{ $userCount }}, {{ $videoCount }}, {{ $playerCount }}, {{ $pubCount }}, {{ $palmaresCount }}],
                    backgroundColor: [
                        '#6366F1',
                        '#3B82F6',
                        '#10B981',
                        '#F59E0B',
                        '#EF4444'
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                responsive: true,
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    </script>
</x-app-layout>


