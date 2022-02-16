<div x-data="{ showView: @entangle('showMode'), showApply: @entangle('applyMode') }">
   @if (isset($eventId))
      @include('livewire.pages.show-item')
      @include('livewire.pages.form-application')
      @if ($applyMode)
      @livewire('pages.form-application', ['id' => $formId])
      @endif
   @else
      <div class="p-3 sm:px-8 sm:py-12">
         <div class="pb-12 text-center">
            <h2 class="text-3xl font-sans tracking-tight uppercase font-extrabold text-gray-900 sm:text-4xl">upcoming events</h2>
            {{-- <p class="mt-3 max-w-2xl mx-auto text-xl text-gray-500 sm:mt-4">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Ipsa libero labore natus atque, ducimus sed.</p> --}}
         </div>
         <div class="overflow-hidden">
            <div class="my-12 max-w-lg mx-auto grid gap-5 lg:grid-cols-3 lg:max-w-none">
               {{-- <ul role="list" class="divide-y divide-gray-200 space-y-12 grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3  gap-4"> --}}
               @forelse ($events as $event)
                  <div class="flex flex-col rounded-lg shadow-lg overflow-hidden">
                     <div class="flex-shrink-0">
                        <img class="h-48 w-full object-cover" src="{{ $event->thumb_image_url != '' ? $event->thumb_image_url : asset('img/back_con.jpg') }}" alt="">
                     </div>

                     <div class="flex-1 bg-white p-6 flex flex-col justify-between cursor-pointer">
                        <div class="flex-1 ">
                           <div class="block mt-2" wire:click.prevent="showItem({{ $event->id }})">
                              <p class="text-xl font-semibold text-indigo-600">{{ $event->name }}</p>
                              <p class="mt-3 text-base text-gray-500  prose prose-sm pb-3 h-40">{{ \Illuminate\Support\Str($event->description, 40) }}</p>
                           </div>
                        </div>
                        <div class="mt-3 flex justify-between">
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
                  <div class="w-full bg-green-100 text-green-800 text-sm rounded shadow">No event available</div>
               @endforelse
         </div>
      </div>
   @endif
</div>

<script src="{{ asset('js/sweet-alert.js') }}"></script>
<script>
   window.addEventListener('alertMessage', ({detail:{type, message}}) => {
      Swal.fire({
         toast: true,
         title: message,
         icon: type,
         position:'top-end',
         timer: 3600,
         showConfirmButton: false,
         timerProgressBar: true,
         didOpen: (toast) => {
            toast.addEventListener('mouseenter', Swal.stopTimer)
            toast.addEventListener('mouseleave', Swal.resumeTimer)
         }
      })
   });
</script>
