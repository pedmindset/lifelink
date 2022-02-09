<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
   <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <meta name="csrf-token" content="{{ csrf_token() }}">
      <title>{{ config('app.name', 'Laravel') }}</title>

      <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">
      <link rel="stylesheet" href="{{ asset('css/app.css') }}">
      <link rel="shortcut icon" href="{{ asset('img/logo_image.png') }}" type="image/x-icon">

      <script src="{{ asset('js/app.js') }}" defer></script>
   </head>
   <body class="h-full w-full">
      <section class="min-w-screen min-h-screen bg-gray-800 flex items-center justify-center px-5 py-5">
         {{ $slot }}
      </section>
   </body>
</html>
