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
         <div class="w-screen max-w-md"
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
                        new event
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
                        Create a new event.
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

                        <div class="space-y-3 pb-5">
                           <div>
                              <label for="name" class="block text-sm font-medium text-gray-900">Name</label>
                              <div class="mt-1">
                                 <input type="text" wire:model="name" id="name" class="block w-full shadow-sm sm:text-sm focus:ring-indigo-500 focus:border-indigo-500 border-gray-300 rounded-md">
                              </div>
                           </div>
                           <div>
                              <label for="description" class="block text-sm font-medium text-gray-900">Description</label>
                              <div class="mt-1">
                                 <textarea id="description" wire:model="description" rows="2" class="shadow-sm block w-full focus:ring-blue-500 focus:border-blue-500 sm:text-sm border border-gray-300 rounded-md" placeholder="Add a note"></textarea>
                              </div>
                           </div>

                           <div class="divide-y divide-gray-600 py-2"></div>

                           <div>
                              <div class="px-3 my-3 py-4 border border-gray-100" x-for="(line, index) in fields" :key="index">
                                 <div class="grid grid-cols-6 gap-4">
                                     <div class="col-span-6 sm:col-span-2">
                                         <p class="block pl-2 mt-1 text-xs uppercase font-medium leading-4 text-gray-500">
                                             {{ _('Name') }}
                                         </p>
                                         <div class="mt-1 rounded-md shadow-sm">
                                             <input type="text" x-model="line.name" class="appearance-none block w-full px-3 py-2 border border-gray-300 rounded-sm placeholder-gray-400 focus:outline-none focus:border-0 focus:shadow-md transition duration-150 ease-in-out sm:text-sm sm:leading-5" />
                                         </div>
                                     </div>
         
                                     <div class="col-span-6 sm:col-span-2">
                                         <p class="block pl-2 mt-1 text-xs uppercase font-medium leading-4 text-gray-500">
                                             {{ _('email') }}
                                         </p>
                                         <div class="mt-1 rounded-md shadow-sm">
                                             <input type="email" v-model="line.email" class="appearance-none block w-full px-3 py-2 border border-gray-300 rounded-sm placeholder-gray-400 focus:outline-none focus:border-0 focus:shadow-md transition duration-150 ease-in-out sm:text-sm sm:leading-5" />
                                         </div>
                                         <strong class="text-red-500 text-xs italic">@{{ line.errors.email }}</strong>
                                     </div>
         
                                     <div class="col-span-6 sm:col-span-2">
                                         <p class="block pl-2 mt-1 text-xs uppercase font-medium leading-4 text-gray-500">
                                             {{ _('phone') }}
                                         </p>
                                         <div class="mt-1 rounded-md shadow-sm">
                                             <input type="tel" v-model="line.phone" class="appearance-none block w-full px-3 py-2 border border-gray-300 rounded-sm placeholder-gray-400 focus:outline-none focus:border-0 focus:shadow-md transition duration-150 ease-in-out sm:text-sm sm:leading-5" />
                                         </div>
                                         <strong class="text-red-500 text-xs italic">@{{ line.errors.phone }}</strong>
                                     </div>
                                 </div>
         
                                 <div class="w-full flex mt-3">
                                     <button type="button" v-if="index + 1 === lines.length" v-on:click="addLine('custom')" class=" bg-gray-50 w-full py-2 px-3 text-sm leading-3 tracking-wide font-light text-gray-700">
                                         <i class="w-6 h-6 py-1 rounded-full text-gray-400 font-bold las la-plus border border-gray-400"></i>
                                         <span class="ml-2">{{ _('Add New') }}</span>
                                     </button>
                                     <button type="button" v-if="lines.length >= 2" @click="removeLine(index)" class=" bg-gray-100 w-full py-2 px-3 text-sm leading-3 tracking-wide font-light text-gray-700">
                                         <i class="w-6 h-6 py-1 rounded-full text-gray-400 font-bold las la-minus border border-gray-400"></i>
                                         <span class="ml-2">{{ _('Remove') }}</span>
                                     </button>
                                 </div>
                              </div>
                           </div>
                           
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
