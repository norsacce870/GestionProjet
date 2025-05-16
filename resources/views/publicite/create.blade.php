<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800 dark:text-gray-200">
            {{ __('Ajouter une Publicité') }}
        </h2>
    </x-slot>
    <div class="max-w-4xl p-6 mx-auto bg-white rounded-lg shadow-md">
        <form action="{{ route('publicite.store') }}" method="POST">
            @csrf
            <label class="block font-semibold">Nom :</label>
            <input type="text" name="nom" class="w-full p-2 border rounded-md" required>

            <label class="block mt-4 font-semibold">Description :</label>
            <textarea name="description" class="w-full p-2 border rounded-md"></textarea>

            <!-- Bouton de soumission -->
            <button type="submit">Ajouter</button>
        </form>
    </div>
</x-app-layout>
