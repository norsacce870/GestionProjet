@extends('layouts.app')

@section('content')
<div class="max-w-4xl mx-auto p-6 bg-white shadow-md rounded-lg">
    <h1 class="text-2xl font-bold mb-4">Mes Publicités</h1>
    <a href="{{ route('publicite.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded-md">Ajouter une publicité</a>

    @foreach ($publicites as $publicite)
    <div class="border p-4 mt-4 rounded-md shadow-sm">
        <h2 class="text-xl font-semibold">{{ $publicite->nom }}</h2>
        <p class="text-gray-600">{{ $publicite->description }}</p>
        <div class="mt-2">
            <a href="{{ route('publicite.edit', $publicite) }}" class="bg-yellow-500 text-white px-3 py-1 rounded-md">Modifier</a>
            <form action="{{ route('publicite.destroy', $publicite) }}" method="POST" class="inline">
                @csrf
                @method('DELETE')
                <button type="submit" class="bg-red-500 text-white px-3 py-1 rounded-md">Supprimer</button>
            </form>
        </div>
    </div>
@endforeach

</div>
@endsection
