@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Liste des actualités</h2>
    <a href="{{ route('actualites.create') }}" class="btn btn-success mb-3">Ajouter une actualité</a>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Nom</th>
                <th>Auteur</th>
                <th>Contenu</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($actualites as $actu)
                <tr>
                    <td>{{ $actu->nom }}</td>
                    <td>{{ $actu->auteur }}</td>
                    <td>{{ $actu->contenu }}</td>
                    <td>
                        <a href="{{ route('actualites.edit', $actu->id) }}" class="btn btn-primary btn-sm">Modifier</a>
                        <form action="{{ route('actualites.destroy', $actu->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Confirmer la suppression ?');">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger btn-sm">Supprimer</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
