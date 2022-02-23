<div>
   {{-- @if (isset($eventId))
      @include('livewire.pages.show-item')
      @include('livewire.pages.form-application')
      @if ($applyMode)
      @livewire('pages.form-application', ['id' => $formId])
      @stack('my-scripts')
      @endif
   @else --}}
      <div class="p-3 sm:px-8 sm:py-12">
         <div class="pb-12 text-center">
            <h2 class="font-sans text-3xl font-extrabold tracking-tight text-gray-900 uppercase sm:text-4xl">upcoming events</h2>
            {{-- <p class="max-w-2xl mx-auto mt-3 text-xl text-gray-500 sm:mt-4">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Ipsa libero labore natus atque, ducimus sed.</p> --}}
         </div>
         <div class="overflow-hidden">
            <div class="grid max-w-lg gap-5 mx-auto my-12 lg:grid-cols-3 lg:max-w-none">
               {{-- <ul role="list" class="grid grid-cols-1 gap-4 space-y-12 divide-y divide-gray-200 md:grid-cols-2 lg:grid-cols-3"> --}}
               @forelse ($events as $event)
                  <div class="flex flex-col mx-4 overflow-hidden rounded-lg shadow-lg">
                     <div class="flex-shrink-0">
                        <img class="object-cover w-full h-48" src="{{ $event->thumb_image_url != '' ? $event->thumb_image_url : asset('img/back_con.jpg') }}" alt="">
                     </div>

                     <div class="flex flex-col justify-between flex-1 p-6 bg-white cursor-pointer">
                        <div class="flex-1 ">
                           <div class="block mt-2">
                              <a href="{{ route('events.detail', ['id' => $event->id]) }}" class="text-xl font-semibold text-indigo-600">
                                 {{ $event->name }}
                              </a>
                              <p class="pb-3 mt-3 text-base prose-sm prose text-gray-500">{{ $event->short_description }}</p>
                           </div>
                        </div>
                        <div class="flex justify-between mt-2">
                           <div class="">
                              <p class="text-sm font-semibold text-gray-900">Date</p>
                              <div class="flex space-x-1 text-sm text-gray-500">
                                 <time datetime="2020-03-16"> {{ date("F jS, Y", strtotime($event->start_date)) }} </time>
                              </div>
                           </div>

                           <div>
                              <p class="text-sm font-semibold text-gray-900">Venue</p>
                              <div class="flex space-x-1 text-sm text-gray-500">
                                 <p> {{ $event->venue??'N/A' }} </p>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               @empty
                  <div class="w-full col-span-3 p-3 text-sm font-medium tracking-wide text-green-800 bg-green-100 rounded shadow-lg">No event available</div>
               @endforelse
         </div>
      </div>
   {{-- @endif --}}
</div>

