@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Modifier l'actualité</h2>

    <form action="{{ route('actualites.update', $actualite->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label>Nom</label>
            <input type="text" name="nom" value="{{ $actualite->nom }}" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Auteur</label>
            <input type="text" name="auteur" value="{{ $actualite->auteur }}" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Contenu</label>
            <textarea name="contenu" class="form-control" rows="5" required>{{ $actualite->contenu }}</textarea>
        </div>
        <button type="submit" class="btn btn-primary">Mettre à jour</button>
    </form>
</div>
@endsection
