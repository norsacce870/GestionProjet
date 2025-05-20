<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800 dark:text-gray-200">
            {{ __('Détails du Contact') }}
        </h2>
    </x-slot>
    <div class="min-h-screen bg-gray-100 py-8">
        <div class="max-w-5xl mx-auto px-4">
            <h2 class="text-2xl font-bold mb-6 text-gray-800 text-center">Détails du Contact</h2>
            <div class="overflow-x-auto bg-white rounded-lg shadow p-6">
                <div class="mb-4">
                    <p><strong>Nom:</strong> {{ $contact->nom ?? '-' }}</p>
                </div>
                <div class="mb-4">
                    <p><strong>Prénom:</strong> {{ $contact->prenom ?? '-' }}</p>
                </div>
                <div class="mb-4">
                    <p><strong>Message:</strong> {{ $contact->message ?? '-' }}</p>
                </div>
                <div class="mb-4">
                    <p><strong>Créé le:</strong> {{ $contact->created_at ? $contact->created_at->format('d/m/Y H:i') : '-' }}</p>
                </div>
                <a href="{{ route('contacts.index') }}" class="text-blue-600 hover:underline">Retour à la liste</a>
            </div>
        </div>
    </div>
</x-app-layout>
