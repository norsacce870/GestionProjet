@extends('layouts.app')

@section('content')
<div class="max-w-4xl mx-auto p-6 bg-white shadow-md rounded-lg">
    <h1 class="text-2xl font-bold mb-4 text-gray-800">Détails du Message</h1>

    <div class="bg-white p-4 rounded shadow">
        <p class=" text-gray-800"><strong>Nom:</strong> {{ $contact->nom }}</p>
        <p class=" text-gray-800"> <strong>Prénom:</strong> {{ $contact->prenom }}</p>
        <p class=" text-gray-800"><strong>Message:</strong> {{ $contact->message }}</p>
        <a href="{{ route('contacts.index') }}" class="text-blue-500">Retour à la liste</a>
    </div>
</div>
@endsection
