<div class="fixed inset-0 overflow-hidden z-20" x-show="openCreate" style="display: none"
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
         <div class="w-screen max-w-lg" x-data="showImage()"
            x-show="openCreate"
            x-transition:enter="transform transition ease-in-out duration-500 sm:duration-700"
            x-transition:enter-start="translate-x-full" x-transition:enter-end="translate-x-0"
            x-transition:leave="transform transition ease-in-out duration-500 sm:duration-700"
            x-transition:leave-start="translate-x-0" x-transition:leave-end="translate-x-full"
            x-description="Slide-over panel, show/hide based on slide-over state.">
            <form action="{{ route('event.create') }}" enctype="multipart/form-data" method="POST" class="h-full divide-y divide-gray-200 flex flex-col bg-white shadow-xl">
               @csrf
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
                                 <!-- Heroicon name: solid/x-circle -->
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

                        <div class="space-y-3 pb-5">
                           <div>
                              <label for="event-name" class="block text-sm font-medium text-gray-900">Name</label>
                              <div class="mt-1">
                                 <input wire:model.lazy="name" required type="text" name="event_name" id="event-name" class="block w-full shadow-sm sm:text-sm focus:ring-indigo-500 focus:border-indigo-500 border-gray-300 rounded-md">
                              </div>
                           </div>
                           <div>
                              <label for="description" class="block text-sm font-medium text-gray-900">Description</label>
                              <div class="mt-1">
                                 <textarea wire:model.lazy="description" id="description" name="description" rows="3" class="shadow-sm block w-full focus:ring-blue-500 focus:border-blue-500 sm:text-sm border border-gray-300 rounded-md" placeholder="Add a note"></textarea>
                              </div>
                           </div>

                           <div class="mt-6 grid grid-cols-1 gap-y-6 gap-x-4 sm:grid-cols-6">
                              <div class="sm:col-span-3">
                                 <x-input.group label="Starts Date" inline="true" for="start_date" :error="$errors->first('start_date')" help-text="Select Start Date">
                                    <x-input.date-picker required wire:model.lazy="start_date" name="start_date" id="start_date" :time="$enableTime = true" :placeholder="$format = 'Y-m-d H:i:S'" />
                                 </x-input.group>
                              </div>
                              <div class="sm:col-span-3">
                                 <x-input.group label="Ends Date" inline="true" for="end_date" :error="$errors->first('end_date')" help-text="Select End Date">
                                    <x-input.date-picker required wire:model.lazy="end_date" name="end_date" id="end_date" :time="$enableTime = true" :placeholder="$format = 'Y-m-d H:i:S'" />
                                 </x-input.group>
                              </div>
                           </div>

                           <div class="mt-3">
                              <label for="venue" class="block text-sm font-medium text-gray-900">Venue</label>
                              <div class="mt-1">
                                 <input  wire:model.lazy="venue"  type="text" required name="venue" id="venue" class="block w-full map-input shadow-sm sm:text-sm focus:ring-indigo-500 focus:border-indigo-500 border-gray-300 rounded-md">
                              </div>
                           </div>

                           {{-- <div class="flex justify-between text-sm text-gray-800" x-data="{ openTooltip:false }">
                              <p>For direction purposes add Venue latitude and longitude </p>
                              <div class="relative">
                                 <span @click="openTooltip = !openTooltip" data-tooltip-target="tooltip-top" data-tooltip-placement="top" class="hover:text-gray-500 cursor-pointer">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                       <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                    </svg>
                                 </span>

                                 <div x-show="openTooltip" class="inline-block absolute z-10 py-2 right-6 -mt-6 mr-1 w-72 tooltip tooltip-show px-3 text-sm font-medium text-white opacity-90 bg-gray-900 rounded-lg shadow-sm dark:bg-gray-700">
                                    <ul class="space-y-3">
                                       <li>
                                          - Goto https://www.google.com/maps/ and search venue
                                       </li>
                                       <li>
                                          - Click on the location on the map to retrieve latitude (the numbers before the comma sign) and longitude (the numbers after the comma sign).
                                       </li>
                                    </ul>
                                    <div class="tooltip-arrow" data-popper-arrow></div>
                                 </div>

                              </div>
                           </div> --}}

                           <div class="mt-3 hidden">
                              <label for="lat" class="block text-sm font-medium text-gray-900">Latitude</label>
                              <div class="mt-1">
                                 <input type="text" readonly id="latitude" name="lat" class="block w-full shadow-sm sm:text-sm focus:ring-indigo-500 focus:border-indigo-500 border-gray-300 rounded-md">
                              </div>
                           </div>

                           <div class="mt-3 hidden">
                              <label for="lng" class="block text-sm font-medium text-gray-900">Longitude</label>
                              <div class="mt-1">
                                 <input type="text" readonly id="longitude" name="lng" class="block w-full shadow-sm sm:text-sm focus:ring-indigo-500 focus:border-indigo-500 border-gray-300 rounded-md">
                              </div>
                           </div>

                           {{-- <div id="address-map-container mt-3" style="width:100%;height:400px;">
                              <div style="width: 100%; height: 100%" id="address-map"></div>
                           </div> --}}

                           <div class="mt-3">
                              <label for="event-image" class="block text-sm font-medium text-gray-900">Upload Image (jpg,png,jpeg)</label>
                              <div class="mt-1">
                                 {{-- @if ($event_image) --}}

                                 {{-- @endif --}}
                                 @if ($event_image)
                                    <div id="preview-container" class="relative hidden">
                                        <img id="preview" class="inset-0 w-full h-36 object-cover bg-center rounded-md">
                                        <span @click="$refs.uploader.click()" class="px-4 py-1 cursor-pointer text-white bg-red-300 text-xs rounded shadow">Change</span>
                                    </div>
                                    <img src="{{ $event_image->temporaryUrl() }}">
                                    @else
                                    <div id="upload" class="w-full">
                                        <label class="flex flex-col w-full h-32 border-4 border-dashed hover:bg-gray-100 hover:border-gray-300">
                                           <div class="flex flex-col items-center justify-center pt-7">
                                              <svg xmlns="http://www.w3.org/2000/svg" class="w-8 h-8 text-gray-400 group-hover:text-gray-600"
                                                 fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                 <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12" />
                                              </svg>
                                              <p class="pt-1 text-sm tracking-wider text-gray-400 group-hover:text-gray-600">Attach an image</p>
                                           </div>
                                           <input required type="file" x-ref="uploader" id="event-image" name="event_image" class="opacity-0" accept="image/*" x-on:change="showPreview(event)" />
                                        </label>
                                     </div>
                                @endif

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
                  <button type="submit" class="ml-4 inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                     Save
                  </button>
               </div>

               <script>
                  function showImage() {
                     return {
                        showPreview(event) {
                           var previewContainer = document.getElementById("preview-container");
                           var preview = document.getElementById("preview");
                           var upload = document.getElementById("upload");
                           if (event.target.files.length > 0) {
                              var src = URL.createObjectURL(event.target.files[0]);
                              preview.src = src;
                              previewContainer.classList.add('block')
                              previewContainer.classList.remove('hidden')
                              upload.classList.add('hidden')
                           }
                           else {
                              previewContainer.classList.add('hidden')
                              previewContainer.classList.remove('block')
                              upload.classList.remove('hidden')
                           }
                        }
                     }
                  }
               </script>
            </form>

         </div>
      </div>
   </div>
</div>
