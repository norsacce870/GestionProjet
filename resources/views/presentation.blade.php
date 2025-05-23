<x-app-layout>
    <x-slot name="header">
        <div class="relative bg-cover bg-center h-[400px] shadow-inner shadow-black/20"
            style="background-image: url('{{ asset('federation.jpg') }}');">
            <div
                class="absolute inset-0 bg-gradient-to-r from-orange-500/60 to-purple-600/60 backdrop-blur-sm flex items-center justify-center">
                <h1
                    class="text-5xl md:text-6xl font-extrabold text-white drop-shadow-xl animate-fade-in-up transition-all duration-1000 delay-200">
                    Présentation de la Fédération
                </h1>
            </div>
        </div>
    </x-slot>

    <section
        class="bg-white dark:from-gray-900 dark:via-gray-800 dark:to-gray-900 py-24 overflow-hidden">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 space-y-32">

            <div class="text-center max-w-3xl mx-auto animate-fade-in-up">
                <h2 class="text-4xl md:text-5xl font-bold text-gray-800 dark:text-white">Bienvenue à la Fédération</h2>
                <p class="mt-6 text-lg text-gray-600 dark:text-gray-300 leading-relaxed">
                    Découvrez notre mission, nos activités et les valeurs qui nous animent au quotidien. Notre
                    engagement : faire rayonner notre communauté et porter ses ambitions.
                </p>
            </div>

            <div class="grid md:grid-cols-2 gap-16 items-center animate-fade-in-up">
                <div>
                    <h3 class="text-3xl font-extrabold text-orange-600">Nos missions</h3>
                    <ul class="mt-6 space-y-3 text-gray-700 dark:text-gray-300 text-lg leading-relaxed">
                        @foreach (['Encourager la pratique et le développement des disciplines sportives.', 'Représenter nos membres au niveau national et international.', 'Organiser des événements fédérateurs et inclusifs.', 'Favoriser l\'accès à tous, sans distinction.'] as $mission)
                            <li class="flex items-start gap-3">
                                <svg class="text-orange-500 w-6 h-6 mt-1 flex-shrink-0" fill="none"
                                    stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7" />
                                </svg>
                                {{ $mission }}
                            </li>
                        @endforeach
                    </ul>
                </div>
                <div>
                    <img src="{{ asset('mission.jpg') }}" alt="Missions"
                        class="rounded-3xl shadow-2xl w-full object-cover">
                </div>
            </div>

            <div class="grid md:grid-cols-2 gap-16 items-center animate-fade-in-up">
                <div class="md:order-2">
                    <h3 class="text-3xl font-extrabold text-orange-600">Nos activités</h3>
                    <ul class="mt-6 space-y-3 text-gray-700 dark:text-gray-300 text-lg leading-relaxed">
                        @foreach (['Compétitions sportives nationales et régionales.', 'Formations pour entraîneurs et arbitres.', 'Partenariats avec les établissements scolaires.', 'Actions citoyennes et solidaires.'] as $activite)
                            <li class="flex items-start gap-3">
                                <svg class="text-orange-500 w-6 h-6 mt-1 flex-shrink-0" fill="none"
                                    stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7" />
                                </svg>
                                {{ $activite }}
                            </li>
                        @endforeach
                    </ul>
                </div>
                <div class="md:order-1">
                    <img src="{{ asset('activites.jpg') }}" alt="Activités"
                        class="rounded-3xl shadow-2xl w-full object-cover">
                </div>
            </div>

            <div class="mt-24 grid grid-cols-1 md:grid-cols-3 gap-8 text-center">
                <div class="p-6 backdrop-blur-md bg-white/30 rounded-2xl border border-gray-200 shadow-lg">
                    <div class="flex justify-center mb-4">
                        <svg class="w-10 h-10 text-orange-600" fill="none" stroke="currentColor" stroke-width="2"
                            viewBox="0 0 24 24">
                            <path d="M13 16h-1v-4h-1m1-4h.01" />
                        </svg>
                    </div>
                    <h4 class="text-xl font-semibold text-gray-800">Respect</h4>
                    <p class="mt-2 text-gray-600">Chaque adversaire est un partenaire de jeu à honorer, sur et en dehors
                        de la piste.</p>
                </div>
                <div class="p-6 backdrop-blur-md bg-white/30 rounded-2xl border border-gray-200 shadow-lg">
                    <div class="flex justify-center mb-4">
                        <svg class="w-10 h-10 text-orange-600" fill="none" stroke="currentColor" stroke-width="2"
                            viewBox="0 0 24 24">
                            <path d="M5 13l4 4L19 7" />
                        </svg>
                    </div>
                    <h4 class="text-xl font-semibold text-gray-800">Excellence</h4>
                    <p class="mt-2 text-gray-600">Nous visons l’excellence dans la formation, la compétition et
                        l'organisation.</p>
                </div>
                <div class="p-6 backdrop-blur-md bg-white/30 rounded-2xl border border-gray-200 shadow-lg">
                    <div class="flex justify-center mb-4">
                        <svg class="w-10 h-10 text-orange-600" fill="none" stroke="currentColor" stroke-width="2"
                            viewBox="0 0 24 24">
                            <path d="M12 20l9-5-9-5-9 5 9 5z" />
                        </svg>
                    </div>
                    <h4 class="text-xl font-semibold text-gray-800">Ouverture</h4>
                    <p class="mt-2 text-gray-600">L’escrime est un sport pour tous, quels que soient l’âge ou l’origine.
                    </p>
                </div>
            </div>

            <!-- Chiffres-clés section -->
            <div class="mt-24 grid grid-cols-1 md:grid-cols-3 gap-12 text-center">
                <div>
                    <p class="text-4xl font-bold text-orange-600">+2500</p>
                    <p class="text-gray-600 mt-2">Licenciés actifs</p>
                </div>
                <div>
                    <p class="text-4xl font-bold text-orange-600">+120</p>
                    <p class="text-gray-600 mt-2">Clubs affiliés</p>
                </div>
                <div>
                    <p class="text-4xl font-bold text-orange-600">30+</p>
                    <p class="text-gray-600 mt-2">Compétitions annuelles</p>
                </div>
            </div>

            <div class="text-center animate-fade-in-up">
                <h4 class="text-2xl font-bold text-gray-800 dark:text-white mb-6">Vous voulez en savoir plus ?</h4>
                <a href="#contact"
                    class="inline-flex items-center gap-2 bg-orange-500 hover:bg-orange-600 text-white px-8 py-4 rounded-full font-bold shadow-xl shadow-orange-500/30 transition duration-300 hover:scale-105">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M21 8.5a2.5 2.5 0 00-5 0v7a2.5 2.5 0 005 0v-7zM3 8.5a2.5 2.5 0 015 0v7a2.5 2.5 0 01-5 0v-7zM9 4h6m-6 16h6" />
                    </svg>
                    Contactez-nous
                </a>
            </div>
        </div>
    </section>
    <section class="bg-white py-16 px-6">
        <div class="max-w-7xl mx-auto">
            <h2 class="text-3xl font-semibold text-gray-800 text-left">
                <span class="border-l-4 border-orange-600 pl-4">Nos Partenaires</span>
            </h2>

            <div id="partner-carousel" class="relative w-full mt-10" data-carousel="slide">

                <div class="relative h-32 overflow-hidden rounded-xl bg-gray-50 shadow-sm">

                    <div class="hidden duration-700 ease-in-out" data-carousel-item>
                        <div class="flex justify-around items-center flex-wrap gap-6 px-6 py-4">
                            <img src="{{ asset('FIFA-removebg-preview.png') }}" alt="FIFA"
                                class="h-16 object-contain grayscale hover:grayscale-0 transition duration-300" />
                            <img src="{{ asset('CAF-removebg-preview.png') }}" alt="CAF"
                                class="h-16 object-contain grayscale hover:grayscale-0 transition duration-300" />
                            <img src="{{ asset('3.png') }}" alt="Puma"
                                class="h-16 object-contain grayscale hover:grayscale-0 transition duration-300" />
                            <img src="{{ asset('CANAL-removebg-preview.png') }}" alt="Canal+"
                                class="h-16 object-contain grayscale hover:grayscale-0 transition duration-300" />
                        </div>
                    </div>




                    <button type="button"
                        class="absolute top-1/2 left-0 -translate-y-1/2 z-30 flex items-center justify-center p-2 bg-white rounded-full shadow-md hover:bg-orange-600 group"
                        data-carousel-prev>
                        <svg class="w-5 h-5 text-gray-700 group-hover:text-white" fill="none"
                            stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M15 19l-7-7 7-7" />
                        </svg>
                    </button>
                    <button type="button"
                        class="absolute top-1/2 right-0 -translate-y-1/2 z-30 flex items-center justify-center p-2 bg-white rounded-full shadow-md hover:bg-orange-600 group"
                        data-carousel-next>
                        <svg class="w-5 h-5 text-gray-700 group-hover:text-white" fill="none"
                            stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                        </svg>
                    </button>
                </div>
            </div>
    </section>


    <footer class="bg-black text-white pt-12 pb-8">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid md:grid-cols-3 gap-8 mb-12">
                <div>
                    <h4 class="text-xl font-bold mb-4">Découvrez notre boutique en ligne</h4>
                    <a href="#"
                        class="inline-block bg-orange-500 hover:bg-orange-600 text-black px-4 py-2 rounded-md font-semibold">Accéder
                        à la boutique</a>
                </div>
                <div>
                    <h4 class="text-xl font-bold mb-4">N'hésitez pas à nous contacter</h4>
                    <a href="#contact"
                        class="inline-block bg-orange-500 hover:bg-orange-600 text-black px-4 py-2 rounded-md font-semibold">Contactez-nous</a>
                </div>
                <div>
                    <h4 class="text-xl font-bold mb-4">Application officielle</h4>
                    <p class="mb-2 text-sm text-gray-400">Restez connecté avec notre actualité partout.</p>
                    <div class="flex gap-4">
                        <img src="{{ asset('appstore.png') }}" alt="App Store" class="h-10">
                        <img src="{{ asset('playstore.png') }}" alt="Play Store" class="h-10">
                    </div>
                </div>
            </div>

            <div class="border-t border-gray-700 pt-10 grid md:grid-cols-6 gap-8 text-sm">
                <div>
                    <h5 class="font-semibold text-orange-500 mb-2">CLUB</h5>
                    <ul class="space-y-1">
                        <li><a href="#">Présentation</a></li>
                        <li><a href="#">Organisation</a></li>
                        <li><a href="#">Légendes</a></li>
                        <li><a href="#">Palmarès</a></li>
                    </ul>
                </div>
                <div>
                    <h5 class="font-semibold text-orange-500 mb-2">DOCUMENTS</h5>
                    <ul class="space-y-1">
                        <li><a href="#">Statuts & règlement</a></li>
                        <li><a href="#">Cadre juridique</a></li>
                        <li><a href="#">Charte éthique</a></li>
                        <li><a href="#">Règlement AAFAM</a></li>
                        <li><a href="#">Charte MUR JAUNE</a></li>
                        <li><a href="#">Compte d’exploitation</a></li>
                    </ul>
                </div>
                <div>
                    <h5 class="font-semibold text-orange-500 mb-2">SAISON</h5>
                    <ul class="space-y-1">
                        <li><a href="#">Équipe pro</a></li>
                        <li><a href="#">Staff</a></li>
                        <li><a href="#">Calendrier</a></li>
                        <li><a href="#">Classement</a></li>
                    </ul>
                </div>
                <div>
                    <h5 class="font-semibold text-orange-500 mb-2">ACADÉMIE</h5>
                    <ul class="space-y-1">
                        <li><a href="#">Présentation</a></li>
                        <li><a href="#">Staff</a></li>
                        <li><a href="#">Recrutement</a></li>
                    </ul>
                </div>
                <div>
                    <h5 class="font-semibold text-orange-500 mb-2">MÉDIATHÈQUE</h5>
                    <ul class="space-y-1">
                        <li><a href="#">Photos</a></li>
                        <li><a href="#">Vidéos</a></li>
                    </ul>
                </div>
                <div>
                    <h5 class="font-semibold text-orange-500 mb-2">CONTACTS</h5>
                    <p class="mb-2 font-bold text-lg">(+225) 27 20 21 39 01</p>
                    <p class="text-gray-400">Abidjan – Riviera – M’Pouto Sol Béni<br>01 BP 2172 Abidjan 01</p>
                    <p class="mt-2">📧 info@asec.ci</p>
                    <div class="flex space-x-4 mt-4">
                        <a href="#"><i class="fab fa-facebook-f"></i></a>
                        <a href="#"><i class="fab fa-instagram"></i></a>
                        <a href="#"><i class="fab fa-twitter"></i></a>
                        <a href="#"><i class="fab fa-youtube"></i></a>
                        <a href="#"><i class="fab fa-tiktok"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </footer>

    <style>
        @keyframes fade-in-up {
            0% {
                opacity: 0;
                transform: translateY(30px);
            }

            100% {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .animate-fade-in-up {
            animation: fade-in-up 0.8s ease-out both;
        }
    </style>

</x-app-layout>
