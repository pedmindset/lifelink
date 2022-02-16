<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <meta http-equiv="X-UA-Compatible" content="ie=edge">
   <!-- CSRF Token -->
   <meta name="csrf-token" content="{{ csrf_token() }}">
   <title>@yield('title')</title>
   @include('includes.styles')
</head>
<body class="font-sans antialiased h-full bg-gray-50" x-data="{ openNav: false }">
    @include('partials.header')
   <div class="w-full h-full">
      @yield('content')
   </div>
   <x-main-footer />
   <!-- Scripts -->
   @include('includes.public-scripts')

</body>
</html>
