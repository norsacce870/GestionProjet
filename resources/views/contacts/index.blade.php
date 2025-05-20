@extends('layouts.app')

@section('content')
<div class="max-w-4xl mx-auto p-6 bg-white shadow-md rounded-lg">
    <h1 class="text-2xl font-bold mb-4">Liste des Messages</h1>

    @if(session('success'))
        <div class="bg-green-100 text-green-800 px-4 py-2 rounded mb-4">
            {{ session('success') }}
        </div>
    @endif

    <table class="min-w-full bg-white">
        <thead>
            <tr>
                <th class="py-2 px-4 border">Nom</th>
                <th class="py-2 px-4 border">Prénom</th>
                <th class="py-2 px-4 border">Message</th>
                <th class="py-2 px-4 border">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($contacts as $contact)
            <tr>
                <td class="py-2 px-4 border">{{ $contact->nom }}</td>
                <td class="py-2 px-4 border">{{ $contact->prenom }}</td>
                <td class="py-2 px-4 border">{{ Str::limit($contact->message, 50) }}</td>
                <td class="py-2 px-4 border">
                    <a href="{{ route('contacts.show', $contact->id) }}" class="text-blue-500">Voir</a>
                    <form action="{{ route('contacts.destroy', $contact->id) }}" method="POST" class="inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="text-red-500">Supprimer</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
