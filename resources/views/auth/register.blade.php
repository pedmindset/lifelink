<x-guest-layout>
   <x-auth-card class="mb-12">
      <x-slot name="logo">
         <a href="/">
            <x-application-logo class="w-52 h-14  fill-current" />
         </a>
      </x-slot>

      <!-- Validation Errors -->
      <x-auth-validation-errors class="mb-4" :errors="$errors" />

      <form method="POST" action="{{ route('register') }}" class="mb-6">
         @csrf
         <div>
            <x-label for="first_name" :value="__('First Name')" />
            <x-input id="first_name" class="block mt-1 w-full" type="text" name="first_name" :value="old('first_name')" required autofocus />
         </div>
         <div class="mt-2">
            <x-label for="last_name" :value="__('Last Name')" />
            <x-input id="last_name" class="block mt-1 w-full" type="text" name="last_name" :value="old('last_name')" required autofocus />
         </div>

         <div class="mt-2">
            <x-label for="email" :value="__('Email')" />
            <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required />
         </div>

         <div class="mt-2">
            <x-label for="phone" :value="__('Phone')" />
            <x-input id="phone" class="block mt-1 w-full" type="text" name="phone" :value="old('phone')" required />
         </div>
         
         <div class="mt-2 grid grid-cols-4 gap-2">
            
            <div class="col-span-2">
               <x-label for="password" :value="__('Password')" />
               <x-input id="password" class="block mt-1 w-full"
                        type="password"
                        name="password"
                        required autocomplete="new-password" />
            </div>
            <div class="col-span-2">
               <x-label for="password_confirmation" :value="__('Confirm Password')" />
               <x-input id="password_confirmation" class="block mt-1 w-full"
                        type="password"
                        name="password_confirmation" required />
            </div>
         </div>

         <div class="mt-2">
            <x-label for="address" :value="__('Address')" />
            <x-input id="address" class="block mt-1 w-full" type="text" name="address" :value="old('address')"/>
         </div>

         <div class="flex items-center justify-end mt-4">
               <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('login') }}">
                  {{ __('Already registered?') }}
               </a>

               <x-button :type="'submit'" class="ml-4">
                  {{ __('Register') }}
               </x-button>
         </div>
      </form>
   </x-auth-card>
</x-guest-layout>
