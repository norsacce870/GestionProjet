@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Ajouter une actualité</h2>

    <form action="{{ route('actualites.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label>Nom</label>
            <input type="text" name="nom" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Auteur</label>
            <input type="text" name="auteur" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Contenu</label>
            <textarea name="contenu" class="form-control" rows="5" required></textarea>
        </div>
        <button type="submit" class="btn btn-success">Enregistrer</button>
    </form>
</div>
@endsection
