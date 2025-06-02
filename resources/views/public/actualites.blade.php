@extends('layouts.header')

@section('content')
    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6 px-4 py-8">
        @foreach ($actualites as $actu)
            <div
                class="bg-white rounded-lg shadow-md overflow-hidden hover:shadow-xl transition-shadow duration-300 flex flex-col">
                @if ($actu->hasMedia('images'))
                    <img src="{{ $actu->getFirstMediaUrl('images') }}" alt="Image d'actualité"
                        class="w-full h-48 object-cover">
                @else
                    <img src="{{ asset('images/default.png') }}" alt="Image par défaut" class="w-full h-48 object-cover">
                @endif

                <div class="p-4 flex flex-col flex-grow">
                    <h5 class="text-xl font-semibold text-gray-800 mb-2">{{ $actu->nom }}</h5>
                    <p class="text-gray-600 flex-grow">{{ Str::limit($actu->contenu, 100) }}</p>
                    <a href="#"
                        class="mt-4 inline-block bg-orange-600 text-white text-sm font-medium py-2 px-4 rounded hover:bg-blue-700 transition-colors mx-auto">
                        Voir plus
                    </a>

                </div>
            </div>
        @endforeach
    </div>
@endsection
