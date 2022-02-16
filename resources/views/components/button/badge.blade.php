<span class="inline-flex items-center py-0.5 pl-2 pr-0.5 rounded-full text-xs font-medium bg-indigo-100 text-indigo-700">
   Small
   <button type="button" class="flex-shrink-0 ml-0.5 h-4 w-4 rounded-full inline-flex items-center justify-center text-indigo-400 hover:bg-indigo-200 hover:text-indigo-500 focus:outline-none focus:bg-indigo-500 focus:text-white">
      <span class="sr-only">Remove small option</span>
      <svg class="h-2 w-2" stroke="currentColor" fill="none" viewBox="0 0 8 8">
         <path stroke-linecap="round" stroke-width="1.5" d="M1 1l6 6m0-6L1 7" />
      </svg>
   </button>
</span>

<li class="bg-gray-100 rounded shadow-sm mb-2 hover:shadow-lg transition duration-300 ease-linear" x-data="{ showDelete: false, showCategory: false, showEdit: false }">
   <div class="flex p-3">
      <div class="ml-3 mr-auto">
         <p class="text-sm leading-5 font-medium text-gray-600">
            name
         </p>
      </div>

      <div class="pl-3">
         <div class="-mx-1.5 -my-1.5">
            <button class="rounded-md p-1 font-bold text-gray-500 hover:bg-green-100 hover:text-green-500 focus:outline-none focus:bg-green-100 transition ease-in-out duration-150">
               <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
               <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 13h6M3 17V7a2 2 0 012-2h6l2 2h6a2 2 0 012 2v8a2 2 0 01-2 2H5a2 2 0 01-2-2z" />
               </svg>
            </button>
         </div>
      </div>
   </div>
</li>