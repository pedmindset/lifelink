<div class="fixed inset-0 overflow-hidden z-20" x-data="{ openOptions: @entangle('optionMode'), openCreateForm: @entangle('openCreateForm') }" x-show="openCreateForm" style="display:none"
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
         <div class="w-screen max-w-6xl"
            x-show="openCreateForm"
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
                     <button type="button" x-on:click="openCreateForm = false"
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
                  <div class="grid grid-cols-4 gap-2">
                     <div class="my-4 relative flex-1 px-4 sm:px-6 col-span-2 overflow-y-scroll">
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
                                          There were {{ count($errors) }} errors with your submission
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

                           <div class="p-2 mb-2 rounded-md bg-cyan-100 text-cyan-700">
                              {{ $schema == null ? 0 : $schema->count() }} Fields Added!
                           </div>

                           @if(isset($schema) )
                           <div class="">
                              <div class="my-3">
                                 <ul class="flex flex-wrap space-x-2">
                                    @foreach ($schema as $s)
                                    <li  class="inline-flex m-1 items-center py-0.5 px-3 hover:bg-green-300 rounded-full text-xs font-medium bg-indigo-100 text-indigo-700">
                                       <span wire:click="selectField({{ $s['id'] }})" class="truncate w-20 p-1 cursor-pointer"> {{ $s['fieldName'] }} </span>
                                       <button wire:click="removeField({{ $s['id'] }})" type="button" class="flex-shrink-0 ml-0.5 h-4 w-4 rounded-full inline-flex items-center justify-center text-indigo-400 hover:bg-indigo-200 hover:text-indigo-500 focus:outline-none focus:bg-indigo-500 focus:text-white">
                                          <span class="sr-only">Remove small option</span>
                                          <svg class="h-2 w-2 ml-1" stroke="currentColor" fill="none" viewBox="0 0 8 8">
                                             <path stroke-linecap="round" stroke-width="1.5" d="M1 1l6 6m0-6L1 7" />
                                          </svg>
                                       </button>
                                    </li>
                                    @endforeach
                                 </ul>

                              </div>
                           </div>
                           @endif

                           <div class="space-y-3 pb-5">
                              <div>
                                 <label for="form-name" class="block text-sm font-medium text-gray-900">Name</label>
                                 <div class="mt-1">
                                    <input type="text" wire:model="name" id="form-name" class="block w-full shadow-sm sm:text-sm focus:ring-indigo-500 focus:border-indigo-500 border-gray-300 rounded-md">
                                 </div>
                              </div>
                              <div>
                                 <label for="form-description" class="block text-sm font-medium text-gray-900">Description</label>
                                 <div class="mt-1">
                                    <textarea id="form-description" wire:model="description" rows="3" class="shadow-sm block w-full focus:ring-blue-500 focus:border-blue-500 sm:text-sm border border-gray-300 rounded-md" placeholder="Add a note"></textarea>
                                 </div>
                              </div>

                              <div class="mt-6">
                                 <label for="field-name" class="text-gray-600 text-sm pb-1">Field Name</label>
                                 <div class="relative rounded-md shadow-sm sm:min-w-0 sm:flex-1">
                                    <input type="text" wire:model="fieldName" id="field-name" class="focus:ring-indigo-500 focus:border-indigo-500 block w-full pr-32 sm:text-sm border-gray-300 rounded-md" placeholder="Enter field name">
                                    <div class="absolute inset-y-0 right-0 flex items-center">
                                       <span class="h-4 w-px bg-gray-200" aria-hidden="true"></span>

                                       <label for="field-type" class="sr-only">Type</label>
                                       <select id="field-type" wire:model="fieldType" wire:change="switchOption($event.target.value)" class="focus:ring-indigo-500 focus:border-indigo-500 h-full py-0 pl-4 pr-7 border-transparent bg-transparent text-gray-500 sm:text-sm rounded-md">
                                          <option >--Select Type--</option>
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
                                 <label for="field-placeholder" class="text-gray-600 text-sm pb-1">Field Placeholder</label>
                                 <div class="mt-1">
                                    <input type="text" wire:model="placeholder" id="field-placeholder" class="block w-full shadow-sm sm:text-sm focus:ring-indigo-500 focus:border-indigo-500 border-gray-300 rounded-md">
                                 </div>
                              </div>

                              <div>
                                 <label for="field-rules" class="text-gray-600 text-sm pb-1">Rules</label>
                                 <div class="relative flex items-start">
                                    <div class="flex items-center h-5">
                                       <input id="required-rule" wire:model="rules" aria-describedby="rule-required" type="checkbox" class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300 rounded">
                                    </div>
                                    <div class="ml-3 text-sm">
                                       <label for="required-rule" class="font-medium text-gray-700">Required</label>
                                    </div>
                                 </div>
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

                     <div class="col-span-2 h-full">
                        <div class="flex justify-center items-center p-3">
                           <h2 class="text-xl font-bold text-green-800 tracking-wide leading-6 capitalize" id="slide-over-title">
                              {{ $name ?? '' }}
                           </h2>
                        </div>

                        @if(isset($schema))
                        <div class="mt-2 p-3">
                           @foreach ($schema as $s)
                           @switch($s['fieldType'])
                              @case(1)
                              <div class="mt-3">
                                 <label for="input" class="block text-sm font-bold text-gray-900">{{ $s['fieldName'] }}</label>
                                 <div class="mt-1">
                                    <input type="text" id="input" placeholder="{{ $s['placeholder'] }}" class="block w-full shadow-sm sm:text-sm focus:ring-indigo-500 focus:border-indigo-500 border-gray-300 rounded-md">
                                 </div>
                              </div>
                              @break
                              @case(2)
                              <div class="mt-3">
                                 <label for="comment" class="block text-sm font-bold text-gray-900">{{ $s['fieldName'] }}</label>
                                 <div class="mt-1">
                                    <textarea rows="4" name="comment" id="comment" class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-gray-300 rounded-md"></textarea>
                                 </div>
                              </div>
                              @break
                              @case(3)
                              <div class="mt-3">
                                 <label for="location" class="block text-sm font-bold text-gray-900">{{ $s['fieldName'] }}</label>
                                 <select id="location" name="location" class="mt-1 block w-full pl-3 pr-10 py-2 text-base border-gray-300 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm rounded-md">
                                    @foreach ($s['options'] as $op)
                                    <option>{{ $op }}</option>
                                    @endforeach
                                 </select>
                              </div>
                              @break
                              @case(4)
                              <div class="mt-3">
                                 <label class="text-sm font-bold text-gray-900">{{ $s['fieldName'] }}</label>
                                 <fieldset class="mt-4">
                                    <legend class="sr-only">{{ $s['fieldName'] }}</legend>
                                    <div class="space-y-4 sm:flex sm:items-center sm:space-y-0 sm:space-x-10">
                                       @foreach ($s['options'] as $op)
                                       <div class="flex items-center">
                                          <input id="noti" type="radio" class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300">
                                          <label for="noti" class="ml-3 block text-sm font-medium text-gray-700">
                                             {{ $op }}
                                          </label>
                                       </div>
                                       @endforeach
                                    </div>
                                 </fieldset>
                              </div>
                              @break
                              @case(5)
                              <div class="mt-3">
                                 <fieldset class="space-y-5">
                                    <legend class="text-sm font-bold text-gray-900">{{ $s['fieldName'] }}</legend>
                                    @foreach ($s['options'] as $op)
                                    <div class="relative flex items-start">
                                       <div class="flex items-center h-5">
                                          <input id="check" type="checkbox" class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300 rounded">
                                       </div>
                                       <div class="ml-3 text-sm">
                                          <label for="check" class="font-medium text-gray-700">{{ $op }}</label>
                                          <span class="text-gray-500"><span class="sr-only">{{ $op }}</span></span>
                                       </div>
                                    </div>
                                    @endforeach
                                 </fieldset>
                              </div>
                              @break
                              @default

                           @endswitch
                           @endforeach

                        </div>

                        @endif
                     </div>

                  </div>
               </div>

               <div class="flex-shrink-0 px-4 py-4 flex justify-end bg-gray-200 shadow-inner">
                  <button type="button" wire:click.prevent="cancel()" class="bg-white py-2 px-4 border border-gray-300 rounded-md shadow-sm text-sm font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                     Cancel
                  </button>
                  <button type="button" wire:click.prevent="store()" class="ml-4 inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                     Save
                  </button>
               </div>
            </div>

         </div>
      </div>
   </div>
</div>
