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
   @if (request()->routeIs('mobile.event.register') || request()->routeIs('mobile.event.form.register'))
   @include('partials.mobile-header')
   @else
   @include('partials.header')
   @endif
   <div class="w-full h-full">
      @yield('content')
   </div>
   <x-main-footer />
   <!-- Scripts -->
   @include('includes.public-scripts')
   <script src="{{ asset('js/app.js') }}" defer></script>
   <div
     x-data="{ loading: false }"
     x-show="loading"
     @loading.window="loading = $event.detail.loading"
     >
     <style>
         .loader {
             border-top-color: #3498db;
             -webkit-animation: spinner 1.5s linear infinite;
             animation: spinner 1.5s linear infinite;
         }

         @-webkit-keyframes spinner {
             0% {
                 -webkit-transform: rotate(0deg);
             }
             100% {
                 -webkit-transform: rotate(360deg);
             }
         }

         @keyframes spinner {
             0% {
                 transform: rotate(0deg);
             }
             100% {
                 transform: rotate(360deg);
             }
         }
     </style>
     <div
         class="fixed top-0 left-0 right-0 bottom-0 w-full h-screen z-50 overflow-hidden bg-gray-700 opacity-75 flex flex-col items-center justify-center">
         <div class="loader ease-linear rounded-full border-4 border-t-4 border-gray-200 h-12 w-12 mb-4"></div>
         <h2 class="text-center text-white dark:text-fuchsia-600 text-xl font-semibold">Loading....</h2>
     </div>
   </div>
   <script>
         document.addEventListener('DOMContentLoaded', () => {
             this.livewire.hook('message.sent', () => {
                 window.dispatchEvent(
                     new CustomEvent('loading', { detail: { loading: true }})
                 );
             } )
             this.livewire.hook('message.processed', (message, component) => {
                 window.dispatchEvent(
                     new CustomEvent('loading', { detail: { loading: false }})
                 );
             })
         });
   </script>
</body>
</html>
