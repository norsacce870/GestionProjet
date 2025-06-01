@extends('layouts.header')

@section('content')
<section class="text-center mt-6 mb-6" data-aos="fade-down">
    <h1 class="text-2xl md:text-3xl lg:text-4xl font-bold leading-snug uppercase">
        Les Palmarès de <br /> l'équipe
    </h1>
</section>

<div class="max-w-5xl mx-auto px-4 py-8">
    @if($palmares->count())
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            @foreach($palmares as $item)
                <div class="bg-white dark:bg-gray-800 shadow-md rounded-lg p-6 hover:shadow-lg transition">
                     <img src="{{ $item->getFirstMediaUrl('images') }}" alt="{{ $item->titre }}">
                    <div class="text-orange-600 text-3xl font-bold">{{ $item->valeur }}</div>
                    <div class="mt-2 text-lg font-semibold text-gray-800 dark:text-gray-100">{{ $item->titre }}</div>
                    <div class="text-gray-600 dark:text-gray-400">{{ $item->sous_titre }}</div>
                    <div class="text-sm text-gray-400 mt-2">Ajouté {{ $item->created_at->diffForHumans() }}</div>
                </div>
            @endforeach
        </div>
    @else
        <p class="text-center text-gray-600 dark:text-gray-400">Aucun palmarès pour le moment.</p>
    @endif
</div>
@endsection




