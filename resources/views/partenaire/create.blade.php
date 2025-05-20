<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800 dark:text-gray-200">
            {{ __('Ajout de partenaire') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">

            <h1 class="mb-4 text-2xl font-bold text-center text-blue-600">Ajouter un nouveau partenaire</h1>

            <form action="{{ route('partenaire.store') }}" method="POST" enctype="multipart/form-data" class="space-y-4">
                @csrf

                <div>
                    <label for="nom" class="block text-gray-700">Nom du partenaire :</label>
                    <input type="text" name="nom" id="nom"
                        class="w-full p-2 mt-1 border border-gray-300 rounded-md form-input" required>
                    @error('nom')
                        <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="media" class="block text-gray-700">Logo / Image (optionnel) :</label>
                    <input type="file" name="media" id="media"
                        class="w-full p-2 mt-1 border border-gray-300 rounded-md form-input"
                        accept="image/*">
                    @error('media')
                        <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                    @enderror
                </div>

                <button type="submit" class="w-full px-4 py-2 text-white bg-blue-500 rounded hover:bg-blue-600">
                    Enregistrer
                </button>
            </form>
        </div>
    </div>
</x-app-layout>
