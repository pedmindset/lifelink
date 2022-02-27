<div class="fixed inset-0 overflow-hidden z-20" x-show="openAddAward" style="display: none"
   aria-labelledby="slide-over-title" role="dialog" aria-modal="true">
   <div @click.outside="openAddAward = false"
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
            x-show="openAddAward" 
            x-transition:enter="transform transition ease-in-out duration-500 sm:duration-700" 
            x-transition:enter-start="translate-x-full" x-transition:enter-end="translate-x-0" 
            x-transition:leave="transform transition ease-in-out duration-500 sm:duration-700" 
            x-transition:leave-start="translate-x-0" x-transition:leave-end="translate-x-full" 
            x-description="Slide-over panel, show/hide based on slide-over state.">

            <div class="h-full divide-y divide-gray-200 flex flex-col bg-white shadow-xl">
               <div class="py-6 px-4 bg-blue-700 sm:px-6">
                  <div class="flex items-start justify-between">
                     <h2 class="text-lg font-medium text-white capitalize" id="slide-over-title">
                        attach award / citation
                     </h2>
                     <div class="ml-3 h-7 flex items-center">
                        <button type="button" @click.prevent="openAddAward = false" 
                        class="bg-blue-700 rounded-md text-blue-200 hover:text-white focus:outline-none focus:ring-2 focus:ring-white">
                           <span class="sr-only">Close panel</span>
                           <!-- Heroicon name: outline/x -->
                           <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                           </svg>
                        </button>
                     </div>
                  </div>
               </div>

               <div class="min-h-0 flex-1 flex flex-col overflow-y-scroll">
                  <div class="my-4 relative flex-1 px-4 sm:px-6">
                     <x-select-search placeholder="Select award" :collection="$awards" limit="20" wire:model="award" class="w-full p-3"/>
                  </div>
               </div>

               <div class="flex-shrink-0 px-4 py-4 flex justify-end bg-gray-200 shadow-inner">
                  <button type="button" wire:click.prevent="addAward()" class="ml-4 inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                     Save
                  </button>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>
