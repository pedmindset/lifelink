<header  x-data="{ atTop: true }" class="bg-white" x-on:scroll.window="atTop = (window.pageYOffset >= 40) ? false : true" x-bind:class="{ 'fixed top-0 bg-opacity-90 z-15 w-full' : !atTop }">
   <div class="relative">
      <div class="flex justify-center items-center max-w-7xl mx-auto px-4 py-4 sm:px-6 md:justify-start md:space-x-10 lg:px-8">
         <div class="flex justify-center lg:w-0 lg:flex-1">
            <div href="#">
               <span class="sr-only">Lifelink</span>
               <img class="h-8 w-auto sm:h-10" src="{{ asset('img/logo_black.png') }}" alt="">
            </div>
         </div>
      </div>
   </div>
</header>
         