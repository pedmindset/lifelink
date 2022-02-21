<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
   <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <title>{{ config('app.name', 'Laravel') }} - About</title>
      <link rel="shortcut icon" href="{{ asset('img/logo_image.png') }}" type="image/x-icon">
      <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap" rel="stylesheet">
      <link rel="stylesheet" href="{{ asset('css/app.css') }}">
      <link rel="stylesheet" href="{{ asset('css/style.css') }}">
      <script src="{{ asset('js/alpine.js') }}" defer></script>
   </head>
   <body class="antialiased w-full h-full bg-gray-50">
      @include('partials.header')
      <main>
         <div class="relative bg-gray-900">
            <div
               aria-hidden="true" class="absolute inset-0 overflow-hidden">
               <img src="{{ asset('img/LTMUN19-DAY-1-319.webp') }}" alt="" class="w-full h-full object-center object-cover">
            </div>
            <div aria-hidden="true" class="absolute inset-0 bg-gray-900 opacity-50"></div>

            <div class="relative max-w-5xl mx-auto py-28 px-6 flex flex-col items-start text-start sm:pt-64 sm:pb-32 lg:px-0">
               <h1 class="text-4xl font-extrabold tracking-tight text-white lg:text-6xl">About us</h1>
               <p class="mt-4 text-2xl text-green-400 py-6">Life-Link Friendship Schools</p>
               <p class="mt-4 text-base text-white">Life-Link Friendship Schools Ghana in line with the objectives of Life Link International continues to pioneer efforts to involve the Ghanaian child in the discussion of global issues, as well as providing information and educational materials for the NGOs, the media, and the public at large.
                  Life-Link Ghana also hosts the African Regional Office (ARO) of Life-Link International. It has been actively involved in the work of informing and educating children and the youth in Ghana. It does this by organizing open discussions and school training, symposia, seminars, workshops, projects and conferences such the MUN Conference. It currently has membership of over 3500 in Ghana..</p>
               <a href="#" class="mt-8 inline-block bg-white border border-transparent rounded-md py-3 px-8 text-base font-medium text-gray-900 hover:bg-gray-100">Shop New Arrivals</a>
            </div>
         </div>
      </main>

      @include('partials.footer')
   </body>
</html>