@props(['active'])

@php
$classes = ($active ?? false)
            ? 'font-thin uppercase text-blue-500 flex items-center p-4 my-2 transition-colors duration-200 justify-start bg-gradient-to-r from-white to-green-100 border-r-4 border-green-500 dark:from-gray-700 dark:to-gray-800'
            : 'font-thin uppercase text-gray-500 border-transparent hover:text-green-700 hover:border-green-300 hover:border-r-4 border-r-4 flex items-center p-4 my-2 transition-colors duration-200 justify-start'
            @endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>

{{-- : 'inline-flex items-center px-1 pt-1 border-b-2 border-transparent text-sm font-medium leading-5 text-gray-500 hover:text-gray-700 hover:border-gray-300 focus:outline-none focus:text-gray-700 focus:border-gray-300 transition duration-150 ease-in-out'; --}}
{{-- 'inline-flex items-center px-1 pt-1 border-b-2 border-indigo-400 text-sm font-medium leading-5 text-gray-900 focus:outline-none focus:border-indigo-700 transition duration-150 ease-in-out' --}}
