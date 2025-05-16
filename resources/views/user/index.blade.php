{{-- filepath: c:\Users\H P\Desktop\gestion projet\GestionProjet\resources\views\user\index.blade.php --}}
<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800 dark:text-gray-200">
            {{ __('Liste des utilisateurs') }}
        </h2>
    </x-slot>
<div class="min-h-screen bg-gray-100 py-8">
    <div class="max-w-5xl mx-auto px-4">
        <h2 class="text-2xl font-bold mb-6 text-gray-800 text-center">Liste des Utilisateurs</h2>
        <div class="overflow-x-auto bg-white rounded-lg shadow">
            <div class="flex justify-end p-4">
                <a href="{{ route('user.create') }}" class="bg-blue-600 hover:bg-blue-700 text-white font-semibold py-2 px-4 rounded shadow">
                    Ajouter un Utilisateur
                </a>
            </div>
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-blue-600">
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-medium text-white uppercase tracking-wider">#</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-white uppercase tracking-wider">Nom</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-white uppercase tracking-wider">Prénom</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-white uppercase tracking-wider">Email</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-white uppercase tracking-wider">Créé le</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-white uppercase tracking-wider">Actions</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-100">
                    @forelse($users as $user)
                        <tr class="hover:bg-gray-50 transition">
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700">{{ $loop->iteration }}</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $user->nom }}</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $user->prenom }}</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $user->email }}</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                {{ $user->created_at ? $user->created_at->format('d/m/Y H:i') : '-' }}
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm flex space-x-2">
                                <a href="{{ route('user.edit', $user) }}" class="text-blue-600 hover:underline">Éditer</a>
                                <form action="{{ route('user.destroy', $user) }}" method="POST" onsubmit="return confirm('Êtes-vous sûr de vouloir supprimer cet utilisateur ?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-600 hover:underline ml-2">Supprimer</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="px-6 py-4 text-center text-gray-400">Aucun utilisateur enregistré.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
</x-app-layout>
