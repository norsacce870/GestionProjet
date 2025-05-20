<x-app-layout>
    <div class="min-h-screen bg-gray-100 py-10">
        <div class="max-w-3xl mx-auto px-6">
            <h2 class="text-3xl font-bold mb-8 text-gray-800 text-center">Ajouter une Publicité</h2>
            <div class="bg-white rounded-2xl shadow-md p-8">
                <form action="{{ route('publicite.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
                    @csrf

                    <!-- Nom -->
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Nom <span class="text-red-500">*</span></label>
                        <input type="text" name="nom" class="w-full px-4 py-2 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                    </div>

                    <!-- Description -->
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Description</label>
                        <textarea name="description" rows="4" class="w-full px-4 py-2 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500"></textarea>
                    </div>

                    <!-- Image -->
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Image</label>
                        <input type="file" name="image" class="w-full border border-gray-300 rounded-lg px-4 py-2 file:mr-4 file:py-2 file:px-4 file:rounded file:border-0 file:bg-blue-600 file:text-white hover:file:bg-blue-700 transition duration-150 ease-in-out" accept="image/*">
                    </div>

                    <!-- Bouton de soumission -->
                    <div class="text-right">
                        <button type="submit" class="bg-green-600 hover:bg-green-700 text-white font-semibold px-6 py-2 rounded-lg shadow transition duration-200">
                            Ajouter
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
