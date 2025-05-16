@extends('layouts.app')

@section('content')
<div class="max-w-4xl mx-auto p-6 bg-white shadow-md rounded-lg">
    <h1 class="text-2xl font-bold mb-4">Ajouter une Publicité</h1>
<form action="{{ route('publicite.store') }}" method="POST">
    @csrf
    <label class="block font-semibold">Nom :</label>
    <input type="text" name="nom" class="w-full border p-2 rounded-md" required>

    <label class="block font-semibold mt-4">Description :</label>
    <textarea name="description" class="w-full border p-2 rounded-md"></textarea>

    <!-- Bouton de soumission -->
    <button type="submit">Ajouter</button>
</form>
</div>
@endsection
