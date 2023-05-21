<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <title>{{ $tittle }}</title>
    <link rel="icon" href="image/logoStep.png">
    <link rel="stylesheet" href="/css/tailwind2.css" />
    <link rel="stylesheet" href="/css/styles.css"/>
    <link rel="stylesheet" href="tailwind.css"/>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons"
      rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Rounded:opsz,wght,FILL,GRAD@48,400,0,0" />
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @livewireStyles
    <style>
        .bg-doodad {
            background: linear-gradient(to bottom, rgba(237, 242, 247,0.5) , rgb(242, 243, 244)),url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' height='100%25' width='100%25'%3E%3Cdefs%3E%3Cpattern id='doodad' width='40' height='40' viewBox='0 0 40 40' patternUnits='userSpaceOnUse' patternTransform='rotate(135)'%3E%3Crect width='100%25' height='100%25' fill='rgba(242, 243, 244,1)'/%3E%3Cpath d='M-10 19h 60v2h-60zM-10-21h60v2h-60' fill='rgba(229, 231, 233,1)'/%3E%3Ccircle r='0.5' cx='0' cy='20' fill='rgba(99, 179, 237,1)'/%3E%3Ccircle r='0.5' cx='40' cy='20' fill='rgba(99, 179, 237,1)'/%3E%3C/pattern%3E%3C/defs%3E%3Crect fill='url(%23doodad)' height='200%25' width='200%25'/%3E%3C/svg%3E ");
            background-position: center;
            background-size: cover;

        }
      </style>
  </head>
  <body class="font-custom text-20 ">
    <div x-data="setup()" x-init="$refs.loading.classList.add('hidden'); setColors(color);" :class="{ 'dark': isDark}">
      <div class="bg-doodad text-gray-900 dark:bg-dark dark:text-light">
        <!-- Loading screen -->
        <div
          x-ref="loading"
          class="fixed inset-0 z-50 flex items-center justify-center text-2xl font-semibold text-white bg-primary-darker"
        >
          Loading.....
        </div>
        <div class="flex flex-col flex-1 min-h-screen">
          <!-- Navbar -->
            <header class="relative flex-shrink-0 bg-white dark:bg-darker">
                <div class="flex items-center justify-between p-2 border-b dark:border-primary-darker">
                  <!-- Mobile menu button -->
                  <button
                    @click="isMobileMainMenuOpen = !isMobileMainMenuOpen"
                    class="p-1 transition-colors duration-200 rounded-md text-primary-lighter bg-primary-50 hover:text-primary hover:bg-primary-100 dark:hover:text-light dark:hover:bg-primary-dark dark:bg-dark md:hidden focus:outline-none focus:ring"
                  >
                    <span class="sr-only">Open main manu</span>
                    <span aria-hidden="true">
                      <svg
                        class="w-8 h-8"
                        xmlns="http://www.w3.org/2000/svg"
                        fill="none"
                        viewBox="0 0 24 24"
                        stroke="currentColor"
                      >
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                      </svg>
                    </span>
                  </button>

                      <!-- Brand -->
                      <nav aria-label="Secondary" class="hidden space-x-2 md:flex md:items-center">
                      <a
                        href="{{ route('home') }}"
                        class="inline-block text-2xl font-bold tracking-wider uppercase text-primary-dark dark:text-light"
                      >
                        Step Up Style
                      </a>
                      <a href="{{ route('home') }}" class="inline-flex text-bold text-1xl p-2 transition-colors duration-200 rounded-full text-primary-dark hover:text-white hover:bg-primary-dark dark:text-light">
                        Home
                      </a>
                      <a href="/tennis" class="inline-flex text-bold p-2 transition-colors duration-200 rounded-full text-1xl  text-primary-dark hover:text-white hover:bg-primary-dark dark:text-light">
                        Lista de calzado
                      </a>
                      </nav>
                      <!-- Mobile sub menu button -->
                      <button
                        @click="isMobileSubMenuOpen = !isMobileSubMenuOpen"
                        class="p-1 transition-colors duration-200 rounded-md text-primary-lighter bg-primary-50 hover:text-primary hover:bg-primary-100 dark:hover:text-light dark:hover:bg-primary-dark dark:bg-dark md:hidden focus:outline-none focus:ring"
                      >
                        <span class="sr-only">Open sub manu</span>
                        <span aria-hidden="true">
                          <svg
                            class="w-8 h-8"
                            xmlns="http://www.w3.org/2000/svg"
                            fill="none"
                            viewBox="0 0 24 24"
                            stroke="currentColor"
                          >
                            <path
                              stroke-linecap="round"
                              stroke-linejoin="round"
                              stroke-width="2"
                              d="M12 5v.01M12 12v.01M12 19v.01M12 6a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2z"
                            />
                          </svg>
                        </span>
                      </button>

                      <!-- Desktop Right buttons -->
                      <nav aria-label="Secondary" class="hidden space-x-2 md:flex md:items-center">
                        <!-- Settings button -->
                        <button
                          @click="openSettingsPanel"
                          class="p-2 transition-colors duration-200 rounded-full text-primary-dark hover:text-white hover:bg-primary-dark dark:hover:text-light dark:hover:bg-primary-dark dark:bg-dark focus:outline-none focus:bg-primary-dark dark:focus:bg-primary-dark focus:ring-primary-darker">
                            <img class="fill-current text-primary" src="images/favorite_border_black_24dp.svg" alt="">
                        </button>
                        <button
                            @click="openNotificationsPanel"
                            class="p-2 transition-colors duration-200 rounded-full text-primary-lighter bg-primary-50 hover:text-primary hover:bg-primary-100 dark:hover:text-light dark:hover:bg-primary-dark dark:bg-dark focus:outline-none focus:bg-primary-100 dark:focus:bg-primary-dark focus:ring-primary-darker">
                                <img class="fill-current text-primary w-6 h-6" src="images/icons8-fast-cart-64.png" alt="">
                        </button>
                    <!-- User avatar button -->
                    <div class="p-2 transition-colors duration-200 rounded-full text-primary-dark  hover:text-primary-dark  dark:hover:text-light dark:hover:bg-primary-dark dark:bg-dark focus:outline-none focus:bg-primary-100 dark:focus:bg-primary-dark focus:ring-primary-darker">
                        @if (Route::has('login'))
                            @auth
                            <div class="ml-2 relative">
                                <x-dropdown align="right" width="48">
                                    <x-slot name="trigger">
                                        @if (Laravel\Jetstream\Jetstream::managesProfilePhotos())
                                            <button class="flex text-sm border-2 border-transparent rounded-full focus:outline-none focus:border-gray-300 transition">
                                                <img class="h-8 w-8 rounded-full object-cover" src="{{ Auth::user()->profile_photo_url }}" alt="{{ Auth::user()->name }}" />
                                            </button>
                                        @else
                                            <span class="inline-flex rounded-md">
                                                <button type="button" class="text-lg p-2 transition-colors duration-200 rounded-full text-primary-dark hover:bg-primary-dark hover:text-white hover:br-primary-dark dark:hover:text-light dark:hover:bg-primary-dark dark:bg-dark focus:outline-none  dark:focus:bg-primary-dark focus:ring-primary-darker">
                                                    {{ Auth::user()->name }}
                                                </button>
                                            </span>
                                        @endif
                                    </x-slot>
                                    <x-slot name="content">
                                        <!-- Account Management -->
                                        <div class="block px-4 py-2 text-xs text-gray-400">
                                            {{ __('Manage Account') }}
                                        </div>
                                        <x-dropdown-link href="{{ route('profile.show') }}">
                                            {{ __('Profile') }}
                                        </x-dropdown-link>
                                        @can('Admin', App\Models\User::class)
                                            <x-dropdown-link href="{{ route('admin.users.index') }}">
                                                {{ __('Lista Usuarios') }}
                                            </x-dropdown-link>
                                        @endcan
                                        @can('Admin', App\Models\User::class)
                                            <x-dropdown-link href="{{ route('admin.marcas.index') }}">
                                                {{ __('Lista Marcas') }}
                                            </x-dropdown-link>
                                        @endcan
                                        <!-- Authentication -->
                                        <form method="POST" action="{{ route('logout') }}" x-data>
                                            @csrf

                                                <x-dropdown-link href="{{ route('logout') }}"
                                                         @click.prevent="$root.submit();">
                                                    {{ __('Log Out') }}
                                                </x-dropdown-link>
                                            </form>
                                        </x-slot>
                                    </x-dropdown>
                                </div>
                                @else
                                    <a href="{{ route('login') }}" class="p-2 transition-colors duration-200 rounded-full text-primary-lighter bg-primary-dark hover:text-white hover:bg-primary-dark dark:hover:text-light dark:hover:bg-primary-dark dark:bg-dark focus:outline-none focus:bg-primary-100 dark:focus:bg-primary-dark focus:ring-primary-darker">Login in</a>
                                    @if(Route::has('register'))
                                        <a href="{{ route('register') }}" class="p-2 transition-colors duration-200 rounded-full text-primary-lighter bg-primary-dark hover:text-white hover:bg-primary-dark dark:hover:text-light dark:hover:bg-primary-dark dark:bg-dark focus:outline-none focus:bg-primary-100 dark:focus:bg-primary-dark focus:ring-primary-darker">Register</a>
                                    @endif
                                @endauth
                            @endif
                        </div>
                      </nav>
                      <!-- Mobile sub menu -->
                      <nav
                        x-transition:enter="transition duration-200 ease-in-out transform sm:duration-500"
                        x-transition:enter-start="-translate-y-full opacity-0"
                        x-transition:enter-end="translate-y-0 opacity-100"
                        x-transition:leave="transition duration-300 ease-in-out transform sm:duration-500"
                        x-transition:leave-start="translate-y-0 opacity-100"
                        x-transition:leave-end="-translate-y-full opacity-0"
                        x-show="isMobileSubMenuOpen"
                        @click.away="isMobileSubMenuOpen = false"
                        class="absolute flex items-center p-4 bg-white rounded-md shadow-lg dark:bg-darker top-16 inset-x-4 md:hidden"
                        aria-label="Secondary">
                        <div class="space-x-2">
                          <!-- Settings button -->
                          <button
                            @click="openSettingsPanel(); $nextTick(() => { isMobileSubMenuOpen = false })"
                            class="p-2 transition-colors duration-200 rounded-full text-primary-lighter bg-primary-50 hover:text-primary hover:bg-primary-100 dark:hover:text-light dark:hover:bg-primary-dark dark:bg-dark focus:outline-none focus:bg-primary-100 dark:focus:bg-primary-dark focus:ring-primary-darker"
                          >
                            <span class="sr-only">Open settings panel</span>
                            <svg
                              class="w-7 h-7"
                              xmlns="http://www.w3.org/2000/svg"
                              fill="none"
                              viewBox="0 0 24 24"
                              stroke="currentColor"
                            >
                              <path
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                stroke-width="2"
                                d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"
                              />
                              <path
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                stroke-width="2"
                                d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"
                              />
                            </svg>
                          </button>
                        </div>
                        <!-- User avatar button -->
                        <div class="loginButton">
                            @if (Route::has('login'))
                                @auth
                                <div class="ml-3 relative">
                                    <x-dropdown align="right" width="48">
                                        <x-slot name="trigger">
                                            @if (Laravel\Jetstream\Jetstream::managesProfilePhotos())
                                                <button class="flex text-sm border-2 border-transparent rounded-full focus:outline-none focus:border-gray-300 transition">
                                                    <img class="h-8 w-8 rounded-full object-cover" src="{{ Auth::user()->profile_photo_url }}" alt="{{ Auth::user()->name }}" />
                                                </button>
                                            @else
                                                <span class="inline-flex rounded-md">
                                                    <button type="button" class="inline-flex items-center px-3 py-2 text-sm leading-4 font-medium rounded-md text-primary-lighter dark:text-gray-400 dark:bg-gray-800 hover:text-gray-700 dark:hover:text-gray-300 focus:outline-none focus:bg-gray-50 dark:focus:bg-gray-700 active:bg-gray-50 dark:active:bg-gray-700 transition ease-in-out duration-150">
                                                        {{ Auth::user()->name }}

                                                        <svg class="ml-2 -mr-0.5 h-4 w-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                                            <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 8.25l-7.5 7.5-7.5-7.5" />
                                                        </svg>
                                                    </button>
                                                </span>
                                            @endif
                                        </x-slot>
                                        <x-slot name="content">
                                            <!-- Account Management -->
                                            <div class="block px-4 py-2 text-xs text-gray-400">
                                                {{ __('Manage Account') }}
                                            </div>

                                            <x-dropdown-link href="{{ route('profile.show') }}">
                                                {{ __('Profile') }}
                                            </x-dropdown-link>

                                            @if (Laravel\Jetstream\Jetstream::hasApiFeatures())
                                                <x-dropdown-link href="{{ route('api-tokens.index') }}">
                                                    {{ __('API Tokens') }}
                                                </x-dropdown-link>
                                            @endif

                                            <div class="border-t border-gray-200 dark:border-gray-600"></div>

                                            <!-- Authentication -->
                                            <form method="POST" action="{{ route('logout') }}" x-data>
                                                @csrf

                                                <x-dropdown-link href="{{ route('logout') }}"
                                                         @click.prevent="$root.submit();">
                                                    {{ __('Log Out') }}
                                                </x-dropdown-link>
                                            </form>
                                        </x-slot>
                                    </x-dropdown>
                                </div>
                                @else
                                    <a href="{{ route('login') }}" class="p-2 transition-colors duration-200 rounded-full text-primary-lighter bg-primary-50 hover:text-primary hover:bg-primary-100 dark:hover:text-light dark:hover:bg-primary-dark dark:bg-dark focus:outline-none focus:bg-primary-100 dark:focus:bg-primary-dark focus:ring-primary-darker">Login in</a>
                                    @if(Route::has('register'))
                                        <a href="{{ route('register') }}" class="p-2 transition-colors duration-200 rounded-full text-primary-lighter bg-primary-50 hover:text-primary hover:bg-primary-100 dark:hover:text-light dark:hover:bg-primary-dark dark:bg-dark focus:outline-none focus:bg-primary-100 dark:focus:bg-primary-dark focus:ring-primary-darker">Register</a>
                                    @endif
                                @endauth
                            @endif
                        </div>
                      </nav>
                    </div>
                    <!-- Mobile main manu -->
                    <div
                      class="border-b md:hidden dark:border-primary-darker"
                      x-show="isMobileMainMenuOpen"
                      @click.away="isMobileMainMenuOpen = false"
                    >
                      <nav aria-label="Main" class="px-2 py-4 space-y-2">
                        <!-- Dashboards links -->
                        <div x-data="{ isActive: false, open: false}">
                          <!-- active & hover classes 'bg-primary-100 dark:bg-primary' -->
                          <a
                            href="#"
                            @click="$event.preventDefault(); open = !open"
                            class="flex items-center p-2 text-gray-500 transition-colors rounded-md dark:text-light hover:bg-primary-100 dark:hover:bg-primary"
                            :class="{'bg-primary-100 dark:bg-primary': isActive || open}"
                            role="button"
                            aria-haspopup="true"
                            :aria-expanded="(open || isActive) ? 'true' : 'false'"
                          >
                            <span aria-hidden="true">
                              <svg
                                class="w-5 h-5"
                                xmlns="http://www.w3.org/2000/svg"
                                fill="none"
                                viewBox="0 0 24 24"
                                stroke="currentColor"
                              >
                                <path
                                  stroke-linecap="round"
                                  stroke-linejoin="round"
                                  stroke-width="2"
                                  d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"
                                />
                              </svg>
                            </span>
                            <span class="ml-2 text-sm"> Dashboards </span>
                            <span class="ml-auto" aria-hidden="true">
                              <!-- active class 'rotate-180' -->
                              <svg
                                class="w-4 h-4 transition-transform transform"
                                :class="{ 'rotate-180': open }"
                                xmlns="http://www.w3.org/2000/svg"
                                fill="none"
                                viewBox="0 0 24 24"
                                stroke="currentColor"
                              >
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                              </svg>
                            </span>
                          </a>
                          <div role="menu" x-show="open" class="mt-2 space-y-2 px-7" aria-label="Dashboards">
                            <!-- active & hover classes 'text-gray-700 dark:text-light' -->
                            <!-- inActive classes 'text-gray-400 dark:text-gray-400' -->
                            <a
                              href="/dashboard"
                          role="menuitem"
                          class="block p-2 text-sm text-gray-400 transition-colors duration-200 rounded-md dark:text-gray-400 dark:hover:text-light hover:text-gray-700"
                        >
                          Dashboard Usuario
                        </a>
                        <a
                          href="/tennis"
                          role="menuitem"
                          class="block p-2 text-sm text-gray-400 transition-colors duration-200 rounded-md dark:hover:text-light hover:text-gray-700"
                        >
                          Lista calzado
                        </a>
                      </div>
                    </div>
                  </nav>
                </div>
            </header>

          <!-- Main content -->
            <div class="min-h-screen items-center justify-center p-4">
                <main class="flex-grow">
                    <h1 class="title">{{ $tittle }}</h1>
                    {{ $slot }}
                </main>
            </div>
        </div>
        <!-- Backdrop -->
        <div
          x-transition:enter="transition duration-300 ease-in-out"
          x-transition:enter-start="opacity-0"
          x-transition:enter-end="opacity-100"
          x-transition:leave="transition duration-300 ease-in-out"
          x-transition:leave-start="opacity-100"
          x-transition:leave-end="opacity-0"
          x-show="isSettingsPanelOpen"
          @click="isSettingsPanelOpen = false"
          class="fixed inset-0 z-10 bg-primary-darker"
          style="opacity: 0.5"
          aria-hidden="true"
        ></div>
        <!-- Panel -->
        <section
          x-transition:enter="transition duration-300 ease-in-out transform sm:duration-500"
          x-transition:enter-start="translate-x-full"
          x-transition:enter-end="translate-x-0"
          x-transition:leave="transition duration-300 ease-in-out transform sm:duration-500"
          x-transition:leave-start="translate-x-0"
          x-transition:leave-end="translate-x-full"
          x-ref="settingsPanel"
          tabindex="-1"
          x-show="isSettingsPanelOpen"
          @keydown.escape="isSettingsPanelOpen = false"
          class="fixed inset-y-0 right-0 z-20 w-full max-w-xs bg-white shadow-xl dark:bg-darker dark:text-light sm:max-w-md focus:outline-none"
          aria-labelledby="settinsPanelLabel">
            <div class="absolute left-0 p-2 transform -translate-x-full">
                <!-- Close button -->
                <button @click="isSettingsPanelOpen = false" class="p-2 text-white rounded-md focus:outline-none focus:ring">
                    <svg
                        class="w-5 h-5"
                        xmlns="http://www.w3.org/2000/svg"
                        fill="none"
                        viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
            <!-- Panel de favoritos -->
            <div class="flex flex-col h-screen items-center py-2 text-lg">
                <h2 class="text-primary-dark uppercase">
                    Tus favoritos
                </h2>
                <div class="flex flex-col items-center justify-center flex-shrink-0 px-4 py-2 space-y-4 border-b">
                    @livewire('favorite-list')
                </div>
            </div>
        </section>
        <div
          x-transition:enter="transition duration-300 ease-in-out"
          x-transition:enter-start="opacity-0"
          x-transition:enter-end="opacity-100"
          x-transition:leave="transition duration-300 ease-in-out"
          x-transition:leave-start="opacity-100"
          x-transition:leave-end="opacity-0"
          x-show="isNotificationsPanelOpen"
          @click="isNotificationsPanelOpen = false"
          class="fixed inset-0 z-10 bg-primary-darker"
          style="opacity: 0.5"
          aria-hidden="true"
        ></div>
        <section
          x-transition:enter="transition duration-300 ease-in-out transform sm:duration-500"
          x-transition:enter-start="-translate-x-full"
          x-transition:enter-end="translate-x-0"
          x-transition:leave="transition duration-300 ease-in-out transform sm:duration-500"
          x-transition:leave-start="translate-x-0"
          x-transition:leave-end="-translate-x-full"
          x-ref="notificationsPanel"
          x-show="isNotificationsPanelOpen"
          @keydown.escape="isNotificationsPanelOpen = false"
          tabindex="-1"
          aria-labelledby="notificationPanelLabel"
          class="fixed inset-y-0 z-20 w-full max-w-xs bg-white dark:bg-darker dark:text-light sm:max-w-md focus:outline-none"
        >
          <div class="absolute right-0 p-2 transform translate-x-full">
            <!-- Close button -->
            <button
              @click="isNotificationsPanelOpen = false"
              class="p-2 text-white rounded-md focus:outline-none focus:ring"
            >
              <svg
                class="w-5 h-5"
                xmlns="http://www.w3.org/2000/svg"
                fill="none"
                viewBox="0 0 24 24"
                stroke="currentColor"
              >
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
              </svg>
            </button>
          </div>
          <div class="flex flex-col h-screen" x-data="{ activeTabe: 'action' }">
            <!-- Panel header -->
            <div class="flex-shrink-0">
              <div class="flex items-center justify-between px-4 pt-4 border-b dark:border-primary-darker">
                <h2 id="notificationPanelLabel" class="pb-4 font-semibold">Tu carrito de compras</h2>
                <div class="space-x-2">
                </div>
              </div>
            </div>
            <!-- Panel content (tabs) -->
            <div class="flex-1 pt-4 overflow-y-hidden hover:overflow-y-auto">
              <!-- Action tab -->
              <div class="space-y-4" x-show.transition.in="activeTabe == 'action'">

              </div>
            </div>
          </div>
        </section>
      </div>
    </div>
    <!-- All javascript code in this project for now is just for demo DON'T RELY ON IT  -->
    @livewireScripts
  </body>
  <footer class="w-full bg-gray-200">
    <x-footer/>
  </footer>
</html>
<script>
    const setup = () => {
      const getTheme = () => {
        if (window.localStorage.getItem('dark')) {
          return JSON.parse(window.localStorage.getItem('dark'))
        }
        return !!window.matchMedia && window.matchMedia('(prefers-color-scheme: dark)').matches
      }

      const setTheme = (value) => {
        window.localStorage.setItem('dark', value)
      }

      const getColor = () => {
        if (window.localStorage.getItem('color')) {
          return window.localStorage.getItem('color')
        }
        return 'cyan'
      }

      const setColors = (color) => {
        const root = document.documentElement
        root.style.setProperty('--color-primary', `var(--color-${color})`)
        root.style.setProperty('--color-primary-50', `var(--color-${color}-50)`)
        root.style.setProperty('--color-primary-100', `var(--color-${color}-100)`)
        root.style.setProperty('--color-primary-light', `var(--color-${color}-light)`)
        root.style.setProperty('--color-primary-lighter', `var(--color-${color}-lighter)`)
        root.style.setProperty('--color-primary-dark', `var(--color-${color}-dark)`)
        root.style.setProperty('--color-primary-darker', `var(--color-${color}-darker)`)
        this.selectedColor = color
        window.localStorage.setItem('color', color)
      }

      return {
        loading: true,
        isDark: getTheme(),
        color: getColor(),
        selectedColor: 'cyan',
        toggleTheme() {
          this.isDark = !this.isDark
          setTheme(this.isDark)
        },
        setLightTheme() {
          this.isDark = false
          setTheme(this.isDark)
        },
        setDarkTheme() {
          this.isDark = true
          setTheme(this.isDark)
        },
        setColors,
        toggleSidbarMenu() {
          this.isSidebarOpen = !this.isSidebarOpen
        },
        isSettingsPanelOpen: false,
        openSettingsPanel() {
          this.isSettingsPanelOpen = true
          this.$nextTick(() => {
            this.$refs.settingsPanel.focus()
          })
        },
        isNotificationsPanelOpen: false,
          openNotificationsPanel() {
            this.isNotificationsPanelOpen = true
            this.$nextTick(() => {
              this.$refs.notificationsPanel.focus()
            })
        },
        isMobileSubMenuOpen: false,
        openMobileSubMenu() {
          this.isMobileSubMenuOpen = true
          this.$nextTick(() => {
            this.$refs.mobileSubMenu.focus()
          })
        },
        isMobileMainMenuOpen: false,
        openMobileMainMenu() {
          this.isMobileMainMenuOpen = true
          this.$nextTick(() => {
            this.$refs.mobileMainMenu.focus()
          })
        },
      }
    }
  </script>
