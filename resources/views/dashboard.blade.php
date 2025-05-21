<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

@php
    $months = ['Jan', 'Fév', 'Mar', 'Avr', 'Mai', 'Juin', 'Juil', 'Août', 'Sept', 'Oct', 'Nov', 'Déc'];
    $monthlyData = [];

    for ($i = 1; $i <= 12; $i++) {
        $monthlyData[] = $monthlyActiveUsers[$i] ?? 0;
    }

    $cards = [
        ['label' => 'Utilisateurs', 'count' => $userCount, 'color' => 'text-orange-500', 'change' => 12],
        ['label' => 'Vidéos', 'count' => $videoCount, 'color' => 'text-gray-300', 'change' => -5],
        ['label' => 'Joueurs', 'count' => $playerCount, 'color' => 'text-green-600', 'change' => 8],
        ['label' => 'Publicités', 'count' => $pubCount, 'color' => 'text-orange-500', 'change' => 3],
        ['label' => 'Palmarès', 'count' => $palmaresCount, 'color' => 'text-green-600', 'change' => 0],
    ];

    $topUsers = [
        ['name' => 'Alice', 'videos_watched' => 120, 'last_active' => now()->subHours(2)],
        ['name' => 'Bob', 'videos_watched' => 98, 'last_active' => now()->subDays(1)],
        ['name' => 'Claire', 'videos_watched' => 75, 'last_active' => now()->subMinutes(45)],
    ];
@endphp

<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ __('Dashboard') }}
            </h2>
        </div>
    </x-slot>

<div class="py-12 bg-[#f4f6f8] dark:bg-gray-900 min-h-screen">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-10">

{{-- Cartes principales --}}
<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
    @foreach ($cards as $index => $card)
        @php $change = $card['change'] ?? 0; @endphp
        <div class="bg-white dark:bg-gray-800 p-6 rounded-2xl shadow-md transform hover:scale-[1.03] transition-all duration-300 ease-out border-t-4 border-orange-400 animate-fade-in"
            style="animation-delay: {{ $index * 100 }}ms;">
            <h3 class="text-lg font-semibold text-gray-700 dark:text-gray-300">{{ $card['label'] }}</h3>
            <p class="text-4xl font-bold {{ $card['color'] }} mt-2 flex items-center gap-2">
                {{ $card['count'] }}
                @if ($change !== 0)
                    <span class="text-sm {{ $change >= 0 ? 'text-green-500' : 'text-red-500' }} flex items-center gap-1 group relative">
                        <span class="absolute -top-8 left-1/2 -translate-x-1/2 bg-gray-700 text-white text-xs px-2 py-1 rounded opacity-0 group-hover:opacity-100 transition duration-300 pointer-events-none">
                            {{ $change >= 0 ? 'Hausse' : 'Baisse' }} de {{ abs($change) }}%
                        </span>
                        <svg class="w-4 h-4 animate-bounce-slow" fill="currentColor" viewBox="0 0 20 20">
                            @if ($change >= 0)
                                <path d="M5 10l5-5 5 5H5z" />
                            @else
                                <path d="M5 10l5 5 5-5H5z" />
                            @endif
                        </svg>
                        {{ abs($change) }}%
                    </span>
                @endif
            </p>
        </div>
    @endforeach
</div>


        {{-- Statistiques générales --}}
        <div class="bg-white dark:bg-gray-800 rounded-2xl shadow p-6 animate-fade-in">
            <h3 class="text-lg font-semibold text-gray-800 dark:text-gray-200 mb-4">Statistiques générales</h3>
            <canvas id="statsChart" height="100"></canvas>
        </div>

        {{-- Répartition utilisateurs + Utilisateurs actifs --}}
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div class="bg-white dark:bg-gray-800 rounded-2xl shadow p-6 animate-fade-in">
                <h3 class="text-lg font-semibold text-gray-800 dark:text-gray-200 mb-4">Répartition des utilisateurs</h3>
                <canvas id="doughnutChart" height="200"></canvas>
            </div>
            <div class="bg-white dark:bg-gray-800 rounded-2xl shadow p-6 animate-fade-in">
                <h3 class="text-lg font-semibold text-gray-800 dark:text-gray-200 mb-4">Utilisateurs actifs par mois</h3>
                <canvas id="lineChart" height="200"></canvas>
            </div>
        </div>

        {{-- Progression vers l'objectif --}}
        <div class="bg-white dark:bg-gray-800 rounded-2xl shadow p-6 animate-fade-in">
            <h3 class="text-lg font-semibold text-gray-800 dark:text-gray-200 mb-4">Progression vers l'objectif d'abonnés</h3>
            <div class="relative w-full bg-gray-200 dark:bg-gray-700 rounded-full h-4">
                <div class="bg-green-500 h-4 rounded-full" style="width: 75%"></div>
            </div>
            <p class="text-sm mt-2 text-gray-600 dark:text-gray-400">75% de l'objectif atteint</p>
        </div>

        {{-- Top utilisateurs --}}
        <div class="bg-white dark:bg-gray-800 rounded-2xl shadow p-6 animate-fade-in">
            <h3 class="text-lg font-semibold text-gray-800 dark:text-gray-200 mb-4">Top utilisateurs</h3>
            <table class="w-full text-left">
                <thead>
                    <tr>
                        <th class="py-2">Nom</th>
                        <th class="py-2">Vidéos vues</th>
                        <th class="py-2">Dernière activité</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($topUsers as $user)
                        <tr class="border-t border-gray-700">
                            <td class="py-2">{{ $user['name'] }}</td>
                            <td class="py-2">{{ $user['videos_watched'] }}</td>
                            <td class="py-2">{{ \Carbon\Carbon::parse($user['last_active'])->diffForHumans() }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        {{-- Notifications --}}
        <div class="bg-white dark:bg-gray-800 rounded-2xl shadow p-6 animate-fade-in">
            <h3 class="text-lg font-semibold text-gray-800 dark:text-gray-200 mb-4">Alertes récentes</h3>
            <ul class="list-disc list-inside text-gray-700 dark:text-gray-300 space-y-2">
                <li>🎥 Nouvelle vidéo ajoutée par Claire</li>
                <li>👤 Connexion admin depuis un nouvel appareil</li>
                <li>⚠️ 2 vidéos signalées aujourd’hui</li>
            </ul>
        </div>

    </div> {{-- Fin du wrapper principal --}}
</div> {{-- Fin de la section py-12 --}}

<style>
    .animate-fade-in {
        animation: fadeIn 0.6s ease-out forwards;
    }

    @keyframes fadeIn {
        0% {
            opacity: 0;
            transform: translateY(20px);
        }
        100% {
            opacity: 1;
            transform: translateY(0);
        }
    }
        .animate-bounce-slow {
        animation: bounce 1.5s infinite;
    }

    @keyframes bounce {
        0%, 100% {
            transform: translateY(0);
        }
        50% {
            transform: translateY(-4px);
        }
    }
</style>


    <script>
        // Bar Chart
        const statsCtx = document.getElementById('statsChart').getContext('2d');
        new Chart(statsCtx, {
            type: 'bar',
            data: {
                labels: ['Utilisateurs', 'Vidéos', 'Joueurs', 'Publicités', 'Palmarès'],
                datasets: [{
                    label: 'Nombre total',
                    data: [{{ $userCount }}, {{ $videoCount }}, {{ $playerCount }},
                        {{ $pubCount }}, {{ $palmaresCount }}
                    ],
                    backgroundColor: ['#F97316', '#CBD5E0', '#10B981', '#F97316', '#10B981'],
                    borderRadius: 12,
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
                        backgroundColor: '#1F2937',
                        titleColor: '#F9FAFB',
                        bodyColor: '#D1D5DB'
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

        // Doughnut Chart
        const doughnutCtx = document.getElementById('doughnutChart').getContext('2d');
        new Chart(doughnutCtx, {
            type: 'doughnut',
            data: {
                labels: ['Abonnés', 'Invités', 'Admins'],
                datasets: [{
                    data: [60, 30, 10],
                    backgroundColor: ['#F97316', '#E5E5E5', '#10B981'],
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
        new Chart(lineCtx, {
            type: 'line',
            data: {
                labels: {!! json_encode($months) !!},
                datasets: [{
                    label: 'Utilisateurs actifs',
                    data: {!! json_encode($monthlyData) !!},
                    fill: true,
                    borderColor: '#10B981',
                    backgroundColor: 'rgba(16, 185, 129, 0.1)',
                    tension: 0.4,
                    pointBackgroundColor: '#F97316'
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
