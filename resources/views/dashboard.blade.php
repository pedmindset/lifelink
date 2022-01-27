<x-app-layout>
   {{-- <x-slot name="header">
      <h2 class="text-xl font-semibold leading-tight text-gray-800">
         {{ __('Dashboard') }}
      </h2>
   </x-slot> --}}

   <div class="py-10">
      <div class="max-w-full sm:px-6 lg:px-8">
         <div class="flex items-start justify-between">
            @include('layouts.sidebar')
            <div class="w-full">
      
            </div>
         </div>
      </div>
   </div>
</x-app-layout>
