@extends('layouts.header')

@section('title', 'Accueil - Fédération Ivoirienne de Football')

@section('content')
    <!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Staff | Fédération Ivoirienne de Football</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Tailwind CSS CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- Optionally add a custom font -->
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@600;700&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Montserrat', sans-serif; }
    </style>
</head>
<body class="bg-gray-100 dark:bg-gray-900 min-h-screen">

    <main class="max-w-6xl mx-auto px-4 py-10">
        <h2 class="text-3xl font-bold text-center text-orange-700  mb-10">Membres du staff</h2>
        <div class="grid gap-8 grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4">
            <!-- Example Staff Card -->
            <div class="bg-white dark:bg-gray-200 rounded-xl shadow-lg p-6 flex flex-col items-center transition hover:scale-105 hover:shadow-2xl duration-300">
                <img src="https://forbesafrique.com/wp-content/uploads/2023/12/YACINE-IDRISS-DIALLO-I-1-I-Forbes-Afrique-I-FA76-2.jpg" alt="Président" class="w-24 h-24 rounded-full border-4 border-[#EA580C] mb-4 shadow">
                <h3 class="text-xl font-semibold text-gray-800 dark:text-gray-100">Yacine Idriss Diallo</h3>
                <p class="text-[#EA580C] dark:text-orange-400 font-medium mb-2">Président</p>
                <p class="text-gray-500 dark:text-gray-300 text-center text-sm">Visionnaire et leader de la Fédération Ivoirienne de Football.</p>
            </div>
            <!-- Repeat for other staff members -->
            <div class="bg-white dark:bg-gray-200 rounded-xl shadow-lg p-6 flex flex-col items-center transition hover:scale-105 hover:shadow-2xl duration-300">
                <img src="https://randomuser.me/api/portraits/men/45.jpg" alt="Vice-Président" class="w-24 h-24 rounded-full border-4 border-[#EA580C] mb-4 shadow">
                <h3 class="text-xl font-semibold text-gray-800 dark:text-gray-100">Kouassi Kouadio</h3>
                <p class="text-[#EA580C] dark:text-orange-400 font-medium mb-2">Vice-Président</p>
                <p class="text-gray-500 dark:text-gray-300 text-center text-sm">Responsable des opérations et du développement sportif.</p>
            </div>
            <div class="bg-white dark:bg-gray-200 rounded-xl shadow-lg p-6 flex flex-col items-center transition hover:scale-105 hover:shadow-2xl duration-300">
                <img src="https://randomuser.me/api/portraits/women/65.jpg" alt="Secrétaire Générale" class="w-24 h-24 rounded-full border-4 border-[#EA580C] mb-4 shadow">
                <h3 class="text-xl font-semibold text-gray-800 dark:text-gray-100">Awa Diabaté</h3>
                <p class="text-[#EA580C] dark:text-orange-400 font-medium mb-2">Secrétaire Générale</p>
                <p class="text-gray-500 dark:text-gray-300 text-center text-sm">Coordination administrative et gestion des communications.</p>
            </div>
            <div class="bg-white dark:bg-gray-200 rounded-xl shadow-lg p-6 flex flex-col items-center transition hover:scale-105 hover:shadow-2xl duration-300">
                <img src="https://randomuser.me/api/portraits/men/77.jpg" alt="Trésorier" class="w-24 h-24 rounded-full border-4 border-[#EA580C] mb-4 shadow">
                <h3 class="text-xl font-semibold text-gray-800 dark:text-gray-100">Mamadou Fofana</h3>
                <p class="text-[#EA580C] dark:text-orange-400 font-medium mb-2">Trésorier</p>
                <p class="text-gray-500 dark:text-gray-300 text-center text-sm">Gestion financière et transparence des comptes.</p>
            </div>
            <!-- Add more staff cards as needed -->
        </div>
    </main>

</body>
</html>
@endsection
