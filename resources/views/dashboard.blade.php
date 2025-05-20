<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

@php
    $months = ['Jan', 'Fév', 'Mar', 'Avr', 'Mai', 'Juin', 'Juil', 'Août', 'Sept', 'Oct', 'Nov', 'Déc'];
    $monthlyData = [];

    for ($i = 1; $i <= 12; $i++) {
        $monthlyData[] = $monthlyActiveUsers[$i] ?? 0;
    }

    $cards = [
        ['label' => 'Utilisateurs', 'count' => $userCount, 'color' => 'text-orange-500'],
        ['label' => 'Vidéos', 'count' => $videoCount, 'color' => 'text-gray-300'],
        ['label' => 'Joueurs', 'count' => $playerCount, 'color' => 'text-green-600'],
        ['label' => 'Publicités', 'count' => $pubCount, 'color' => 'text-orange-500'],
        ['label' => 'Palmarès', 'count' => $palmaresCount, 'color' => 'text-green-600'],
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
            {{-- Cards --}}
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                @foreach ($cards as $card)
                    <div class="bg-white dark:bg-gray-800 p-6 rounded-2xl shadow-md transform hover:scale-[1.03] transition-all duration-300 ease-out border-t-4 border-orange-400">
                        <h3 class="text-lg font-semibold text-gray-700 dark:text-gray-300">{{ $card['label'] }}</h3>
                        <p class="text-4xl font-bold {{ $card['color'] }} mt-2">{{ $card['count'] }}</p>
                    </div>
                @endforeach
            </div>

            {{-- Bar Chart --}}
            <div class="bg-white dark:bg-gray-800 rounded-2xl shadow p-6">
                <h3 class="text-lg font-semibold text-gray-800 dark:text-gray-200 mb-4">Statistiques générales</h3>
                <canvas id="statsChart" height="100"></canvas>
            </div>


    {{-- Scripts --}}
    <script>
        // Bar Chart
        const statsCtx = document.getElementById('statsChart').getContext('2d');
        new Chart(statsCtx, {
            type: 'bar',
            data: {
                labels: ['Utilisateurs', 'Vidéos', 'Joueurs', 'Publicités', 'Palmarès'],
                datasets: [{
                    label: 'Nombre total',
                    data: [{{ $userCount }}, {{ $videoCount }}, {{ $playerCount }}, {{ $pubCount }}, {{ $palmaresCount }}],
                    backgroundColor: ['#F97316', '#CBD5E0', '#10B981', '#F97316', '#10B981'],
                    borderRadius: 12,
                    borderSkipped: false
                }]
            },
            options: {
                responsive: true,
                plugins: {
                    legend: { display: false },
                    tooltip: {
                        backgroundColor: '#1F2937',
                        titleColor: '#F9FAFB',
                        bodyColor: '#D1D5DB'
                    }
                },
                scales: {
                    y: {
                        beginAtZero: true,
                        ticks: { color: '#6B7280' }
                    },
                    x: {
                        ticks: { color: '#6B7280' }
                    }
                }
            }
        });

    </script>
</x-app-layout>
