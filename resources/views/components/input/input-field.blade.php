@props([
   'placeholder',
   'type',
])
<div>{{ $attributes->type }}</div>
{{-- <input
   {{ $type == "'number'" ? "step='2' min='1'" : "" }}
   {{ $attributes->merge(['type' => $type, 'placeholder'=>$placeholder, 'class' => 'mt-1 block w-full py-2 px-3 border-b border-gray-300 rounded-b-md focus:outline-none focus:border-red-600 transition duration-150 ease-in-out sm:text-sm sm:leading-5']) }}> --> --}}
