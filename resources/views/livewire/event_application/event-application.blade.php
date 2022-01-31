<div class="w-full" x-data="app()" x-init="initDate(); $watch('openEdit', value => updateData(value))">
   <div class="py-10"  x-on:keydown.escape="showEndDatepicker = false" x-on:click.away="showEndDatepicker = false">
      <div class="max-w-full sm:px-6 lg:px-8">
         <div class="w-full">
            @include('livewire.event_application.create')
            @include('livewire.event_application.update')
            @include('livewire.event_application.delete')

            @if (count($data) > 0)
            <div class="flex place-content-end mb-4">
               <button type="button" x-on:click="openCreate = true" class="inline-flex items-center px-4 py-2 border border-transparent shadow-sm text-sm font-medium rounded-md text-white capitalize bg-cyan-600 hover:bg-cyan-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-cyan-500">
                  new event form
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
                                    Created At
                                 </th>
                                 <th scope="col" class="relative px-6 py-3">
                                    <span class="sr-only">Action</span>
                                 </th>
                              </tr>
                           </thead>
                           <tbody class="bg-white divide-y divide-gray-200">
                              @foreach($data as $eventForm)
                              <tr>
                                 <td class="px-6 py-4 whitespace-nowrap text-sm font-bold text-gray-500">
                                    {{ $eventForm->name }}
                                 </td>
                                 <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500 truncate">
                                    {{ $eventForm->description }}
                                 </td>
                                 <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                    {{ $eventForm->created_at }}
                                 </td>
                                 <td class="px-6 py-4 whitespace-nowrap text-right space-x-2">
                                    <button wire:click.prevent="edit({{$eventForm->id}})" type="button" class="inline-flex items-center px-4 py-2 text-xs font-semibold tracking-widest text-white uppercase bg-blue-600 rounded-md border border-transparent ring-blue-300 transition duration-150 ease-in-out hover:bg-blue-700 hover:shadow-inner active:bg-blue-900 focus:outline-none focus:border-blue-900 focus:ring disabled:opacity-25">Edit </button> 
                                    <button wire:click.prevent="delete({{$eventForm->id}})" class="inline-flex items-center px-4 py-2 text-xs font-semibold tracking-widest text-white uppercase bg-red-600 rounded-md border border-transparent ring-red-300 transition duration-150 ease-in-out hover:bg-red-700 hover:shadow-inner active:bg-red-900 focus:outline-none focus:border-red-900 focus:ring disabled:opacity-25">Delete</button>
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
               <p class="text-gray-600 text-base font-bold">No Application Form Available</p>
               <p class="text-gray-400 font-medium">Get started by creating a new <span class="font-bold text-gray-700">Application Form</span></p>

               <p class="mt-6 mb-10" x-on:click="openCreate = true"><span class="px-4 py-2 text-sm rounded-md text-white w-auto bg-indigo-600 hover:bg-indigo-700 cursor-pointer"> <i class="las la-plus text-md px-1"></i> New Application Form </span></p>
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
   });
</script>
<script>
   function app() {
      return {
         openCreate: @entangle('createMode'), 
         openEdit: @entangle('updateMode'), 
         openDelete: @entangle('deleteMode'),
         openView: @entangle('viewMode'),
         fields: @entangle('schema'),

         initDate() {
            
         },

         addField(){
            this.fields.push({
               name: null,
               type: null,
               required: false,
               options: {},
            });
         },

         removeField(index) {
            this.fields.splice(lineId, index);
         }
      }
   }
</script>
@endpush