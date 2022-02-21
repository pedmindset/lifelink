@push('custom-styles')
   <style>
      body {
         font-family: 'IBM Plex Mono', sans-serif;
      }
      [x-cloak] {
        display: none;
      }
      .line {
         background: repeating-linear-gradient(
            to bottom,
            #eee,
            #eee 1px,
            #fff 1px,
            #fff 8%
         );
      }
      .tick {
         background: repeating-linear-gradient(
            to right,
            #eee,
            #eee 1px,
            #fff 1px,
            #fff 5%
         );
      }
   </style>
@endpush

<div class="py-10 w-full">
   <div class="max-w-full sm:px-6 lg:px-8">
      <div class="w-full">
         <div class="flex flex-col items-center w-full mb-6 space-y-4 md:space-x-4 md:space-y-0 md:flex-row">
            <div class="w-full md:w-6/12">
               <div class="relative w-full overflow-hidden bg-white shadow-lg dark:bg-gray-700">
                  <a href="{{ route('payments') }}" class="block w-full h-full">
                     <div class="flex items-center justify-between px-4 py-6 space-x-4">
                        <div class="flex items-center">
                           <span class="relative p-5 bg-yellow-100 shadow-lg rounded-full">
                              <svg width="40" fill="currentColor" height="40" class="absolute h-5 text-yellow-500 transform -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" viewBox="0 0 1792 1792" xmlns="http://www.w3.org/2000/svg">
                                 <path d="M1362 1185q0 153-99.5 263.5t-258.5 136.5v175q0 14-9 23t-23 9h-135q-13 0-22.5-9.5t-9.5-22.5v-175q-66-9-127.5-31t-101.5-44.5-74-48-46.5-37.5-17.5-18q-17-21-2-41l103-135q7-10 23-12 15-2 24 9l2 2q113 99 243 125 37 8 74 8 81 0 142.5-43t61.5-122q0-28-15-53t-33.5-42-58.5-37.5-66-32-80-32.5q-39-16-61.5-25t-61.5-26.5-62.5-31-56.5-35.5-53.5-42.5-43.5-49-35.5-58-21-66.5-8.5-78q0-138 98-242t255-134v-180q0-13 9.5-22.5t22.5-9.5h135q14 0 23 9t9 23v176q57 6 110.5 23t87 33.5 63.5 37.5 39 29 15 14q17 18 5 38l-81 146q-8 15-23 16-14 3-27-7-3-3-14.5-12t-39-26.5-58.5-32-74.5-26-85.5-11.5q-95 0-155 43t-60 111q0 26 8.5 48t29.5 41.5 39.5 33 56 31 60.5 27 70 27.5q53 20 81 31.5t76 35 75.5 42.5 62 50 53 63.5 31.5 76.5 13 94z">
                                 </path>
                              </svg>
                           </span>
                           <p class="ml-2 text-sm font-semibold text-gray-700 border-b border-gray-200 dark:text-white">
                              Total Payment for the Month
                           </p>
                        </div>
                        <div class="mt-6 text-base font-semibold text-black border-b border-gray-200 md:mt-0 dark:text-white">
                              GHS <span class="text-xl font-bold"> {{ $monthPayment }} </span>
                              {{-- <span class="text-xs text-gray-400">
                                 /$100K
                              </span> --}}
                        </div>
                     </div>
                     <div class="w-full h-3 bg-gray-100">
                        <div class="w-3/5 h-full text-xs text-center text-white bg-green-400">
                        </div>
                     </div>
                  </a>
               </div>
            </div>

            <div class="flex items-center w-full space-x-4 md:w-1/2">
               <div class="w-1/2">
                  <div class="relative w-full px-4 py-6 bg-white shadow-lg dark:bg-gray-700">
                     <p class="text-2xl font-bold text-black dark:text-white">
                        {{ $monthEvents }}
                     </p>
                     <p class="text-sm text-gray-400">
                        New Conferences
                     </p>
                  </div>
               </div>
               <div class="w-1/2">
                  <div class="relative w-full px-4 py-6 bg-white shadow-lg dark:bg-gray-700">
                     <p class="text-2xl font-bold text-black dark:text-white">
                        {{ $monthUsers }}
                     </p>
                     <p class="text-sm text-gray-400">
                        New Users
                     </p>
                  </div>
               </div>
               
            </div>
         </div>

         <div>
            <h3 class="text-lg leading-6 font-medium text-gray-900">
               Totals
            </h3>
            <dl class="mt-5 grid grid-cols-1 rounded-lg bg-white overflow-hidden shadow divide-y divide-gray-200 md:grid-cols-3 md:divide-y-0 md:divide-x">
               <div class="px-4 py-5 sm:p-6">
                  <dt class="text-base font-normal text-gray-900">
                     Total Users
                  </dt>
                  <dd class="mt-1 flex justify-between items-baseline md:block lg:flex">
                     <div class="flex items-baseline text-2xl font-semibold text-indigo-600">
                        {{ $totalUsers }}
                        {{-- <span class="ml-2 text-sm font-medium text-gray-500">
                           from 70,946
                        </span> --}}
                     </div>
            
                     {{-- <div class="inline-flex items-baseline px-2.5 py-0.5 rounded-full text-sm font-medium bg-green-100 text-green-800 md:mt-2 lg:mt-0">
                     <!-- Heroicon name: solid/arrow-sm-up -->
                        <svg class="-ml-1 mr-0.5 flex-shrink-0 self-center h-5 w-5 text-green-500" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                           <path fill-rule="evenodd" d="M5.293 9.707a1 1 0 010-1.414l4-4a1 1 0 011.414 0l4 4a1 1 0 01-1.414 1.414L11 7.414V15a1 1 0 11-2 0V7.414L6.707 9.707a1 1 0 01-1.414 0z" clip-rule="evenodd" />
                        </svg>
                        <span class="sr-only">
                           Increased by
                        </span>
                        12%
                     </div> --}}
                  </dd>
               </div>
         
               <div class="px-4 py-5 sm:p-6">
                  <dt class="text-base font-normal text-gray-900">
                     Aluminias
                  </dt>
                  <dd class="mt-1 flex justify-between items-baseline md:block lg:flex">
                     <div class="flex items-baseline text-2xl font-semibold text-indigo-600">
                        {{ $aluminias }}
                     </div>
                  </dd>
               </div>
         
               <div class="px-4 py-5 sm:p-6">
                  <dt class="text-base font-normal text-gray-900">
                     Conferences
                  </dt>
                  <dd class="mt-1 flex justify-between items-baseline md:block lg:flex">
                     <div class="flex items-baseline text-2xl font-semibold text-indigo-600">
                        {{ $conferences }}
                     </div>
                  </dd>
               </div>
            </dl>
         </div>
      </div>

      <div x-data="app()" x-cloak class="px-4">
         <div class="w-full sm:max-w-7xl mx-auto py-10">
           <div class="shadow p-6 rounded-lg bg-white">
               <div class="md:flex md:justify-between md:items-center">
                  <div>
                     <h2 class="text-xl text-gray-800 font-bold leading-tight">Payments</h2>
                     <p class="mb-2 text-gray-600 text-sm">Monthly Average i.e Amount / 10</p>
                  </div>
         
                  <!-- Legends -->
                  <div class="mb-4">
                     <div class="flex items-center">
                        <div class="w-2 h-2 bg-blue-600 mr-2 rounded-full"></div>
                        <div class="text-sm text-gray-700">Payments</div>
                     </div>
                  </div>
               </div>
     
     
               <div class="line my-8 relative">
                  <!-- Tooltip -->
                  <template x-if="tooltipOpen == true">
                     <div x-ref="tooltipContainer" class="p-0 m-0 z-10 shadow-lg rounded-lg absolute h-auto block"
                           :style="`bottom: ${tooltipY}px; left: ${tooltipX}px`">
                        <div class="shadow-xs rounded-lg bg-white p-2">
                           <div class="flex items-center justify-between text-sm">
                              <div>Amount:</div>
                              <div class="font-bold ml-2">
                                 <span x-html="tooltipContent"></span>
                              </div>
                           </div>
                        </div>
                     </div>
                  </template>
     
                  <!-- Bar Chart -->
                  <div class="flex -mx-2 items-end mb-2">
                     <template x-for="data in chartData">
                        <div class="px-2 w-1/6">
                           <div :style="`height: ${data}px`" 
                                 class="transition ease-in duration-200 bg-blue-500 rounded-t-md hover:bg-blue-600 hover:shadow-inner relative"
                                 @mouseenter="showTooltip($event); tooltipOpen = true" 
                                 @mouseleave="hideTooltip($event)"
                                 >
                              <div x-text="data" class="text-center absolute top-0 left-0 right-0 -mt-6 text-gray-800 text-sm"></div>
                           </div>
                        </div>
                     </template>
                  </div>
     
                  <!-- Labels -->
                  <div class="border-t border-gray-400 mx-auto" :style="`height: 1px; width: ${ 100 - 1/chartData.length*100 + 3}%`"></div>
                  <div class="flex -mx-2 items-end">
                     <template x-for="data in labels">
                        <div class="px-2 w-1/6">
                           <div class="bg-red-600 relative">
                              <div class="text-center absolute top-0 left-0 right-0 h-2 -mt-px bg-gray-400 mx-auto" style="width: 1px"></div>
                              <div x-text="data" class="text-center absolute top-0 left-0 right-0 mt-3 text-gray-700 text-sm"></div>
                           </div>
                        </div>
                     </template>	
                  </div>
     
               </div>
            </div>
         </div>
      </div>

   </div>
</div>

@push('custom-scripts')
   <script>
      console.log(paymentData);
   </script>
   <script>
      function app() {
         return {
            // chartData: [112, 10, 225, 134, 101, 80, 50, 100, 200, 160, 210, 75],
            chartData: @entangle('barData'),
            labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],

            tooltipContent: '',
            tooltipOpen: false,
            tooltipX: 0,
            tooltipY: 0,
            showTooltip(e) {
            console.log(e);
            this.tooltipContent = e.target.textContent
            this.tooltipX = e.target.offsetLeft - e.target.clientWidth;
            this.tooltipY = e.target.clientHeight + e.target.clientWidth;
            },
            hideTooltip(e) {
            this.tooltipContent = '';
            this.tooltipOpen = false;
            this.tooltipX = 0;
            this.tooltipY = 0;
            }
         }
      }
   </script>
@endpush
