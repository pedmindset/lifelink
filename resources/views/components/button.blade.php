@props([
   'type',
])
<button {{ $attributes->merge(['type' => $type ?? 'button', 'class' => 'group relative w-full flex justify-center py-2 px-4 border border-transparent focus:outline-none']) }}>
   {{ $slot }}
</button>
