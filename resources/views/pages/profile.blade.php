@extends('layouts.home')

@section('section-content')
<div class="min-h-full" x-data="{ openDrop: false, openMobile:false }">
   <header class="pb-24 bg-gradient-to-r from-sky-800 to-cyan-600">
      <div class="max-w-3xl mx-auto px-4 sm:px-6 lg:max-w-7xl lg:px-8">
         <div class="relative flex flex-wrap items-center justify-center lg:justify-between">
            <!-- Logo -->
            <div class="absolute left-0 py-5 flex-shrink-0 lg:static">
               <a href="/">
                  <span class="sr-only">Workflow</span>
                  <img src="{{ asset('img/logo_white.png') }}" class="w-48" alt="">
               </a>
            </div>
  
            <!-- Right section on desktop -->
            <div class="hidden lg:ml-4 lg:flex lg:items-center lg:py-5 lg:pr-0.5">
               <button type="button" class="flex-shrink-0 p-1 text-cyan-200 rounded-full hover:text-white hover:bg-white hover:bg-opacity-10 focus:outline-none focus:ring-2 focus:ring-white">
                  <span class="sr-only">View notifications</span>
                  <!-- Heroicon name: outline/bell -->
                  <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                     <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9" />
                  </svg>
               </button>
  
               <!-- Profile dropdown -->
               <div class="ml-4 relative flex-shrink-0">
                  <div>
                     <button type="button" x-on:click="openDrop = !openDrop" x-on:click.away="openDrop = false" class="bg-white rounded-full flex text-sm ring-2 ring-white ring-opacity-20 focus:outline-none focus:ring-opacity-100" id="user-menu-button" aria-expanded="false" aria-haspopup="true">
                        <span class="sr-only">Open user menu</span>
                        <img class="h-8 w-8 rounded-full" src="{{ auth()->user()->thumb_image_url !='' ? auth()->user()->thumb_image_url : asset('img/face.jpg') }}" alt="">
                     </button>
                  </div>
                  <div x-show="openDrop" style="display: none" 
                     x-transition:enter="transition ease-out duration-200" 
                     x-transition:enter-start="transform opacity-0 scale-95" 
                     x-transition:enter-end="transform opacity-100 scale-100" 
                     x-transition:leave="transition ease-in duration-100" 
                     x-transition:leave-start="transform opacity-100 scale-100" 
                     x-transition:leave-end="transform opacity-0 scale-95" 
                     class="origin-top-right z-40 absolute -right-2 mt-2 w-48 rounded-md shadow-lg py-1 bg-white ring-1 ring-black ring-opacity-5 focus:outline-none" role="menu" aria-orientation="vertical">
                     <a class="block px-4 py-2 text-sm text-gray-700"
                        href="{{ route('logout') }}"
                        onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        {{ __('Logout') }}
                     </a>
                     <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                     </form>
                  </div>
               </div>
            </div>
  
            <!-- Menu button -->
            <div class="absolute right-0 flex-shrink-0 lg:hidden">
               <button type="button" x-on:click="openMobile = true" class="bg-transparent p-2 rounded-md inline-flex items-center justify-center text-cyan-200 hover:text-white hover:bg-white hover:bg-opacity-10 focus:outline-none focus:ring-2 focus:ring-white" aria-expanded="false">
                  <span class="sr-only">Open main menu</span>
                  <svg class="block h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                     <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                  </svg>
                  <svg class="hidden h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                     <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                  </svg>
               </button>
            </div>
         </div>
      </div>
      <!-- Mobile menu, show/hide based on mobile menu state. -->
      <div class="lg:hidden" x-show="openMobile" style="display: none">
         <div x-show="openMobile"
            x-transition:enter="duration-150 ease-out" 
            x-transition:enter-start="opacity-0" 
            x-transition:enter-end="opacity-100" 
            x-transition:leave="duration-150 ease-in" 
            x-transition:leave-start="opacity-100" 
            x-transition:leave-end="opacity-0" 
            class="z-20 fixed inset-0 bg-black bg-opacity-25" aria-hidden="true">
         </div>

         <div x-show="openMobile"
            x-transition:enter="duration-150 ease-out" 
            x-transition:enter-start="opacity-0 scale-95" 
            x-transition:enter-end="opacity-100 scale-100" 
            x-transition:leave="duration-150 ease-in" 
            x-transition:leave-start="opacity-100 scale-100" 
            x-transition:leave-end="opacity-0 scale-95"
            class="z-30 absolute top-0 inset-x-0 max-w-3xl mx-auto w-full p-2 transition transform origin-top">
            <div class="rounded-lg shadow-lg ring-1 ring-black ring-opacity-5 bg-white divide-y divide-gray-200">
               <div class="pt-3 pb-2">
                  <div class="flex items-center justify-between px-4">
                     <div>
                        <img class="h-8 w-auto" src="https://tailwindui.com/img/logos/workflow-mark-cyan-600.svg" alt="Workflow">
                     </div>
                     <div class="-mr-2">
                        <button type="button" x-on:click="openMobile = false" class="bg-white rounded-md p-2 inline-flex items-center justify-center text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-cyan-500">
                        <span class="sr-only">Close menu</span>
                        <!-- Heroicon name: outline/x -->
                        <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                           <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                        </svg>
                        </button>
                     </div>
                  </div>
                  <div class="mt-3 px-2 space-y-1">
                     <a href="#" class="block rounded-md px-3 py-2 text-base text-gray-900 font-medium hover:bg-gray-100 hover:text-gray-800">Home</a>
                  </div>
               </div>
               <div class="pt-4 pb-2">
                  <div class="flex items-center px-5">
                     <div class="flex-shrink-0">
                        <img class="h-10 w-10 rounded-full" src="{{ auth()->user()->thumb_image_url !='' ? auth()->user()->thumb_image_url : asset('img/face.jpg') }}" alt="">
                     </div>
                     <div class="ml-3 min-w-0 flex-1">
                        <div class="text-base font-medium text-gray-800 truncate">Chelsea Hagon</div>
                        <div class="text-sm font-medium text-gray-500 truncate">chelseahagon@example.com</div>
                     </div>
                     <button type="button" class="ml-auto flex-shrink-0 bg-white p-1 text-gray-400 rounded-full hover:text-gray-500 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-cyan-500">
                        <span class="sr-only">View notifications</span>
                        <!-- Heroicon name: outline/bell -->
                        <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9" />
                        </svg>
                     </button>
                  </div>
                  <div class="mt-3 px-2 space-y-1">
                     <a href="#" class="block rounded-md px-3 py-2 text-base text-gray-900 font-medium hover:bg-gray-100 hover:text-gray-800">Sign out</a>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </header>

   <div class="-mt-16 pb-8">
      <div class="max-w-3xl mx-auto px-4 sm:px-6 lg:max-w-7xl lg:px-8">
         <h1 class="sr-only">Profile</h1>

         <div class="grid grid-cols-1 gap-4 items-start lg:grid-cols-3 lg:gap-8">
            <div class="grid grid-cols-1 gap-4 lg:col-span-2">
               <section aria-labelledby="profile-overview-title">
                  <div class="rounded-lg bg-white overflow-hidden shadow">
                     <h2 class="sr-only" id="profile-overview-title">Profile Overview</h2>
                     <div class="bg-white p-6">
                        <div class="sm:flex sm:items-center sm:justify-between">
                           <div class="sm:flex sm:space-x-5">
                              <div class="flex-shrink-0">
                                 <img class="mx-auto h-20 w-20 rounded-full" src="{{ auth()->user()->thumb_image_url !='' ? auth()->user()->thumb_image_url : asset('img/face.jpg') }}" alt="">
                              </div>
                              <div class="mt-4 text-center sm:mt-0 sm:pt-1 sm:text-left">
                                 <p class="text-sm font-medium text-gray-600">Welcome back,</p>
                                 <p class="text-xl font-bold text-gray-900 sm:text-2xl">{{ auth()->user()->name }}</p>
                                 {{-- <p class="text-sm font-medium text-gray-600">Human Resources Manager</p> --}}
                              </div>
                           </div>
                        </div>
                     </div>

                     <div class="border-t border-gray-200 bg-gray-50 grid grid-cols-1 divide-y divide-gray-200 sm:grid-cols-3 sm:divide-y-0 sm:divide-x">
                        <div class="px-6 py-5 text-sm font-medium text-center">
                          <span class="text-gray-900">{{ count(auth()->user()->applications) }}</span>
                          <span class="text-gray-600">Events applied</span>
                        </div>
        
                        <div class="px-6 py-5 text-sm font-medium text-center">
                          <span class="text-gray-900">4</span>
                          <span class="text-gray-600">Payments</span>
                        </div>
        
                        <div class="px-6 py-5 text-sm font-medium text-center">
                          <span class="text-gray-900">2</span>
                          <span class="text-gray-600">Awards</span>
                        </div>
                     </div>

                  </div>
               </section>

               {{-- Events --}}
               <section aria-labelledby="recent-hires-title">
                  <div class="rounded-lg bg-white overflow-hidden shadow">
                     <div class="p-6">
                        <h2 class="text-base font-medium text-gray-900" id="recent-hires-title">Events</h2>
                        @if(count(auth()->user()->applications) > 0)
                        <div class="flow-root mt-6">
                           <ul role="list" class="-my-5 divide-y divide-gray-200">
                              <li class="py-4">
                                 <div class="flex items-center space-x-4">
                                    <div class="flex-shrink-0">
                                       <img class="h-10 w-10 rounded-md" src="{{ asset('img/face.jpg') }}" alt="">
                                    </div>
                                    <div class="flex-1 min-w-0">
                                       <p class="text-sm font-medium text-gray-900 truncate">
                                          Leonard Krasner
                                       </p>
                                       <p class="text-sm text-gray-500 truncate">
                                          @leonardkrasner
                                       </p>
                                    </div>
                                    <div>
                                       <a href="#" class="inline-flex items-center shadow-sm px-2.5 py-0.5 border border-gray-300 text-sm leading-5 font-medium rounded-full text-gray-700 bg-white hover:bg-gray-50">
                                          View
                                       </a>
                                    </div>
                                 </div>
                              </li>
                           </ul>
                        </div>

                        <div class="mt-6">
                           <a href="#" class="w-full flex justify-center items-center px-4 py-2 border border-gray-300 shadow-sm text-sm font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50">
                           View all
                           </a>
                        </div>
                        @else
                        <p class="text-sm p-3 leading-5 tracking-wider text-gray-600 text-center mt-6">You have not applied for any event</p>
                        @endif
                     </div>
                  </div>
               </section>
            </div>

            <!-- Right column -->
            <div class="grid grid-cols-1 gap-4">
               <!-- Announcements -->
               <section aria-labelledby="announcements-title">
                  <div class="rounded-lg bg-white overflow-hidden shadow">
                     <div class="">
                        <h2 class="px-6 py-5 text-sm font-medium text-center text-gray-900 bg-gray-50" id="announcements-title">Announcements</h2>
                        <div class="p-6">
                           {{-- <div class="flow-root mt-6">
                              <ul role="list" class="-my-5 divide-y divide-gray-200">
                                 <li class="py-5">
                                    <div class="relative focus-within:ring-2 focus-within:ring-cyan-500">
                                       <h3 class="text-sm font-semibold text-gray-800">
                                       <a href="#" class="hover:underline focus:outline-none">
                                          <!-- Extend touch target to entire panel -->
                                          <span class="absolute inset-0" aria-hidden="true"></span>
                                          Office closed on July 2nd
                                       </a>
                                       </h3>
                                       <p class="mt-1 text-sm text-gray-600 line-clamp-2">
                                       Cum qui rem deleniti. Suscipit in dolor veritatis sequi aut. Vero ut earum quis deleniti. Ut a sunt eum cum ut repudiandae possimus. Nihil ex tempora neque cum consectetur dolores.
                                       </p>
                                    </div>
                                 </li>
   
                                 <li class="py-5">
                                    <div class="relative focus-within:ring-2 focus-within:ring-cyan-500">
                                       <h3 class="text-sm font-semibold text-gray-800">
                                       <a href="#" class="hover:underline focus:outline-none">
                                          <!-- Extend touch target to entire panel -->
                                          <span class="absolute inset-0" aria-hidden="true"></span>
                                          New password policy
                                       </a>
                                       </h3>
                                       <p class="mt-1 text-sm text-gray-600 line-clamp-2">
                                       Alias inventore ut autem optio voluptas et repellendus. Facere totam quaerat quam quo laudantium cumque eaque excepturi vel. Accusamus maxime ipsam reprehenderit rerum id repellendus rerum. Culpa cum vel natus. Est sit autem mollitia.
                                       </p>
                                    </div>
                                 </li>
   
                                 <li class="py-5">
                                    <div class="relative focus-within:ring-2 focus-within:ring-cyan-500">
                                       <h3 class="text-sm font-semibold text-gray-800">
                                       <a href="#" class="hover:underline focus:outline-none">
                                          <!-- Extend touch target to entire panel -->
                                          <span class="absolute inset-0" aria-hidden="true"></span>
                                          Office closed on July 2nd
                                       </a>
                                       </h3>
                                       <p class="mt-1 text-sm text-gray-600 line-clamp-2">
                                       Tenetur libero voluptatem rerum occaecati qui est molestiae exercitationem. Voluptate quisquam iure assumenda consequatur ex et recusandae. Alias consectetur voluptatibus. Accusamus a ab dicta et. Consequatur quis dignissimos voluptatem nisi.
                                       </p>
                                    </div>
                                 </li>
                              </ul>
                           </div>
                           <div class="mt-6">
                              <a href="#" class="w-full flex justify-center items-center px-4 py-2 border border-gray-300 shadow-sm text-sm font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50">
                              View all
                              </a>
                           </div> --}}
                           <p class="text-sm p-3 leading-5 tracking-wider text-gray-600 text-center">You have no announcement</p>
                        </div>
                     </div>
                  </div>
               </section>
            </div>
            
         </div>
      </div>
   </div>
</div>
@endsection