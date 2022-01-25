<nav x-data="{ open: false }" x-on:click.away="open = false" class="bg-white border-b border-gray-100">
   <!-- Primary Navigation Menu -->
   <div class="px-4 mx-auto max-w-7xl sm:px-6 lg:px-8">
      <div class="flex justify-between h-16">
         <div class="flex">
            <!-- Logo -->
            <div class="flex items-center shrink-0">
               <a href="{{ route('dashboard') }}">
                  <x-application-logo class="block w-auto h-10 text-gray-600 fill-current" />
               </a>
            </div>

            <!-- Navigation Links -->
            {{-- <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
               <x-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                  {{ __('Dashboard') }}
               </x-nav-link>
               <x-nav-link :href="'conferences'" :active="request()->routeIs('conferences')">
                  {{ __('Conference') }}
               </x-nav-link>
            </div> --}}

            <div class="container relative left-0 ml-8 flex w-3/4 h-auto">
               <div class="relative flex items-center w-full lg:w-64 h-full group">
                  <div class="absolute z-50 flex items-center justify-center w-auto h-10 p-3 pr-2 text-sm text-gray-500 uppercase cursor-pointer sm:hidden">
                     <svg fill="none" class="relative w-5 h-5" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" stroke="currentColor" viewBox="0 0 24 24">
                        <path d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z">
                        </path>
                     </svg>
                  </div>
                  <svg class="absolute left-0 z-20 hidden w-4 h-4 ml-4 text-gray-500 pointer-events-none fill-current group-hover:text-gray-400 sm:block" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                     <path d="M12.9 14.32a8 8 0 1 1 1.41-1.41l5.35 5.33-1.42 1.42-5.33-5.34zM8 14A6 6 0 1 0 8 2a6 6 0 0 0 0 12z">
                     </path>
                  </svg>
                  <input type="text" class="block w-full py-1.5 pl-10 pr-4 border-0 leading-normal rounded-2xl focus:border-transparent focus:outline-none focus:ring-2 focus:ring-blue-500 ring-opacity-90 bg-gray-100 dark:bg-gray-800 text-gray-400 aa-input" placeholder="Search"/>
                  <div class="absolute right-0 hidden h-auto px-2 py-1 mr-2 text-xs text-gray-400 border border-gray-300 rounded-2xl md:block">
                     +
                  </div>
               </div>
            </div>
            
         </div>

         <!-- Settings Dropdown -->
         <div class="hidden sm:flex sm:items-center sm:ml-6">
            <x-dropdown align="right" width="48">
               <x-slot name="trigger">
                  <button x-on:click.prevent="open = !open" class="flex items-center text-sm font-medium text-gray-500 transition duration-150 ease-in-out hover:text-gray-700 hover:border-gray-300 focus:outline-none focus:text-gray-700 focus:border-gray-300">
                        <div>{{ Auth::user()->name }}</div>

                        <div class="ml-1">
                           <svg class="w-4 h-4 fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                              <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                           </svg>
                        </div>
                  </button>
               </x-slot>

               <x-slot name="content">
                  <!-- Authentication -->
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

         <!-- Hamburger -->
         <div class="flex items-center -mr-2 sm:hidden">
               <button x-on:click="open = ! open" class="inline-flex items-center justify-center p-2 text-gray-400 transition duration-150 ease-in-out rounded-md hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 focus:text-gray-500">
                  <svg class="w-6 h-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                     <path x-bind:class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                     <path x-bind:class="{'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                  </svg>
               </button>
         </div>
      </div>
   </div>

   <!-- Responsive Navigation Menu -->
   <div x-bind:class="{'block': open, 'hidden': ! open}" class="hidden sm:hidden">
      <div class="pt-2 pb-3 space-y-1">
         <x-responsive-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
            {{ __('Dashboard') }}
         </x-responsive-nav-link>
      </div>

      <!-- Responsive Settings Options -->
      <div class="pt-4 pb-1 border-t border-gray-200">
         <div class="px-4">
            <div class="text-base font-medium text-gray-800">{{ Auth::user()->name }}</div>
            <div class="text-sm font-medium text-gray-500">{{ Auth::user()->email }}</div>
         </div>

         <div class="mt-3 space-y-1">
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
</nav>
