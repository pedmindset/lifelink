{{-- <div>
   <div class="hidden lg:block my-4 ml-4 shadow-lg relative w-80 bg-white min-h-full rounded-2xl dark:bg-gray-700">
      <div class="flex items-center justify-center py-3 rounded-t-2xl bg-gray-50">
         <x-application-logo class="block w-auto h-10 text-gray-600 fill-current" />
      </div>
      <nav class="mt-1 pb-3">
         <div>
            <x-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
               <span class="text-left">
                  <svg width="20" height="20" fill="currentColor" viewBox="0 0 2048 1792" xmlns="http://www.w3.org/2000/svg">
                     <path d="M1070 1178l306-564h-654l-306 564h654zm722-282q0 182-71 348t-191 286-286 191-348 71-348-71-286-191-191-286-71-348 71-348 191-286 286-191 348-71 348 71 286 191 191 286 71 348z">
                     </path>
                  </svg>
               </span>
               <span class="mx-4 text-sm font-normal">
                  {{ __('Dashboard') }}
               </span>
            </x-nav-link>
            <x-nav-link :href="'/conferences'" :active="request()->routeIs('conferences' || request()->routeIs('conference/create' ">
               <span class="text-left">
                  <svg width="20" height="20" fill="currentColor" class="m-auto" viewBox="0 0 2048 1792" xmlns="http://www.w3.org/2000/svg">
                     <path d="M1024 1131q0-64-9-117.5t-29.5-103-60.5-78-97-28.5q-6 4-30 18t-37.5 21.5-35.5 17.5-43 14.5-42 4.5-42-4.5-43-14.5-35.5-17.5-37.5-21.5-30-18q-57 0-97 28.5t-60.5 78-29.5 103-9 117.5 37 106.5 91 42.5h512q54 0 91-42.5t37-106.5zm-157-520q0-94-66.5-160.5t-160.5-66.5-160.5 66.5-66.5 160.5 66.5 160.5 160.5 66.5 160.5-66.5 66.5-160.5zm925 509v-64q0-14-9-23t-23-9h-576q-14 0-23 9t-9 23v64q0 14 9 23t23 9h576q14 0 23-9t9-23zm0-260v-56q0-15-10.5-25.5t-25.5-10.5h-568q-15 0-25.5 10.5t-10.5 25.5v56q0 15 10.5 25.5t25.5 10.5h568q15 0 25.5-10.5t10.5-25.5zm0-252v-64q0-14-9-23t-23-9h-576q-14 0-23 9t-9 23v64q0 14 9 23t23 9h576q14 0 23-9t9-23zm256-320v1216q0 66-47 113t-113 47h-352v-96q0-14-9-23t-23-9h-64q-14 0-23 9t-9 23v96h-768v-96q0-14-9-23t-23-9h-64q-14 0-23 9t-9 23v96h-352q-66 0-113-47t-47-113v-1216q0-66 47-113t113-47h1728q66 0 113 47t47 113z">
                     </path>
                  </svg>
               </span>
               <span class="mx-4 text-sm font-normal">
                  {{ __('Conference') }}
               </span>
            </x-nav-link>
            
            <x-nav-link :href="'/officials'" :active="request()->routeIs('officials'">
               <span class="text-left">
                  <i class="las la-person-booth m-auto text-2xl"></i>
               </span>
               <span class="mx-4 text-sm font-normal">
                  {{ __('Officials') }}
               </span>
            </x-nav-link>

            <x-nav-link :href="'/members'" :active="request()->routeIs('members'">
               <span class="text-left">
                  <i class="las la-users m-auto text-2xl"></i>
               </span>
               <span class="mx-4 text-sm font-normal">
                  {{ __('Members') }}
               </span>
            </x-nav-link>
            <x-nav-link :href="'/aluminias'" :active="request()->routeIs('aluminias'">
               <span class="text-left">
                  <i class="las la-user-shield m-auto text-2xl"></i>
               </span>
               <span class="mx-4 text-sm font-normal">
                  {{ __('Aluminia') }}
               </span>
            </x-nav-link>
            
            <x-nav-link :href="'/payments'" :active="request()->routeIs('payments'">
               <span class="text-left">
                  <i class="las la-hand-holding-usd m-auto text-2xl"></i>
               </span>
               <span class="mx-4 text-sm font-normal">
                  {{ __('Payment') }}
               </span>
            </x-nav-link>
            <x-nav-link :href="'/awards-citations'" :active="request()->routeIs('awards-citations'">
               <span class="text-left">
                  <i class="las la-user-graduate m-auto text-2xl"></i>
               </span>
               <span class="mx-4 text-sm font-normal">
                  {{ __('Award and Citation') }}
               </span>
            </x-nav-link>
            <x-nav-link :href="'/settings'" :active="request()->routeIs('settings'">
               <span class="text-left">
                  <i class="las la-cogs m-auto text-2xl"></i>
               </span>
               <span class="mx-4 text-sm font-normal">
                  {{ __('Settings') }}
               </span>
            </x-nav-link>
         </div>
      </nav>
   </div>
</div> --}}


<div id="sidebar" class="hidden shadow-lg relative mt-10 min-h-full rounded-b-2xl bg-white ml-2 lg:flex flex-shrink-0 flex-col w-64 transition-width duration-75" aria-label="Sidebar">
   <div class="relative flex-1 flex flex-col min-h-0 border-r border-gray-200 pt-0 pb-8">
      <div class="flex-1 flex flex-col pt-5 pb-4 overflow-y-auto">
         <div class="flex-1 px-3 bg-white divide-y space-y-1">
            <ul class="space-y-2 pb-2">
               <li>
                  <form action="#" method="GET" class="lg:hidden">
                     <label for="mobile-search" class="sr-only">Search</label>
                     <div class="relative">
                     <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                        <svg class="w-5 h-5 text-gray-500" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M5 3a2 2 0 00-2 2v2a2 2 0 002 2h2a2 2 0 002-2V5a2 2 0 00-2-2H5zM5 11a2 2 0 00-2 2v2a2 2 0 002 2h2a2 2 0 002-2v-2a2 2 0 00-2-2H5zM11 5a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V5zM11 13a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z"></path></svg>
                     </div>
                     <input type="text" name="email" id="mobile-search" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-cyan-600 focus:ring-cyan-600 block w-full pl-10 p-2.5" placeholder="Search">
                     </div>
                  </form>
               </li>
               <li>
                  <x-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                     <svg class="w-6 h-6 text-gray-500 group-hover:text-gray-900 transition duration-75" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M2 10a8 8 0 018-8v8h8a8 8 0 11-16 0z"></path><path d="M12 2.252A8.014 8.014 0 0117.748 8H12V2.252z"></path></svg>
                     <span class="ml-3">Dashboard</span>
                  </x-nav-link>
               </li>
               <li>
                  <x-nav-link :href="route('users')" :active="request()->routeIs('users')">
                     <svg class="w-6 h-6 text-gray-500 flex-shrink-0 group-hover:text-gray-900 transition duration-75" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z" clip-rule="evenodd"></path></svg>
                     <span class="ml-3 flex-1 whitespace-nowrap">Users</span>
                  </x-nav-link>
               </li>
               <li>
                  <x-nav-link :href="route('conferences')" :active="request()->routeIs('conferences')">
                     <svg class="w-6 h-6 text-gray-500 flex-shrink-0 group-hover:text-gray-900 transition duration-75" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M5 3a2 2 0 00-2 2v2a2 2 0 002 2h2a2 2 0 002-2V5a2 2 0 00-2-2H5zM5 11a2 2 0 00-2 2v2a2 2 0 002 2h2a2 2 0 002-2v-2a2 2 0 00-2-2H5zM11 5a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V5zM11 13a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z"></path></svg>
                     <span class="ml-3 flex-1 whitespace-nowrap">Conferences</span>
                  </x-nav-link>
               </li>

               <li>
                  <x-nav-link :href="route('officials')" :active="request()->routeIs('officials')">
                     <span class="text-left text-gray-500 flex-shrink-0 group-hover:text-gray-900 transition duration-75">
                        <i class="las la-person-booth m-auto text-3xl"></i>
                     </span>
                     <span class="ml-3 flex-1 whitespace-nowrap">{{ __('Officials') }}</span>
                  </x-nav-link>
               </li>
               <li>
                  <x-nav-link :href="route('members')" :active="request()->routeIs('members')">
                     <span class="text-left text-gray-500 flex-shrink-0 group-hover:text-gray-900 transition duration-75">
                        <i class="las la-users m-auto text-3xl"></i>
                     </span>
                     <span class="ml-3 flex-1 whitespace-nowrap">{{ __('Members') }}</span>
                  </x-nav-link>
               </li>
               {{-- <li>
                  <x-nav-link :href="'/aluminias'" :active="request()->routeIs('aluminias')">
                     <span class="text-left text-gray-500 flex-shrink-0 group-hover:text-gray-900 transition duration-75">
                        <i class="las la-user-shield m-auto text-2xl"></i>
                     </span>
                     <span class="mx-4 text-sm font-normal">
                        {{ __('Aluminia') }}
                     </span>
                  </x-nav-link>
               </li> --}}
               <li>
                  <x-nav-link :href="route('payments')" :active="request()->routeIs('payments')">
                     <span class="text-left text-gray-500 flex-shrink-0 group-hover:text-gray-900 transition duration-75">
                        <i class="las la-hand-holding-usd m-auto text-3xl"></i>
                     </span>
                     <span class="ml-3 flex-1 whitespace-nowrap">{{ __('Payment') }}</span>
                  </x-nav-link>
               </li>
               <li>
                  <x-nav-link :href="route('awards.citations')" :active="request()->routeIs('awards.citations')">
                     <span class="text-left text-gray-500 flex-shrink-0 group-hover:text-gray-900 transition duration-75">
                        <i class="las la-user-graduate m-auto text-3xl"></i>
                     </span>
                     <span class="ml-3 flex-1 whitespace-nowrap">{{ __('Award and Citation') }}</span>
                  </x-nav-link>
               </li>
            </ul>

            <div class="space-y-2 pt-2">
               <x-nav-link :href="route('settings')" :active="request()->routeIs('settings')">
                  <svg class="w-6 h-6 text-gray-500 flex-shrink-0 group-hover:text-gray-900 transition duration-75" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-2 0c0 .993-.241 1.929-.668 2.754l-1.524-1.525a3.997 3.997 0 00.078-2.183l1.562-1.562C15.802 8.249 16 9.1 16 10zm-5.165 3.913l1.58 1.58A5.98 5.98 0 0110 16a5.976 5.976 0 01-2.516-.552l1.562-1.562a4.006 4.006 0 001.789.027zm-4.677-2.796a4.002 4.002 0 01-.041-2.08l-.08.08-1.53-1.533A5.98 5.98 0 004 10c0 .954.223 1.856.619 2.657l1.54-1.54zm1.088-6.45A5.974 5.974 0 0110 4c.954 0 1.856.223 2.657.619l-1.54 1.54a4.002 4.002 0 00-2.346.033L7.246 4.668zM12 10a2 2 0 11-4 0 2 2 0 014 0z" clip-rule="evenodd"></path></svg>
                  <span class="ml-3 flex-1 whitespace-nowrap">{{ __('Settings') }}</span>
               </x-nav-link>
            </div>
         </div>
      </div>
   </div>
</div>