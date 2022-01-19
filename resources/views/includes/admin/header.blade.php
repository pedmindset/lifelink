<div class="pt-2">
   <div class="bg-white shadow-sm mx-3 rounded flex">
      <div class="border-r border-gray-200 w-auto flex justify-center items-center cursor-pointer p-3" @click.prevent="sidebarMax = !sidebarMax">
         <span><i class="las la-bars text-gray-800"></i></span>
      </div>
      <div class="text-lg text-green-700 flex justify-center items-center w-52 uppercase leading-5 tracking-wide border-r border-gray-200 p-3 font-semibold">life link ghana</div>
      <div class="flex justify-between p-3 w-full">
         <div></div>
         <div class="flex justify-end">
            <button class="p-1 text-gray-400 rounded-full hover:bg-gray-100 hover:text-gray-500 focus:outline-none focus:shadow-outline focus:text-gray-500">
               <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9" />
               </svg>
            </button>
            <div class="ml-3 relative" @click.away="accountOpen = false" x-data="{ accountOpen: false }">
               <button @click="accountOpen = !accountOpen" class="max-w-xs flex items-center text-sm rounded-full focus:outline-none focus:shadow-outline">
                  <img src="{{ asset('img/profile.jpg') }}" alt="user" class="h-8 w-8 rounded-full object-cover">
               </button>

               <div x-show="accountOpen" x-transition:enter="transition ease-out duration-100" x-transition:enter-start="transform opacity-0 scale-95" x-transition:enter-end="transform opacity-100 scale-100" x-transition:leave="transition ease-in duration-75" x-transition:leave-start="transform opacity-100 scale-100" x-transition:leave-end="transform opacity-0 scale-95" class="origin-top-right absolute right-0 mt-2 z-10 w-48 rounded-md shadow-lg">
                  <div class="rounded-md bg-white shadow-xs">
                     <a href="" class="block px-4 py-2 text-sm leading-5 text-gray-700 hover:bg-indigo-500 hover:text-white hover:shadow-md transition ease-in-out duration-150">Settings</a>
                     <div class="border-t border-gray-100"></div>
                     <a class="block w-full text-left px-4 py-3 text-sm leading-5 text-gray-700 hover:bg-indigo-500 hover:text-white hover:shadow-md focus:outline-none focus:bg-gray-100 focus:text-gray-900" href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        {{ __('Logout') }}
                     </a>
                     <form id="logout-form" action="#" method="POST" class="hidden">
                        @csrf
                     </form>
                  </div>
               </div>
            </div>
            {{-- <p class="flex justify-center items-center pr-2 uppercase font-medium text-sm">sing in</p>
            <img src="{{ asset('img/profile.jpg') }}" alt="" class="rounded-full w-8 h-8 border border-gray-100"> --}}
         </div>
      </div>
   </div>
</div>