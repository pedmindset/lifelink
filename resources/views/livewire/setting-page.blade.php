<div class="min-h-full" x-data="{ menuOpen: false, profile:true, password:false, billing:false }">
   <div class="relative bg-sky-700 pb-32 overflow-hidden">
      <!-- Menu open: "bg-sky-900", Menu closed: "bg-transparent" -->
      <nav class="bg-transparent relative z-10 border-b border-teal-500 border-opacity-25 lg:bg-transparent lg:border-none">
         <div class="max-w-7xl mx-auto px-2 sm:px-4 lg:px-8">
            <div class="relative h-16 flex items-center justify-between lg:border-b lg:border-sky-800">
               <div class="px-2 flex items-center lg:px-0">
                  <div class="flex-shrink-0">
                     <a href="/"><img class="block h-8 w-auto" src="{{ asset('img/logo_white.png') }}" alt="Workflow"></a>
                  </div>
                  <div class="hidden lg:block lg:ml-6 lg:space-x-4">
                     <div class="flex">
                        <a href="/" class="py-2 px-3 text-base font-medium hover:bg-sky-800 rounded-md text-white">Home</a>
                        <a href="{{ route('dashboard') }}" class="py-2 px-3 text-base font-medium hover:bg-sky-800 rounded-md text-white">Dashboard</a>
                     </div>
                  </div>
               </div>

               <div class="flex lg:hidden">
                  <!-- Mobile menu button -->
                  <button @click="menuOpen = !menuOpen" type="button" class="p-2 rounded-md inline-flex items-center justify-center text-sky-200 hover:text-white hover:bg-sky-800 focus:outline-none focus:ring-0 focus:ring-inset focus:ring-white" aria-controls="mobile-menu" aria-expanded="false">
                     <span class="sr-only">Open main menu</span>
                     <svg class="flex-shrink-0 h-6 w-6" x-bind:class="menuOpen ? 'hidden' : 'block'" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                     </svg>
                     <svg class="flex-shrink-0 h-6 w-6" x-bind:class="menuOpen ? 'block' : 'hidden'" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                     </svg>
                  </button>
               </div>
            </div>
         </div>

         <!-- Mobile menu, show/hide based on menu state. -->
         <div class="bg-sky-900 shadow-lg lg:hidden" x-bind:class="menuOpen ? 'block' : 'hidden'" id="mobile-menu">
            <div class="pt-2 pb-3 px-2 space-y-1">
               <a href="/" class="hover:bg-sky-800 block rounded-md py-2 px-3 text-base font-medium text-white">Home</a>
               <a href="{{ route('dashboard') }}" class="hover:bg-sky-800 block rounded-md py-2 px-3 text-base font-medium text-white">Dashboard</a>
            </div>

            <div class="pt-4 pb-3 border-t border-sky-800">
               <div class="mt-3 px-2">
                  <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
                     class="block rounded-md py-2 px-3 text-base font-medium text-sky-200 hover:text-white hover:bg-sky-800">Sign out</a>

                  <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                     @csrf
                  </form>
               </div>
            </div>
         </div>
      </nav>

      <div aria-hidden="true" x-bind:class="menuOpen ? 'bottom-0' : 'inset-y-0'" class="inset-y-0 absolute inset-x-0 left-1/2 transform -translate-x-1/2 w-full overflow-hidden lg:inset-y-0">
         <div class="absolute inset-0 flex">
            <div class="h-full w-1/2" style="background-color: #0a527b"></div>
            <div class="h-full w-1/2" style="background-color: #065d8c"></div>
         </div>
         <div class="relative flex justify-center">
            <svg class="flex-shrink-0" width="1750" height="308" viewBox="0 0 1750 308" xmlns="http://www.w3.org/2000/svg">
               <path d="M284.161 308H1465.84L875.001 182.413 284.161 308z" fill="#0369a1" />
               <path d="M1465.84 308L16.816 0H1750v308h-284.16z" fill="#065d8c" />
               <path d="M1733.19 0L284.161 308H0V0h1733.19z" fill="#0a527b" />
               <path d="M875.001 182.413L1733.19 0H16.816l858.185 182.413z" fill="#0a4f76" />
            </svg>
         </div>
      </div>

      <header class="relative py-10">
         <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <h1 class="text-3xl font-bold text-white">Settings</h1>
         </div>
      </header>
   </div>

   <main class="relative -mt-32">
      <div class="max-w-screen-xl mx-auto pb-6 px-4 sm:px-6 lg:pb-16 lg:px-8">
         <div class="bg-white rounded-lg shadow overflow-hidden">
            <div class="divide-y divide-gray-200 lg:grid lg:grid-cols-12 lg:divide-y-0 lg:divide-x">
               {{-- aside --}}
               <aside class="py-6 lg:col-span-3">
                  <nav class="space-y-1">
                     <p @Click="profile = true; password = false; billing = false" x-bind:class="profile ? 'bg-teal-50 border-teal-500 text-teal-700 hover:bg-teal-50 hover:text-teal-700' : 'border-transparent text-gray-900 hover:bg-gray-50 hover:text-gray-900'" class="cursor-pointer group border-l-4 px-3 py-2 flex items-center text-sm font-medium transition-all duration-300 ease-linear" aria-current="page">
                        <svg x-bind:class="profile ? 'text-teal-500 group-hover:text-teal-500' : 'text-gray-400 group-hover:text-gray-500'" class="flex-shrink-0 -ml-1 mr-3 h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                           <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5.121 17.804A13.937 13.937 0 0112 16c2.5 0 4.847.655 6.879 1.804M15 10a3 3 0 11-6 0 3 3 0 016 0zm6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                        <span class="truncate"> Profile </span>
                     </p>

                     <p @Click="profile = false; password = true; billing = false" x-bind:class="password ? 'bg-teal-50 border-teal-500 text-teal-700 hover:bg-teal-50 hover:text-teal-700' : 'border-transparent text-gray-900 hover:bg-gray-50 hover:text-gray-900'" class="cursor-pointer group border-l-4 px-3 py-2 flex items-center text-sm font-medium transition-all duration-300 ease-linear">
                        <svg x-bind:class="password ? 'text-teal-500 group-hover:text-teal-500' : 'text-gray-400 group-hover:text-gray-500'" class="flex-shrink-0 -ml-1 mr-3 h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                           <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 7a2 2 0 012 2m4 0a6 6 0 01-7.743 5.743L11 17H9v2H7v2H4a1 1 0 01-1-1v-2.586a1 1 0 01.293-.707l5.964-5.964A6 6 0 1121 9z" />
                        </svg>
                        <span class="truncate"> Password </span>
                     </p>

                     <p @Click="profile = false; password = false; billing = true" x-bind:class="billing ? 'bg-teal-50 border-teal-500 text-teal-700 hover:bg-teal-50 hover:text-teal-700' : 'border-transparent text-gray-900 hover:bg-gray-50 hover:text-gray-900'" href="#" class="cursor-pointer group border-l-4 px-3 py-2 flex items-center text-sm font-medium transition-all duration-300 ease-linear">
                        <!-- Heroicon name: outline/credit-card -->
                        <svg x-bind:class="billing ? 'text-teal-500 group-hover:text-teal-500' : 'text-gray-400 group-hover:text-gray-500'" class="flex-shrink-0 -ml-1 mr-3 h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                           <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z" />
                        </svg>
                        <span class="truncate"> Billing </span>
                     </p>
                  </nav>
               </aside>

               {{-- main content --}}
               <div class="lg:col-span-9">
                  <div x-show="profile" style="display:none">
                     <form class="divide-y divide-gray-200 w-full" action="#" method="POST">
                        <div class="py-6 px-4 sm:p-6 lg:pb-8">
                           <div>
                              <h2 class="text-lg leading-6 font-medium text-gray-900">Profile</h2>
                              <p class="mt-1 text-sm text-gray-500">Basic information about you.</p>
                           </div>

                           <div class="mt-6 flex flex-col lg:flex-row">
                              <div class="flex-grow space-y-6">
                                 <div>
                                    <label for="address" class="block text-sm font-medium text-gray-700"> Address </label>
                                    <div class="mt-1">
                                      <textarea id="address" rows="3" wire:model.lazy="address" class="shadow-sm focus:ring-sky-500 focus:border-sky-500 mt-1 block w-full sm:text-sm border border-gray-300 rounded-md"></textarea>
                                    </div>
                                    {{-- <p class="mt-2 text-sm text-gray-500">Brief description for your profile. URLs are hyperlinked.</p> --}}
                                 </div>
                              </div>

                              <div class="mt-6 flex-grow lg:mt-0 lg:ml-6 lg:flex-grow-0 lg:flex-shrink-0">
                                 <p class="text-sm font-medium text-gray-700 sr-only" aria-hidden="true">Photo</p>
                                 <div class="mt-1 lg:hidden">
                                    <div class="flex items-center">
                                       <div class="flex-shrink-0 inline-block rounded-full overflow-hidden h-12 w-12" aria-hidden="true">
                                          <img class="rounded-full h-full w-full" src="{{ $profileImage }}" alt="">
                                       </div>
                                       <div class="ml-5 rounded-md shadow-sm">
                                          <div class="group relative border border-gray-300 rounded-md py-2 px-3 flex items-center justify-center hover:bg-gray-50 focus-within:ring-2 focus-within:ring-offset-2 focus-within:ring-sky-500">
                                             <label for="mobile-user-photo" class="relative text-sm leading-4 font-medium text-gray-700 pointer-events-none">
                                                <span>Change</span>
                                                <span class="sr-only"> user photo</span>
                                             </label>
                                             <input id="mobile-user-photo" name="user-photo" type="file" class="absolute w-full h-full opacity-0 cursor-pointer border-gray-300 rounded-md">
                                          </div>
                                       </div>
                                    </div>
                                 </div>

                                 <div class="hidden relative rounded-full overflow-hidden lg:block">
                                    @if($photoImage)
                                    <img class="relative rounded-full w-40 h-40 border-dashed border border-gray-400" src="{{ $photoImage->temporaryUrl() }}" alt="">
                                    @else
                                    <img class="relative rounded-full w-40 h-40 border-dashed border border-gray-400" src="{{ $profileImage != null || $profileImage != '' ? $profileImage : asset('img/face.png') }}" alt="">
                                    @endif
                                    <label for="user-photo" class="absolute inset-0 w-full h-full bg-black bg-opacity-75 flex items-center justify-center text-sm font-medium text-white opacity-0 hover:opacity-100 focus-within:opacity-100">
                                       <span>Change</span>
                                       <span class="sr-only"> user photo</span>
                                       <input type="file" x-ref="uploader" wire:model.lazy="photoImage" id="user-photo" accept="image/*" class="absolute inset-0 w-full h-full opacity-0 cursor-pointer border-gray-300 rounded-md">
                                    </label>

                                 </div>
                              </div>
                           </div>

                           <div class="mt-6 grid grid-cols-12 gap-6">
                              <div class="col-span-12 sm:col-span-6">
                                 <label for="first-name" class="block text-sm font-medium text-gray-700">First name</label>
                                 <input type="text" required id="first-name" wire:model.lazy="firstName" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-sky-500 focus:border-sky-500 sm:text-sm">
                              </div>

                              <div class="col-span-12 sm:col-span-6">
                                 <label for="last-name" class="block text-sm font-medium text-gray-700">Last name</label>
                                 <input type="text" required id="last-name" wire:model.lazy="lastName"  class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-sky-500 focus:border-sky-500 sm:text-sm">
                              </div>

                              <div class="col-span-12 sm:col-span-6">
                                 <label for="phone" class="block text-sm font-medium text-gray-700">Phone</label>
                                 <input type="tel" id="phone" wire:model.lazy="phone" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-sky-500 focus:border-sky-500 sm:text-sm">
                              </div>

                           </div>

                        </div>
                     </form>

                     <div class="mt-4 bg-gray-50 divide-y divide-gray-200 py-4 px-4 flex justify-end sm:px-6">
                        <div wire:loading class=" px-8 inline-flex justify-center text-sm font-medium text-gray-600">Loading ...</div>
                        <button type="button" wire:click.prevent="storeProfile()" class="ml-5 bg-sky-700 border border-transparent rounded-md shadow-sm py-2 px-4 inline-flex justify-center text-sm font-medium text-white hover:bg-sky-800 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-sky-500">Save</button>
                     </div>
                  </div>

                  <div x-show="password" style="display:none">
                     <form class="divide-y divide-gray-200 w-full" action="#" method="POST">
                        <div class="py-6 px-4 sm:p-6 lg:pb-8">
                           <div>
                              <h2 class="text-lg leading-6 font-medium text-gray-900">Password</h2>
                              <p class="mt-1 text-sm text-gray-500">Change your password.</p>
                           </div>

                           <div class="mt-6 grid grid-cols-12 gap-6">
                              <div class="col-span-12 sm:col-span-6">
                                 <label for="old-password" class="block text-sm font-medium text-gray-700">Old Password</label>
                                 <input type="password" required id="old-password" wire:model.lazy="oldPassword" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-sky-500 focus:border-sky-500 sm:text-sm">
                              </div>

                              <div class="col-span-12 sm:col-span-6">
                                 <label for="new-password" class="block text-sm font-medium text-gray-700">New Password</label>
                                 <input type="password" required id="new-password" wire:model.lazy="newPassword"  class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-sky-500 focus:border-sky-500 sm:text-sm">
                              </div>
                           </div>
                        </div>
                     </form>
                     <div class="mt-4 bg-gray-50 divide-y divide-gray-200 py-4 px-4 flex justify-end sm:px-6">
                        <button type="button" wire:click.prevent="storePassword()" class="ml-5 bg-sky-700 border border-transparent rounded-md shadow-sm py-2 px-4 inline-flex justify-center text-sm font-medium text-white hover:bg-sky-800 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-sky-500">Save</button>
                     </div>
                  </div>

                  <div x-show="billing" style="display:none">
                     <form class="divide-y divide-gray-200 w-full" action="#" method="POST">
                        <div class="py-6 px-4 sm:p-6 lg:pb-8">
                           <div>
                              <h2 class="text-lg leading-6 font-medium text-gray-900">Billing</h2>
                              <p class="mt-1 text-sm text-gray-500">Create or update Aluminia dues.</p>
                           </div>

                           <div class="mt-6 grid grid-cols-12 gap-6">
                              <div class="col-span-12">
                                 <label for="dues" class="block text-sm font-medium text-gray-700">Aluminia Dues</label>
                                 <input type="numeric" step="2" required id="dues" wire:model.lazy="aluminiaDue" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-sky-500 focus:border-sky-500 sm:text-sm">
                              </div>
                           </div>
                        </div>
                     </form>
                     <div class="mt-4 bg-gray-50 divide-y divide-gray-200 py-4 px-4 flex justify-end sm:px-6">
                        <button type="button" wire:click.prevent="saveBilling()" class="ml-5 bg-sky-700 border border-transparent rounded-md shadow-sm py-2 px-4 inline-flex justify-center text-sm font-medium text-white hover:bg-sky-800 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-sky-500">Save</button>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </main>
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
