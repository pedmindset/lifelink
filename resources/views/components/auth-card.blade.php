<div class="max-w-7xl mx-auto flex flex-col sm:justify-center items-center">
   <div>
      {{ $logo }}
   </div>

   <div {{ $attributes->merge(['class' => 'w-full sm:max-w-lg mt-6 px-6 py-4 bg-white shadow-md overflow-hidden sm:rounded-lg']) }}>
      {{ $slot }}
   </div>
</div>
