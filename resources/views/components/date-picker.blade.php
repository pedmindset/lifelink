{{-- @props([
   'placeholder',
])
<div
   x-data="{ value: @entangle($attributes->wire('model')), picker: undefined }"
   x-init="[initDate(), getNoOfDays()]"
   class="flex rounded-md shadow-sm">
   <span class="inline-flex items-center px-3 rounded-l-md border border-r-0 border-gray-300 bg-gray-50 text-gray-500 sm:text-sm">
      <svg class="h-9 w-9 text-gray-400" fill="currentColor" viewBox="0 0 20 20">
         <path fill-rule="evenodd" clip-rule="evenodd" d="M6 2C5.44772 2 5 2.44772 5 3V4H4C2.89543 4 2 4.89543 2 6V16C2 17.1046 2.89543 18 4 18H16C17.1046 18 18 17.1046 18 16V6C18 4.89543 17.1046 4 16 4H15V3C15 2.44772 14.5523 2 14 2C13.4477 2 13 2.44772 13 3V4H7V3C7 2.44772 6.55228 2 6 2ZM6 7C5.44772 7 5 7.44772 5 8C5 8.55228 5.44772 9 6 9H14C14.5523 9 15 8.55228 15 8C15 7.44772 14.5523 7 14 7H6Z"/>
      </svg>
   </span>

   <input
      {{ $attributes->whereDoesntStartWith('wire:model') }}
      x-ref="input"
      x-bind:value="value"
      class="rounded-none rounded-r-md  border px-2 border-gray-300 flex-1 form-input block w-full transition duration-150 ease-in-out sm:text-sm sm:leading-5"
   />
</div> --}}

@props([
   'placeholder',
   'label',
   'valueItem',
])
   <div class="relative" @keydown.escape="showDatepicker == false" @click.away="showDatepicker == false">
      <label for="{{ $label }}" class="block text-sm font-medium text-gray-900">{{ $label }}</label>
      <div class="relative mt-1">
         <div class="flex absolute inset-y-0 left-0 items-center pl-3 pointer-events-none">
            <svg class="w-5 h-5 text-gray-500 dark:text-gray-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z" clip-rule="evenodd"></path></svg>
         </div>
         <input x-bind:value="{{ $valueItem }}" type="text" placeholder="{{ $valueItem }}" readonly @click="openPicker({{ $valueItem }})" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
      </div>

      <div x-show="showDatepicker == true" class="bg-white w-full mb-6 sm:mt-20 z-3 rounded-b-lg shadow absolute top-0 left-0">
         <div class="flex justify-between bg-gray-50 items-center mb-2 px-4 py-2">
            <div>
               <span x-text="MONTH_NAMES[month]" class="text-md font-bold text-gray-800">,</span>
               <span x-text="year" class="ml-1 text-sm text-gray-600 font-normal"></span>
            </div>

            <div>
               <button type="button" class="transition ease-in-out duration-100 inline-flex cursor-pointer hover:bg-gray-200 p-1 rounded-full"
               :class="{'cursor-not-allowed opacity-25': month == 0 }" :disabled="month == 0 ? true : false" @click="if (month == 0) {year--; month=11;} else {month--;} getNoOfDays()">
                  <svg class="h-6 w-6 text-gray-500 inline-flex"  fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/>
                  </svg>
               </button>

               <button type="button" class="transition ease-in-out duration-100 inline-flex cursor-pointer hover:bg-gray-200 p-1 rounded-full"
               :class="{'cursor-not-allowed opacity-25': month == 11 }" :disabled="month == 11 ? true : false" @click="if (month == 11) {year++; month=0;} else {month++;}; getNoOfDays()">
                  <svg class="h-6 w-6 text-gray-500 inline-flex"  fill="none" viewBox="0 0 24 24" stroke="currentColor">
                     <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                  </svg>
               </button>
            </div>
         </div>

         <div class="p-3">
            <div class="flex flex-wrap mb-3 -mx-1">
               <template x-for="(day, index) in DAYS">
                  <div style="width: 14.26%" class="px-1">
                     <div x-text="day" class="text-gray-800 font-medium text-center text-xs"></div>
                  </div>
               </template>
            </div>

            <div class="flex flex-wrap -mx-1">
               <template v-for="blankday in blankdays">
                  <div style="width: 14.28%" class="text-center border p-1 border-transparent text-sm"></div>
               </template>
               <template x-for="(date, dateIndex) in no_of_days">
                  <div style="width: 14.28%" class="px-1 mb-1">
                     <div x-text="date" x-on:click="getEditDateValue(date)" 
                     @click="getDateValue(date)"
                     class="cursor-pointer text-center text-sm leading-none rounded-full transition ease-in-out px-1 py-2 duration-100" 
                     :class="{'bg-blue-500 text-white': isToday(date) == true, 'text-gray-700 hover:bg-blue-200': isToday(date) == false }"></div>
                  </div>
               </template>
            </div>
         </div>
      </div>

   </div>
