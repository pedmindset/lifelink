<div class="w-full">
   <div class="py-10">
      <div class="max-w-full sm:px-6 lg:px-8">

         <div class="flex place-content-end mb-4">
            <div class="px-4 py-2 text-white bg-indigo-600 hover:bg-indigo-700 cursor-pointer rounded-bl-md rounded-tr-md">
               <button type="button" class="text-sm font-medium">New Conference</button>
            </div>
         </div>

         <table class="min-w-full border divide-y divide-gray-200">
            <thead>
               <tr>
                  <th class="px-6 py-3 bg-gray-50">
                     <span class="text-xs font-medium tracking-wider leading-4 text-left text-gray-500 uppercase">Index</span>
                  </th>
                  <th class="px-6 py-3 bg-gray-50">
                     <span class="text-xs font-medium tracking-wider leading-4 text-left text-gray-500 uppercase">Title</span>
                  </th>
                  <th class="px-6 py-3 bg-gray-50">
                     <span class="text-xs font-medium tracking-wider leading-4 text-left text-gray-500 uppercase">Date</span>
                  </th>
                  <th class="px-6 py-3 bg-gray-50">
                     <span class="text-xs font-medium tracking-wider leading-4 text-left text-gray-500 uppercase">Location</span>
                  </th>
                  <th class="px-6 py-3 bg-gray-50">
                     <span class="text-xs font-medium tracking-wider leading-4 text-left text-gray-500 uppercase">Fee</span>
                  </th>
                  <th class="px-6 py-3 bg-gray-50">
                  </th>
               </tr>
            </thead>

            <tbody class="bg-white divide-y divide-gray-200 divide-solid w-full">
               @for($i = 0; $i < 5; $i++)
               <tr class="bg-white w-full">
                  <td class="px-6 py-4 text-sm leading-5 text-gray-900 whitespace-no-wrap">
                     <span class="items-center flex justify-center">{{ $i + 1 }} </span>
                  </td>
                  <td class="px-6 py-4 text-sm leading-5 text-gray-900 whitespace-no-wrap">
                     <span class="items-center flex justify-center">Conference title</span>
                  </td>
                  <td class="px-6 py-4 text-sm leading-5 text-gray-900 whitespace-no-wrap">
                     <span class="items-center flex justify-center">Conference date</span>
                  </td>
                  <td class="px-6 py-4 text-sm leading-5 text-gray-900 whitespace-no-wrap">
                     <span class="items-center flex justify-center">Conference Location</span>
                  </td>
                  <td class="px-6 py-4 text-sm leading-5 text-gray-900 whitespace-no-wrap">
                     <span class="items-center flex justify-center">120.00</span>
                  </td>
                  <td class="space-x-2">
                     <button type="button" class="inline-flex items-center px-4 py-2 text-xs font-semibold tracking-widest text-white uppercase bg-blue-600 rounded-md border border-transparent ring-blue-300 transition duration-150 ease-in-out hover:bg-blue-700 hover:shadow-inner active:bg-blue-900 focus:outline-none focus:border-blue-900 focus:ring disabled:opacity-25">
                        Edit 
                     </button> 
                     <button class="inline-flex items-center px-4 py-2 text-xs font-semibold tracking-widest text-white uppercase bg-red-600 rounded-md border border-transparent ring-red-300 transition duration-150 ease-in-out hover:bg-red-700 hover:shadow-inner active:bg-red-900 focus:outline-none focus:border-red-900 focus:ring disabled:opacity-25">Delete</button>
                  </td>
               </tr>
               @endfor
            </tbody>
         </table>

         <div class="w-3/4 mx-auto text-center py-8 bg-white shadow my-8 border-t-4 border-r-4 border-gray-400 rounded-t-lg">
            <i class="las la-folder-plus text-6xl text-gray-600 py-3"></i>
            <p class="text-gray-600 text-base font-bold">No Conference available</p>
            <p class="text-gray-400 font-medium">Get started by creating a new <span class="font-bold text-gray-700">Conference</span></p>

            <p class="mt-6 mb-10"><span class="px-4 py-2 text-sm rounded-md text-white w-auto bg-indigo-600 hover:bg-indigo-700 cursor-pointer"> <i class="las la-plus text-md px-1"></i> New Conference </span></p>
         </div>

      </div>
   </div>
</div>