@props([
   'placeholder',
   'label',
])

<div>
   <div class="relative">
      <label for="{{ $label }}" class="block text-sm font-medium text-gray-900">{{ $label }}</label>
      <div class="relative mt-1">
         <div class="flex absolute inset-y-0 left-0 items-center pl-3 pointer-events-none">
            <svg class="w-5 h-5 text-gray-500 dark:text-gray-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z" clip-rule="evenodd"></path></svg>
         </div>
         <input x-bind:value="endValue" type="text" placeholder="{{ $placeholder }}" readonly @click="openPicker('endValue')" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
      </div>

      <div x-show="showEndDatepicker == true" class="bg-white w-full mb-6 sm:mt-20 z-3 rounded-b-lg shadow absolute top-0 left-0">
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
               <template x-for="blankday in blankdays">
                  <div style="width: 14.28%" class="text-center border p-1 border-transparent text-sm"></div>
               </template>
               <template x-for="(date, dateIndex) in no_of_days">
                  <div style="width: 14.28%" class="px-1 mb-1">
                     <div x-text="date" 
                     @click="getDateValue(date)"
                     class="cursor-pointer text-center text-sm leading-none rounded-full transition ease-in-out px-1 py-2 duration-100" 
                     :class="{'bg-blue-500 text-white': isToday(date) == true, 'text-gray-700 hover:bg-blue-200': isToday(date) == false }"></div>
                  </div>
               </template>
            </div>
         </div>
      </div>

   </div>
</div>

{{-- <script>
   const MONTHEND_NAMES = ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'];
   const DAYSEND = ['Sun', 'Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat'];

   function app() {
      return {
         showEndDatepicker: false,
         endValue: @entangle($attributes->wire('model')),
         endValueYmd: '',
         currentEndDate: null,
         monthEnd: '',
         yearEnd: '',
         no_of_daysEnd: [],
         blankdaysEnd: [],
         
         convertEndFromYmd(dateYmd) {
            const year = Number(dateYmd.substr(0, 4));
            const monthEnd = Number(dateYmd.substr(5, 2)) - 1;
            const date = Number(dateYmd.substr(8, 2));
            
            return new Date(year, monthEnd, date);
         },
         
         convertEndToYmd(dateObject) {
            const year = dateObject.getFullYear();
            const monthEnd = dateObject.getMonthEnd() + 1;
            const date = dateObject.getDate();
            
            return year + "-" + ('0' + monthEnd).slice(-2) + "-" +  ('0' + date).slice(-2);
         },

         initDate() {
            this.currentEndDate = new Date();

            currentMonthEnd = this.currentEndDate.getMonthEnd();
            currentYear = this.currentEndDate.getFullYear();
            if ( this.monthEnd !== currentMonthEnd || this.year !== currentYear ) {
               this.monthEnd = currentMonthEnd;
               this.year = currentYear;
               this.getEndNoOfDays();
            }
            this.setEndDateValues();
         },

         isTodayEnd(date) {
            const today = new Date();
            const d = new Date(this.year, this.monthEnd, date);

            return today.toDateString() === d.toDateString();
         },
         
         setEndDateValues() {
            this.showEndDatepicker = false;
            this.endValue = this.endValue.toDateString();
            this.endValueYmd = this.convertEndToYmd(this.endValue);
         },

         getEndDateValue(date) {
            let selectedDate = new Date(this.year, this.monthEnd, date);
            
            this.endValue = selectedDate;
            this.setEndDateValues();
         },

         getEndNoOfDays() {
            let daysInMonthEnd = new Date(this.year, this.monthEnd + 1, 0).getDate();
            let dayOfWeek = new Date(this.year, this.monthEnd).getDay();
            let blankdaysEndArray = [];
            for ( var i=1; i <= dayOfWeek; i++) {
               blankdaysEndArray.push(i);
            }

            let daysArray = [];
            for ( var i=1; i <= daysInMonthEnd; i++) {
               daysArray.push(i);
            }

            this.blankdaysEnd = blankdaysEndArray;
            this.no_of_daysEnd = daysArray;
         },
      }
   }
</script> --}}