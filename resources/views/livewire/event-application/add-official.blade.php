<div class="z-10 fixed inset-0 overflow-y-auto" style="display: none"
   aria-labelledby="modal-title" x-show="openAddOfficial" role="dialog" aria-modal="true">
   <div class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
      <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity" aria-hidden="true"
         x-transition:enter="ease-in-out duration-300" 
         x-transition:enter-start="opacity-0" 
         x-transition:enter-end="opacity-100" 
         x-transition:leave="ease-in-out duration-200" 
         x-transition:leave-start="opacity-100" 
         x-transition:leave-end="opacity-0" 
         x-description="Background overlay, show/hide based on slide-over state."
      ></div>
 
     <span class="hidden sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true">&#8203;</span>

      <div class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:align-middle sm:max-w-2xl sm:w-full"
         x-transition:enter="ease-in-out duration-300" 
         x-transition:enter-start="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95" 
         x-transition:enter-end="opacity-100 translate-y-0 sm:scale-100" 
         x-transition:leave="ease-in duration-200" 
         x-transition:leave-start="opacity-100 translate-y-0 sm:scale-100" 
         x-transition:leave-end="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95" 
         x-description="Background overlay, show/hide based on slide-over state."
      >
         <div class="bg-white">
            <div class="bg-white shadow p-3 rounded-t-lg">
               <h2 class="text-sm text-gray-600 font-bold leading-5 tracking-wider">Add officials</h2>
            </div>
            <div class="px-4 pt-5 pb-4 sm:p-6 sm:pb-4">

               <div class="grid grid-cols-1 gap-4 sm:grid-cols-2 w-full">
                  <div class="relative rounded-lg border border-gray-300 bg-white px-6 py-5 shadow-sm flex items-center space-x-3 hover:border-gray-400 focus-within:ring-2 focus-within:ring-offset-2 focus-within:ring-indigo-500">
                     <div class="flex-shrink-0">
                        <img class="h-10 w-10 rounded-full" src="https://images.unsplash.com/photo-1494790108377-be9c29b29330?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80" alt="">
                     </div>
                     <div class="flex-1 min-w-0">
                        <a href="#" class="focus:outline-none">
                           <span class="absolute inset-0" aria-hidden="true"></span>
                           <p class="text-sm font-medium text-gray-900">
                              Leslie Alexander
                           </p>
                           <p class="text-sm text-gray-500 truncate">
                              Co-Founder / CEO
                           </p>
                        </a>
                     </div>
                  </div>

                  <div class="relative rounded-lg border border-gray-300 bg-white px-6 py-5 shadow-sm flex items-center space-x-3 hover:border-gray-400 focus-within:ring-2 focus-within:ring-offset-2 focus-within:ring-indigo-500">
                     <div class="flex-shrink-0">
                        <img class="h-10 w-10 rounded-full" src="https://images.unsplash.com/photo-1494790108377-be9c29b29330?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80" alt="">
                     </div>
                     <div class="flex-1 min-w-0">
                        <a href="#" class="focus:outline-none">
                           <span class="absolute inset-0" aria-hidden="true"></span>
                           <p class="text-sm font-medium text-gray-900">
                              Leslie Alexander
                           </p>
                           <p class="text-sm text-gray-500 truncate">
                              Co-Founder / CEO
                           </p>
                        </a>
                     </div>
                  </div>
               </div>

            </div>
         </div>
         <div class="bg-gray-100 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
            <button x-on:click="openAddOfficial = false" type="button" wire:click="" class="w-full inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-red-600 text-base font-medium text-white hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500 sm:ml-3 sm:w-auto sm:text-sm">
               Done
            </button>
         </div>
      </div>
   </div>
</div> 
