<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="h-full bg-gray-100">
   <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <meta name="csrf-token" content="{{ csrf_token() }}">

      <title>{{ config('app.name', 'Laravel') }}</title>
      <!-- Fonts -->
      {{-- <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap"> --}}
      <link rel="stylesheet" href="{{ asset('css/inter.css') }}">
      <link rel="shortcut icon" href="{{ asset('img/logo_image.png') }}" type="image/x-icon">
      <!-- Styles -->
      @livewireStyles
      <link rel="stylesheet" href="{{ asset('css/app.css') }}">
      <link rel="stylesheet" href="{{ asset('css/style.css') }}">
      <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
      <link href="https://unpkg.com/@yaireo/tagify/dist/tagify.css" rel="stylesheet" type="text/css"/>
      <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/pikaday/css/pikaday.css">
      @stack('custom-styles')

   </head>
   <body class="font-sans antialiased h-full">
      <div>
         @include('includes.sidebar_web')
         
         <div class="md:pl-64 flex flex-col flex-1">
            @include('includes.navbar_web')
            {{ $slot }}
         </div>
      </div>
      @livewireScripts
      <script src="{{ asset('js/app.js') }}" defer></script>
      <script src="{{ asset('js/alpine.js') }}" defer></script>
      @stack('custom-scripts')
   </body>
</html>
