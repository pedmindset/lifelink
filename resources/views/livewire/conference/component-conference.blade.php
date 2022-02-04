<div class="w-full" x-data="{ showList: @entangle('isListing'), openCreate: @entangle('createMode'), openEdit:  @entangle('updateMode'), openDelete:  @entangle('deleteMode'), openView:  @entangle('viewMode'), openCreateForm: @entangle('formCreateMode'), openAddOfficial: @entangle('addOfficialMode'), openAddAward: @entangle('addAwardMode'), showDetailTab: @entangle('detailTab'), showFormTab: @entangle('formTab'), showOfficialTab:  @entangle('officialTab'), showAwardTab:  @entangle('awardTab'), openAddAward:  @entangle('addAwardMode') }">
   <div class="py-10">
      <div class="max-w-full sm:px-6 lg:px-8">
         <div class="w-full">
            @include('livewire.conference.create')
            @include('livewire.conference.update')
            @include('livewire.conference.delete')
            @if (isset($selected_id))
            @if ($viewMode)
            @include('livewire.conference.detail')
            @livewire('event-application.create-form', ['eventId' => $viewItem->id])
            @livewire('event-application.add-official', ['eventId' => $viewItem->id])
            @livewire('event-application.add-award', ['eventId' => $viewItem->id])
            @endif
            @else
            @include('livewire.conference.index')
            @endif
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

<script>
   var searchInput = 'search_input';

   $(document).ready(function () {
      var autocomplete;
      autocomplete = new google.maps.places.Autocomplete((document.getElementById(searchInput)), {
         types: ['geocode'],
      });

      google.maps.event.addListener(autocomplete, 'place_changed', function () {
         var near_place = autocomplete.getPlace();
         document.getElementById('loc_lat').value = near_place.geometry.location.lat();
         document.getElementById('loc_long').value = near_place.geometry.location.lng();

         document.getElementById('latitude_view').innerHTML = near_place.geometry.location.lat();
         document.getElementById('longitude_view').innerHTML = near_place.geometry.location.lng();
      });
   });

   $(document).on('change', '#'+searchInput, function () {
      document.getElementById('loc_lat').value = '';
      document.getElementById('loc_long').value = '';

      document.getElementById('latitude_view').innerHTML = '';
      document.getElementById('longitude_view').innerHTML = '';
   });
</script>
@endpush