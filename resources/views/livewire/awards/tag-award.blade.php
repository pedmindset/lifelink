<div class="fixed z-10 inset-0 overflow-y-auto" aria-labelledby="modal-title" style="display:none" x-show="openTag" @click.outside="openTag = false" role="dialog" aria-modal="true">
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

      <div class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-xl sm:w-full"
         x-transition:enter="ease-in-out duration-300"
         x-transition:enter-start="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
         x-transition:enter-end="opacity-100 translate-y-0 sm:scale-100"
         x-transition:leave="ease-in duration-200"
         x-transition:leave-start="opacity-100 translate-y-0 sm:scale-100"
         x-transition:leave-end="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
         x-description="Background overlay, show/hide based on slide-over state."
      >
         <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
            <div class="sm:flex sm:items-start">
               <div class="mx-auto flex-shrink-0 flex items-center justify-center h-12 w-12 rounded-full bg-green-100 sm:mx-0 sm:h-10 sm:w-10">
                  <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-green-600" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                     <path stroke-linecap="round" stroke-linejoin="round" d="M9 12l2 2 4-4M7.835 4.697a3.42 3.42 0 001.946-.806 3.42 3.42 0 014.438 0 3.42 3.42 0 001.946.806 3.42 3.42 0 013.138 3.138 3.42 3.42 0 00.806 1.946 3.42 3.42 0 010 4.438 3.42 3.42 0 00-.806 1.946 3.42 3.42 0 01-3.138 3.138 3.42 3.42 0 00-1.946.806 3.42 3.42 0 01-4.438 0 3.42 3.42 0 00-1.946-.806 3.42 3.42 0 01-3.138-3.138 3.42 3.42 0 00-.806-1.946 3.42 3.42 0 010-4.438 3.42 3.42 0 00.806-1.946 3.42 3.42 0 013.138-3.138z" />
                  </svg>
               </div>
               <div class="mt-3 text-center sm:mt-0 sm:ml-4 sm:text-left">
                  <h3 class="text-lg leading-6 font-medium text-gray-900" id="modal-title">
                     Assign ( <span class="font-bold">{{ $selectedname }}</span> )
                  </h3>
                  <div class="mt-2">
                     <p class="text-sm text-gray-500">
                        Select participants you want to assign this award to.
                        <br><br>
                        <div x-data="{ open:false }">
                           <label class="block text-sm font-medium text-gray-700" id="headlessui-combobox-label-1">Assigned to</label>
                           <div class="relative mt-1">
                              <input @click="open = !open" wire:model="selectedClientName" readonly placeholder="Select applicant" wire:change="searchClient($event.target.value)" class="w-full rounded-md border border-gray-300 bg-white py-2 pl-3 pr-10 shadow-sm focus:border-indigo-500 focus:outline-none focus:ring-1 focus:ring-indigo-500 sm:text-sm" id="headlessui-combobox-input-2" role="combobox" type="text" aria-expanded="true" aria-labelledby="headlessui-combobox-label-1" aria-controls="headlessui-combobox-options-30">
                              <button type="button" @click="open = !open" class="absolute inset-y-0 right-0 flex items-center rounded-r-md px-2 focus:outline-none" id="headlessui-combobox-button-3" type="button" tabindex="-1" aria-haspopup="true" aria-expanded="true" aria-labelledby="headlessui-combobox-label-1 headlessui-combobox-button-undefined" aria-controls="headlessui-combobox-options-30">
                                 <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="h-5 w-5 text-gray-400" aria-hidden="true">
                                    <path fill-rule="evenodd" d="M10 3a1 1 0 01.707.293l3 3a1 1 0 01-1.414 1.414L10 5.414 7.707 7.707a1 1 0 01-1.414-1.414l3-3A1 1 0 0110 3zm-3.707 9.293a1 1 0 011.414 0L10 14.586l2.293-2.293a1 1 0 011.414 1.414l-3 3a1 1 0 01-1.414 0l-3-3a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                                 </svg>
                              </button>

                              <ul x-show="open" class="absolute z-10 mt-1 max-h-56 w-full overflow-auto rounded-md bg-white py-1 text-base shadow-lg ring-1 ring-black ring-opacity-5 focus:outline-none sm:text-sm" aria-labelledby="headlessui-combobox-label-1" role="listbox" id="headlessui-combobox-options-30">
                                 @foreach ($clients as $client)
                                 <li @click="open = false" wire:click="selectUser({{ $client }})" class="relative cursor-pointer select-none py-2 pl-3 pr-9 text-gray-900" id="headlessui-combobox-option-31" role="option" tabindex="-1">
                                    <div class="flex items-center">
                                       <img src="{{ $client->thumb_image_url != '' ? $client->thumb_image_url : asset('img/face.png') }}" alt="" class="h-6 w-6 flex-shrink-0 rounded-full"><span class="ml-3 truncate">{{ $client->name }}</span>
                                    </div>
                                 </li>
                                 @endforeach
                              </ul>

                           </div>
                        </div>
                     </p>
                  </div>
               </div>
            </div>
         </div>
         <div class="bg-gray-100 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
            <button type="button" wire:click="allocate()" class="w-full inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-teal-600 text-base font-medium text-white hover:bg-teal-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-teal-500 sm:ml-3 sm:w-auto sm:text-sm">
               Save
            </button>
            <button type="button" x-on:click="openTag = false" class="mt-3 w-full inline-flex justify-center rounded-md border border-gray-300 shadow-sm px-4 py-2 bg-white text-base font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 sm:mt-0 sm:ml-3 sm:w-auto sm:text-sm">
               Cancel
            </button>
         </div>
      </div>
   </div>
 </div>

