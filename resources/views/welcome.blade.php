<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
   <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <title>{{ config('app.name', 'Laravel') }} - Home</title>
      <link rel="shortcut icon" href="{{ asset('img/logo_image.png') }}" type="image/x-icon">
      <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap" rel="stylesheet">
      <link rel="stylesheet" href="{{ asset('css/app.css') }}">
      <link rel="stylesheet" href="{{ asset('css/style.css') }}">
      <script src="{{ asset('js/alpine.js') }}" defer></script>
   </head>
   <body class="antialiased w-full h-full bg-gray-50">
      @include('partials.header')
      <main>
         <!-- Hero section -->
         <div class="relative">
            <div class="absolute inset-x-0 bottom-0 h-1/2 bg-gray-100"></div>
            <div class="w-full">
               <div class="relative shadow-xl sm:overflow-hidden">
                  <div class="absolute inset-0">
                     <img class="h-full w-full object-cover" src="{{ asset('img/LTMUN19-DAY-1-437.jpg') }}" alt="hero image">
                     <div class="absolute inset-0 bg-gradient-to-r from-purple-800 to-gray-300 mix-blend-multiply"></div>
                  </div>
                  <div class="relative px-4 py-16 sm:px-6 sm:py-24 lg:py-32 lg:px-8">
                     <h1 class="text-center text-4xl font-extrabold tracking-tight sm:text-5xl lg:text-6xl">
                        <span class="block text-white">Life Link Model UN</span>
                        <span class="block text-indigo-200">Event Registration</span>
                     </h1>
                     <p class="mt-6 max-w-lg mx-auto text-center text-xl text-gray-100 sm:max-w-3xl">
                        Life-Link runs annual Model United Nations Conferences for all educational level (JHS, SHS and Tertiary Level) in Partnership with the UN system in Ghana and the Ministry of Foreign Affairs
                     </p>
                     <div class="mt-10 max-w-sm mx-auto sm:max-w-none sm:flex sm:justify-center">
                        <div class="space-y-4 sm:space-y-0 sm:mx-auto">
                           <a href="{{ route('events.tertiary') }}" class="flex items-center justify-center px-4 py-3 border border-transparent text-base font-medium rounded-md hover:shadow-2xl shadow-sm text-indigo-700 bg-white hover:bg-indigo-50 sm:px-8">
                              Register Event
                           </a>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>

         <!-- Partnership -->
         <div class="bg-gray-100 mb-20">
            <div class="max-w-7xl mx-auto py-16 px-4 sm:px-6 lg:px-8">
               <p class="text-center text-sm font-semibold uppercase text-gray-500 tracking-wide">
                  in partnership with
               </p>
               <div class="mt-6 grid grid-cols-2 gap-8 md:grid-cols-4 lg:grid-cols-3">
                  <div class="col-span-1 flex justify-center md:col-span-2 lg:col-span-1">
                     <img class="" src="{{ asset('img/sponser_1.webp') }}" alt="Tuple">
                  </div>
                  <div class="col-span-1 flex justify-center md:col-span-2 lg:col-span-1">
                     <img class="" src="{{ asset('img/sponser_2.webp') }}" alt="Mirage">
                  </div>
                  <div class="col-span-1 flex justify-center md:col-span-2 lg:col-span-1">
                     <img class="" src="{{ asset('img/sponser_3.webp') }}" alt="StaticKit">
                  </div>
               </div>
            </div>
         </div>

         <!-- Testimonial section -->
         <div class="pb-16 bg-gradient-to-r  from-teal-500 to-cyan-600 lg:pb-0 lg:z-10 lg:relative">
            <div class="lg:mx-auto lg:max-w-7xl lg:px-8 lg:grid lg:grid-cols-3 lg:gap-8">
               <div class="relative lg:-my-8">
                  <div aria-hidden="true" class="absolute inset-x-0 top-0 h-1/2 bg-white lg:hidden"></div>
                  <div class="mx-auto max-w-md px-4 sm:max-w-3xl sm:px-6 lg:p-0 lg:h-full">
                     <div class="aspect-w-10 aspect-h-6 rounded-xl shadow-xl overflow-hidden sm:aspect-w-16 sm:aspect-h-7 lg:aspect-none lg:h-full">
                     <img class="object-cover lg:h-full lg:w-full" src="{{ asset('img/LTMUN19-DAY-1-387.jpg') }}" alt="">
                     </div>
                  </div>
               </div>
               <div class="mt-12 lg:m-0 lg:col-span-2 lg:pl-8">
                  <div class="mx-auto max-w-md px-4 sm:max-w-2xl sm:px-6 lg:px-0 lg:py-20 lg:max-w-none">
                     <blockquote>
                        <div>
                           <svg class="h-12 w-12 text-white opacity-25" fill="currentColor" viewBox="0 0 32 32" aria-hidden="true">
                              <path d="M9.352 4C4.456 7.456 1 13.12 1 19.36c0 5.088 3.072 8.064 6.624 8.064 3.36 0 5.856-2.688 5.856-5.856 0-3.168-2.208-5.472-5.088-5.472-.576 0-1.344.096-1.536.192.48-3.264 3.552-7.104 6.624-9.024L9.352 4zm16.512 0c-4.8 3.456-8.256 9.12-8.256 15.36 0 5.088 3.072 8.064 6.624 8.064 3.264 0 5.856-2.688 5.856-5.856 0-3.168-2.304-5.472-5.184-5.472-.576 0-1.248.096-1.44.192.48-3.264 3.456-7.104 6.528-9.024L25.864 4z" />
                           </svg>
                           <p class="mt-6 text-xl font-medium text-white">
                              To date Life-Link Ghana has organized twenty (25) Model UN Conferences for children and the youth in Ghana. Life-Link has also participated in several international Model UN Conferences including Model UN Conference at the United Nations Headquarters and the US state Department. Life-Link delegations have won 20 awards in all events.
                           </p>
                        </div>
                        <footer class="mt-6">
                           {{-- <p class="text-base font-medium text-white">Judith Black</p> --}}
                           <p class="text-base font-medium text-cyan-100">Life-Link delegations have won 20 awards in all events.</p>
                        </footer>
                     </blockquote>
                  </div>
               </div>
            </div>
         </div>

         <div class="relative bg-gray-50 py-16 sm:py-24 lg:py-32">
            <div class="relative">
               <div class="text-center mx-auto max-w-md px-4 sm:max-w-3xl sm:px-6 lg:px-8 lg:max-w-7xl">
                  <h2 class="text-base font-semibold tracking-wider text-cyan-600 uppercase">Tip</h2>
                  <p class="mt-2 text-3xl font-extrabold text-gray-900 tracking-tight sm:text-4xl">
                     About Our Conference
                  </p>
                  <p class="mt-5 mx-auto max-w-prose text-lg text-gray-500">
                     Life link Friendship schools over the past 18 years has been committed to providing a platform for young people to be groomed as future leaders .Leaders whose principles, ideals and philosophy can greatly contribute to the world we want to see. At our tertiary conference we create a great platform for students to learn, socialize and establish networks. We are indeed very happy to host you this year.
                  </p>
               </div>
            </div>
         </div>

         <!-- CTA Section -->
         <div class="relative bg-gray-900">
            <div class="relative h-56 bg-indigo-600 sm:h-72 md:absolute md:left-0 md:h-full md:w-1/2">
               <img class="w-full h-full object-cover" src="{{ asset('img/LTMUN19-DAY-1-479.jpg') }}" alt="">
               <div aria-hidden="true" class="absolute inset-0 bg-gradient-to-r from-teal-500 to-cyan-600 mix-blend-multiply"></div>
            </div>
            <div class="relative mx-auto max-w-md px-4 py-12 sm:max-w-7xl sm:px-6 sm:py-20 md:py-28 lg:px-8 lg:py-32">
               <div class="md:ml-auto md:w-1/2 md:pl-10">
                  <h2 class="text-base font-semibold uppercase tracking-wider text-gray-300">
                     Award winning support
                  </h2>
                  <p class="mt-2 text-white text-3xl font-extrabold tracking-tight sm:text-4xl">
                     We’re here to help
                  </p>
                  <p class="mt-3 text-lg text-gray-300">
                     Life-link Ghana provides volunteers and interns that play a vital role in the success of our programs. Life-link volunteers serve under various departments according to their interest and expertise. There is also room for other individuals to serve on internship on long vacations or as part of national service.                  </p>
                  <div class="mt-8">
                     <div class="inline-flex rounded-md shadow">
                        <a href="{{ route('about') }}" class="inline-flex items-center justify-center px-5 py-3 border border-transparent text-base font-medium rounded-md text-gray-900 bg-white hover:bg-gray-50">
                           Visit the help center
                           <!-- Heroicon name: solid/external-link -->
                           <svg class="-mr-1 ml-3 h-5 w-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                              <path d="M11 3a1 1 0 100 2h2.586l-6.293 6.293a1 1 0 101.414 1.414L15 6.414V9a1 1 0 102 0V4a1 1 0 00-1-1h-5z" />
                              <path d="M5 5a2 2 0 00-2 2v8a2 2 0 002 2h8a2 2 0 002-2v-3a1 1 0 10-2 0v3H5V7h3a1 1 0 000-2H5z" />
                           </svg>
                        </a>
                     </div>
                  </div>
               </div>
            </div>
         </div>

      </main>

      @include('partials.footer')
   </body>
</html>
