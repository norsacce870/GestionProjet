<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12 bg-[#f4f6f8] dark:bg-gray-900">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 mb-10">
                <!-- Cartes des statistiques -->
                @php
                    $cards = [
                        ['label' => 'Utilisateurs', 'count' => $userCount, 'color' => 'text-[#F7941D]'], // Orange
                        ['label' => 'Vidéos', 'count' => $videoCount, 'color' => 'text-[#FFFFFF]'], // Blanc (gris clair)
                        ['label' => 'Joueurs', 'count' => $playerCount, 'color' => 'text-[#009639]'], // Vert
                        ['label' => 'Publicités', 'count' => $pubCount, 'color' => 'text-[#F7941D]'],
                        ['label' => 'Palmarès', 'count' => $palmaresCount, 'color' => 'text-[#009639]'],
                    ];
                @endphp

                @foreach($cards as $card)
                    <div class="bg-white dark:bg-gray-700 p-6 rounded-xl shadow text-center border-t-4 border-orange-400">
                        <h3 class="text-lg font-semibold text-gray-700 dark:text-gray-300">{{ $card['label'] }}</h3>
                        <p class="text-4xl font-bold {{ $card['color'] }} mt-2">{{ $card['count'] }}</p>
                    </div>
                @endforeach
            </div>

            <!-- Graphique -->
            <div class="bg-white dark:bg-gray-800 rounded-xl shadow p-6">
                <h3 class="text-lg font-semibold text-gray-800 dark:text-gray-200 mb-4">Statistiques générales</h3>
                <canvas id="statsChart" height="100"></canvas>
            </div>
        </div>
    </div>

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
                        '#F7941D', // Orange
                        '#E5E5E5', // Blanc/gris clair
                        '#009639', // Vert
                        '#F7941D',
                        '#009639'
                    ],
                    borderRadius: 10,
                    borderSkipped: false
                }]
            },
            options: {
                responsive: true,
                plugins: {
                    legend: {
                        display: false
                    },
                    tooltip: {
                        backgroundColor: '#333',
                        titleColor: '#fff',
                        bodyColor: '#fff'
                    }
                },
                scales: {
                    y: {
                        beginAtZero: true,
                        ticks: {
                            color: '#6B7280'
                        }
                    },
                    x: {
                        ticks: {
                            color: '#6B7280'
                        }
                    }
                }
            }
        });
    </script>
</x-app-layout>



