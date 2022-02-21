<div x-show="showList" style="display:none">
   @if (count($data) > 0)
   <div class="flex place-content-end mb-4">
      <button type="button" x-on:click="openCreate = true" class="inline-flex items-center px-4 py-2 border border-transparent shadow-sm text-sm font-medium rounded-md text-white capitalize bg-cyan-600 hover:bg-cyan-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-cyan-500">
         new event
      </button>
   </div>

   <div class="flex flex-col">
      <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
         <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
            <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-b-lg">
               <table class="min-w-full divide-y divide-gray-200">
                  <thead class="bg-gray-50">
                     <tr>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                           Name
                        </th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                           Description
                        </th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                           Start Date
                        </th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                           End Date
                        </th>
                        <th scope="col" class="relative px-6 py-3">
                           <span class="sr-only">Forms</span>
                        </th>
                        <th scope="col" class="relative px-6 py-3">
                           <span class="sr-only">Action</span>
                        </th>
                     </tr>
                  </thead>
                  <tbody class="bg-white divide-y divide-gray-200">
                     @foreach($data as $event)
                     <tr>
                        <td class="px-6 py-4 whitespace-nowrap text-sm font-bold text-gray-500">
                           {{ $event->name }}
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500 truncate break-words prose">
                           {{ $event->description }}
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                           {{ date("F jS, Y", strtotime($event->start_date)) }}
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                           {{ date("F jS, Y", strtotime($event->end_date)) }}
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700 font-semibold">
                           {{ count($event->applications) }}
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-right space-x-2">
                           <a href="{{ route('events', ['option' => 'view', 'id'=>$event->id]) }}" class="inline-flex justify-center items-center font-semibold rounded-md p-1 text-gray-500 hover:bg-green-100 hover:text-green-500 focus:outline-none focus:bg-green-100 transition ease-in-out duration-150">
                              <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                 <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                 <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                              </svg>
                           </a>
                           <button wire:click.prevent="edit({{$event->id}})" class="inline-flex justify-center items-center font-semibold rounded-md p-1 text-gray-500 hover:bg-green-100 hover:text-green-500 focus:outline-none focus:bg-green-100 transition ease-in-out duration-150">
                              <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                 <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                              </svg>
                           </button>
                           <button wire:click.prevent="delete({{$event->id}})" class="inline-flex justify-center items-center font-semibold p-1 rounded-md text-gray-500 hover:bg-red-100 hover:text-red-500 focus:outline-none transition ease-in-out duration-150">
                              {{-- <i class="las la-trash text-2xl"></i> --}}
                              <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                 <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                              </svg>
                           </button>
                        </td>
                     </tr>
                     @endforeach
                  </tbody>
               </table>
            </div>
         </div>
      </div>
   </div>
   @else

   <div class="w-3/4 mx-auto text-center py-8 bg-white shadow my-8 border-t-4 border-r-4 border-gray-400 rounded-t-lg">
      <i class="las la-folder-plus text-6xl text-gray-600 py-3"></i>
      <p class="text-gray-600 text-base font-bold">No Event Available</p>
      <p class="text-gray-400 font-medium">Get started by creating a new <span class="font-bold text-gray-700">Event</span></p>

      <p class="mt-6 mb-10" x-on:click="openCreate = true"><span class="px-4 py-2 text-sm rounded-md text-white w-auto bg-indigo-600 hover:bg-indigo-700 cursor-pointer"> <i class="las la-plus text-md px-1"></i> New Event </span></p>
   </div>
   @endif
</div>