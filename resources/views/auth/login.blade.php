<x-guest-layout>
   <x-auth-card>
      <x-slot name="logo">
         <a href="/">
            <x-application-logo class="w-52 h-16 fill-current" />
         </a>
      </x-slot>

      <!-- Session Status -->
      <x-auth-session-status class="mb-4" :status="session('status')" />

      <!-- Validation Errors -->
      <x-auth-validation-errors class="mb-4" :errors="$errors" />

      <form method="POST" action="{{ route('login') }}">
         @csrf
         <!-- Email Address -->
         <div>
            <x-label for="email" :value="__('Email')" class="sr-only" />
            <x-auth-input id="email" class="w-full rounded-t-md" 
                     type="email" 
                     name="email" 
                     :value="old('email')" 
                     required autofocus />
         </div>
         <!-- Password -->
         <div>
            <x-label for="password" :value="__('Password')" class="sr-only" />
            <x-auth-input id="password" class="w-full rounded-b-md"
                     type="password"
                     name="password"
                     required autocomplete="current-password" />
         </div>

         <!-- Remember Me -->
         <div class="flex items-center justify-between">
            <div class="flex items-center">
              <input id="remember_me" name="remember" type="checkbox" class="h-4 w-4 text-indigo-600 focus:ring-indigo-500 border-gray-300 rounded">
              <label for="remember_me" class="ml-2 block text-sm text-gray-900">
               {{ __('Remember me') }}
              </label>
            </div>
    
            <div class="text-sm my-6">
               @if (Route::has('password.request'))
               <a class="font-semibold text-indigo-600 hover:text-indigo-500" href="{{ route('password.request') }}">
                  {{ __('Forgot your password?') }}
               </a>
               @endif
            </div>
          </div>

         <div class="mt-2">
            <x-button :type="'submit'" class="focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 rounded-md text-white bg-indigo-600 hover:bg-indigo-700">
               <span class="absolute left-0 inset-y-0 flex items-center pl-3">
                  <svg class="h-5 w-5 text-indigo-500 group-hover:text-indigo-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                    <path fill-rule="evenodd" d="M5 9V7a5 5 0 0110 0v2a2 2 0 012 2v5a2 2 0 01-2 2H5a2 2 0 01-2-2v-5a2 2 0 012-2zm8-2v2H7V7a3 3 0 016 0z" clip-rule="evenodd" />
                  </svg>
               </span>
               {{ __('Log in') }}
            </x-button>
         </div>
      </form>
   </x-auth-card>
</x-guest-layout>
