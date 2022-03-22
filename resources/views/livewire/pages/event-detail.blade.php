<div x-data="{ showApply: @entangle('applyMode') }">
   @if($applyMode)
   @livewire('pages.form-application', ['id' => $formId, 'userId' => $userId, 'isMobile'=>$isMobile])
   @endif

   <div class="p-3 sm:px-16 sm:py-5">
      @if(Session::has('success'))
            <div class="w-full p-3 bg-green-200 mb-3 text-sm font-sans font-medium text-green-700 shadow-inner rounded-sm">
               {{Session::get('success')}}
            </div>
         @endif
         @if(Session::has('fail'))
            <div class="w-full p-3 bg-red-200 mb-3 text-sm font-sans font-medium text-red-700 shadow-inner rounded-sm">
               {{Session::get('fail')}}
            </div>
         @endif
      <div class="overflow-hidden">
         <img class="object-cover object-center w-full h-64 rounded-sm lg:h-80" src="{{ $event->image_url != '' ? $event->image_url : asset('img/back_con.jpg') }}" alt="image back">
         <div class="max-w-5xl mx-auto">
            <p class="flex items-center justify-center pt-12 font-sans text-2xl font-bold leading-6 tracking-wide text-green-600 uppercase">{{ $event->name }}</p>
            <p class="py-4 text-base leading-9 tracking-wide text-gray-600">{{ $event->description ?? '' }}</p>
            <div class="flex space-x-8">
               <p class="text-sm font-bold text-gray-600">From  <span class="px-3 py-1 rounded bg-cyan-200 text-cyan-600">{{ date("F jS, Y", strtotime($event->start_date)) }}</span></p>
               <p class="text-sm font-bold text-gray-600">To  <span class="px-3 py-1 text-red-600 bg-red-200 rounded">{{ date("F jS, Y", strtotime($event->end_date)) }}</span></p>
            </div>

            <div class="pt-20 mb-12">
               <h2 class="py-8 text-3xl font-extrabold tracking-tight text-center text-gray-800 sm:text-4xl">
                  Application Forms
               </h2>
               <div class="overflow-hidden bg-white">
                  <ul role="list" class="divide-y divide-gray-200">
                     @forelse ($event->applications as $app)
                     <li>
                        <div class="block">
                           <div class="px-4 py-4 sm:px-6">
                              <div class="flex items-center justify-between">
                                 <div>
                                    <p class="flex text-sm font-bold text-gray-600 truncate">
                                       {{ $app->name }}
                                       {{-- <span class="flex p-2 text-xs font-bold text-white bg-green-600 rounded-lg"><svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                             <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z" />
                                          </svg> {{ count($app->applicants) }}</span> --}}
                                    </p>
                                 </div>
                                 <div class="flex flex-shrink-0 ml-2">
                                    <x-button type="button" wire:click="applyForm({{$app->id }})" class="inline-flex text-xs font-bold leading-5 text-green-800 bg-green-100 rounded-md hover:bg-green-400 hover:text-white hover:shadow-inner">
                                       Apply
                                    </x-button>
                                 </div>
                              </div>

                           </div>
                        </div>
                     </li>
                     @empty
                     <li class="p-3 font-sans text-sm font-bold text-green-600 bg-green-100 rounded-sm">No Forms to apply</li>
                     @endforelse
               </ul>
            </div>

            </div>
         </div>

         <div class="bg-gray-800 rounded-md">
            <div class="px-4 py-16 mx-auto max-w-7xl sm:px-6 lg:px-8">
               <div class="lg:max-w-2xl lg:mx-auto lg:text-center">
                  <h2 class="text-3xl font-extrabold tracking-tight text-white sm:text-4xl">
                     Payment &amp; Benefits
                  </h2>
               </div>
               <div class="mt-16">
                  <dl class="space-y-10 lg:space-y-0 lg:grid lg:grid-cols-2 lg:gap-x-8 lg:gap-y-10">
                     <div>
                        <dt class="font-semibold text-white">
                           Payment
                        </dt>
                        <dd class="mt-3 text-sm text-gray-400">
                           <ul role="list" class="mt-4 space-y-4">
                              @if (isset($event->fee))
                              <li>International Delegates: ${{ $event->fee->international_amount }} US DOLLARS</li>
                              <li>Early bird registration - {{ $event->fee->early_bird_amount }} before {{ date("F jS, Y", strtotime($event->fee->early_bird_date)) }}</li>
                              <li>Regular registration - {{ $event->fee->standard_amount }} before {{ date("F jS, Y", strtotime($event->fee->regular_date)) }}</li>
                              <li>Late registration {{ $event->fee->late_amount }} after {{ date("F jS, Y", strtotime($event->fee->late_date)) }}</li>

                              @else
                                 <li>Fees unavailable</li>
                              @endif
                           </ul>
                        </dd>
                     </div>
                     <div>
                        <dt class="font-semibold text-white">
                           About Conference
                        </dt>
                        <dd class="mt-3 prose text-gray-400">
                           {{ $event->description }}
                        </dd>
                     </div>
                  </dl>


               </div>
            </div>
         </div>

         <div class="my-8 space-y-2 sm:my-12">
            <div class="flex justify-between p-8">
               <div>
                  <h2 class="text-3xl font-extrabold tracking-tight text-gray-600 sm:text-4xl">
                     Venue
                  </h2>
                  <p>{{ $event->venue??'N/A' }}</p>
               </div>

               <div>
                  <h2 class="text-3xl font-extrabold tracking-tight text-gray-600 sm:text-4xl">
                     Phone
                  </h2>
                  <p>+233-24-4681828</p>
               </div>

            </div>
            <div class="p-8">
               <div class="border-2 border-gray-500 rounded">
                  <iframe src="https://maps.google.com/maps?q={{ $event->latitude }}, {{ $event->longitude }}&z=15&output=embed" 
                     height="450" frameborder="0" 
                     width="100%"
                     style="border:0"
                     loading="lazy"></iframe>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>

@push('custom-scripts')
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
@endpush
