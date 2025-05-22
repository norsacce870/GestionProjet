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

            {{-- Bouton Notifications --}}
            <div class="relative" x-data="{ open: false }">
                <button @click="open = !open" id="notificationBtn" class="relative focus:outline-none">
                    <svg class="w-7 h-7 text-gray-700 dark:text-gray-200 hover:text-orange-500 transition duration-150"
                        fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V4a2 2 0 00-4 0v1.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9" />
                    </svg>
                    @if ($recentActivities->count() > 0)
                        <span class="blink absolute top-0 right-0 inline-flex w-2 h-2 bg-red-500 rounded-full"></span>
                    @endif
                </button>

                {{-- Menu déroulant notifications --}}
                <div x-show="open" @click.outside="open = false"
                    class="absolute right-0 mt-2 w-80 bg-white dark:bg-gray-800 rounded-xl shadow-xl z-50 p-5 transition-all duration-200"
                    x-transition>
                    <h3 class="text-lg font-semibold text-gray-800 dark:text-gray-100 mb-4">🛎️ Alertes récentes</h3>

                    @if ($recentActivities->isEmpty())
                        <p class="text-sm text-gray-500 dark:text-gray-400">Aucune activité récente.</p>
                    @else
                        <ul class="space-y-3 max-h-60 overflow-y-auto pr-1">
                            @foreach ($recentActivities as $activity)
                                <li class="text-sm text-gray-700 dark:text-gray-300 leading-relaxed">
                                    <span class="font-semibold text-orange-600">
                                        {{ $activity->causer?->nom ?? 'Système' }}
                                    </span>
                                    {{ $activity->description }}
                                    <span class="block text-xs text-gray-500 dark:text-gray-400 mt-1">
                                        {{ $activity->created_at->diffForHumans() }}
                                    </span>
                                </li>
                            @endforeach
                        </ul>
                    @endif
                </div>
            </div>
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
                                <span
                                    class="text-sm {{ $change >= 0 ? 'text-green-500' : 'text-red-500' }} flex items-center gap-1 group relative">
                                    <span
                                        class="absolute -top-8 left-1/2 -translate-x-1/2 bg-gray-700 text-white text-xs px-2 py-1 rounded opacity-0 group-hover:opacity-100 transition duration-300 pointer-events-none">
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
    <!-- Bloc Répartition des utilisateurs -->
    <div class="bg-white dark:bg-gray-800 rounded-2xl shadow p-6 animate-fade-in">
        <h3 class="text-lg font-semibold text-gray-800 dark:text-gray-200 mb-4">Répartition des utilisateurs</h3>
        <canvas id="doughnutChart" height="200"></canvas>
    </div>

    <!-- Bloc Palmarès du club -->
    <div class="bg-white dark:bg-gray-800 rounded-2xl shadow p-6 animate-fade-in">
        <h3 class="text-xl font-bold text-black dark:text-orange-400 mb-4 flex items-center gap-2">
            🏆 Palmarès du club
        </h3>

        @if ($palmares->isEmpty())
            <p class="text-sm text-gray-500 dark:text-gray-400">Aucun trophée enregistré pour le moment.</p>
        @else
            <ul class="space-y-4">
                @foreach ($palmares as $item)
                    <li
                        class="flex items-center justify-between bg-orange-50 dark:bg-gray-700 border border-orange-200 dark:border-gray-600 p-4 rounded-xl shadow-sm transition hover:bg-orange-100 dark:hover:bg-gray-600">
                        <div class="flex items-center space-x-4">
                            <div class="bg-yellow-100 dark:bg-yellow-500 rounded-full p-2">
                                <svg class="w-6 h-6 text-yellow-600 dark:text-yellow-100"
                                    fill="currentColor" viewBox="0 0 20 20">
                                    <path
                                        d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.286 3.967a1 1 0 00.95.69h4.178c.969 0 1.371 1.24.588 1.81l-3.385 2.46a1 1 0 00-.364 1.118l1.287 3.966c.3.921-.755 1.688-1.54 1.118l-3.385-2.46a1 1 0 00-1.175 0l-3.385 2.46c-.784.57-1.838-.197-1.539-1.118l1.286-3.966a1 1 0 00-.364-1.118L2.048 9.394c-.783-.57-.38-1.81.588-1.81h4.178a1 1 0 00.95-.69l1.286-3.967z" />
                                </svg>
                            </div>

                            <div>
                                <p class="text-base font-semibold text-gray-800 dark:text-white">
                                    {{ $item->titre }}
                                    <span class="text-sm text-green-700 dark:text-green-300">({{ $item->valeur }})</span>
                                </p>
                                <p class="text-xs text-gray-600 dark:text-gray-400">
                                    {{ $item->sous_titre }}
                                </p>
                            </div>
                        </div>

                        <span class="text-sm font-bold text-orange-600 dark:text-orange-400">
                            #{{ $loop->iteration }}
                        </span>
                    </li>
                @endforeach
            </ul>
        @endif
    </div>



            </div>

            {{-- Progression vers l'objectif --}}
            <div class="bg-white dark:bg-gray-800 rounded-2xl shadow p-6 animate-fade-in">
                <h3 class="text-lg font-semibold text-gray-800 dark:text-gray-200 mb-4">Progression vers l'objectif
                    d'abonnés</h3>
                <div class="relative w-full bg-gray-200 dark:bg-gray-700 rounded-full h-4">
                    <div class="bg-green-500 h-4 rounded-full" style="width: 75%"></div>
                </div>
                <p class="text-sm mt-2 text-gray-600 dark:text-gray-400">75% de l'objectif atteint</p>
            </div>

            <div class="bg-white dark:bg-gray-800 rounded-2xl shadow-lg p-6">
    <h3 class="text-xl font-bold text-black dark:text-orange-400 mb-4 flex items-center gap-2">
        <svg class="w-6 h-6 text-green-600 dark:text-green-400" fill="none" stroke="currentColor"
            stroke-width="2" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" d="M9 12l2 2 4-4" />
        </svg>
        Historique des connexions
    </h3>

    <ul class="space-y-4">
        @forelse ($lastActivities as $activity)
            <li
                class="flex items-center gap-4 p-3 rounded-xl border border-gray-200 dark:border-gray-700 hover:bg-orange-50 dark:hover:bg-gray-700 transition">
                <div class="flex-shrink-0">
                    @if ($activity->description === 'Connexion')
                        <div class="bg-green-100 text-green-600 dark:bg-green-900 dark:text-green-300 rounded-full p-2">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M5 12h14M12 5l7 7-7 7" />
                            </svg>
                        </div>
                    @else
                        <div class="bg-red-100 text-red-600 dark:bg-red-900 dark:text-red-300 rounded-full p-2">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M19 12H5M12 19l-7-7 7-7" />
                            </svg>
                        </div>
                    @endif
                </div>

                <div class="flex-1 min-w-0">
                    <p class="text-sm font-semibold text-gray-800 dark:text-gray-100">
                        {{ $activity->causer->nom ?? 'Utilisateur inconnu' }}
                    </p>
                    <p class="text-xs text-gray-500 dark:text-gray-400">
                        s'est {{ strtolower($activity->description) }} il y a
                        {{ $activity->created_at->diffForHumans() }}
                    </p>
                </div>
            </li>
        @empty
            <li class="text-sm text-gray-500 dark:text-gray-400">Aucune activité récente.</li>
        @endforelse
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

            0%,
            100% {
                transform: translateY(0);
            }

            50% {
                transform: translateY(-4px);
            }
        }

        .blink {
            animation: blink 1s step-end infinite;
        }

        @keyframes blink {
            50% {
                opacity: 0;
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
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const btn = document.getElementById('notificationBtn');
            const menu = document.getElementById('notificationMenu');

            btn.addEventListener('click', function() {
                menu.classList.toggle('hidden');
            });

            document.addEventListener('click', function(e) {
                if (!btn.contains(e.target) && !menu.contains(e.target)) {
                    menu.classList.add('hidden');
                }
            });
        });
    </script>


</x-app-layout>
