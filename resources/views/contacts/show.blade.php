<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-orange-600 dark:text-orange-400">
            {{ __('Détails du Contact') }}
        </h2>
    </x-slot>

    <div class="min-h-screen bg-orange-50 py-8">
        <div class="max-w-5xl mx-auto px-4">
            <h2 class="text-2xl font-bold mb-6 text-orange-700 text-center">Détails des messages Contact</h2>

            <div class="overflow-x-auto bg-white rounded-lg shadow-lg p-6 border border-orange-200">
                <div class="mb-4">
                    <p><strong class="text-orange-600">Nom:</strong> {{ $contact->nom ?? '-' }}</p>
                </div>
                <div class="mb-4">
                    <p><strong class="text-orange-600">Prénom:</strong> {{ $contact->prenom ?? '-' }}</p>
                </div>
                <div class="mb-4">
                    <p><strong class="text-orange-600">Message:</strong> {{ $contact->message ?? '-' }}</p>
                </div>
                <div class="mb-4">
                    <p><strong class="text-orange-600">Créé le:</strong> {{ $contact->created_at ? $contact->created_at->format('d/m/Y H:i') : '-' }}</p>
                </div>

                <a href="{{ route('contact.index') }}" class="inline-block mt-4 text-white bg-orange-500 hover:bg-orange-600 px-4 py-2 rounded shadow">
                    Retour à la liste
                </a>
            </div>
        </div>
    </div>
</x-app-layout>
