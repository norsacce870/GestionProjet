<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800 dark:text-gray-200">
            {{ __('Liste des messages Contacts') }}
        </h2>
    </x-slot>
    <div class="min-h-screen bg-gray-100 py-8">
        <div class="max-w-5xl mx-auto px-4">
            <h2 class="text-2xl font-bold mb-6 text-gray-800 text-center">Liste des Messages Contacts</h2>
            <div class="overflow-x-auto bg-white rounded-lg shadow">

                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-orange-600">
                        <tr>
                            <th class="px-6 py-3 text-left text-xs font-medium text-white uppercase tracking-wider">#</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-white uppercase tracking-wider">Nom</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-white uppercase tracking-wider">Prénom</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-white uppercase tracking-wider">Message</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-white uppercase tracking-wider">Créé le</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-white uppercase tracking-wider">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-100">
                        @forelse($contacts as $contact)
                            <tr class="hover:bg-gray-50 transition">
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700">{{ $loop->iteration }}</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ \Illuminate\Support\Str::limit($contact->nom ?? '-', 30) }}</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ \Illuminate\Support\Str::limit($contact->prenom ?? '-', 30) }}</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ Str::limit($contact->message, 50) }}</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                    {{ $contact->created_at ? $contact->created_at->diffForHumans() : '-' }}
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm flex space-x-2">

                                    <form action="{{ route('contact.destroy', $contact) }}" method="POST" class="inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="text-red-600 hover:underline ml-2">Supprimer</button>
                                    </form>
                                    <a href="{{ route('contact.show', $contact) }}" class="text-green-600 hover:underline">Afficher</a>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="px-6 py-4 text-center text-gray-400">Aucun contact enregistré.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
                @if ($contacts->hasPages())
                    <div class="p-4 flex justify-center bg-gray-50 rounded-b-lg">
                        <div class="inline-flex rounded-md shadow-sm" aria-label="Pagination">
                            {{ $contacts->onEachSide(1)->links('pagination::tailwind') }}
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </div>
</x-app-layout>
