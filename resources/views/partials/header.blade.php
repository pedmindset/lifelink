<header  x-data="{ atTop: true, openNav: false, openMenu: false }" class="bg-white" x-on:scroll.window="atTop = (window.pageYOffset >= 40) ? false : true" x-bind:class="{ 'fixed top-0 bg-opacity-90 z-15 w-full' : !atTop }">
    <div class="relative">
       <div class="flex justify-between items-center max-w-7xl mx-auto px-4 py-4 sm:px-6 md:justify-start md:space-x-10 lg:px-8">
          <div class="flex justify-start lg:w-0 lg:flex-1">
             <a href="{{ route('home') }}">
                <span class="sr-only">Lifelink</span>
                <img class="h-8 w-auto sm:h-10" src="{{ asset('img/logo_black.png') }}" alt="">
             </a>
          </div>
          <div class="-mr-2 -my-2 md:hidden">
             <button type="button" x-on:click="openMenu = true" class="bg-white rounded-md p-2 inline-flex items-center justify-center text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-indigo-500" aria-expanded="false">
                <span class="sr-only">Open menu</span>
                <!-- Heroicon name: outline/menu -->
                <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                   <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                </svg>
             </button>
          </div>

          <nav class="hidden md:flex space-x-8">
             {{-- <a href="{{ url('/') }}" class="{{ request()->routeIs('home') ? 'border-b-2 border-teal-300' : '' }} text-sm font-semibold font-sans text-gray-500 hover:text-gray-900">Home</a> --}}

             {{-- <div class="relative -mt-1">
                <!-- Item active: "text-gray-900", Item inactive: "text-gray-500" -->
                <span x-on:click="openNav = !openNav"  class="cursor-pointer group inline-flex items-center text-sm font-semibold font-sans text-gray-500 hover:text-gray-900" aria-expanded="false">
                   <span>Event Model</span>
                   <svg class="text-gray-400 ml-2 h-5 w-5 group-hover:text-gray-500" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                      <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                   </svg>
                </span>

                <div x-show="openNav"
                   @click.away="openNav = false"
                   style="display: none"
                   class="absolute z-10 -ml-4 mt-5 transform w-screen max-w-md lg:max-w-2xl lg:ml-0 lg:left-1/2 lg:-translate-x-1/2"
                   x-transition:enter="transition ease-out duration-200"
                   x-transition:enter-start="opacity-0 translate-y-1"
                   x-transition:enter-end="opacity-100 translate-y-0"
                   x-transition:leave="transition ease-in duration-150"
                   x-transition:leave-start="opacity-100 translate-y-0"
                   x-transition:leave-end="opacity-0 translate-y-1">
                   <div class="rounded-lg shadow-lg ring-1 ring-black ring-opacity-5 overflow-hidden">
                      <div class="relative grid gap-6 bg-white px-5 py-6 sm:gap-8 sm:p-8 lg:grid-cols-2">
                         <a href="#" class="-m-3 p-3 flex items-start rounded-lg hover:bg-gray-50">
                            <div class="flex-shrink-0 flex items-center justify-center h-10 w-10 rounded-md bg-gradient-to-r from-purple-600 to-indigo-600 text-white sm:h-12 sm:w-12">
                               <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                  <path d="M12 14l9-5-9-5-9 5 9 5z" />
                                  <path d="M12 14l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14z" />
                                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 14l9-5-9-5-9 5 9 5zm0 0l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14zm-4 6v-7.5l4-2.222" />
                               </svg>
                            </div>
                            <div class="ml-4">
                               <p class="text-base font-medium text-gray-900">
                                  Tertiary Model UN
                               </p>
                               <p class="mt-1 text-sm text-gray-500">
                                  Get a better understanding of where your traffic is coming from.
                               </p>
                            </div>
                         </a>

                         <a href="#" class="-m-3 p-3 flex items-start rounded-lg hover:bg-gray-50">
                            <div class="flex-shrink-0 flex items-center justify-center h-10 w-10 rounded-md bg-gradient-to-r from-purple-600 to-indigo-600 text-white sm:h-12 sm:w-12">
                               <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                  <path d="M12 14l9-5-9-5-9 5 9 5z" />
                                  <path d="M12 14l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14z" />
                                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 14l9-5-9-5-9 5 9 5zm0 0l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14zm-4 6v-7.5l4-2.222" />
                               </svg>
                            </div>
                            <div class="ml-4">
                               <p class="text-base font-medium text-gray-900">
                                  Senior High Model UN
                               </p>
                               <p class="mt-1 text-sm text-gray-500">
                                  Speak directly to your customers in a more meaningful way.
                               </p>
                            </div>
                         </a>

                         <a href="#" class="-m-3 p-3 flex items-start rounded-lg hover:bg-gray-50">
                            <div class="flex-shrink-0 flex items-center justify-center h-10 w-10 rounded-md bg-gradient-to-r from-purple-600 to-indigo-600 text-white sm:h-12 sm:w-12">
                               <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                  <path d="M12 14l9-5-9-5-9 5 9 5z" />
                                  <path d="M12 14l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14z" />
                                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 14l9-5-9-5-9 5 9 5zm0 0l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14zm-4 6v-7.5l4-2.222" />
                               </svg>
                            </div>
                            <div class="ml-4">
                               <p class="text-base font-medium text-gray-900">
                                  Junior High Model UN
                               </p>
                               <p class="mt-1 text-sm text-gray-500">
                                  Your customers&#039; data will be safe and secure.
                               </p>
                            </div>
                         </a>

                         <a href="#" class="-m-3 p-3 flex items-start rounded-lg hover:bg-gray-50">
                            <div class="flex-shrink-0 flex items-center justify-center h-10 w-10 rounded-md bg-gradient-to-r from-purple-600 to-indigo-600 text-white sm:h-12 sm:w-12">
                               <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                  <path d="M12 14l9-5-9-5-9 5 9 5z" />
                                  <path d="M12 14l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14z" />
                                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 14l9-5-9-5-9 5 9 5zm0 0l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14zm-4 6v-7.5l4-2.222" />
                               </svg>
                            </div>
                            <div class="ml-4">
                               <p class="text-base font-medium text-gray-900">Model UN Training</p>
                               <p class="mt-1 text-sm text-gray-500">Connect with third-party tools that you&#039;re already using.</p>
                            </div>
                         </a>
                      </div>
                   </div>
                </div>
             </div> --}}
             <a href="{{ route('events.tertiary') }}" class="{{ request()->routeIs('events.tertiary') || request()->routeIs('home') || request()->routeIs('auth.home') ? 'border-b-2 border-teal-300 pb-2' : '' }} text-sm font-semibold font-sans text-gray-500 hover:text-gray-700">Upcoming Events</a>
             <a href="{{ route('about') }}" class="{{ request()->routeIs('about') ? 'border-b-2 border-teal-300 pb-2' : '' }} text-sm font-semibold font-sans text-gray-500 hover:text-gray-700">About Us</a>
          </nav>

          <div class="hidden md:flex items-center justify-end md:flex-1 lg:w-0">
             @if (Route::has('login'))
                @auth
                   @if (Auth::user()->roles[0]['name'] == "customer")
                   <div class="hidden sm:flex sm:items-center sm:ml-6">
                      <x-dropdown align="right" width="48">
                         <x-slot name="trigger">
                            <button x-on:click.prevent="open = !open" x-on:click.away="open = false" class="flex items-center text-base font-semibold font-sans text-gray-500 transition duration-150 ease-in-out hover:text-gray-700 hover:border-gray-300 focus:outline-none focus:text-gray-700 focus:border-gray-300">
                               <div>{{ Auth::user()->profile->first_name }}</div>

                               <div class="ml-1">
                                  <svg class="w-4 h-4 fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                     <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                  </svg>
                               </div>
                            </button>
                         </x-slot>

                         <x-slot name="content">
                            <div>
                               <a href="{{ route('profile') }}" class="block px-4 py-2 text-base leading-5 text-gray-600 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 transition duration-150 ease-in-out">
                                  {{ __('Profile') }}
                               </a>
                            </div>
                            <form method="POST" action="{{ route('logout') }}">
                               @csrf
                               <x-dropdown-link :href="route('logout')"
                                     onclick="event.preventDefault();
                                                 this.closest('form').submit();">
                                  {{ __('Log Out') }}
                               </x-dropdown-link>
                            </form>
                         </x-slot>
                      </x-dropdown>
                   </div>
                   {{-- <div>
                      <p class="whitespace-nowrap text-base font-semibold cursor-pointer text-gray-500 dark:text-gray-300 hover:text-gray-900">
                         {{  Auth::user()->name  }} <span class="">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                          </svg></span>
                      </p>

                      <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                         <a class="dropdown-item" href="{{ route('logout') }}"
                            onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                             {{ __('Logout') }}
                         </a>

                         <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                             @csrf
                         </form>
                      </div>

                   </div> --}}
                   @else
                   <a href="{{ url('/dashboard') }}" class="whitespace-nowrap text-base font-semibold text-gray-500 dark:text-gray-300 hover:text-gray-900">Dashboard</a>
                   @endif
                @else
                   <a href="{{ route('login') }}" class="whitespace-nowrap text-base font-medium text-gray-500 hover:text-gray-900">Sign in</a>
                   @if (Route::has('register'))
                   <a href="{{ route('register') }}" class="ml-8 whitespace-nowrap inline-flex items-center justify-center bg-gradient-to-r from-purple-600 to-indigo-600 bg-origin-border px-4 py-2 border border-transparent rounded-md shadow-sm text-base font-medium text-white hover:from-purple-700 hover:to-indigo-700">Sign up</a>
                @endif
                @endauth
             @endif
          </div>
       </div>

       <div x-show="openMenu"
          class="absolute z-30 top-0 inset-x-0 p-2 transition transform origin-top-right md:hidden"
          @click.away="openMenu = false"
          style="display: none"
          class="absolute z-10 -ml-4 mt-5 transform w-screen max-w-md lg:max-w-2xl lg:ml-0 lg:left-1/2 lg:-translate-x-1/2"
          x-transition:enter="duration-200 ease-out"
          x-transition:enter-start="opacity-0 scale-95"
          x-transition:enter-end="opacity-100 scale-95"
          x-transition:leave="duration-150 ease-in"
          x-transition:leave-start="opacity-100 scale-100"
          x-transition:leave-end="opacity-0 scale-95">
          <div class="rounded-lg shadow-lg ring-1 ring-black ring-opacity-5 bg-white divide-y-2 divide-gray-50">
             <div class="pt-5 pb-6 px-5">
                <div class="flex items-center justify-between">
                   <div>
                      <img class="h-8 w-auto" src="{{  asset('img/logo_black.png') }}" alt="Workflow">
                   </div>
                   <div class="-mr-2">
                      <button type="button" x-on:click="openMenu = false" class="bg-white rounded-md p-2 inline-flex items-center justify-center text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-indigo-500">
                         <span class="sr-only">Close menu</span>
                         <!-- Heroicon name: outline/x -->
                         <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                         </svg>
                      </button>
                   </div>
                </div>
                <div class="mt-6">
                   <nav class="grid grid-cols-1 gap-7">
                      {{-- <a href="{{ route('events.tertiary') }}" class="-m-3 p-3 flex items-center rounded-lg hover:bg-gray-50">
                         <div class="flex-shrink-0 flex items-center justify-center h-10 w-10 rounded-md bg-gradient-to-r from-purple-600 to-indigo-600 text-white">
                            <!-- Heroicon name: outline/inbox -->
                            <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-2.586a1 1 0 00-.707.293l-2.414 2.414a1 1 0 01-.707.293h-3.172a1 1 0 01-.707-.293l-2.414-2.414A1 1 0 006.586 13H4" />
                            </svg>
                         </div>
                         <div class="ml-4 text-base font-medium text-gray-900">
                            Upcomming Conferences
                         </div>
                      </a> --}}


                   </nav>
                </div>
             </div>
             <div class="py-6 px-5">
                <div class="grid grid-cols-1 gap-4">
                   {{-- <a href="{{ url('/') }}" class="text-base col-span-1 font-medium text-gray-900 hover:text-gray-700">Home</a> --}}
                   <a href="{{ route('events.tertiary') }}" class="{{ request()->routeIs('events.tertiary') || request()->routeIs('home') || request()->routeIs('auth.home') ? 'bg-gray-100 text-gray-800 hover:bg-gray-50' : 'text-gray-900 hover:text-gray-700' }} transition-all ease-linear duration-300 text-sm p-3 col-span-1 font-medium">Upcoming Conferences</a>
                   <a href="{{ route('about') }}" class="{{ request()->routeIs('about') ? 'bg-gray-100 text-gray-800 hover:bg-gray-50' : 'text-gray-900 hover:text-gray-700' }} transition-all ease-linear duration-300 text-sm col-span-1 p-3 font-medium">About</a>
                </div>
                <div class="mt-3 pt-5 border-t border-gray-300">
                   
                    @guest
                    <a href="{{ route('register') }}" class="w-full flex items-center justify-center bg-gradient-to-r from-purple-600 to-indigo-600 bg-origin-border px-4 py-2 border border-transparent rounded-md shadow-sm text-sm font-medium text-white hover:from-purple-700 hover:to-indigo-700">Sign up
                    </a>
                    <a href="{{ route('login') }}" class="w-full mt-3 flex items-center justify-center bg-gradient-to-r from-teal-600 to-green-600 bg-origin-border px-4 py-2 border border-transparent rounded-md shadow-sm text-sm font-medium text-white hover:from-green-700 hover:to-green-700">Login
                    </a>
                    @endguest
                    @auth
                    <a href="{{ url('/dashboard') }}" class="w-full flex items-center justify-center bg-gradient-to-r from-purple-600 to-indigo-600 bg-origin-border px-4 py-2 border border-transparent rounded-md shadow-sm text-base font-medium text-white hover:from-purple-700 hover:to-indigo-700">Dashboard
                    </a>
                    @endauth
                </div>
             </div>
          </div>
       </div>
    </div>
 </header>
