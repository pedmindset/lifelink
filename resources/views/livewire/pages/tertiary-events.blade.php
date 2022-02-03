<div x-data="{ showView: @entangle('showMode') }">
   @if (isset($eventId))
      @include('livewire.pages.show-item')
   @else
      <div class="p-3 sm:px-8 sm:py-12">
         <p class="pb-12 font-sans font-bold text-gray-600 text-sm">Tertiary Model UN Conferences</p>
         <div class="overflow-hidden">
            <ul role="list" class="divide-y divide-gray-200 space-y-12">
               <li class="overflow-hidden bg-white sm:rounded-md shadow">
                  <div>
                     <img class="h-32 w-full object-cover lg:h-48" src="https://images.unsplash.com/photo-1444628838545-ac4016a5418a?ixid=MXwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHw%3D&ixlib=rb-1.2.1&auto=format&fit=crop&w=1950&q=80" alt="image back">
                  </div>
                  <p class="block hover:bg-gray-50 bg-white">
                     <div class="px-4 py-4 sm:px-6">
                        <div class="flex items-center justify-between">
                           <p wire:click.prevent="showItem(1)" class="text-sm font-medium cursor-pointer text-indigo-600 truncate hover:text-indigo-400 ease-linear duration-150">
                              LTMUN Fortune
                           </p>
                           <div class="ml-2 flex-shrink-0 flex">
                              <p class="px-4 py-1 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                                 Duration
                              </p>
                           </div>
                        </div>
                        <div class="mt-2 sm:flex sm:justify-between">
                           <div class="sm:flex">
                              <p class="flex items-center text-sm text-gray-500">
                                 <!-- Heroicon name: solid/users -->
                                 <svg class="flex-shrink-0 mr-1.5 h-5 w-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                    <path d="M9 6a3 3 0 11-6 0 3 3 0 016 0zM17 6a3 3 0 11-6 0 3 3 0 016 0zM12.93 17c.046-.327.07-.66.07-1a6.97 6.97 0 00-1.5-4.33A5 5 0 0119 16v1h-6.07zM6 11a5 5 0 015 5v1H1v-1a5 5 0 015-5z" />
                                 </svg>
                                 <span class="bg-cyan-100  border border-teal-400 shadow-inner font-bold rounded-2xl py-1 px-3">54</span>
                              </p>
                              <p class="mt-2 flex items-center text-sm text-gray-500 sm:mt-0 sm:ml-6">
                                 <!-- Heroicon name: solid/location-marker -->
                                 <svg class="flex-shrink-0 mr-1.5 h-5 w-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                    <path fill-rule="evenodd" d="M5.05 4.05a7 7 0 119.9 9.9L10 18.9l-4.95-4.95a7 7 0 010-9.9zM10 11a2 2 0 100-4 2 2 0 000 4z" clip-rule="evenodd" />
                                 </svg>
                                 Accra International Conference Center
                              </p>
                           </div>
                           <div class="mt-2 flex items-center text-sm text-gray-500 sm:mt-0">
                              <!-- Heroicon name: solid/calendar -->
                              <svg class="flex-shrink-0 mr-1.5 h-5 w-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                 <path fill-rule="evenodd" d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z" clip-rule="evenodd" />
                              </svg>
                              <p class="">
                                 From <time datetime="2020-01-02" class="font-semibold">January 2, 2020</time> to 
                                 <time datetime="2020-01-07" class="font-semibold">January 7, 2020</time>
                              </p>
                           </div>
                        </div>
                     </div>
                  </p>
               </li>

               <li class="overflow-hidden bg-white sm:rounded-md shadow">
                  <div>
                     <img class="h-32 w-full object-cover lg:h-48" src="https://images.unsplash.com/photo-1444628838545-ac4016a5418a?ixid=MXwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHw%3D&ixlib=rb-1.2.1&auto=format&fit=crop&w=1950&q=80" alt="image back">
                  </div>
                  <p href="#" class="block hover:bg-gray-50">
                     <div class="px-4 py-4 sm:px-6">
                        <div class="flex items-center justify-between">
                           <p class="text-sm font-medium text-indigo-600 truncate">
                              Back End Developer
                           </p>
                           <div class="ml-2 flex-shrink-0 flex">
                              <p class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                              Full-time
                              </p>
                           </div>
                        </div>
                        <div class="mt-2 sm:flex sm:justify-between">
                           <div class="sm:flex">
                              <p class="flex items-center text-sm text-gray-500">
                                 <!-- Heroicon name: solid/users -->
                                 <svg class="flex-shrink-0 mr-1.5 h-5 w-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                    <path d="M9 6a3 3 0 11-6 0 3 3 0 016 0zM17 6a3 3 0 11-6 0 3 3 0 016 0zM12.93 17c.046-.327.07-.66.07-1a6.97 6.97 0 00-1.5-4.33A5 5 0 0119 16v1h-6.07zM6 11a5 5 0 015 5v1H1v-1a5 5 0 015-5z" />
                                 </svg>
                                 Engineering
                              </p>
                              <p class="mt-2 flex items-center text-sm text-gray-500 sm:mt-0 sm:ml-6">
                                 <!-- Heroicon name: solid/location-marker -->
                                 <svg class="flex-shrink-0 mr-1.5 h-5 w-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                    <path fill-rule="evenodd" d="M5.05 4.05a7 7 0 119.9 9.9L10 18.9l-4.95-4.95a7 7 0 010-9.9zM10 11a2 2 0 100-4 2 2 0 000 4z" clip-rule="evenodd" />
                                 </svg>
                                 Remote
                              </p>
                           </div>
                           <div class="mt-2 flex items-center text-sm text-gray-500 sm:mt-0">
                              <!-- Heroicon name: solid/calendar -->
                              <svg class="flex-shrink-0 mr-1.5 h-5 w-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                 <path fill-rule="evenodd" d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z" clip-rule="evenodd" />
                              </svg>
                              <p>
                                 Closing on
                                 <time datetime="2020-01-07">January 7, 2020</time>
                              </p>
                           </div>
                        </div>
                     </div>
                  </p>
               </li>
            </ul>
         </div>
      </div>
   @endif
</div>
