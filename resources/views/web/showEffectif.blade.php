@extends('layouts.header')

@section('title', 'Détails du joueur')

@section('content')
<div class="container mx-auto px-4 py-10 bg-gradient-to-b from-orange-100 via-white to-green-100">
    <div class="flex flex-col md:flex-row-reverse gap-10 items-center bg-white p-8 rounded-3xl shadow-2xl">

        <!-- Photo du joueur -->
        <div class="flex justify-center md:w-1/2">
            @if($player->getFirstMediaUrl('players', 'preview'))
                <img src="{{ $player->getFirstMediaUrl('players', 'preview') }}"
                     alt="Photo de {{ $player->prenom }} {{ $player->nom }}"
                     class="rounded-3xl shadow-xl w-full max-w-sm object-cover border-4 border-orange-500">
            @else
                <div class="w-full max-w-sm h-[300px] flex items-center justify-center border-2 border-dashed rounded-xl text-gray-400">
                    Aucune image
                </div>
            @endif
        </div>

        <!-- Infos du joueur -->
        <div class="md:w-1/2 space-y-6">
            <!-- Numéro mis en valeur -->
            <div class="text-center text-orange-500 text-7xl font-extrabold drop-shadow-md">
                #{{ $player->numero }}
            </div>

            <h1 class="text-4xl md:text-5xl font-extrabold text-green-700 uppercase tracking-wide">
                {{ $player->nom }} <span class="text-gray-900">{{ $player->prenom }}</span>
            </h1>

            <h2 class="text-2xl font-semibold text-orange-600 italic">{{ $player->poste }}</h2>

            <hr class="border-t-2 border-gray-300 my-4">

            <div class="space-y-3 text-lg text-gray-800">
                <p><span class="font-semibold">Date de naissance :</span> {{ \Carbon\Carbon::parse($player->naissance_at)->format('d/m/Y') }}</p>
                <p><span class="font-semibold">Club :</span> {{ $player->club }}</p>
                <p><span class="font-semibold">Poids :</span> {{ $player->poids }} kg</p>
                <p><span class="font-semibold">Taille :</span> {{ $player->taille }} cm</p>
                <p><span class="font-semibold">Valeur :</span> <span class="text-green-700 font-bold">{{ number_format($player->valeur, 0, ',', ' ') }} €</span></p>
                <p><span class="font-semibold">Fin de contrat :</span> {{ \Carbon\Carbon::parse($player->fin_contrat_at)->format('d/m/Y') }}</p>
            </div>

            <div class="mt-8">
                <a href="{{ route('web.effectif') }}"
                   class="inline-block bg-green-600 hover:bg-green-700 text-white px-6 py-3 rounded-full text-lg font-semibold shadow-md transition duration-300">
                    ← Retour à l'effectif
                </a>
            </div>
        </div>

    </div>
</div>
@endsection
