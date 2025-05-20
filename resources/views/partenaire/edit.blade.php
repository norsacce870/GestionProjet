<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="max-w-lg mx-auto bg-white p-6 rounded-lg shadow-md mt-10">
                <h1 class="text-2xl font-bold mb-6 text-blue-600 text-center">Modifier le partenaire</h1>

                <form action="{{ route('partenaire.update', $partenaire->id) }}" method="POST" enctype="multipart/form-data" class="space-y-5">
                    @csrf
                    @method('PUT')

                    <div>
                        <label for="nom" class="block text-gray-700 font-medium">Nom du partenaire :</label>
                        <input type="text" name="nom" id="nom"
                            class="form-input w-full mt-2 border border-gray-300 rounded-md p-2 focus:ring-blue-500 focus:border-blue-500"
                            value="{{ old('nom', $partenaire->nom) }}" required>
                        @error('nom')
                            <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="media" class="block text-gray-700 font-medium">Logo/Image (optionnel) :</label>
                        <input type="file" name="media" id="media"
                            class="form-input w-full mt-2 border border-gray-300 rounded-md p-2"
                            accept="image/*">
                        @error('media')
                            <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                        @enderror

                        @if ($partenaire->getFirstMediaUrl())
                            <div class="mt-4">
                                <p class="text-sm text-gray-600">Image actuelle :</p>
                                <img src="{{ $partenaire->getFirstMediaUrl() }}" alt="Logo du partenaire" class="mt-2 w-32 h-auto rounded shadow">
                            </div>
                        @endif
                    </div>

                    <button type="submit"
                        class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded w-full transition duration-200">
                        Mettre à jour le partenaire
                    </button>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
