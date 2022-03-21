<div class="w-full h-full" x-data="{ openCreate: @entangle('createMode'), openEdit: @entangle('editMode'), openDelete: @entangle('deleteMode'), openShow: @entangle('viewMode') }">
   <div class="py-10">
      <div class="max-w-full sm:px-6 lg:px-8">
         <div class="w-full">
            @include('livewire.fees.create')
            @include('livewire.fees.update')
            @include('livewire.fees.delete')
            <!-- index start -->
            <section>
               @if (count($feeData) > 0)
               <div class="flex px-2 sm:px-0 place-content-end mb-4">
                  <button type="button" x-on:click="openCreate = true" class="inline-flex items-center px-4 py-2 border border-transparent shadow-sm text-sm font-medium rounded-md text-white capitalize bg-cyan-600 hover:bg-cyan-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-cyan-500">
                     add fee
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
                                       Event
                                    </th>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                       Standard Fee
                                    </th>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                       Internation Fee
                                    </th>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                       Early Bird Fee
                                    </th>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                       Late Fee
                                    </th>
                                    <th scope="col" class="relative px-6 py-3">
                                       <span class="sr-only">Action</span>
                                    </th>
                                 </tr>
                              </thead>
                              <tbody class="bg-white divide-y divide-gray-200">
                                 @foreach ($feeData as $fee)
                                 <tr>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-bold text-gray-500">
                                       {{ $fee->event->name }}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500 truncate break-words prose">
                                       {{ $fee->standard_amount }}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                       {{ $fee->international_amount }}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                       {{ $fee->early_bird_amount }}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                       {{ $fee->late_amount }}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-right space-x-2">
                                       {{-- <button wire:click.prevent="view({{$fee->id}})" class="inline-flex justify-center items-center font-semibold rounded-md p-1 text-gray-500 hover:bg-green-100 hover:text-green-500 focus:outline-none focus:bg-green-100 transition ease-in-out duration-150">
                                          <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                             <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                             <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                          </svg>
                                       </button> --}}
                                       <button wire:click.prevent="edit({{$fee->id}})" class="inline-flex justify-center items-center font-semibold rounded-md p-1 text-gray-500 hover:bg-green-100 hover:text-green-500 focus:outline-none focus:bg-green-100 transition ease-in-out duration-150">
                                          <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                             <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                          </svg>
                                       </button>
                                       <button wire:click.prevent="delete({{$fee->id}})" class="inline-flex justify-center items-center font-semibold p-1 rounded-md text-gray-500 hover:bg-red-100 hover:text-red-500 focus:outline-none transition ease-in-out duration-150">
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
                  <p class="text-gray-400 font-medium">Add a new <span class="font-bold text-gray-700">Fee</span></p>
            
                  <p class="mt-6 mb-10" x-on:click="openCreate = true"><span class="px-4 py-2 text-sm rounded-md text-white w-auto bg-indigo-600 hover:bg-indigo-700 cursor-pointer"> <i class="las la-plus text-md px-1"></i> Add Fee </span></p>
               </div>
               @endif
            </section>
            <!-- index end -->
         </div>
      </div>
   </div>
</div>

@push('custom-scripts')
<script src="https://unpkg.com/moment"></script>
<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
<script src="https://cdn.jsdelivr.net/npm/pikaday/pikaday.js"></script>
<script src="{{ asset('js/sweet-alert.js') }}"></script>
<script>
   window.addEventListener('alertMessage', ({detail:{type, message}}) => {
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
   });
</script>
@endpush
