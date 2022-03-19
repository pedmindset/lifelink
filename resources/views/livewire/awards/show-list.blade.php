<div class="fixed inset-0 overflow-hidden z-20" x-show="openList" style="display:none"
   aria-labelledby="slide-over-title" role="dialog" aria-modal="true">
   <div
      x-transition:enter="ease-in-out duration-500" 
      x-transition:enter-start="opacity-0" 
      x-transition:enter-end="opacity-100" 
      x-transition:leave="ease-in-out duration-500" 
      x-transition:leave-start="opacity-100" 
      x-transition:leave-end="opacity-0" 
      x-description="Background overlay, show/hide based on slide-over state."
      class="absolute inset-0 overflow-hidden">

      <div class="absolute inset-0 bg-gray-500 bg-opacity-75 transition-opacity" aria-hidden="true"></div>

      <div class="fixed inset-y-0 right-0 pl-10 max-w-full flex">
         <div class="w-screen max-w-md"
            x-show="openList" 
            x-transition:enter="transform transition ease-in-out duration-500 sm:duration-700" 
            x-transition:enter-start="translate-x-full" x-transition:enter-end="translate-x-0" 
            x-transition:leave="transform transition ease-in-out duration-500 sm:duration-700" 
            x-transition:leave-start="translate-x-0" x-transition:leave-end="translate-x-full" 
            x-description="Slide-over panel, show/hide based on slide-over state.">
            <div class="h-full flex flex-col bg-white shadow-xl">
               <div class="bg-cyan-700">
                  <div class="py-6 px-4 sm:px-6 flex items-start justify-between">
                     <h2 class="text-lg font-medium text-white capitalize" id="slide-over-title">
                        {{ $selectedname }}
                     </h2>
                     <div class="ml-3 h-7 flex items-center">
                        <button type="button" x-on:click.prevent="openList = false" 
                        class="bg-cyan-700 rounded-md text-cyan-200 hover:text-white focus:outline-none focus:ring-2 focus:ring-white">
                           <span class="sr-only">Close panel</span>
                           <!-- Heroicon name: outline/x -->
                           <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                           </svg>
                        </button>
                     </div>
                  </div>
                  <div class="bg-teal-50 sm:px-6 px-4 text-teal-700 shadow-inner py-2 text-sm leading-7 tracking-wider">
                     {{ $awardEvent }} <span class="text-xs text-teal-500">(Event)</span>
                  </div>
               </div>

               <div class="min-h-0 flex-1 flex flex-col overflow-y-scroll">

                  <div class="my-2 relative flex-1 px-4 sm:px-3">
                     <ul>
                        @forelse ($awardedList as $ua)
                        <li class="relative cursor-pointer select-none py-2 pl-3 pr-9 text-gray-900" id="headlessui-combobox-option-31" role="option" tabindex="-1">
                           <div class="flex items-center">
                              <img src="{{ $ua->thumb_image_url != '' ? $ua->thumb_image_url : 'https://images.unsplash.com/photo-1494790108377-be9c29b29330?ixlib=rb-1.2.1&amp;ixid=eyJhcHBfaWQiOjEyMDd9&amp;auto=format&amp;fit=facearea&amp;facepad=2&amp;w=256&amp;h=256&amp;q=80' }}" alt="" class="h-8 w-8 flex-shrink-0 rounded-full"><span class="ml-3 truncate">{{ $ua->name }}</span>
                           </div>
                        </li>
                        @empty
                           <li class="flex justify-center items-center pt-3">Award not issued</li>
                        @endforelse
                     </ul>
                  </div>
               </div>
               
            </div>

         </div>
      </div>
   </div>
</div>

