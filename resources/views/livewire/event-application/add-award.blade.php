<div class="z-10 fixed inset-0 overflow-y-auto" style="display: none"
   aria-labelledby="modal-title" x-show="openAddAward" role="dialog" aria-modal="true">
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
               <h2 class="text-sm text-gray-600 font-bold leading-5 tracking-wider">Add Award</h2>
            </div>
            <div class="px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
               <fieldset>
                  <div class="space-y-4">
                     @foreach ($awards as $award)
                         
                     <label class="relative block bg-white border rounded-lg shadow-sm px-4 py-2 cursor-pointer focus:outline-none">
                        <input type="radio" wire:click="addAward({{ $award->id }})" x-on:click="openAddAward = false" name="server-size" value="Hobby" class="sr-only" aria-labelledby="server-size-0-label" aria-describedby="server-size-0-description-0 server-size-0-description-1">
                        <div class="flex items-center">
                           <div class="text-sm">
                              <p id="server-size-0-label" class="font-medium text-gray-900">
                                 {{ $award->name }}
                              </p>
                              <div id="server-size-0-description-0" class="text-gray-500">
                                 <p class="sm:inline">{{ $award->description ?? '' }}</p>
                              </div>
                           </div>
                        </div>
                     </label>
                     @endforeach
                  </div>
               </fieldset>
            </div>
         </div>
         <div class="bg-green-100 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
            <button x-on:click="openAddAward = false" type="button" wire:click="" class="w-full inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-green-600 text-base font-medium text-white hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500 sm:ml-3 sm:w-auto sm:text-sm">
               Done
            </button>
         </div>
      </div>
   </div>
</div> 
