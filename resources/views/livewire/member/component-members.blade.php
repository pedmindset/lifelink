<div class="w-full">
   <div class="py-10">
      <div class="max-w-full sm:px-6 lg:px-8">
         <table class="min-w-full border divide-y divide-gray-200">
            <thead>
               <tr>
                  <th class="px-6 py-3 bg-gray-50">
                     <span class="text-xs font-medium tracking-wider leading-4 text-left text-gray-500 uppercase">Index</span>
                  </th>
                  <th class="px-6 py-3 bg-gray-50">
                     <span class="text-xs font-medium tracking-wider leading-4 text-left text-gray-500 uppercase">Name</span>
                  </th>
                  <th class="px-6 py-3 bg-gray-50">
                     <span class="text-xs font-medium tracking-wider leading-4 text-left text-gray-500 uppercase">Conference</span>
                  </th>
                  <th class="px-6 py-3 bg-gray-50">
                     <span class="text-xs font-medium tracking-wider leading-4 text-left text-gray-500 uppercase">Email</span>
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
                     <span class="items-center flex justify-center">Kelvin Meow</span>
                  </td>
                  <td class="px-6 py-4 text-sm leading-5 text-gray-900 whitespace-no-wrap">
                     <span class="items-center flex justify-center">LTSP Incoming</span>
                  </td>
                  <td class="px-6 py-4 text-sm leading-5 text-gray-900 whitespace-no-wrap">
                     <span class="items-center flex justify-center">meow.kev@gmail.com</span>
                  </td>
                  <td class="space-x-2 place-items-end">
                     <button class="inline-flex items-center px-4 py-2 text-xs font-semibold tracking-widest text-white uppercase bg-red-600 rounded-md border border-transparent ring-red-300 transition duration-150 ease-in-out hover:bg-red-700 hover:shadow-inner active:bg-red-900 focus:outline-none focus:border-red-900 focus:ring disabled:opacity-25">Delete</button>
                  </td>
               </tr>
               @endfor
            </tbody>
         </table>
      </div>
   </div>
</div>
