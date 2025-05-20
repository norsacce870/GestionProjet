<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

@php

    $months = ['Jan', 'Fév', 'Mar', 'Avr', 'Mai', 'Juin', 'Juil', 'Août', 'Sept', 'Oct', 'Nov', 'Déc'];
    $monthlyData = [];

    for ($i = 1; $i <= 12; $i++) {
        $monthlyData[] = $monthlyActiveUsers[$i] ?? 0;
    }
@endphp

<x-app-layout>
    <x-slot name="header">
    <div class="flex justify-between items-center">
    <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
        {{ __('Dashboard') }}
    </h2>

</div>

    </x-slot>

    <div class="py-12 bg-[#f4f6f8] dark:bg-gray-900">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 mb-10">

                @php
                    $cards = [
                        ['label' => 'Utilisateurs', 'count' => $userCount, 'color' => 'text-[#F7941D]'],
                        ['label' => 'Vidéos', 'count' => $videoCount, 'color' => 'text-[#FFFFFF]'],
                        ['label' => 'Joueurs', 'count' => $playerCount, 'color' => 'text-[#009639]'],
                        ['label' => 'Publicités', 'count' => $pubCount, 'color' => 'text-[#F7941D]'],
                        ['label' => 'Palmarès', 'count' => $palmaresCount, 'color' => 'text-[#009639]'],
                    ];
                @endphp

                @foreach ($cards as $card)
                    <div
                        class="bg-white dark:bg-gray-700 p-6 rounded-xl shadow text-center border-t-4 border-orange-400">
                        <h3 class="text-lg font-semibold text-gray-700 dark:text-gray-300">{{ $card['label'] }}</h3>
                        <p class="text-4xl font-bold {{ $card['color'] }} mt-2">{{ $card['count'] }}</p>
                    </div>
                @endforeach
            </div>


            <div class="bg-white dark:bg-gray-800 rounded-xl shadow p-6">
                <h3 class="text-lg font-semibold text-gray-800 dark:text-gray-200 mb-4">Statistiques générales</h3>
                <canvas id="statsChart" height="100"></canvas>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mt-10">

                <div class="bg-white dark:bg-gray-800 rounded-xl shadow p-6">
                    <h3 class="text-lg font-semibold text-gray-800 dark:text-gray-200 mb-4">Répartition des utilisateurs
                    </h3>
                    <canvas id="doughnutChart" height="200"></canvas>
                </div>


                <div class="bg-white dark:bg-gray-800 rounded-xl shadow p-6">
                    <h3 class="text-lg font-semibold text-gray-800 dark:text-gray-200 mb-4">Utilisateurs actifs par mois
                    </h3>
                    <canvas id="lineChart" height="200"></canvas>
                </div>
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
                    data: [{{ $userCount }}, {{ $videoCount }}, {{ $playerCount }},
                        {{ $pubCount }}, {{ $palmaresCount }}
                    ],
                    backgroundColor: [
                        '#F7941D',
                        '#E5E5E5',
                        '#009639',
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
    <script>
        // Doughnut Chart
        const doughnutCtx = document.getElementById('doughnutChart').getContext('2d');
        const doughnutChart = new Chart(doughnutCtx, {
            type: 'doughnut',
            data: {
                labels: ['Abonnés', 'Invités', 'Admins'],
                datasets: [{
                    data: [60, 30, 10],
                    backgroundColor: ['#F7941D', '#E5E5E5', '#009639'],
                    borderWidth: 1,
                    cutout: '70%'
                }]
            },
            options: {
                responsive: true,
                plugins: {
                    legend: {
                        position: 'bottom',
                        labels: {
                            color: '#4B5563'
                        }
                    }
                }
            }
        });

        // Line Chart
        const lineCtx = document.getElementById('lineChart').getContext('2d');
        const lineChart = new Chart(lineCtx, {
            type: 'line',
            data: {
                labels: {!! json_encode($months) !!},
                datasets: [{
                    label: 'Utilisateurs actifs',
                    data: {!! json_encode($monthlyData) !!},
                    fill: true,
                    borderColor: '#009639',
                    backgroundColor: 'rgba(0,150,57,0.1)',
                    tension: 0.4,
                    pointBackgroundColor: '#F7941D'
                }]
            },
            options: {
                responsive: true,
                plugins: {
                    legend: {
                        labels: {
                            color: '#4B5563'
                        }
                    }
                },
                scales: {
                    x: {
                        ticks: {
                            color: '#6B7280'
                        }
                    },
                    y: {
                        beginAtZero: true,
                        ticks: {
                            color: '#6B7280'
                        }
                    }
                }
            }
        });
    </script>



</x-app-layout>
