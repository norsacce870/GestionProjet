@extends('layouts.header')

@section('content')
    <!-- Alpine.js pour le carrousel -->
    <script src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js" defer></script>

    <!-- CARROUSEL -->
 <section data-aos="fade-up" data-aos-delay="200">
  <div class="max-w-7xl mx-auto" data-carousel="slide">
    <div class="relative h-[400px] md:h-[500px] lg:h-[600px] overflow-hidden rounded-lg">
      <!-- Active slide -->
      <div class="duration-700 ease-in-out" data-carousel-item="active">
        <img src="{{ asset('rectangle.png') }}"
          class="absolute block w-full h-full object-cover -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2"
          alt="Équipe nationale de football de Côte d'Ivoire">
        <div class="absolute inset-0 bg-black bg-opacity-50 z-10"></div>
        <div class="absolute z-20 bottom-10 md:bottom-20 left-4 md:left-10 text-white max-w-xl px-2 md:px-0">
          <div class="border-l-4 border-orange-600 pl-4">
            <h2 class="text-2xl md:text-3xl lg:text-4xl font-extrabold mb-2">Les légendes du football ivoirien</h2>
            <p class="text-sm md:text-base">Lorem Ipsum is simply dummy text of the printing and typesetting industry...</p>
          </div>
        </div>
      </div>

      <!-- Slide 1 -->
      <div class="hidden duration-700 ease-in-out" data-carousel-item>
        <img src="{{ asset('abo.jpg') }}"
          class="absolute block w-full h-full object-cover -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2"
          alt="Carousel image 1">
        <div class="absolute inset-0 bg-black bg-opacity-50 z-10"></div>
        <div class="absolute z-20 bottom-10 md:bottom-20 left-4 md:left-10 text-white max-w-xl px-2 md:px-0">
          <div class="border-l-4 border-orange-600 pl-4">
            <h2 class="text-2xl md:text-3xl lg:text-4xl font-extrabold mb-2">Les légendes du football ivoirien</h2>
            <p class="text-sm md:text-base">Description pour le slide 1...</p>
          </div>
        </div>
      </div>

      <!-- Slide 2 -->
      <div class="hidden duration-700 ease-in-out" data-carousel-item>
        <img src="{{ asset('G2 (2).jpg') }}"
          class="absolute block w-full h-full object-cover -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2"
          alt="Carousel image 2">
        <div class="absolute inset-0 bg-black bg-opacity-50 z-10"></div>
        <div class="absolute z-20 bottom-10 md:bottom-20 left-4 md:left-10 text-white max-w-xl px-2 md:px-0">
          <div class="border-l-4 border-orange-600 pl-4">
            <h2 class="text-2xl md:text-3xl lg:text-4xl font-extrabold mb-2">Les légendes du football ivoirien</h2>
            <p class="text-sm md:text-base">Description pour le slide 2...</p>
          </div>
        </div>
      </div>

      <!-- Slide 3 -->
      <div class="hidden duration-700 ease-in-out" data-carousel-item>
        <img src="{{ asset('0102.jpeg') }}"
          class="absolute block w-full h-full object-cover -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2"
          alt="Carousel image 3">
        <div class="absolute inset-0 bg-black bg-opacity-50 z-10"></div>
        <div class="absolute z-20 bottom-10 md:bottom-20 left-4 md:left-10 text-white max-w-xl px-2 md:px-0">
          <div class="border-l-4 border-orange-600 pl-4">
            <h2 class="text-2xl md:text-3xl lg:text-4xl font-extrabold mb-2">Les légendes du football ivoirien</h2>
            <p class="text-sm md:text-base">Description pour le slide 3...</p>
          </div>
        </div>
      </div>

      <!-- Indicators -->
      <div class="absolute z-30 flex space-x-3 -translate-x-1/2 bottom-5 left-1/2">
        @for ($i = 0; $i < 4; $i++)
          <button type="button"
            class="w-2 h-2 md:w-3 md:h-3 rounded-full {{ $i === 0 ? 'bg-white' : 'bg-white/50' }}"
            aria-current="{{ $i === 0 ? 'true' : 'false' }}"
            aria-label="Slide {{ $i + 1 }}"
            data-carousel-slide-to="{{ $i }}">
          </button>
        @endfor
      </div>

      <!-- Controls -->
      <button type="button"
        class="absolute top-0 left-0 z-30 flex items-center justify-center h-full px-2 md:px-4 cursor-pointer group focus:outline-none"
        data-carousel-prev>
        <span class="inline-flex items-center justify-center w-8 h-8 md:w-10 md:h-10 rounded-full bg-white/30 group-hover:bg-white/50 transition-all duration-300">
          <svg class="w-3 h-3 md:w-4 md:h-4 text-white" fill="none" viewBox="0 0 6 10">
            <path stroke="currentColor" stroke-linecap="round" stroke-width="2" d="M5 1 1 5l4 4"/>
          </svg>
          <span class="sr-only">Previous</span>
        </span>
      </button>
      <button type="button"
        class="absolute top-0 right-0 z-30 flex items-center justify-center h-full px-2 md:px-4 cursor-pointer group focus:outline-none"
        data-carousel-next>
        <span class="inline-flex items-center justify-center w-8 h-8 md:w-10 md:h-10 rounded-full bg-white/30 group-hover:bg-white/50 transition-all duration-300">
          <svg class="w-3 h-3 md:w-4 md:h-4 text-white" fill="none" viewBox="0 0 6 10">
            <path stroke="currentColor" stroke-linecap="round" stroke-width="2" d="m1 9 4-4-4-4"/>
          </svg>
          <span class="sr-only">Next</span>
        </span>
      </button>
    </div>
  </div>
</section>

    <!-- SECTION HISTORIQUE -->
    <section class="bg-white py-16">
        <div class="max-w-4xl mx-auto px-4">
            <h2 class="text-3xl font-bold mb-6 text-center">Un héritage glorieux</h2>
            <p class="text-gray-700 text-lg leading-relaxed text-center">
                La Côte d'Ivoire a toujours été une nation phare du football africain.
                Grâce à ses talents inégalés, ses exploits continentaux et ses joueurs emblématiques,
                elle a marqué l'histoire du sport roi sur le continent.
            </p>
        </div>
    </section>

    <!-- SECTION LEGENDES -->
    <section class="bg-gray-100 py-16">
        <div class="max-w-6xl mx-auto px-4 text-center">
            <h2 class="text-3xl font-bold mb-10">Nos icônes inoubliables</h2>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <!-- Légende 1 -->
                <div class="bg-white rounded-lg shadow p-4">
                    <img src="{{ asset('Didier drogba.jpg') }}" alt="Drogba"
                        class="rounded-lg w-full h-60 object-cover mb-4">
                    <h3 class="text-xl font-semibold">Didier Drogba</h3>
                    <p class="text-gray-600 text-sm">Capitaine emblématique, buteur légendaire des Éléphants.</p>
                </div>

                <!-- Légende 2 -->
                <div class="bg-white rounded-lg shadow p-4">
                    <img src="{{ asset('yaya toure.jpg') }}" alt="Yaya Touré"
                        class="rounded-lg w-full h-60 object-cover mb-4">
                    <h3 class="text-xl font-semibold">Yaya Touré</h3>
                    <p class="text-gray-600 text-sm">Maestro du milieu, 4 fois Ballon d'Or africain.</p>
                </div>

                <!-- Légende 3 -->
                <div class="bg-white rounded-lg shadow p-4">
                    <img src="{{ asset('kolo toure.jpg') }}" alt="Kolo Touré"
                        class="rounded-lg w-full h-60 object-cover mb-4">
                    <h3 class="text-xl font-semibold">Kolo Touré</h3>
                    <p class="text-gray-600 text-sm">Mur défensif, pilier de la génération dorée.</p>
                </div>
            </div>
        </div>
    </section>

    <section class="w-full max-w-6xl mx-auto py-10" x-data="{ tab: 'entraineurs' }">
        <!-- Onglets -->
        <div class="flex justify-center mb-6">
            <button @click="tab = 'entraineurs'"
                :class="tab === 'entraineurs' ? 'bg-orange-500 text-white' : 'bg-white border'"
                class="px-4 py-2 font-semibold">Entraîneur</button>
            <button @click="tab = 'joueurs'" :class="tab === 'joueurs' ? 'bg-gray-200 font-semibold' : 'bg-white border'"
                class="px-4 py-2">Joueur</button>
            <button @click="tab = 'presidents'"
                :class="tab === 'presidents' ? 'bg-green-500 text-white' : 'bg-white border'"
                class="px-4 py-2 font-semibold">Présidents</button>
        </div>

        <!-- Contenus Entraîneurs -->
        <div x-show="tab === 'entraineurs'" class="space-y-4">
            <div x-data="{ open: false }"
                class="bg-gray-100 rounded p-4 w-full cursor-pointer hover:bg-orange-500 transition" @click="open = !open">
                <div class="flex items-center">
                    <img src="{{ asset('G2 (3).jpg') }}" class="w-16 h-16 object-cover rounded mr-4" alt="...">
                    <span class="text-lg font-medium flex-grow">HERVE RENARD</span>
                    <span class="text-sm text-gray-600 ml-4 whitespace-nowrap">01/07/2014 – 31/12/2015</span>
                </div>
                <div x-show="open" x-transition class="mt-3 text-sm text-gray-700">
                    Hervé Renard a dirigé l'équipe avec discipline et engagement durant cette période.
                </div>
            </div>
            <div x-data="{ open: false }" class="bg-gray-100 rounded p-4 w-full cursor-pointer hover:bg-gray-200 transition"
                @click="open = !open">
                <div class="flex items-center">
                    <img src="{{ asset('12.png') }}" class="w-16 h-16 object-cover rounded mr-4" alt="...">
                    <span class="text-lg font-medium flex-grow">ERMESSE FAE</span>
                    <span class="text-sm text-gray-600 ml-4 whitespace-nowrap">En fonction depuis 2024</span>
                </div>
                <div x-show="open" x-transition class="mt-3 text-sm text-gray-700">
                    Emerse Faé, né le 24 janvier 1984 à Nantes, est un footballeur international ivoirien jouant au poste de
                    milieu relayeur, reconverti par la suite entraîneur de football. Il est l'actuel sélectionneur de
                    l'équipe nationale de la Côte d'Ivoire .
                </div>
            </div>
        </div>

        <!-- Contenus Joueurs -->
        <div x-show="tab === 'joueurs'" class="space-y-4" x-cloak>
            <div x-data="{ open: false }" class="bg-gray-100 rounded p-4 w-full cursor-pointer hover:bg-gray-200 transition"
                @click="open = !open">
                <div class="flex items-center">
                    <img src="{{ asset('Gerver.jpg') }}" class="w-16 h-16 object-cover rounded mr-4" alt="...">
                    <span class="text-lg font-medium flex-grow">GERVINHO</span>
                    <span class="text-sm text-gray-600 ml-4 whitespace-nowrap">01/10/2007 – 01/01/2018</span>
                </div>
                <div x-show="open" x-transition class="mt-3 text-sm text-gray-700">
                    Rapide et imprévisible, il a souvent été la clé des offensives ivoiriennes lors des grandes
                    compétitions.
                </div>
            </div>
            <div x-data="{ open: false }"
                class="bg-gray-100 rounded p-4 w-full cursor-pointer hover:bg-gray-200 transition" @click="open = !open">
                <div class="flex items-center">
                    <img src="{{ asset('Baki.jpg') }}" class="w-16 h-16 object-cover rounded mr-4" alt="...">
                    <span class="text-lg font-medium flex-grow">BAKI KONE</span>
                    <span class="text-sm text-gray-600 ml-4 whitespace-nowrap">01/10/1995 – 01/01/2006</span>
                </div>
                <div x-show="open" x-transition class="mt-3 text-sm text-gray-700">
                    Bakari Koné, dit « Baky », né le 17 septembre 1981 à Abidjan en Côte d'Ivoire, est un footballeur
                    international ivoirien évoluant au poste d'attaquant
                </div>
            </div>
            <div x-data="{ open: false }"
                class="bg-gray-100 rounded p-4 w-full cursor-pointer hover:bg-gray-200 transition" @click="open = !open">
                <div class="flex items-center">
                    <img src="{{ asset('yaya toure.jpg') }}" class="w-16 h-16 object-cover rounded mr-4" alt="...">
                    <span class="text-lg font-medium flex-grow">YAYA TOURE</span>
                    <span class="text-sm text-gray-600 ml-4 whitespace-nowrap">01/10/2006 – 01/01/2015</span>
                </div>
                <div x-show="open" x-transition class="mt-3 text-sm text-gray-700">
                    Maestro du milieu, 4 fois Ballon d'Or africain.
                </div>
            </div>
            <div x-data="{ open: false }"
                class="bg-gray-100 rounded p-4 w-full cursor-pointer hover:bg-gray-200 transition" @click="open = !open">
                <div class="flex items-center">
                    <img src="{{ asset('Didier drogba.jpg') }}" class="w-16 h-16 object-cover rounded mr-4"
                        alt="...">
                    <span class="text-lg font-medium flex-grow">DIDIER DROGBA</span>
                    <span class="text-sm text-gray-600 ml-4 whitespace-nowrap">01/10/2006 – 01/01/2012</span>
                </div>
                <div x-show="open" x-transition class="mt-3 text-sm text-gray-700">
                    Capitaine emblématique, buteur légendaire des Éléphants, il a empecher une guerre dans son pays.
                </div>
            </div>
        </div>

        <!-- Contenus Présidents -->
        <div x-show="tab === 'presidents'" class="space-y-4" x-cloak>

            <div x-data="{ open: false }"
                class="bg-gray-100 rounded p-4 w-full cursor-pointer hover:bg-orange-500 transition"
                @click="open = !open">
                <div class="flex items-center">
                    <img src="{{ asset('idriss Diallo.jpg') }}" class="w-16 h-16 object-cover rounded mr-4"
                        alt="...">
                    <span class="text-lg font-medium flex-grow">IDRIS DIALLO</span>
                    <span class="text-sm text-gray-600 ml-4 whitespace-nowrap">En fonction depuis 2022</span>
                </div>
                <div x-show="open" x-transition class="mt-3 text-sm text-gray-700">
                    Il a poursuivi ses actions en faveur de la jeunesse et de la formation continue.
                </div>
            </div>
            <div x-data="{ open: false }"
                class="bg-gray-100 rounded p-4 w-full cursor-pointer hover:bg-gray-200 transition" @click="open = !open">
                <div class="flex items-center">
                    <img src="{{ asset('sidy.jpg') }}" class="w-16 h-16 object-cover rounded mr-4" alt="...">
                    <span class="text-lg font-medium flex-grow">AUGUSTIN SIDY DIALLO</span>
                    <span class="text-sm text-gray-600 ml-4 whitespace-nowrap">2011 – 2020</span>
                </div>
                <div x-show="open" x-transition class="mt-3 text-sm text-gray-700">
                    Sous sa présidence, la Côte d’Ivoire a remporté la CAN 2015. Il était connu pour son calme et son
                    engagement profond.
                </div>
            </div>
            <div x-data="{ open: false }"
                class="bg-gray-100 rounded p-4 w-full cursor-pointer hover:bg-green-500 transition" @click="open = !open">
                <div class="flex items-center">
                    <img src="{{ asset('jacques.jpg') }}" class="w-16 h-16 object-cover rounded mr-4" alt="...">
                    <span class="text-lg font-medium flex-grow">JACQUES ANOUMA</span>
                    <span class="text-sm text-gray-600 ml-4 whitespace-nowrap">2002 – 2011 </span>
                </div>
                <div x-show="open" x-transition class="mt-3 text-sm text-gray-700">
                    Premier président ivoirien membre du Comité exécutif de la FIFA, il a apporté une vision internationale
                    au football ivoirien.
                </div>
            </div>
        </div>
    </section>



    <!-- SECTION HISTORIQUE -->
    <section class="bg-gray-100 py-16">
        <div class="max-w-4xl mx-auto px-4">
            <h2 class="text-3xl font-bold mb-6 text-center">Un héritage glorieux</h2>
            <p class="text-gray-700 text-lg leading-relaxed text-center">
                C’est dans les années 1960, peu après l’indépendance de la Côte d’Ivoire, que naît la sélection nationale de
                football : Les Éléphants.
                Rassemblant les meilleurs talents du pays, elle devient rapidement un symbole d’unité, de fierté et d’espoir
                pour toute une nation.

                Les premiers joueurs étaient issus des quartiers populaires, des écoles militaires, ou encore des clubs
                mythiques comme l’ASEC Mimosas ou le Stade d’Abidjan.
                Ils n’avaient parfois que des crampons usés et des ballons rafistolés, mais portaient haut le rêve d’un
                peuple tout entier.

                Des générations se sont succédé, des hommes comme Laurent Pokou, Didier Drogba, Yaya Touré, ou Zokora
                Maestro, ont écrit l’histoire avec passion, sueur et talent.
                Ils ont porté les couleurs orange, blanc et vert sur tous les continents, jusqu'à offrir deux étoiles de
                champion d’Afrique à leur pays (1992 & 2015).

                Aujourd’hui encore, chaque appel en sélection est un honneur, chaque match un devoir envers les anciens,
                envers le peuple, et envers l’Afrique.
                Les Éléphants ne sont pas qu’une équipe. Ce sont les légendes vivantes d’un rêve collectif, bâti sur la
                détermination, le talent, et l’amour du pays.
            </p>
        </div>
    </section>
@endsection
