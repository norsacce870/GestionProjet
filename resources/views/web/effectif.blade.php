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

    <!-- Footer -->
    <footer class="bg-gray-800 max-w-7xl mx-auto text-white">
        <div class="relative py-12 w-1000">
            <img src="{{ asset('footer.png') }}" alt="Background"
                class="absolute inset-0 w-full h-full object-cover opacity-30">

            <div class="relative z-10 max-w-7xl mx-auto px-4 md:px-6">
                <div class="flex flex-col md:flex-row justify-between">
                    <div class="mb-8 md:mb-0">
                        <h2 class="text-2xl md:text-3xl font-bold text-white mb-2">Federation Ivoirienne<br>de Football
                        </h2>
                    </div>

                    <!-- Navigation rapide -->
                    <div class="mb-6 md:mb-0">
                        <h3 class="text-xl font-semibold mb-4">Liens Rapides</h3>
                        <div class="font-semibold">
                            <span class="text-orange-600">&gt;</span>
                            <span class="text-white">Accueil</span>
                        </div>
                        <div class="font-semibold">
                            <span class="text-orange-600">&gt;</span>
                            <span class="text-white">Evenements</span>
                        </div>
                        <div class="font-semibold">
                            <span class="text-orange-600">&gt;</span>
                            <span class="text-white">Pratiquer</span>
                        </div>
                        <div class="font-semibold">
                            <span class="text-orange-600">&gt;</span>
                            <span class="text-white">Contact</span>
                        </div>
                    </div>

                    <!-- Partenaires -->
                    <div class="mb-6 md:mb-0">
                        <h3 class="text-xl font-semibold mb-4">Partenaires</h3>
                        <div class="font-semibold">
                            <span class="text-orange-600">&gt;</span>
                            <span class="text-white">Puma</span>
                        </div>
                        <div class="font-semibold">
                            <span class="text-orange-600">&gt;</span>
                            <span class="text-white">Gestoci</span>
                        </div>
                        <div class="font-semibold">
                            <span class="text-orange-600">&gt;</span>
                            <span class="text-white">RTI</span>
                        </div>
                        <div class="font-semibold">
                            <span class="text-orange-600">&gt;</span>
                            <span class="text-white">FIFA</span>
                        </div>

                    </div>

                    <div>
                        <h3 class="text-xl font-semibold mb-4">Contact</h3>
                        <div class="font-semibold">
                            <span class="text-orange-600">&gt;</span>
                            <span class="text-white">>fifci@aviso.ci</span>
                        </div>
                        <div class="font-semibold">
                            <span class="text-orange-600">&gt;</span>
                            <span class="text-white">+225 21 24 00 27</span>
                        </div>

                    </div>
                </div>

                <div class="border-t border-gray-600 my-8"></div>

                <div class="flex space-x-4">
                    <!-- Instagram -->
                    <a href="#" class="text-white hover:text-orange-500 transition-colors">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="currentColor" viewBox="0 0 24 24">
                            <path
                                d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163c0-3.403-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z" />
                        </svg>
                    </a>

                    <!-- YouTube -->
                    <a href="#" class="text-white hover:text-orange-500 transition-colors">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="currentColor" viewBox="0 0 24 24">
                            <path
                                d="M19.615 3.184c-3.604-.246-11.631-.245-15.23 0-3.897.266-4.356 2.62-4.385 8.816.029 6.185.484 8.549 4.385 8.816 3.6.245 11.626.246 15.23 0 3.897-.266 4.356-2.62 4.385-8.816-.029-6.185-.484-8.549-4.385-8.816zm-10.615 12.816v-8l8 3.993-8 4.007z" />
                        </svg>
                    </a>

                    <!-- Facebook -->
                    <a href="#" class="text-white hover:text-orange-500 transition-colors">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="currentColor" viewBox="0 0 24 24">
                            <path
                                d="M9 8h-3v4h3v12h5v-12h3.642l.358-4h-4v-1.667c0-.955.192-1.333 1.115-1.333h2.885v-5h-3.808c-3.596 0-5.192 1.583-5.192 4.615v3.385z" />
                        </svg>
                    </a>
                </div>
            </div>
        </div>
    </footer><br><br>
    <section>
        <div class="flex w-full">
            <div class="w-1/3 h-10 bg-orange-600"></div>
            <div class="w-1/3 h-10 bg-white"></div>
            <div class="w-1/3 h-10 bg-green-600"></div>
        </div>
    </section>


@endsection
