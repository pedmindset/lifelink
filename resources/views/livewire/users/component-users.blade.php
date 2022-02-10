<div class="w-full" x-data="{ openCreate: @entangle('createMode'), openEdit: @entangle('updateMode'), openDelete: @entangle('deleteMode') }">
   <div class="py-10">
      <div class="max-w-full sm:px-6 lg:px-8">
         <div class="w-full">
            @include('livewire.users.create')
            @include('livewire.users.update')
            @include('livewire.users.delete')

            @if (count($data) > 0)
            
            <div class="mb-4 flex justify-between">
               <div class="relative" x-data="{ open:false }" x-on:click.away="open = false">
                  <div class="h-10 bg-white flex border border-gray-200 items-center">
                     <p class="px-4 transform appearance-none outline-none text-gray-800 w-full capitalize">Sort By</p>

                     <label x-on:click="open = !open" 
                        {{-- x-transition:enter="" 
                        x-transition:enter-start="opacity-0" 
                        x-transition:enter-end="opacity-100" 
                        x-transition:leave="ease-in-out duration-500" 
                        x-transition:leave-start="opacity-100" 
                        x-transition:leave-end="opacity-0"  --}}
                        x-bind:class="open ? 'flip-top' : 'closed' " for="show_more" class="cursor-pointer outline-none focus:outline-none transition-all text-gray-400 hover:text-gray-800">
                        <svg class="w-4 h-4 mx-2 fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                          <polyline points="18 15 12 9 6 15"></polyline>
                        </svg>
                     </label>
                  </div>
                  <div x-show="open" class="absolute z-1 w-40 rounded shadow bg-white overflow-hidden flex flex-col mt-1 border border-gray-200">
                     
                     <div class="cursor-pointer group w-40">
                        <span wire:click.prevent="sortedBy('aluminia')" @click.prevent="open = false" class="block p-2 border-transparent capitalize border-b-2 group-hover:border-red-600">Aluminia</span>
                     </div>
                     <div class="cursor-pointer group w-40">
                        <span wire:click.prevent="sortedBy('client')" @click.prevent="open = false" class="block p-2 border-transparent capitalize border-b-2 group-hover:border-red-600">Client</span>
                     </div>
                     <div class="cursor-pointer group w-40">
                        <span wire:click.prevent="sortedBy('staff')" @click.prevent="open = false" class="block p-2 border-transparent capitalize border-b-2 group-hover:border-red-600">Staff</span>
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
                                    Address
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
                                          <img class="h-10 w-10 rounded-full" src="{{ asset('img/face.jpg') }}" alt="">
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
                                    <div class="text-sm text-gray-500">{{ $person->profile->address ?? 'N/A' }}</div>
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
                                    <button wire:click.prevent="edit({{$person->id}})" type="button" class="inline-flex items-center px-4 py-2 text-xs font-semibold tracking-widest text-white uppercase bg-blue-600 rounded-md border border-transparent ring-blue-300 transition duration-150 ease-in-out hover:bg-blue-700 hover:shadow-inner active:bg-blue-900 focus:outline-none focus:border-blue-900 focus:ring disabled:opacity-25">Edit </button> 
                                    <button wire:click.prevent="delete({{$person->id}})" class="inline-flex items-center px-4 py-2 text-xs font-semibold tracking-widest text-white uppercase bg-red-600 rounded-md border border-transparent ring-red-300 transition duration-150 ease-in-out hover:bg-red-700 hover:shadow-inner active:bg-red-900 focus:outline-none focus:border-red-900 focus:ring disabled:opacity-25">Delete</button>
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
