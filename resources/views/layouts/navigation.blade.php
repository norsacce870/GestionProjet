<nav x-data="{ open: false }" class="bg-white dark:bg-gray-800 border-b border-gray-100 dark:border-gray-700">
    <!-- Primary Navigation Menu -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <div class="flex">
                <!-- Logo -->
                <div class="shrink-0 flex items-center">
                    <a href="{{ route('dashboard') }}">
                        <x-application-logo class="block h-9 w-auto fill-current text-gray-800 dark:text-white" />
                    </a>
                </div>


                <!-- Navigation Links -->
                <div class="hidden gap-3 sm:flex sm:items-center sm:space-x-6 ms-10" x-data="{ openMedia: false, openUsers: false, openCom: false, openInfo: false, openRelations: false }">

                    <div class="relative text-sm font-medium text-white mt-2">
                        <x-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                            {{ __('Dashboard') }}
                        </x-nav-link>
                    </div>

                    <div class="relative" @click.away="openMedia = false">
                        <button @click="openMedia = !openMedia"
                            class="text-sm font-medium mt-3.5 text-white">
                            Contenus
                        </button>
                        <div x-show="openMedia" class="absolute mt-2 w-40  bg-white rounded shadow-md z-50">
                            <x-nav-link :href="route('actualite.index')" :active="request()->routeIs('actualite.index')"
                                class="block px-4 py-2 text-sm text-black ">
                                {{ __('Actualités') }}
                            </x-nav-link>
                            <x-nav-link :href="route('galerie.index')" :active="request()->routeIs('galerie.index')"
                                class="block px-4 py-2 text-sm text-black">
                                {{ __('Galerie') }}
                            </x-nav-link>
                            <x-nav-link :href="route('video.index')" :active="request()->routeIs('video.index')"
                                class="block px-4 py-2 text-sm text-black">
                                {{ __('Vidéos') }}
                            </x-nav-link>
                        </div>
                    </div>

                    <div class="relative text-sm font-medium text-white mt-2"
                        @click.away="openUsers = false">
                        <x-nav-link :href="route('players.index')" :active="request()->routeIs('players.index')"
                            class="block px-4 py-2 mt-2 text-sm ">
                            {{ __('Players') }}
                        </x-nav-link>
                    </div>

                    <div class="relative text-sm font-medium text-white mt-2"
                        @click.away="openUsers = false">
                        <x-nav-link :href="route('palmares.index')" :active="request()->routeIs('palmares.index')">
                            {{ __('Palmarès') }}
                        </x-nav-link>
                    </div>



                    <div class="relative" @click.away="openRelations = false">
                        <button @click="openRelations = !openRelations"
                            class="text-sm font-medium text-white mt-3.5">
                            Relations
                        </button>
                        <div x-show="openRelations" class="absolute mt-2 w-40 bg-white rounded shadow-md z-50">
                            <x-nav-link :href="route('publicite.index')" :active="request()->routeIs('publicite.index')"
                                class="block px-4 py-2 text-sm text-black">
                                {{ __('Publicités') }}
                            </x-nav-link>
                            <x-nav-link :href="route('partenaire.index')" :active="request()->routeIs('partenaire.index')"
                                class="block px-4 py-2 text-sm text-black">
                                {{ __('Partenaires') }}
                            </x-nav-link>
                        </div>
                    </div>


                    <div class="relative" @click.away="openInfo = false">
                        <button @click="openInfo = !openInfo"
                            class="text-sm font-medium text-white mt-3.5">
                            Communication
                        </button>
                        <div x-show="openInfo" class="absolute mt-2 w-40 bg-white rounded shadow-md z-50">
                            <x-nav-link :href="route('coordonnee.index')" :active="request()->routeIs('coordonnee.index')"
                                class="block px-4 py-2 text-sm text-black">
                                {{ __('Coordonnées') }}
                            </x-nav-link>
                            <x-nav-link :href="route('contact.index')" :active="request()->routeIs('contact.index')"
                                class="block px-4 py-2 text-sm text-black">
                                {{ __('Contacts') }}
                            </x-nav-link>
                        </div>
                    </div>
                </div>


                <!-- Settings Dropdown -->
                <div class="hidden  sm:flex sm:items-center sm:ms-6 ">
                    <x-dropdown align="right" width="48">
                        <x-slot name="trigger">
                            <button
                                class="inline-flex ml-96  px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 dark:text-gray-400 bg-white dark:bg-gray-800 hover:text-gray-700 dark:hover:text-gray-300 focus:outline-none transition ease-in-out duration-150 mt-3.5">
                                <div>{{ Auth::user()->nom }}</div>

                                <div class="ms-1">
                                    <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg"
                                        viewBox="0 0 20 20">
                                        <path fill-rule="evenodd"
                                            d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                            clip-rule="evenodd" />
                                    </svg>
                                </div>
                            </button>
                        </x-slot>

                        <x-slot name="content">
                            <x-dropdown-link :href="route('profile.edit')">
                                {{ __('Profil') }}
                            </x-dropdown-link>

                            <x-dropdown-link :href="route('user.index')" :active="request()->routeIs('user.index')"
                                class="block px-4 py-2 text-sm hover:bg-gray-100">
                                {{ __('Utilisateurs') }}
                            </x-dropdown-link>

                            <!-- Authentication -->
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf

                                <x-dropdown-link :href="route('logout')"
                                    onclick="event.preventDefault();
                                                this.closest('form').submit();">
                                    {{ __('Déconnexion') }}
                                </x-dropdown-link>
                            </form>
                        </x-slot>
                    </x-dropdown>
                </div>

                <!-- Hamburger -->
                <div class="-me-2 flex items-center sm:hidden">
                    <button @click="open = ! open"
                        class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 dark:text-gray-500 hover:text-gray-500 dark:hover:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-900 focus:outline-none focus:bg-gray-100 dark:focus:bg-gray-900 focus:text-gray-500 dark:focus:text-gray-400 transition duration-150 ease-in-out">
                        <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                            <path :class="{ 'hidden': open, 'inline-flex': !open }" class="inline-flex"
                                stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M4 6h16M4 12h16M4 18h16" />
                            <path :class="{ 'hidden': !open, 'inline-flex': open }" class="hidden"
                                stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                </div>
            </div>
        </div>

        <!-- Responsive Navigation Menu -->
        <div :class="{ 'block': open, 'hidden': !open }" class="hidden sm:hidden">
            <div class="pt-2 pb-3 space-y-1">
                <x-responsive-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                    {{ __('Dashboard') }}
                </x-responsive-nav-link>
            </div>

            <!-- Responsive Settings Options -->
            <div class="pt-4 pb-1 border-t border-gray-200 dark:border-gray-600">
                <div class="px-4">
                    <div class="font-medium text-base text-gray-800 dark:text-gray-200">{{ Auth::user()->nom }}</div>
                    <div class="font-medium text-sm text-gray-500">{{ Auth::user()->email }}</div>
                </div>

                <div class="mt-3 space-y-1">
                    <x-responsive-nav-link :href="route('profile.edit')">
                        {{ __('Profile') }}
                    </x-responsive-nav-link>

                    <!-- Authentication -->
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf

                        <x-responsive-nav-link :href="route('logout')"
                            onclick="event.preventDefault();
                                        this.closest('form').submit();">
                            {{ __('Log Out') }}
                        </x-responsive-nav-link>
                    </form>
                </div>
            </div>
        </div>
    </div>
</nav>
