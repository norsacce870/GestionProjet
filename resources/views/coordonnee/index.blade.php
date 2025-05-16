{{-- filepath: c:\Users\H P\Desktop\gestion projet\GestionProjet\resources\views\coordonnee\index.blade.php --}}
@extends('layouts.app')

@section('content')
<div class="min-h-screen bg-gray-100 py-8">
    <div class="max-w-5xl mx-auto px-4">
        <h2 class="text-2xl font-bold mb-6 text-gray-800 text-center">Liste des Coordonnées</h2>
        <div class="overflow-x-auto bg-white rounded-lg shadow">
            <div class="flex justify-end p-4">
                <a href="{{ route('coordonnee.create') }}" class="bg-blue-600 hover:bg-blue-700 text-white font-semibold py-2 px-4 rounded shadow">
                    Ajouter une Coordonnée
                </a>
            </div>
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-blue-600">
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-medium text-white uppercase tracking-wider">#</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-white uppercase tracking-wider">Nom</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-white uppercase tracking-wider">Icône</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-white uppercase tracking-wider">Utilisateur</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-white uppercase tracking-wider">Créé le</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-white uppercase tracking-wider">Actions</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-100">
                    @forelse($coordonnees as $coordonnee)
                        <tr class="hover:bg-gray-50 transition">
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700">{{ $loop->iteration }}</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $coordonnee->nom ?? '-' }}</td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                @if($coordonnee->icone)
                                    <img src="{{ asset('storage/' . $coordonnee->icone) }}" alt="Icône" class="h-8 w-8 rounded-full object-cover border">
                                @else
                                    <span class="text-gray-400">-</span>
                                @endif
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                {{ $coordonnee->user->name ?? '-' }}
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                {{ $coordonnee->created_at ? $coordonnee->created_at->format('d/m/Y H:i') : '-' }}
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm flex space-x-2">
                                <a href="{{ route('coordonnee.edit', $coordonnee) }}" class="text-blue-600 hover:underline">Éditer</a>
                                <form action="{{ route('coordonnee.destroy', $coordonnee) }}" method="POST" onsubmit="return confirm('Êtes-vous sûr de vouloir supprimer cette coordonnée ?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-600 hover:underline ml-2">Supprimer</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="px-6 py-4 text-center text-gray-400">Aucune coordonnée enregistrée.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
