<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>@yield('title', 'Fédération Ivoirienne de Football')</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
    <script>
        // On page load or when changing themes, best to add inline in `head` to avoid FOUC
        if (localStorage.getItem('color-theme') === 'dark' || (!('color-theme' in localStorage) && window.matchMedia(
                '(prefers-color-scheme: dark)').matches)) {
            document.documentElement.classList.add('dark');
        } else {
            document.documentElement.classList.remove('dark')
        }
    </script>

    <link
        href="https://fonts.googleapis.com/css2?family=Merriweather:ital,wght@0,300;0,400;0,700;0,900;1,300;1,400;1,700;1,900&display=swap"
        rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.js"></script>
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />

    <style>
        * {
            font-family: 'Merriweather', serif;
        }

        #carousel-wrapper {
            display: flex;
            transition: transform 1s ease-in-out;
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
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                        xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 6h16M4 12h16M4 18h16"></path>
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
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
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
                            <a href="{{ url('/') }}" class="text-white hover:underline">Accueil</a>
                        </div>
                        <div class="font-semibold">
                            <span class="text-orange-600">&gt;</span>
                            <a href="{{ route('presentation') }}" class="text-white hover:underline">Présentation</a>
                        </div>
                        <div class="font-semibold">
                            <span class="text-orange-600">&gt;</span>
                            <a href="#" class="text-white hover:underline">Événements</a>
                        </div>
                        <div class="font-semibold">
                            <span class="text-orange-600">&gt;</span>
                            <a href="#" class="text-white hover:underline">Pratiquer</a>
                        </div>
                        <div class="font-semibold">
                            <span class="text-orange-600">&gt;</span>
                            <a href="#" class="text-white hover:underline">Contact</a>
                        </div>
                    </div>


                    <!-- Partenaires -->
                    <div class="mb-6 md:mb-0">
                        <h3 class="text-xl font-semibold mb-4">Partenaires</h3>
                        <div class="font-semibold">
                            <span class="text-orange-600">&gt;</span>
                            <a href="https://www.puma.com" target="_blank" class="text-white hover:underline">Puma</a>
                        </div>
                        <div class="font-semibold">
                            <span class="text-orange-600">&gt;</span>
                            <a href="https://gestoci.ci" target="_blank" class="text-white hover:underline">Gestoci</a>
                        </div>
                        <div class="font-semibold">
                            <span class="text-orange-600">&gt;</span>
                            <a href="https://www.rti.ci" target="_blank" class="text-white hover:underline">RTI</a>
                        </div>
                        <div class="font-semibold">
                            <span class="text-orange-600">&gt;</span>
                            <a href="https://www.fifa.com" target="_blank" class="text-white hover:underline">FIFA</a>
                        </div>
                    </div>


                    <div>
                        <h3 class="text-xl font-semibold mb-4">Contact</h3>
                        <div class="font-semibold">
                            <span class="text-orange-600">&gt;</span>
                            <a href="" class="text-white">>fifci@aviso.ci</a>
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
                    <a href="https://www.instagram.com/fif.ci/" target="_blank" class="text-white hover:text-orange-500 transition-colors">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="currentColor"
                            viewBox="0 0 24 24">
                            <path
                                d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163c0-3.403-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z" />
                        </svg>
                    </a>

                    <!-- YouTube -->
                    <a href="https://www.youtube.com/@fifci" target="_blank" class="text-white hover:text-orange-500 transition-colors">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="currentColor"
                            viewBox="0 0 24 24">
                            <path
                                d="M19.615 3.184c-3.604-.246-11.631-.245-15.23 0-3.897.266-4.356 2.62-4.385 8.816.029 6.185.484 8.549 4.385 8.816 3.6.245 11.626.246 15.23 0 3.897-.266 4.356-2.62 4.385-8.816-.029-6.185-.484-8.549-4.385-8.816zm-10.615 12.816v-8l8 3.993-8 4.007z" />
                        </svg>
                    </a>

                    <!-- Facebook -->
                    <a href="https://www.facebook.com/federationivoiriennedefootball" target="_blank" class="text-white hover:text-orange-500 transition-colors">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="currentColor"
                            viewBox="0 0 24 24">
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

    <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
    <script>
        AOS.init({
            duration: 800,
            easing: 'ease-in-out',
            once: true,
            offset: 100
        });
    </script>
    <script>
        const wrapper = document.getElementById("carousel-wrapper");
        const prevBtn = document.getElementById("prev");
        const nextBtn = document.getElementById("next");
        let index = 0;
        const totalSlides = wrapper.children.length;

        function updateCarousel() {
            wrapper.style.transition = "transform 1s ease-in-out";
            wrapper.style.transform = `translateX(-${index * 100}%)`;
        }

        nextBtn.addEventListener("click", () => {
            index = (index + 1) % totalSlides;
            updateCarousel();
        });

        prevBtn.addEventListener("click", () => {
            index = (index - 1 + totalSlides) % totalSlides;
            updateCarousel();
        });


        setInterval(() => {
            index = (index + 1) % totalSlides;
            updateCarousel();
        }, 30000);
    </script>
    <script>
        var swiper = new Swiper(".mySwiper", {
            effect: "coverflow",
            grabCursor: true,
            centeredSlides: true,
            slidesPerView: 3,
            loop: true,
            speed: 1200,
            coverflowEffect: {
                rotate: 0,
                stretch: -100,
                depth: 300,
                modifier: 1,
                slideShadows: false,
            },
            autoplay: {
                delay: 5000,
                disableOnInteraction: false,
            },
            navigation: {
                nextEl: ".swiper-button-next",
                prevEl: ".swiper-button-prev",
            },
        });
    </script>
    <script>
        var themeToggleDarkIcon = document.getElementById('theme-toggle-dark-icon');
        var themeToggleLightIcon = document.getElementById('theme-toggle-light-icon');

        // Change the icons inside the button based on previous settings
        if (localStorage.getItem('color-theme') === 'dark' || (!('color-theme' in localStorage) && window.matchMedia(
                '(prefers-color-scheme: dark)').matches)) {
            themeToggleLightIcon.classList.remove('hidden');
        } else {
            themeToggleDarkIcon.classList.remove('hidden');
        }

        var themeToggleBtn = document.getElementById('theme-toggle');

        themeToggleBtn.addEventListener('click', function() {

            // toggle icons inside button
            themeToggleDarkIcon.classList.toggle('hidden');
            themeToggleLightIcon.classList.toggle('hidden');

            // if set via local storage previously
            if (localStorage.getItem('color-theme')) {
                if (localStorage.getItem('color-theme') === 'light') {
                    document.documentElement.classList.add('dark');
                    localStorage.setItem('color-theme', 'dark');
                } else {
                    document.documentElement.classList.remove('dark');
                    localStorage.setItem('color-theme', 'light');
                }

                // if NOT set via local storage previously
            } else {
                if (document.documentElement.classList.contains('dark')) {
                    document.documentElement.classList.remove('dark');
                    localStorage.setItem('color-theme', 'light');
                } else {
                    document.documentElement.classList.add('dark');
                    localStorage.setItem('color-theme', 'dark');
                }
            }

        });
    </script>

</body>

</html>
