<div class="max-w-7xl mx-auto flex flex-col sm:justify-center items-center">
   {{-- <div>
      {{ $logo }}
   </div> --}}

   {{-- <div {{ $attributes->merge(['class' => 'w-full sm:max-w-lg mt-6 px-6 py-4 bg-white shadow-md overflow-hidden sm:rounded-lg']) }}> --}}
   <div {{ $attributes->merge(['class' => 'bg-gray-100 p-8 md:max-w-5xl w-full text-gray-500 rounded-xl shadow-xl w-full overflow-hidden']) }}>
      {{ $slot }}
   </div>
</div>
