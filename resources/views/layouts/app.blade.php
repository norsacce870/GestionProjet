<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>@yield('title', 'Fédération Ivoirienne de Football')</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Merriweather:ital,wght@0,300;0,400;0,700;0,900;1,300;1,400;1,700;1,900&display=swap" rel="stylesheet">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.js"></script>
  <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />

  <style>
    *{
     font-family: 'Merriweather', serif;
    }

    .btn-hover-effect {
      transition: transform 0.3s ease, box-shadow 0.3s ease;
    }

    .btn-hover-effect:hover {
      transform: translateY(-3px);
      box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1);
    }

    .img-hover-effect {
      transition: transform 0.5s ease;
    }

    .img-hover-effect:hover {
      transform: scale(1.05);
    }
      .card-hover-effect {
      transition: all 0.3s ease;
    }

    .card-hover-effect:hover {
      transform: translateY(-5px);
      box-shadow: 0 15px 30px rgba(0, 0, 0, 0.1);
    }

    .pulse {
      animation: pulse 2s infinite;
    }

    @keyframes pulse {
      0% {
        transform: scale(1);
      }
      50% {
        transform: scale(1.05);
      }
      100% {
        transform: scale(1);
      }
    }

    [data-carousel-item] {
      transition: opacity 0.8s ease, transform 0.8s ease;
    }

    [data-carousel-item].hidden {
      opacity: 0;
      transform: translateX(20px);
    }

    [data-carousel-item].active {
      opacity: 1;
      transform: translateX(0);
    }

    .logo-hover {
      transition: transform 0.3s ease;
    }

    .logo-hover:hover {
      transform: rotate(10deg);
    }

    .nav-link {
      position: relative;
      transition: color 0.3s ease;
    }

    .nav-link::after {
      content: '';
      position: absolute;
      width: 0;
      height: 2px;
      bottom: -4px;
      left: 0;
      background-color: #ff5722;
      transition: width 0.3s ease;
    }

    .nav-link:hover::after {
      width: 100%;
    }

    .fade-in {
      animation: fadeIn 1s ease-in-out;
    }

    @keyframes fadeIn {
      from {
        opacity: 0;
        transform: translateY(20px);
      }
      to {
        opacity: 1;
        transform: translateY(0);
      }
    }
  </style>
</head>

<body class="font-sans text-[#1a1a1a]">

  <header class="border-b">
    <!-- Navigation desktop -->
    <div class="max-w-screen-xl mx-auto px-4 py-4 hidden md:flex justify-center items-center gap-8">
      <a href="#" class="text-[#ff5722] text-sm font-semibold nav-link">Accueil</a>
      <a href="#" class="text-sm nav-link">Evénements</a>
      <img src="{{ asset('LOGO.png') }}" alt="Logo" class="w-12 logo-hover" />
      <a href="#" class="text-sm nav-link">Pratique</a>
      <a href="#" class="text-sm nav-link">Contact</a>
    </div>

    <!-- Navigation mobile avec menu hamburger -->
    <div class="md:hidden">
      <div class="flex justify-between items-center px-4 py-3">
        <img src="{{ asset('LOGO.png') }}" alt="Logo" class="w-10 logo-hover" />
        <button id="mobile-menu-button" class="text-gray-700 focus:outline-none">
          <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
          </svg>
        </button>
      </div>

      <!-- Menu mobile (caché par défaut) -->
      <div id="mobile-menu" class="hidden px-4 py-2 bg-white border-t">
        <div class="flex flex-col space-y-3 pb-3">
          <a href="#" class="text-[#ff5722] text-sm font-semibold block py-2">Accueil</a>
          <a href="#" class="text-sm block py-2">Evénements</a>
          <a href="#" class="text-sm block py-2">Pratique</a>
          <a href="#" class="text-sm block py-2">Contact</a>
        </div>
      </div>
    </div>
  </header>

  <!-- Script pour le menu mobile -->
  <script>
    document.addEventListener('DOMContentLoaded', function() {
      const mobileMenuButton = document.getElementById('mobile-menu-button');
      const mobileMenu = document.getElementById('mobile-menu');

      mobileMenuButton.addEventListener('click', function() {
        mobileMenu.classList.toggle('hidden');
      });
    });
  </script>

  <main class="fade-in">
    @yield('content')
  </main>

  <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
  <script>
    AOS.init({
      duration: 800,
      easing: 'ease-in-out',
      once: true,
      offset: 100
    });
  </script>
</body>
</html>
