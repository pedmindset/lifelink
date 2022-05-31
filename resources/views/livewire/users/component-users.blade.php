<div class="w-full" x-data="{ openCreate: @entangle('createMode'), openEdit: @entangle('updateMode'), openDelete: @entangle('deleteMode') }">
   <div class="py-10">
      <div class="max-w-full sm:px-6 lg:px-8">
         <div class="w-full">
            @include('livewire.users.create')
            @include('livewire.users.update')
            @include('livewire.users.delete')

            @if (count($data) > 0)

            <div class="mb-4 px-2 sm:px-0 flex justify-between">
               <div class="relative" x-data="{ open:false }" x-on:click.away="open = false">
                  <div class="h-10 bg-white flex border border-gray-200 items-center rounded-md">
                     <p class="px-4 transform appearance-none outline-none text-gray-800 w-full capitalize">Sort By</p>

                     <label x-on:click="open = !open"
                        x-bind:class="open ? 'flip-top' : 'closed' " for="show_more" class="cursor-pointer outline-none focus:outline-none transition-all text-gray-400 hover:text-gray-800">
                        <svg class="w-4 h-4 mx-2 fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                          <polyline points="18 15 12 9 6 15"></polyline>
                        </svg>
                     </label>
                  </div>
                  <div x-show="open" class="absolute z-1 w-40 rounded shadow bg-white overflow-hidden flex flex-col mt-1 border border-gray-200">
                     <div class="cursor-pointer group w-40">
                        <span wire:click.prevent="sortedBy('client')" @click.prevent="open = false" class="block p-2 border-transparent capitalize border-b-2 group-hover:border-cyan-600">Client</span>
                     </div>
                     <div class="cursor-pointer group w-40">
                        <span wire:click.prevent="sortedBy('staff')" @click.prevent="open = false" class="block p-2 border-transparent capitalize border-b-2 group-hover:border-cyan-600">Staff</span>
                     </div>

                  </div>
               </div>

               <div class="">
                  <button type="button" x-on:click.defer="openCreate = true" class="inline-flex items-center px-4 py-2 border border-transparent shadow-sm text-sm font-medium rounded-md text-white capitalize bg-cyan-600 hover:bg-cyan-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-cyan-500">
                     New User
                  </button>
               </div>
            </div>

            <div class="flex flex-col">
               <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
                  <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                     <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-b-lg">
                        <table class="min-w-full divide-y divide-gray-200">
                           <thead class="bg-gray-50">
                              <tr>
                                 <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Name / Email
                                 </th>
                                 <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Role
                                 </th>
                                 <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Phone
                                 </th>
                                 <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Aluninia Status
                                 </th>
                                 <th scope="col" class="relative px-6 py-3">
                                    <span class="sr-only">Action</span>
                                 </th>
                              </tr>
                           </thead>
                           <tbody class="bg-white divide-y divide-gray-200">
                              @foreach($data as $person)
                              <tr>
                                 <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="flex items-center">
                                       <div class="flex-shrink-0 h-10 w-10">
                                          <img class="h-10 w-10 rounded-full" src="@if($person->thumb_image_url) {{ $person->thumb_image_url }} @else {{ asset('img/face.png') }}  @endif" alt="">
                                       </div>
                                       <div class="ml-4">
                                          <div class="text-sm font-bold text-gray-900">
                                             {{ $person->name }}
                                          </div>
                                          <div class="text-sm text-gray-500">
                                             {{ $person->email }}
                                          </div>
                                       </div>
                                    </div>
                                 </td>
                                 <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="text-sm text-gray-500">{{ $person->getRole() ?? 'N/A' }}</div>
                                 </td>
                                 <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                    {{ $person->profile->phone ?? 'N/A' }}
                                 </td>
                                 <td class="px-6 py-4 whitespace-nowrap">
                                    <span class="px-2 py-1 inline-flex text-xs leading-5 font-bold rounded-full bg-green-100 text-green-800">
                                       {{ $person->profile->aluminia ? 'Active' : 'Inactive' }}
                                    </span>
                                 </td>
                                 <td class="px-6 py-4 whitespace-nowrap text-right space-x-2">
                                    {{-- <button wire:click.prevent="edit({{$person->id}})" type="button" class="inline-flex justify-center items-center font-semibold rounded-md p-1 text-gray-500 hover:bg-green-100 hover:text-green-500 focus:outline-none focus:bg-green-100 transition ease-in-out duration-150">
                                       <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                       </svg>
                                    </button>  --}}
                                    <button wire:click.prevent="edit({{$person->id}})" class="inline-flex justify-center items-center font-semibold rounded-md p-1 text-gray-500 hover:bg-green-100 hover:text-green-500 focus:outline-none focus:bg-green-100 transition ease-in-out duration-150">
                                       <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                       </svg>
                                    </button>
                                    <button wire:click.prevent="delete({{$person->id}})" class="inline-flex justify-center items-center font-semibold p-1 rounded-md text-gray-500 hover:bg-red-100 hover:text-red-500 focus:outline-none transition ease-in-out duration-150">
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

                  <div wire:loading class="sm:mx-6 lg:mx-8 py-3 px-8 text-base font-sans rounded-md bg-gray-300 shadow-inner text-gray-700">Processing data...</div>
               </div>
            </div>
            @else
            <div class="w-3/4 mx-auto text-center py-8 bg-white shadow my-8 border-t-4 border-r-4 border-gray-400 rounded-t-lg">
               <i class="las la-folder-plus text-6xl text-gray-600 py-3"></i>
               <p class="text-gray-600 text-base font-bold">No Users available</p>
               <p class="text-gray-400 font-medium">Get started by creating a new user</p>

               <p class="mt-6 mb-10"><span class="px-4 py-2 text-sm rounded-md text-white w-auto bg-indigo-600 hover:bg-indigo-700 cursor-pointer"> <i class="las la-plus text-md px-1"></i> New User </span></p>
            </div>
            @endif
         </div>
      </div>
   </div>
</div>

@push('custom-scripts')
<script src="{{ asset('js/sweet-alert.js') }}"></script>
<script>
   window.addEventListener('createdAlert', ({detail:{type, message}}) => {
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
   })
</script>
@endpush
