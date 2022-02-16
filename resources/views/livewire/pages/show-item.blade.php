<div x-show="showView" style="display:none">
   <div class="p-3 sm:px-16 sm:py-5">
      <p wire:click="closeView()" class="pb-12 font-sans font-bold cursor-pointer text-gray-600 text-sm flex items-center">
         <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 19l-7-7 7-7m8 14l-7-7 7-7" />
         </svg>
         Back to Events</p>
      <div class="overflow-hidden">
         <img class="h-64 rounded-sm w-full object-cover lg:h-80" src="{{ $event->image_url != '' ? $event->image_url : asset('img/back_con.jpg') }}" alt="image back">
         <div class="max-w-5xl mx-auto">
            <p class="flex justify-center items-center text-green-600 uppercase leading-6 tracking-wide font-sans font-bold text-2xl pt-12">{{ $event->name }}</p>
            <p class="text-base text-gray-600 tracking-wide leading-9 py-4">{{ $event->description ?? '' }}</p>
            <div class="flex space-x-8">
               <p class="text-sm font-bold text-gray-600">From - <span class="bg-cyan-200 text-cyan-600 px-3 py-1 rounded">{{ date("F jS, Y", strtotime($event->start_date)) }}</span></p>
               <p class="text-sm font-bold text-gray-600">To - <span class="bg-red-200 text-red-600 px-3 py-1 rounded">{{ date("F jS, Y", strtotime($event->end_date)) }}</span></p>
            </div>

            <div class="mb-12 pt-20">
               <h2 class="text-3xl py-8 font-extrabold text-center tracking-tight text-gray-800 sm:text-4xl">
                  Application Forms
               </h2>
               <div class="bg-white overflow-hidden">
                  <ul role="list" class="divide-y divide-gray-200">
                     @forelse ($event->applications as $app)
                     <li>
                        <div class="block">
                           <div class="px-4 py-4 sm:px-6">
                              <div class="flex items-center justify-between">
                                 <div>
                                    <p class="text-sm font-bold text-gray-600 truncate flex">
                                       {{ $app->name }}
                                       {{-- <span class="bg-green-600 text-xs font-bold flex rounded-lg p-2 text-white"><svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                             <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z" />
                                          </svg> {{ count($app->applicants) }}</span> --}}
                                    </p>
                                 </div>
                                 <div class="ml-2 flex-shrink-0 flex">
                                    <x-button type="button" wire:click="applyForm({{$app->id }})" class="inline-flex text-xs font-bold leading-5 rounded-md bg-green-100 text-green-800 hover:bg-green-400 hover:text-white hover:shadow-inner">
                                       Apply
                                    </x-button>
                                 </div>
                              </div>

                           </div>
                        </div>
                     </li>
                     @empty
                     <li class="bg-green-100 text-green-600 font-sans font-bold text-sm rounded-sm p-3">No Forms to apply</li>
                     @endforelse
               </ul>
            </div>

            </div>
         </div>

         <div class="bg-gray-800 rounded-md">
            <div class="max-w-7xl mx-auto py-16 px-4 sm:px-6 lg:px-8">
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
                        <dd class="mt-3 text-gray-400 text-sm">
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
                        <dd class="mt-3 text-gray-400 prose">
                           {{ $event->description }}
                        </dd>
                     </div>
                  </dl>

                  <div class="my-8">
                     <div class="pt-12">
                        <h1 class="font-semibold text-xl text-white text-center">Account Details</h1>
                        <div class="text-gray-300 text-center justify-center leading-5 tracking-wide">
                           <p>
                              Bank Name: Ecobank Ghana
                           </p>
                           <p>
                              Account Details CEDI: 0020134402288001
                           </p>
                           <p>
                              DOLLAR: 0022104402288001
                           </p>
                           <p>
                              Account Name: Life -link Friendship School
                           </p>
                           <p>
                              Account Branch: Tema
                           </p>
                           <p>
                              MTN Mobile Money: 024 093 5493
                           </p>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>

         <div class="sm:my-12 my-8 space-y-2">
            <div class="p-8 flex justify-between">
               <div>
                  <h2 class="text-3xl font-extrabold tracking-tight text-gray-600 sm:text-4xl">
                     Venue
                  </h2>
                  <p>{{ $event->venue }}</p>
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
                  <iframe class="w-full" src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d7941.313763795987!2d-0.06590542864552393!3d5.617577710032567!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0xfdf869b8083002d%3A0x233f163d3a21ce80!2sQueensland%20International%20School!5e0!3m2!1sen!2sgh!4v1643883005471!5m2!1sen!2sgh"
                        height="450"
                        style="border:0;"
                        allowfullscreen=""
                        loading="lazy"></iframe>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>
