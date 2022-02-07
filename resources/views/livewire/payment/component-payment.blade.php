<div class="w-full"
x-data="{ openCreate: @entangle('createMode'), openEdit: @entangle('editMode'), openDelete: @entangle('deleteMode'), openShow: @entangle('viewMode') }">
   <div class="py-10">
      <div class="max-w-full sm:px-6 lg:px-8">
         <div class="w-full">
            @include('livewire.payment.create')
            @include('livewire.payment.update')
            @include('livewire.payment.delete')
            <section>
               @forelse ($data as $pay)
                  <div class="flex place-content-end mb-4">
                     <button type="button" x-on:click="openCreate = true" class="inline-flex items-center px-4 py-2 border border-transparent shadow-sm text-sm font-medium rounded-md text-white capitalize bg-cyan-600 hover:bg-cyan-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-cyan-500">
                        add Payment
                     </button>
                  </div>
               @empty
                  <div class="w-3/4 mx-auto text-center py-8 bg-white shadow my-8 border-t-4 border-r-4 border-gray-400 rounded-t-lg">
                     <i class="las la-folder-plus text-6xl text-gray-600 py-3"></i>
                     <p class="text-gray-400 font-medium">Make a new <span class="font-bold text-gray-700">Payment</span></p>
               
                     <p class="mt-6 mb-10" x-on:click="openCreate = true"><span class="px-4 py-2 text-sm rounded-md text-white w-auto bg-indigo-600 hover:bg-indigo-700 cursor-pointer"> <i class="las la-plus text-md px-1"></i> Make Payment </span></p>
                  </div>
               @endforelse
            </section>
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
@endpush
