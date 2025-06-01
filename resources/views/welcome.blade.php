@extends('layouts.header')

@section('title', 'Accueil - Fédération Ivoirienne de Football')

@section('content')
  <!-- Titre principal avec animation de fondu -->
  <section class="text-center mt-6 mb-6" data-aos="fade-down">
    <h1 class="text-2xl md:text-3xl lg:text-4xl font-bold leading-snug uppercase">
      Fédération Ivoirienne <br /> de Football
    </h1>
  </section>

  <!-- Carousel avec animation de fondu -->
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
            <h2 class="text-2xl md:text-3xl lg:text-4xl font-extrabold mb-2">UNE NOUVELLE ETOILE</h2>
            <p class="text-sm md:text-base">Lorem Ipsum is simply dummy text of the printing and typesetting industry...</p>
          </div>
        </div>
      </div>

      <!-- Slide 1 -->
      <div class="hidden duration-700 ease-in-out" data-carousel-item>
        <img src="{{ asset('ENTETE.png') }}"
          class="absolute block w-full h-full object-cover -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2"
          alt="Carousel image 1">
        <div class="absolute inset-0 bg-black bg-opacity-50 z-10"></div>
        <div class="absolute z-20 bottom-10 md:bottom-20 left-4 md:left-10 text-white max-w-xl px-2 md:px-0">
          <div class="border-l-4 border-orange-600 pl-4">
            <h2 class="text-2xl md:text-3xl lg:text-4xl font-extrabold mb-2">Titre du Slide 1</h2>
            <p class="text-sm md:text-base">Description pour le slide 1...</p>
          </div>
        </div>
      </div>

      <!-- Slide 2 -->
      <div class="hidden duration-700 ease-in-out" data-carousel-item>
        <img src="{{ asset('Rectangle 2 .png') }}"
          class="absolute block w-full h-full object-cover -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2"
          alt="Carousel image 2">
        <div class="absolute inset-0 bg-black bg-opacity-50 z-10"></div>
        <div class="absolute z-20 bottom-10 md:bottom-20 left-4 md:left-10 text-white max-w-xl px-2 md:px-0">
          <div class="border-l-4 border-orange-600 pl-4">
            <h2 class="text-2xl md:text-3xl lg:text-4xl font-extrabold mb-2">Titre du Slide 2</h2>
            <p class="text-sm md:text-base">Description pour le slide 2...</p>
          </div>
        </div>
      </div>

      <!-- Slide 3 -->
      <div class="hidden duration-700 ease-in-out" data-carousel-item>
        <img src="{{ asset('ENTETE (1).png') }}"
          class="absolute block w-full h-full object-cover -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2"
          alt="Carousel image 3">
        <div class="absolute inset-0 bg-black bg-opacity-50 z-10"></div>
        <div class="absolute z-20 bottom-10 md:bottom-20 left-4 md:left-10 text-white max-w-xl px-2 md:px-0">
          <div class="border-l-4 border-orange-600 pl-4">
            <h2 class="text-2xl md:text-3xl lg:text-4xl font-extrabold mb-2">Titre du Slide 3</h2>
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



  <section class="bg-white px-4 md:px-6 py-8 md:py-12">
    <div class="max-w-7xl mx-auto">
      <!-- Titre avec animation -->
      <h2 class="text-2xl md:text-3xl font-bold border-l-4 border-orange-600 pl-4 mb-6 md:mb-8" data-aos="fade-right">Notre Actualité</h2>

      <!-- Grille principale -->
      <div class="grid grid-cols-1 lg:grid-cols-4 gap-4 md:gap-6">
        <div class="lg:col-span-3 grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 lg:grid-rows-2 gap-4 md:gap-6">
          <div class="relative h-64 sm:h-full sm:col-span-2 lg:row-span-1 group overflow-hidden" data-aos="zoom-in" data-aos-delay="100">
            <div class="relative h-64 sm:h-full sm:col-span-2 lg:row-span-1">
                <img src="{{ asset('3f2bde62b0a5e7535808a56d8987c0e80ba5e8e7.png') }}" alt="Generation 2015" class="w-full h-full object-cover rounded transition-transform duration-300 group-hover:scale-110">
                <div class="absolute inset-0 bg-black/0 group-hover:bg-black/60 transition-all duration-300"></div>
                <div class="absolute bottom-0 w-full p-4 text-white">
                  <span class="border-l-4 border-orange-600 pl-2 text-base md:text-lg font-semibold">Generation 2015</span>
                  <p class="mt-2 text-sm font-normal max-h-0 group-hover:max-h-40 opacity-0 group-hover:opacity-100 transition-all duration-300 overflow-hidden">
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam in vestibulum tortor, vitae venenatis lectus. Praesent gravida dapibus neque sit amet molestie. Morbi blandit eu dolor a luctus.
                  </p>
                </div>
              </div>
          </div>

          <!-- Bloc 2 avec animation -->
          <div class="relative h-64 sm:h-full group overflow-hidden" data-aos="zoom-in" data-aos-delay="200">
            <img src="{{ asset('d74405acd139a311e36ce94a2af09e3b25b2d73c.png') }}" alt="Le Nouveau Drogba" class="w-full h-full object-cover rounded transition-transform duration-300 group-hover:scale-110">
            <div class="absolute inset-0 bg-black/0 group-hover:bg-black/60 transition-all duration-300"></div>
            <div class="absolute bottom-0 w-full p-4 text-white">
              <span class="border-l-4 border-orange-600 pl-2 text-base md:text-lg font-semibold">Le Nouveau Drogba</span>
              <p class="mt-2 text-sm font-normal max-h-0 group-hover:max-h-40 opacity-0 group-hover:opacity-100 transition-all duration-300 overflow-hidden">
                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus lacinia odio vitae vestibulum vestibulum. Cras porttitor metus justo, vitae fringilla nibh.
              </p>
            </div>
          </div>

          <!-- Bloc 3 avec animation -->
          <div class="relative h-64 sm:h-full group overflow-hidden" data-aos="zoom-in" data-aos-delay="300">
            <img src="{{ asset('17.png') }}" alt="3 Etoiles" class="w-full h-full object-cover rounded transition-transform duration-300 group-hover:scale-110">
            <!-- Overlay sombre qui apparaît au survol -->
            <div class="absolute inset-0 bg-black/0 group-hover:bg-black/60 transition-all duration-300"></div>
            <!-- Titre et texte -->
            <div class="absolute bottom-0 w-full p-4 text-white">
              <span class="border-l-4 border-orange-600 pl-2 text-base md:text-lg font-semibold">3 Etoiles</span>
              <!-- Texte Lorem qui apparaît au survol -->
              <p class="mt-2 text-sm font-normal max-h-0 group-hover:max-h-40 opacity-0 group-hover:opacity-100 transition-all duration-300 overflow-hidden">
                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec euismod, nisl eget consectetur tempor, nisl nunc ultrices eros, eu porttitor est nisl nec eros.
              </p>
            </div>
          </div>

          <!-- Bloc 4 avec animation -->
          <div class="relative h-64 sm:h-full sm:col-span-2 lg:row-span-1 group overflow-hidden" data-aos="zoom-in" data-aos-delay="400">
            <img src="{{ asset('18.png') }}" alt="La liste des Elephants" class="w-full h-full object-cover rounded transition-transform duration-300 group-hover:scale-110">
            <!-- Overlay sombre qui apparaît au survol -->
            <div class="absolute inset-0 bg-black/0 group-hover:bg-black/60 transition-all duration-300"></div>
            <!-- Titre et texte -->
            <div class="absolute bottom-0 w-full p-4 text-white">
              <span class="border-l-4 border-orange-600 pl-2 text-base md:text-lg font-semibold">La liste des Elephants</span>
              <!-- Texte Lorem qui apparaît au survol -->
              <p class="mt-2 text-sm font-normal max-h-0 group-hover:max-h-40 opacity-0 group-hover:opacity-100 transition-all duration-300 overflow-hidden">
                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas non laoreet odio. Fusce lobortis porttitor purus, vel vestibulum libero pharetra vel.
              </p>
            </div>
          </div>
        </div>

        <!-- Colonne latérale Actualités avec animation adaptée à la maquette -->
<div class="bg-gradient-to-br from-gray-50 to-gray-100 p-4 md:p-6 rounded-lg shadow-lg h-auto lg:h-[900px] mt-6 lg:mt-0" data-aos="fade-left" data-aos-delay="500">
  <h3 class="text-xl font-bold border-b-2 border-orange-600 pb-2 mb-6 text-gray-800">Actualités</h3>

  <!-- Liste des actualités -->
  <ul class="space-y-16">
    <li class="flex items-center justify-between">
      <div class="text-sm font-medium text-gray-800 max-w-[70%]">
        Lorem Ipsum is simply dummy
      </div>
      <img src="{{ asset('a.png') }}" alt="Actu 1" class="w-20 h-20 object-cover rounded-md shadow">
    </li>
    <li class="flex items-center justify-between">
      <div class="text-sm font-medium text-gray-800 max-w-[70%]">
        Lorem Ipsum is simply dummy
      </div>
      <img src="{{ asset('b.png') }}" alt="Actu 2" class="w-20 h-20 object-cover rounded-md shadow">
    </li>
    <li class="flex items-center justify-between">
      <div class="text-sm font-medium text-gray-800 max-w-[70%]">
        Lorem Ipsum is simply dummy
      </div>
      <img src="{{ asset('c.png') }}"alt="Actu 3" class="w-20 h-20 object-cover rounded-md shadow">
    </li>
    <li class="flex items-center justify-between">
      <div class="text-sm font-medium text-gray-800 max-w-[70%]">
        Lorem Ipsum is simply dummy
      </div>
      <img src="{{ asset('d.png') }}"alt="Actu 4" class="w-20 h-20 object-cover rounded-md shadow">
    </li>
  </ul>

  <h3 class="text-xl font-bold border-b-2 border-orange-600 pb-2 mb-6 mt-20 text-gray-800">Actualités</h3>
  <!-- Bouton en bas -->
  <div class="mt-8 text-center">
    <a href="#" class="bg-orange-600 hover:bg-orange-700 text-white px-6 py-2 text-sm rounded shadow transition">
      Voir Toutes les Actualités
    </a>
  </div>
</div>

      </div>
    </div>
  </section>

  <section class="relative w-full h-[400px]">
    <img src="{{ asset('rectangle 1.png') }}" alt="Boutique Officielle"
         class="absolute inset-0 w-full h-full object-cover z-0">
    <div class="absolute inset-0 bg-black bg-opacity-40 z-10"></div>
      <div class="relative z-20 max-w-7xl mx-auto h-full flex items-center px-6">
      <div class="text-white max-w-xl">
        <h2 class="text-3xl font-semibold mb-4">Accéder à la Boutique Officielle</h2>
        <p class="text-sm mb-6 leading-relaxed">
          Lorem Ipsum is simply dummy text of the printing and typesetting industry.
          Lorem Ipsum has been the industry's standard dummy text ever since the 1500s.
        </p>
        <a href="#" class="bg-orange-600 text-white font-semibold px-6 py-2 shadow-md hover:bg-orange-700 transition">
          Voir Plus
        </a>
      </div>
    </div>
  </section>


  <div class="container mx-auto p-10 max-w-7xl" data-aos="fade-up">

    <div class="flex justify-center mb-8" data-aos="fade-down">
        <h2 class="text-2xl md:text-3xl font-bold border-l-4 border-orange-600 pl-4 text-center">Notre effectif</h2>
      </div>

        <div class="swiper mySwiper">
            <div class="swiper-wrapper" >

                <div class="swiper-slide">
                    <img src="{{asset('doue.png')}}" class="carousel-img">
                </div>


                <div class="swiper-slide">
                    <img src="{{asset('kessie.png')}}" class="carousel-img">
                </div>


                <div class="swiper-slide">
                    <img src="{{asset('simon.png')}}" class="carousel-img">
                </div>


                <div class="swiper-slide">
                    <img src="{{asset('fae.png')}}" class="carousel-img">
                </div>


                <div class="swiper-slide">
                    <img src="{{asset('yaya.png')}}" class="carousel-img">
                </div>

            </div>


            <div class="swiper-button-next border border-red-700 rounded-full p-8 text-white  hover-text-white hover:bg-red-700 duration-500"></div>
            <div class="swiper-button-prev border border-red-700 rounded-full p-8 text-white hover-text-white hover:bg-red-700 duration-500"></div>
        </div>
    </div>


  <!-- Section "Contactez Nous" avec animation -->



<section class="bg-cover bg-center text-white py-12 px-6 md:px-20" style="background-image: url('14.png');">
  <h2 class="text-3xl md:text-4xl font-bold mb-8 border-l-4 border-orange-500 pl-4 backdrop-blur-sm bg-green-900/40 inline-block">
    Retrouvez Nos Meilleurs Moments
  </h2>

  <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6">
    <!-- Vidéo 1 -->
    <div class="relative aspect-video">
      <iframe class="w-full h-full rounded shadow-md"
              src="https://www.youtube.com/embed/uUOZWmhs4EE"
              title="YouTube video"
              frameborder="0"
              allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
              allowfullscreen></iframe>
    </div>

    <!-- Vidéo 2 -->
    <div class="relative aspect-video">
      <iframe class="w-full h-full rounded shadow-md"
              src="https://www.youtube.com/embed/wYtJ0XVbFC8"
              title="YouTube video"
              frameborder="0"
              allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
              allowfullscreen></iframe>
    </div>

    <!-- Vidéo 3 -->
    <div class="relative aspect-video">
      <iframe class="w-full h-full rounded shadow-md"
              src="https://www.youtube.com/embed/SldWlrg8ogo"
              title="YouTube video"
              frameborder="0"
              allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
              allowfullscreen></iframe>
    </div>
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

    <button type="button" class="absolute top-0 left-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none" data-carousel-prev>
      <span class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-white/80 group-hover:bg-white dark:bg-gray-800/80 dark:group-hover:bg-gray-800">
        <svg class="w-6 h-6 text-gray-800 dark:text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
        </svg>
      </span>
    </button>
    <button type="button" class="absolute top-0 right-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none" data-carousel-next>
      <span class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-white/80 group-hover:bg-white dark:bg-gray-800/80 dark:group-hover:bg-gray-800">
        <svg class="w-6 h-6 text-gray-800 dark:text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
        </svg>
      </span>
    </button>
  </div>
</section>


@endsection
