@extends('layouts.header')

@section('title', 'Accueil - Fédération Ivoirienne de Football')

@section('content')
    <!-- Titre principal avec animation de fondu -->
    <section class="text-center mt-6 mb-6" data-aos="fade-down">
        <h1 class="text-2xl md:text-3xl lg:text-4xl font-bold leading-snug uppercase">
            Fédération Ivoirienne <br /> de Football
        </h1>
    </section>
    <section class="relative">
        <img src="{{ asset('Rectangle 2 (4).png') }}" alt="Bannière" class="w-full h-80 object-cover">
        <div class="absolute inset-0 flex items-center justify-center">
            <h2 class="text-white text-4xl font-bold relative inline-block">
                Effectif
                <span class="block h-[2px] bg-orange-500 mt-2"></span>
            </h2>
        </div>
    </section>



    <div class="max-w-6xl mx-auto my-12 px-4">

        @php
            $tabs = [
                'coachs' => 'COACHS',
                'attaquants' => 'ATTAQUANTS',
                'milieux' => 'MILIEUX',
                'defenseurs' => 'DEFENSEURS',
                'gardiens' => 'GARDIENS',
            ];
        @endphp

        <!-- Onglets de navigation -->
        <div class="flex justify-center space-x-6 border-b-2 pb-4 mb-8">
            @foreach ($tabs as $key => $label)
                <button class="tab-btn font-bold text-lg hover:text-orange-500" data-tab="{{ $key }}">
                    {{ $label }}
                </button>
            @endforeach
        </div>

        <!-- Contenus des catégories -->
        @foreach ($tabs as $key => $label)
            <div id="tab-{{ $key }}" class="tab-content hidden">
                <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
                    @foreach ($$key as $player)
                        <div class="relative rounded overflow-hidden shadow-lg">
                            <div class="relative w-full h-72 bg-gray-100">
                                <img src="{{ $player->getFirstMediaUrl('players') ?: '/images/default-player.jpg' }}"
                                    class="w-full h-full object-cover"
                                    alt="Image de {{ $player->prenom }} {{ $player->nom }}">
                                <div
                                    class="absolute bottom-0 left-0 right-0 text-white flex items-center justify-start p-8 ">
                                    <div class="flex items-center space-x-2 font-semibold text-left">
                                        <div class="h-6 w-1 bg-orange-500"></div>
                                        <span>{{ strtoupper($player->nom) }} {{ ucfirst($player->prenom) }}</span>
                                    </div>
                                </div>

                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        @endforeach


    </div>



    <!-- Script JS pour les onglets -->
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const buttons = document.querySelectorAll('.tab-btn');
            const contents = document.querySelectorAll('.tab-content');

            function showTab(tabKey) {
                contents.forEach(c => c.classList.add('hidden'));
                document.getElementById(`tab-${tabKey}`).classList.remove('hidden');

                buttons.forEach(btn => {
                    btn.classList.remove('text-orange-500', 'border-b-2', 'border-orange-500');
                    if (btn.dataset.tab === tabKey) {
                        btn.classList.add('text-orange-500', 'border-b-2', 'border-orange-500');
                    }
                });
            }

            // Onglet par défaut
            showTab('milieux');

            buttons.forEach(btn => {
                btn.addEventListener('click', () => {
                    showTab(btn.dataset.tab);
                });
            });
        });
    </script>




    <section class="bg-cover bg-center text-white py-12 px-6 md:px-20" style="background-image: url('14.png');">
    <h2 class="text-3xl md:text-4xl font-bold mb-8 border-l-4 border-orange-500 pl-4 backdrop-blur-sm bg-green-900/40 inline-block">
        Retrouvez Nos Meilleurs Moments
    </h2>

    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6">
        @foreach ($videos as $video)
            <div class="relative aspect-video">
                <iframe class="w-full h-full rounded shadow-md"
                        src="{{ str_replace('watch?v=', 'embed/', $video->lien) }}"
                        title="{{ $video->titre }}"
                        frameborder="0"
                        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                        allowfullscreen>
                </iframe>
            </div>
        @endforeach
    </div>
</section>



    <section class="bg-white py-12 px-6">
        <h2 class="text-2xl font-bold text-gray-800">
            <span class="border-l-4 border-orange-600 pl-4">Nos Partenaires</span>
        </h2>

        <div id="partner-carousel" class="relative w-full mx-auto mt-8" data-carousel="slide">
            <div class="relative h-28 overflow-hidden rounded-lg">
                <div class="hidden duration-700 ease-in-out" data-carousel-item>
                    <div class="flex justify-around items-center gap-6">
                        <img src="{{ asset('FIFA-removebg-preview.png') }}" alt="FIFA" class="h-20" />
                        <img src="{{ asset('CAF-removebg-preview.png') }}" alt="CAF" class="h-20" />
                        <img src="{{ asset('3.png') }}" alt="Puma" class="h-20" />
                        <img src="{{ asset('CANAL-removebg-preview.png') }}" alt="Canal+" class="h-20" />
                    </div>
                </div>
                <div class="hidden duration-700 ease-in-out" data-carousel-item>
                    <div class="flex justify-around items-center gap-6">
                        <img src="{{ asset('GESTOCI-removebg-preview.png') }}" alt="@bidjan.net" class="h-20" />
                        <img src="{{ asset('RTI-removebg-preview.png') }}" alt="Canal+" class="h-20" />
                        <img src="{{ asset('BNI-removebg-preview.png') }}" alt="BNI" class="h-20" />
                        <img src="{{ asset('FIFA-removebg-preview.png') }}" alt="FIFA" class="h-20" />
                    </div>
                </div>
            </div>

            <button type="button"
                class="absolute top-0 left-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none"
                data-carousel-prev>
                <span
                    class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-white/80 group-hover:bg-white dark:bg-gray-800/80 dark:group-hover:bg-gray-800">
                    <svg class="w-6 h-6 text-gray-800 dark:text-white" fill="none" stroke="currentColor"
                        viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                    </svg>
                </span>
            </button>
            <button type="button"
                class="absolute top-0 right-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none"
                data-carousel-next>
                <span
                    class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-white/80 group-hover:bg-white dark:bg-gray-800/80 dark:group-hover:bg-gray-800">
                    <svg class="w-6 h-6 text-gray-800 dark:text-white" fill="none" stroke="currentColor"
                        viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                    </svg>
                </span>
            </button>
        </div>
    </section>
@endsection
