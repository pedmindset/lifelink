<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
   <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <title>{{ config('app.name', 'Laravel') }}</title>
      <link rel="shortcut icon" href="{{ asset('img/logo_image.png') }}" type="image/x-icon">
      <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap" rel="stylesheet">
      <link rel="stylesheet" href="{{ asset('css/app.css') }}">
      <script src="{{ asset('js/alpine.js') }}" defer></script>
   </head>
   <body class="antialiased w-full h-full bg-gray-50" x-data="{ openNav: false, openMenu: false }">
      <header>
         <div class="relative bg-white">
            <div class="flex justify-between items-center max-w-7xl mx-auto px-4 py-4 sm:px-6 md:justify-start md:space-x-10 lg:px-8">
               <div class="flex justify-start lg:w-0 lg:flex-1">
                  <a href="#">
                     <span class="sr-only">Workflow</span>
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
                  <a href="#" class="text-sm font-semibold font-sans text-gray-500 hover:text-gray-900">Home</a>

                  <div class="relative -mt-1">
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
                  </div>
                  <a href="{{ route('events.tertiary') }}" class="text-sm font-semibold font-sans text-gray-500 hover:text-gray-700">Upcoming Conferences</a>
                  <a href="#" class="text-sm font-semibold font-sans text-gray-500 hover:text-gray-700">About Us</a>
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
                           <img class="h-8 w-auto" src="{{ asset('img/logo_image.png') }}" alt="Workflow">
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
                           <a href="#" class="-m-3 p-3 flex items-center rounded-lg hover:bg-gray-50">
                              <div class="flex-shrink-0 flex items-center justify-center h-10 w-10 rounded-md bg-gradient-to-r from-purple-600 to-indigo-600 text-white">
                                 <!-- Heroicon name: outline/inbox -->
                                 <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                                 <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-2.586a1 1 0 00-.707.293l-2.414 2.414a1 1 0 01-.707.293h-3.172a1 1 0 01-.707-.293l-2.414-2.414A1 1 0 006.586 13H4" />
                                 </svg>
                              </div>
                              <div class="ml-4 text-base font-medium text-gray-900">
                                 Inbox
                              </div>
                           </a>
            
                           <a href="#" class="-m-3 p-3 flex items-center rounded-lg hover:bg-gray-50">
                              <div class="flex-shrink-0 flex items-center justify-center h-10 w-10 rounded-md bg-gradient-to-r from-purple-600 to-indigo-600 text-white">
                                 <!-- Heroicon name: outline/annotation -->
                                 <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                                 <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 8h10M7 12h4m1 8l-4-4H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-3l-4 4z" />
                                 </svg>
                              </div>
                              <div class="ml-4 text-base font-medium text-gray-900">
                                 Messaging
                              </div>
                           </a>
                        </nav>
                     </div>
                  </div>
                  <div class="py-6 px-5">
                     <div class="grid grid-cols-1 gap-4">
                        <a href="#" class="text-base col-span-1 font-medium text-gray-900 hover:text-gray-700">Pricing</a>
                        <a href="#" class="text-base col-span-1 font-medium text-gray-900 hover:text-gray-700">Partners</a>
                        <a href="#" class="text-base col-span-1 font-medium text-gray-900 hover:text-gray-700">Company</a>
                     </div>
                     <div class="mt-6">
                        <a href="#" class="w-full flex items-center justify-center bg-gradient-to-r from-purple-600 to-indigo-600 bg-origin-border px-4 py-2 border border-transparent rounded-md shadow-sm text-base font-medium text-white hover:from-purple-700 hover:to-indigo-700">Sign up
                        </a>
                        <p class="mt-6 text-center text-base font-medium text-gray-500">
                           Existing customer? <a href="#" class="text-gray-900">Sign in</a>
                        </p>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </header>

      <main>
         <!-- Hero section -->
         <div class="relative">
            <div class="absolute inset-x-0 bottom-0 h-1/2 bg-gray-100"></div>
            <div class="w-full">
               <div class="relative shadow-xl sm:overflow-hidden">
                  <div class="absolute inset-0">
                     <img class="h-full w-full object-cover" src="https://images.unsplash.com/photo-1521737852567-6949f3f9f2b5?ixid=MXwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHw%3D&ixlib=rb-1.2.1&auto=format&fit=crop&w=2830&q=80&sat=-100" alt="People working on laptops">
                     <div class="absolute inset-0 bg-gradient-to-r from-purple-800 to-indigo-700 mix-blend-multiply"></div>
                  </div>
                  <div class="relative px-4 py-16 sm:px-6 sm:py-24 lg:py-32 lg:px-8">
                     <h1 class="text-center text-4xl font-extrabold tracking-tight sm:text-5xl lg:text-6xl">
                        <span class="block text-white">Take control of your</span>
                        <span class="block text-indigo-200">customer support</span>
                     </h1>
                     <p class="mt-6 max-w-lg mx-auto text-center text-xl text-indigo-200 sm:max-w-3xl">
                        Anim aute id magna aliqua ad ad non deserunt sunt. Qui irure qui lorem cupidatat commodo. Elit sunt amet fugiat veniam occaecat fugiat aliqua.
                     </p>
                     <div class="mt-10 max-w-sm mx-auto sm:max-w-none sm:flex sm:justify-center">
                        <div class="space-y-4 sm:space-y-0 sm:mx-auto sm:inline-grid sm:grid-cols-2 sm:gap-5">
                           <a href="#" class="flex items-center justify-center px-4 py-3 border border-transparent text-base font-medium rounded-md shadow-sm text-indigo-700 bg-white hover:bg-indigo-50 sm:px-8">
                              Get started
                           </a>
                           <a href="#" class="flex items-center justify-center px-4 py-3 border border-transparent text-base font-medium rounded-md shadow-sm text-white bg-indigo-500 bg-opacity-60 hover:bg-opacity-70 sm:px-8">
                              Live demo
                           </a>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>

         <!-- Partnership -->
         <div class="bg-gray-100">
            <div class="max-w-7xl mx-auto py-16 px-4 sm:px-6 lg:px-8">
               <p class="text-center text-sm font-semibold uppercase text-gray-500 tracking-wide">
                  Trusted by over 5 very average small businesses
               </p>
               <div class="mt-6 grid grid-cols-2 gap-8 md:grid-cols-6 lg:grid-cols-5">
                  <div class="col-span-1 flex justify-center md:col-span-2 lg:col-span-1">
                     <img class="h-12" src="https://tailwindui.com/img/logos/tuple-logo-gray-400.svg" alt="Tuple">
                  </div>
                  <div class="col-span-1 flex justify-center md:col-span-2 lg:col-span-1">
                     <img class="h-12" src="https://tailwindui.com/img/logos/mirage-logo-gray-400.svg" alt="Mirage">
                  </div>
                  <div class="col-span-1 flex justify-center md:col-span-2 lg:col-span-1">
                     <img class="h-12" src="https://tailwindui.com/img/logos/statickit-logo-gray-400.svg" alt="StaticKit">
                  </div>
                  <div class="col-span-1 flex justify-center md:col-span-2 md:col-start-2 lg:col-span-1">
                     <img class="h-12" src="https://tailwindui.com/img/logos/transistor-logo-gray-400.svg" alt="Transistor">
                  </div>
                  <div class="col-span-2 flex justify-center md:col-span-2 md:col-start-4 lg:col-span-1">
                     <img class="h-12" src="https://tailwindui.com/img/logos/workcation-logo-gray-400.svg" alt="Workcation">
                  </div>
               </div>
            </div>
         </div>

         <!-- Testimonial section -->
         <div class="pb-16 bg-gradient-to-r  from-teal-500 to-cyan-600 lg:pb-0 lg:z-10 lg:relative">
            <div class="lg:mx-auto lg:max-w-7xl lg:px-8 lg:grid lg:grid-cols-3 lg:gap-8">
               <div class="relative lg:-my-8">
                  <div aria-hidden="true" class="absolute inset-x-0 top-0 h-1/2 bg-white lg:hidden"></div>
                  <div class="mx-auto max-w-md px-4 sm:max-w-3xl sm:px-6 lg:p-0 lg:h-full">
                     <div class="aspect-w-10 aspect-h-6 rounded-xl shadow-xl overflow-hidden sm:aspect-w-16 sm:aspect-h-7 lg:aspect-none lg:h-full">
                     <img class="object-cover lg:h-full lg:w-full" src="https://images.unsplash.com/photo-1520333789090-1afc82db536a?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=2102&q=80" alt="">
                     </div>
                  </div>
               </div>
               <div class="mt-12 lg:m-0 lg:col-span-2 lg:pl-8">
                  <div class="mx-auto max-w-md px-4 sm:max-w-2xl sm:px-6 lg:px-0 lg:py-20 lg:max-w-none">
                     <blockquote>
                        <div>
                           <svg class="h-12 w-12 text-white opacity-25" fill="currentColor" viewBox="0 0 32 32" aria-hidden="true">
                              <path d="M9.352 4C4.456 7.456 1 13.12 1 19.36c0 5.088 3.072 8.064 6.624 8.064 3.36 0 5.856-2.688 5.856-5.856 0-3.168-2.208-5.472-5.088-5.472-.576 0-1.344.096-1.536.192.48-3.264 3.552-7.104 6.624-9.024L9.352 4zm16.512 0c-4.8 3.456-8.256 9.12-8.256 15.36 0 5.088 3.072 8.064 6.624 8.064 3.264 0 5.856-2.688 5.856-5.856 0-3.168-2.304-5.472-5.184-5.472-.576 0-1.248.096-1.44.192.48-3.264 3.456-7.104 6.528-9.024L25.864 4z" />
                           </svg>
                           <p class="mt-6 text-2xl font-medium text-white">
                              Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed urna nulla vitae laoreet augue. Amet feugiat est integer dolor auctor adipiscing nunc urna, sit.
                           </p>
                        </div>
                        <footer class="mt-6">
                           <p class="text-base font-medium text-white">Judith Black</p>
                           <p class="text-base font-medium text-cyan-100">CEO at PureInsights</p>
                        </footer>
                     </blockquote>
                  </div>
               </div>
            </div>
         </div>

         <div class="relative bg-gray-50 py-16 sm:py-24 lg:py-32">
            <div class="relative">
               <div class="text-center mx-auto max-w-md px-4 sm:max-w-3xl sm:px-6 lg:px-8 lg:max-w-7xl">
                  <h2 class="text-base font-semibold tracking-wider text-cyan-600 uppercase">Learn</h2>
                  <p class="mt-2 text-3xl font-extrabold text-gray-900 tracking-tight sm:text-4xl">
                     Helpful Resources
                  </p>
                  <p class="mt-5 mx-auto max-w-prose text-xl text-gray-500">
                     Phasellus lorem quam molestie id quisque diam aenean nulla in. Accumsan in quis quis nunc, ullamcorper malesuada. Eleifend condimentum id viverra nulla.
                  </p>
               </div>
            </div>
         </div>

         <!-- CTA Section -->
         <div class="relative bg-gray-900">
            <div class="relative h-56 bg-indigo-600 sm:h-72 md:absolute md:left-0 md:h-full md:w-1/2">
               <img class="w-full h-full object-cover" src="https://images.unsplash.com/photo-1525130413817-d45c1d127c42?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=1920&q=60&sat=-100" alt="">
               <div aria-hidden="true" class="absolute inset-0 bg-gradient-to-r from-teal-500 to-cyan-600 mix-blend-multiply"></div>
            </div>
            <div class="relative mx-auto max-w-md px-4 py-12 sm:max-w-7xl sm:px-6 sm:py-20 md:py-28 lg:px-8 lg:py-32">
               <div class="md:ml-auto md:w-1/2 md:pl-10">
                  <h2 class="text-base font-semibold uppercase tracking-wider text-gray-300">
                     Award winning support
                  </h2>
                  <p class="mt-2 text-white text-3xl font-extrabold tracking-tight sm:text-4xl">
                     We’re here to help
                  </p>
                  <p class="mt-3 text-lg text-gray-300">
                     Lorem ipsum dolor sit amet, consectetur adipiscing elit. Et, egestas tempus tellus etiam sed. Quam a scelerisque amet ullamcorper eu enim et fermentum, augue. Aliquet amet volutpat quisque ut interdum tincidunt duis.
                  </p>
                  <div class="mt-8">
                     <div class="inline-flex rounded-md shadow">
                        <a href="#" class="inline-flex items-center justify-center px-5 py-3 border border-transparent text-base font-medium rounded-md text-gray-900 bg-white hover:bg-gray-50">
                           Visit the help center
                           <!-- Heroicon name: solid/external-link -->
                           <svg class="-mr-1 ml-3 h-5 w-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                              <path d="M11 3a1 1 0 100 2h2.586l-6.293 6.293a1 1 0 101.414 1.414L15 6.414V9a1 1 0 102 0V4a1 1 0 00-1-1h-5z" />
                              <path d="M5 5a2 2 0 00-2 2v8a2 2 0 002 2h8a2 2 0 002-2v-3a1 1 0 10-2 0v3H5V7h3a1 1 0 000-2H5z" />
                           </svg>
                        </a>
                     </div>
                  </div>
               </div>
            </div>
         </div>

      </main>

      <footer class="bg-gray-50" aria-labelledby="footer-heading">
         <h2 id="footer-heading" class="sr-only">Footer</h2>
         <div class="max-w-7xl mx-auto pt-16 pb-8 px-4 sm:px-6 lg:pt-24 lg:px-8">
            <div class="w-full">
               <div class="grid grid-cols-2 gap-8">
                  <div class="md:grid md:grid-cols-2 md:gap-8">
                     <div>
                        <h3 class="text-sm font-semibold text-gray-400 tracking-wider uppercase">
                           Solutions
                        </h3>
                        <ul role="list" class="mt-4 space-y-4">
                           <li>
                           <a href="#" class="text-base text-gray-500 hover:text-gray-900">
                              Marketing
                           </a>
                           </li>
         
                           <li>
                           <a href="#" class="text-base text-gray-500 hover:text-gray-900">
                              Analytics
                           </a>
                           </li>
         
                           <li>
                           <a href="#" class="text-base text-gray-500 hover:text-gray-900">
                              Commerce
                           </a>
                           </li>
         
                           <li>
                           <a href="#" class="text-base text-gray-500 hover:text-gray-900">
                              Insights
                           </a>
                           </li>
                        </ul>
                     </div>

                     <div class="mt-12 md:mt-0">
                        <h3 class="text-sm font-semibold text-gray-400 tracking-wider uppercase">
                           Support
                        </h3>
                        <ul role="list" class="mt-4 space-y-4">
                           <li>
                              <a href="#" class="text-base text-gray-500 hover:text-gray-900">
                                 Pricing
                              </a>
                           </li>
                           <li>
                              <a href="#" class="text-base text-gray-500 hover:text-gray-900">
                                 Documentation
                              </a>
                           </li>
                           <li>
                              <a href="#" class="text-base text-gray-500 hover:text-gray-900">
                                 Guides
                              </a>
                           </li>
                           <li>
                              <a href="#" class="text-base text-gray-500 hover:text-gray-900">
                                 API Status
                              </a>
                           </li>
                        </ul>
                     </div>
                  </div>
                  <div class="md:grid md:grid-cols-2 md:gap-8">
                     <div>
                        <h3 class="text-sm font-semibold text-gray-400 tracking-wider uppercase">
                           Company
                        </h3>
                        <ul role="list" class="mt-4 space-y-4">
                           <li>
                           <a href="#" class="text-base text-gray-500 hover:text-gray-900">
                              About
                           </a>
                           </li>
         
                           <li>
                           <a href="#" class="text-base text-gray-500 hover:text-gray-900">
                              Blog
                           </a>
                           </li>
         
                           <li>
                           <a href="#" class="text-base text-gray-500 hover:text-gray-900">
                              Jobs
                           </a>
                           </li>
         
                           <li>
                           <a href="#" class="text-base text-gray-500 hover:text-gray-900">
                              Press
                           </a>
                           </li>
         
                           <li>
                           <a href="#" class="text-base text-gray-500 hover:text-gray-900">
                              Partners
                           </a>
                           </li>
                        </ul>
                     </div>
                     <div class="mt-12 md:mt-0">
                        <h3 class="text-sm font-semibold text-gray-400 tracking-wider uppercase">
                           Legal
                        </h3>
                        <ul role="list" class="mt-4 space-y-4">
                           <li>
                           <a href="#" class="text-base text-gray-500 hover:text-gray-900">
                              Claim
                           </a>
                           </li>
         
                           <li>
                           <a href="#" class="text-base text-gray-500 hover:text-gray-900">
                              Privacy
                           </a>
                           </li>
         
                           <li>
                           <a href="#" class="text-base text-gray-500 hover:text-gray-900">
                              Terms
                           </a>
                           </li>
                        </ul>
                     </div>
                  </div>
               </div>
               <div class="mt-12">
                  <h3 class="text-sm font-semibold text-gray-400 tracking-wider uppercase">
                     Subscribe to our newsletter
                  </h3>
                  <p class="mt-4 text-base text-gray-500">
                     The latest news, articles, and resources, sent to your inbox weekly.
                  </p>
                  <form class="mt-4 sm:flex sm:max-w-md">
                     <label for="email-address" class="sr-only">Email address</label>
                     <input type="email" name="email-address" id="email-address" autocomplete="email" required class="appearance-none min-w-0 w-full bg-white border border-gray-300 rounded-md shadow-sm py-2 px-4 text-base text-gray-900 placeholder-gray-500 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:placeholder-gray-400" placeholder="Enter your email">
                     <div class="mt-3 rounded-md sm:mt-0 sm:ml-3 sm:flex-shrink-0">
                        <button type="submit" class="w-full flex items-center justify-center bg-gradient-to-r from-purple-600 to-indigo-600 bg-origin-border px-4 py-3 border border-transparent text-base font-medium rounded-md shadow-sm text-white hover:from-purple-700 hover:to-indigo-700">
                           Subscribe
                        </button>
                     </div>
                  </form>
               </div>
            </div>
            <div class="mt-12 border-t border-gray-200 pt-8 md:flex md:items-center md:justify-between lg:mt-16">
               <div class="flex space-x-6 md:order-2">
                  <a href="#" class="text-gray-400 hover:text-gray-500">
                     <span class="sr-only">Facebook</span>
                     <svg class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                        <path fill-rule="evenodd" d="M22 12c0-5.523-4.477-10-10-10S2 6.477 2 12c0 4.991 3.657 9.128 8.438 9.878v-6.987h-2.54V12h2.54V9.797c0-2.506 1.492-3.89 3.777-3.89 1.094 0 2.238.195 2.238.195v2.46h-1.26c-1.243 0-1.63.771-1.63 1.562V12h2.773l-.443 2.89h-2.33v6.988C18.343 21.128 22 16.991 22 12z" clip-rule="evenodd" />
                     </svg>
                  </a>
     
                  <a href="#" class="text-gray-400 hover:text-gray-500">
                     <span class="sr-only">Instagram</span>
                     <svg class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                        <path fill-rule="evenodd" d="M12.315 2c2.43 0 2.784.013 3.808.06 1.064.049 1.791.218 2.427.465a4.902 4.902 0 011.772 1.153 4.902 4.902 0 011.153 1.772c.247.636.416 1.363.465 2.427.048 1.067.06 1.407.06 4.123v.08c0 2.643-.012 2.987-.06 4.043-.049 1.064-.218 1.791-.465 2.427a4.902 4.902 0 01-1.153 1.772 4.902 4.902 0 01-1.772 1.153c-.636.247-1.363.416-2.427.465-1.067.048-1.407.06-4.123.06h-.08c-2.643 0-2.987-.012-4.043-.06-1.064-.049-1.791-.218-2.427-.465a4.902 4.902 0 01-1.772-1.153 4.902 4.902 0 01-1.153-1.772c-.247-.636-.416-1.363-.465-2.427-.047-1.024-.06-1.379-.06-3.808v-.63c0-2.43.013-2.784.06-3.808.049-1.064.218-1.791.465-2.427a4.902 4.902 0 011.153-1.772A4.902 4.902 0 015.45 2.525c.636-.247 1.363-.416 2.427-.465C8.901 2.013 9.256 2 11.685 2h.63zm-.081 1.802h-.468c-2.456 0-2.784.011-3.807.058-.975.045-1.504.207-1.857.344-.467.182-.8.398-1.15.748-.35.35-.566.683-.748 1.15-.137.353-.3.882-.344 1.857-.047 1.023-.058 1.351-.058 3.807v.468c0 2.456.011 2.784.058 3.807.045.975.207 1.504.344 1.857.182.466.399.8.748 1.15.35.35.683.566 1.15.748.353.137.882.3 1.857.344 1.054.048 1.37.058 4.041.058h.08c2.597 0 2.917-.01 3.96-.058.976-.045 1.505-.207 1.858-.344.466-.182.8-.398 1.15-.748.35-.35.566-.683.748-1.15.137-.353.3-.882.344-1.857.048-1.055.058-1.37.058-4.041v-.08c0-2.597-.01-2.917-.058-3.96-.045-.976-.207-1.505-.344-1.858a3.097 3.097 0 00-.748-1.15 3.098 3.098 0 00-1.15-.748c-.353-.137-.882-.3-1.857-.344-1.023-.047-1.351-.058-3.807-.058zM12 6.865a5.135 5.135 0 110 10.27 5.135 5.135 0 010-10.27zm0 1.802a3.333 3.333 0 100 6.666 3.333 3.333 0 000-6.666zm5.338-3.205a1.2 1.2 0 110 2.4 1.2 1.2 0 010-2.4z" clip-rule="evenodd" />
                     </svg>
                  </a>
      
                  <a href="#" class="text-gray-400 hover:text-gray-500">
                     <span class="sr-only">Dribbble</span>
                     <svg class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                        <path fill-rule="evenodd" d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10c5.51 0 10-4.48 10-10S17.51 2 12 2zm6.605 4.61a8.502 8.502 0 011.93 5.314c-.281-.054-3.101-.629-5.943-.271-.065-.141-.12-.293-.184-.445a25.416 25.416 0 00-.564-1.236c3.145-1.28 4.577-3.124 4.761-3.362zM12 3.475c2.17 0 4.154.813 5.662 2.148-.152.216-1.443 1.941-4.48 3.08-1.399-2.57-2.95-4.675-3.189-5A8.687 8.687 0 0112 3.475zm-3.633.803a53.896 53.896 0 013.167 4.935c-3.992 1.063-7.517 1.04-7.896 1.04a8.581 8.581 0 014.729-5.975zM3.453 12.01v-.26c.37.01 4.512.065 8.775-1.215.25.477.477.965.694 1.453-.109.033-.228.065-.336.098-4.404 1.42-6.747 5.303-6.942 5.629a8.522 8.522 0 01-2.19-5.705zM12 20.547a8.482 8.482 0 01-5.239-1.8c.152-.315 1.888-3.656 6.703-5.337.022-.01.033-.01.054-.022a35.318 35.318 0 011.823 6.475 8.4 8.4 0 01-3.341.684zm4.761-1.465c-.086-.52-.542-3.015-1.659-6.084 2.679-.423 5.022.271 5.314.369a8.468 8.468 0 01-3.655 5.715z" clip-rule="evenodd" />
                     </svg>
                  </a>
               </div>
               <p class="mt-8 text-base text-gray-400 md:mt-0 md:order-1">
                  &copy; 2020 Workflow, Inc. All rights reserved.
               </p>
            </div>
         </div>
      </footer>
   </body>
</html>
