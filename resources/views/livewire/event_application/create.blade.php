<div class="fixed inset-0 overflow-hidden z-20" x-show="openCreate"
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
         <div class="w-screen max-w-xl"
            x-show="openCreate" 
            x-transition:enter="transform transition ease-in-out duration-500 sm:duration-700" 
            x-transition:enter-start="translate-x-full" x-transition:enter-end="translate-x-0" 
            x-transition:leave="transform transition ease-in-out duration-500 sm:duration-700" 
            x-transition:leave-start="translate-x-0" x-transition:leave-end="translate-x-full" 
            x-description="Slide-over panel, show/hide based on slide-over state.">
            <div class="h-full divide-y divide-gray-200 flex flex-col bg-white shadow-xl">
               <div class="py-6 px-4 bg-cyan-700 sm:px-6">
                  <div class="flex items-start justify-between">
                     <h2 class="text-lg font-medium text-white capitalize" id="slide-over-title">
                        new event form
                     </h2>
                     <div class="ml-3 h-7 flex items-center">
                        <button type="button" x-on:click.prevent="openCreate = false" 
                        class="bg-cyan-700 rounded-md text-cyan-200 hover:text-white focus:outline-none focus:ring-2 focus:ring-white">
                           <span class="sr-only">Close panel</span>
                           <!-- Heroicon name: outline/x -->
                           <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                           </svg>
                        </button>
                     </div>
                  </div>
                  <div class="mt-1">
                     <p class="text-sm text-cyan-300">
                        Create a new event form.
                     </p>
                  </div>
               </div>

               <div class="min-h-0 flex-1 flex flex-col overflow-y-scroll">
                  <div class="my-4 relative flex-1 px-4 sm:px-6">
                     <div class="h-full" aria-hidden="true">
                        @if (count($errors) > 0)
                        <div class="rounded-md bg-red-50 p-4 mb-3 shadow-inner">
                           <div class="flex">
                              <div class="flex-shrink-0">
                                 <svg class="h-5 w-5 text-red-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd" />
                                 </svg>
                              </div>
                              <div class="ml-3">
                                 <h3 class="text-sm font-medium text-red-800">
                                    There were count($errors) errors with your submission
                                 </h3>
                                 <div class="mt-2 text-sm text-red-700">
                                    <ul role="list" class="list-disc pl-5 space-y-1">
                                       @foreach ($errors->all() as $error)
                                       <li>{{ $error }}</li>
                                       @endforeach
                                    </ul>
                                 </div>
                              </div>
                           </div>
                        </div>
                        @endif

                        <div class="">
                           <div class="p-2 mb-2 rounded-md bg-cyan-100 text-cyan-700">
                              {{ count($schema) }} Forms Added!
                           </div>

                           <div class="my-3">
                              <ul class="">
                                 <li class="bg-gray-100 rounded shadow-sm mb-2 hover:shadow-lg transition duration-300 ease-linear" x-data="{ showDelete: false, showCategory: false, showEdit: false }">
                                    <div class="flex p-3">
                                       <div class="ml-3 mr-auto">
                                          <p class="text-sm leading-5 font-medium text-gray-600">
                                             name
                                          </p>
                                       </div>

                                       <div class="pl-3">
                                          <div class="-mx-1.5 -my-1.5">
                                             <button class="rounded-md p-1 font-bold text-gray-500 hover:bg-green-100 hover:text-green-500 focus:outline-none focus:bg-green-100 transition ease-in-out duration-150">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                   <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 13h6M3 17V7a2 2 0 012-2h6l2 2h6a2 2 0 012 2v8a2 2 0 01-2 2H5a2 2 0 01-2-2z" />
                                                </svg>
                                             </button>
                                          </div>
                                      </div>
                                    </div>
                                 </li>
                              </ul>
                              
                           </div>
                        </div>

                        <div class="space-y-3 pb-5">
                           <div class="mt-6">
                              <label for="name" class="sr-only">Name</label>
                              <div class="relative rounded-md shadow-sm sm:min-w-0 sm:flex-1">
                                <input type="text" name="name" wire:model="fieldName" id="name" class="focus:ring-indigo-500 focus:border-indigo-500 block w-full pr-32 sm:text-sm border-gray-300 rounded-md" placeholder="Enter field name">
                                <div class="absolute inset-y-0 right-0 flex items-center">
                                  <span class="h-4 w-px bg-gray-200" aria-hidden="true"></span>

                                  <label for="type" class="sr-only">Type</label>
                                  <select id="type" wire:model="fieldType" wire:change="switchOption($event.target.value)" name="type" class="focus:ring-indigo-500 focus:border-indigo-500 h-full py-0 pl-4 pr-7 border-transparent bg-transparent text-gray-500 sm:text-sm rounded-md">
                                    <option value="1">Text</option>
                                    <option value="2">Textarea</option>
                                    <option value="3">Select Option</option>
                                    <option value="4">Radio group</option>
                                    <option value="5">Checkbox group</option>
                                  </select>
                                </div>
                              </div>
                           </div>

                           <div>
                              <input type="text" id="rules" wire:model="rules" class="focus:ring-indigo-500 focus:border-indigo-500 block w-full pr-32 sm:text-sm border-gray-300 rounded-md" placeholder="Enter set of rules">
                           </div>
                           <div x-show="openOptions">
                              <input type="text" wire:model="fieldOptions" class="focus:ring-indigo-600 focus:border-indigo-600 block w-full pr-32 sm:text-sm border-gray-300 rounded-md" placeholder="Enter your options, use comma (,) to seperate the options"/>
                           </div>
                        </div>

                        <div class="p-8 w-full overflow-hidden">
                           <button wire:click.prevent="addField()" class="w-full flex justify-center items-center bg-green-400 text-white rounded-md hover:bg-green-600 hover:shadow-md py-2 px-4 border border-transparent shadow-sm text-sm font-medium focus:outline-none">Add Field</button>
                        </div>

                     </div>
                  </div>
               </div>

               <div class="flex-shrink-0 px-4 py-4 flex justify-end">
                  <button type="button" x-on:click="openCreate = false" class="bg-white py-2 px-4 border border-gray-300 rounded-md shadow-sm text-sm font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                     Cancel
                  </button>
                  <button type="button" wire:click="store()" class="ml-4 inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                     Save
                  </button>
               </div>
            </div>

         </div>
      </div>
   </div>
</div>
