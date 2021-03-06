<div class="w-full" x-data="{ showList: @entangle('isListing'), openCreate: @entangle('createMode'), openEdit:  @entangle('updateMode'), openDelete:  @entangle('deleteMode'), openCreateForm: @entangle('formCreateMode'), openAddOfficial: @entangle('addOfficialMode'),
 openAddAward: @entangle('addAwardMode'), showDetailTab: @entangle('detailTab'), showFormTab: @entangle('formTab'), 
 showOfficialTab:  @entangle('officialTab'), showAwardTab:  @entangle('awardTab')}">
   <div class="py-10">
      <div class="max-w-full sm:px-6 lg:px-8">
         @if(Session::has('success'))
            <div class="w-full p-3 bg-green-200 mb-3 text-sm font-sans font-medium text-green-700 shadow-inner rounded-sm">
               {{Session::get('success')}}
            </div>
         @endif
         @if(Session::has('fail'))
            <div class="w-full p-3 bg-red-200 mb-3 text-sm font-sans font-medium text-red-700 shadow-inner rounded-sm">
               {{Session::get('fail')}}
            </div>
         @endif
         <div class="w-full">
            @include('livewire.conference.create')
            @include('livewire.conference.update')
            @include('livewire.conference.delete')
            {{-- @if (isset($selected_id) && $viewMode)
               @if ($viewMode)
               @include('livewire.conference.detail')
               @endif
            @else --}}
            @include('livewire.conference.index')
            {{-- @endif --}}
         </div>
      </div>
   </div>
</div>

@push('custom-scripts')
<script src="https://unpkg.com/moment"></script>
<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
<script src="https://cdn.jsdelivr.net/npm/pikaday/pikaday.js"></script>
<script src="https://maps.googleapis.com/maps/api/js?key={{ env('GOOGLE_MAPS_API_KEY') }}&libraries=places&callback=initialize" async defer></script>
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
   google.maps.event.addDomListener(window, 'load', initialize);

   function initialize() {
      var input = document.getElementById('venue');
      var autocomplete = new google.maps.places.Autocomplete(input);
      var place = autocomplete.getPlace();
      var longitude = document.getElementById('longitude');
      var latitude = document.getElementById('latitude');

      autocomplete.addListener('place_changed', function () {
         var place = autocomplete.getPlace();
         //   input.value = place.
         latitude.value = place.geometry['location'].lat()
         longitude.value = place.geometry['location'].lng()
      });
   }
</script>

{{-- <script>
   function initialize() {

      $('form').on('keyup keypress', function(e) {
         var keyCode = e.keyCode || e.which;
         if (keyCode === 13) {
            e.preventDefault();
            return false;
         }
      });
      const locationInputs = document.getElementsByClassName("map-input");

      const autocompletes = [];
      const geocoder = new google.maps.Geocoder;
      for (let i = 0; i < locationInputs.length; i++) {

         const input = locationInputs[i];
         const fieldKey = input.id.replace("-input", "");
         const isEdit = document.getElementById(fieldKey + "-latitude").value != '' && document.getElementById(fieldKey + "-longitude").value != '';

         const latitude = parseFloat(document.getElementById(fieldKey + "-latitude").value) || -33.8688;
         const longitude = parseFloat(document.getElementById(fieldKey + "-longitude").value) || 151.2195;

         const map = new google.maps.Map(document.getElementById(fieldKey + '-map'), {
            center: {lat: latitude, lng: longitude},
            zoom: 13
         });
         const marker = new google.maps.Marker({
            map: map,
            position: {lat: latitude, lng: longitude},
         });

         marker.setVisible(isEdit);

         const autocomplete = new google.maps.places.Autocomplete(input);
         autocomplete.key = fieldKey;
         autocompletes.push({input: input, map: map, marker: marker, autocomplete: autocomplete});
      }

      for (let i = 0; i < autocompletes.length; i++) {
         const input = autocompletes[i].input;
         const autocomplete = autocompletes[i].autocomplete;
         const map = autocompletes[i].map;
         const marker = autocompletes[i].marker;

         google.maps.event.addListener(autocomplete, 'place_changed', function () {
            marker.setVisible(false);
            const place = autocomplete.getPlace();

            geocoder.geocode({'placeId': place.place_id}, function (results, status) {
                  if (status === google.maps.GeocoderStatus.OK) {
                     const lat = results[0].geometry.location.lat();
                     const lng = results[0].geometry.location.lng();
                     setLocationCoordinates(autocomplete.key, lat, lng);
                  }
            });

            if (!place.geometry) {
                  window.alert("No details available for input: '" + place.name + "'");
                  input.value = "";
                  return;
            }

            if (place.geometry.viewport) {
                  map.fitBounds(place.geometry.viewport);
            } else {
                  map.setCenter(place.geometry.location);
                  map.setZoom(17);
            }
            marker.setPosition(place.geometry.location);
            marker.setVisible(true);

         });
      }
   }

   function setLocationCoordinates(key, lat, lng) {
      const latitudeField = document.getElementById(key + "-" + "latitude");
      const longitudeField = document.getElementById(key + "-" + "longitude");
      latitudeField.value = lat;
      longitudeField.value = lng;
   }
</script> --}}
@endpush