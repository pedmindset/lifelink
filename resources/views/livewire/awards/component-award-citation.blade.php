<div class="w-full" x-data="{ openCreate: @entangle('createMode'), openEdit: @entangle('updateMode'), openDelete: @entangle('deleteMode'), openTag: @entangle('tagMode'), openList: @entangle('listingMode') }">
   <div class="py-10">
      <div class="max-w-full sm:px-6 lg:px-8">
         <div class="w-full">
            @include('livewire.awards.create')
            @include('livewire.awards.update')
            @include('livewire.awards.delete')
            @include('livewire.awards.tag-award')
            @include('livewire.awards.show-list')

            @if (count($data) > 0)
            <div class="flex px-2 sm:px-0 place-content-end mb-4">
               <button type="button" x-on:click.defer="openCreate = true" class="inline-flex items-center px-4 py-2 border border-transparent shadow-sm text-sm font-medium rounded-md text-white capitalize bg-cyan-600 hover:bg-cyan-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-cyan-500">
                  new award / citation
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
                                 <th scope="col" class="hidden sm:block px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Event
                                 </th>
                                 <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Date
                                 </th>
                                 <th scope="col" class="relative px-6 py-3">
                                    <span class="sr-only">Action</span>
                                 </th>
                              </tr>
                           </thead>
                           <tbody class="bg-white divide-y divide-gray-200">
                              @foreach($data as $award)
                              <tr>
                                 <td class="px-6 py-4 whitespace-nowrap text-sm font-bold text-gray-500">
                                    {{ $award->name }}
                                 </td>
                                 <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500 line-clamp-3 truncate">
                                    {{ $award->description }}
                                 </td>
                                 <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                    {{ $award->event->name }}
                                 </td>
                                 <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                    <time>{{ date("F jS, Y", strtotime($award->created_at)) }}</time>
                                 </td>
                                 <td class="px-6 py-4 whitespace-nowrap text-right space-x-2">
                                    <button type="button" wire:click.prevent="tagAwardCitation({{$award->id}})" class="inline-flex justify-center items-center font-semibold rounded-md p-1 text-gray-500 hover:bg-green-100 hover:text-green-500 focus:outline-none focus:bg-green-100 transition ease-in-out duration-150">
                                       <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                          <path stroke-linecap="round" stroke-linejoin="round" d="M5 5a2 2 0 012-2h10a2 2 0 012 2v16l-7-3.5L5 21V5z" />
                                       </svg>
                                    </button>
                                    <button wire:click.prevent="edit({{$award->id}})" class="inline-flex justify-center items-center font-semibold rounded-md p-1 text-gray-500 hover:bg-green-100 hover:text-green-500 focus:outline-none focus:bg-green-100 transition ease-in-out duration-150">
                                       <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                       </svg>
                                    </button>
                                    <button wire:click.prevent="delete({{$award->id}})" class="inline-flex justify-center items-center font-semibold p-1 rounded-md text-gray-500 hover:bg-red-100 hover:text-red-500 focus:outline-none transition ease-in-out duration-150">
                                       <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                       </svg>
                                    </button>
                                    <button wire:click.prevent="showListing({{$award->id}})" class="inline-flex justify-center items-center font-semibold p-1 rounded-md text-gray-500 hover:bg-red-100 hover:text-red-500 focus:outline-none transition ease-in-out duration-150">
                                       <span class="cursor-pointer">
                                          <svg class="h-6 w-6 text-gray-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                             <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd" />
                                          </svg>
                                       </span>
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
               <p class="text-gray-600 text-base font-bold">No Award / Citation Available</p>
               <p class="text-gray-400 font-medium">Get started by creating a new <span class="font-bold text-gray-700">Award / Citation</span></p>

               <p class="mt-6 mb-10" x-on:click="openCreate = true"><span class="px-4 py-2 text-sm rounded-md text-white w-auto bg-indigo-600 hover:bg-indigo-700 cursor-pointer"> <i class="las la-plus text-md px-1"></i> New Award / Citation </span></p>
            </div>
            @endif
         </div>

      </div>
   </div>
</div>

@push('custom-scripts')
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
   })

</script>
@endpush