@extends('layouts.app')

@section('content')
<div class="max-w-4xl mx-auto p-6 bg-white shadow-md rounded-lg">
    <h1 class="text-2xl font-bold mb-4">Modifier la Publicité</h1>
    <form action="{{ route('publicite.update', $publicite) }}" method="POST">
        @csrf
        @method('PUT')

        <!-- Nom -->
        <label class="block font-semibold">Nom :</label>
        <input type="text" name="nom" value="{{ $publicite->nom }}" class="w-full border p-2 rounded-md" required>

        <!-- Description -->
        <label class="block font-semibold mt-4">Description :</label>
        <textarea name="description" class="w-full border p-2 rounded-md">{{ $publicite->description }}</textarea>

        <!-- Bouton de soumission -->
        <button type="submit" class="bg-yellow-500 text-white px-4 py-2 rounded-md mt-4">Mettre à jour</button>
    </form>
</div>
@endsection
