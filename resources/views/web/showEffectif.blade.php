@extends('layouts.app')

@section('title', 'Détails du joueur')

@section('content')
<div class="container mt-4">
    <div class="card shadow-lg rounded">
        <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
            <h4 class="mb-0">Détails du joueur</h4>
            <a href="{{ route('web.effectif') }}" class="btn btn-light btn-sm">
                ← Retour
            </a>
        </div>

        <div class="card-body">
            <div class="row mb-3">
                <div class="col-md-6"><strong>Nom :</strong> {{ $player->nom }}</div>
                <div class="col-md-6"><strong>Prénom :</strong> {{ $player->prenom }}</div>
            </div>

            <div class="row mb-3">
                <div class="col-md-6"><strong>Poste :</strong> {{ $player->poste }}</div>
                <div class="col-md-6"><strong>Numéro :</strong> {{ $player->numero }}</div>
            </div>

            <div class="row mb-3">
                <div class="col-md-6"><strong>Date de naissance :</strong> {{ \Carbon\Carbon::parse($player->naissance_at)->format('d/m/Y') }}</div>
                <div class="col-md-6"><strong>Club :</strong> {{ $player->club }}</div>
            </div>

            <div class="row mb-3">
                <div class="col-md-6"><strong>Poids :</strong> {{ $player->poids }} kg</div>
                <div class="col-md-6"><strong>Taille :</strong> {{ $player->taille }} cm</div>
            </div>

            <div class="row mb-3">
                <div class="col-md-6"><strong>Valeur :</strong> {{ number_format($player->valeur, 0, ',', ' ') }} €</div>
                <div class="col-md-6"><strong>Fin de contrat :</strong> {{ \Carbon\Carbon::parse($player->fin_contrat_at)->format('d/m/Y') }}</div>
            </div>

            @if($player->getFirstMediaUrl())
            <div class="row mt-4">
                <div class="col-md-12 text-center">
                    <img src="{{ $player->getFirstMediaUrl(null, 'preview') }}" alt="Photo de {{ $player->prenom }} {{ $player->nom }}" class="img-fluid rounded shadow" style="max-height: 300px;">
                </div>
            </div>
            @endif
        </div>
    </div>
</div>
@endsection
