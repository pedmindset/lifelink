@component('mail::layout')
{{-- Header --}}

@slot('header')
@component('mail::header', ['url' => config('app.url')])
{{ config('app.name') }}
@endcomponent
@endslot

# {{  $application->name }}

##### Your application was successful

<h2 class="uppercase text-gray-700 font-semibold tracking-widest">THANK YOU</h2>

{{-- Footer --}}
@slot('footer')
@component('mail::footer')
&copy; {{ date('Y') }} {{ config('app.name') }}. @lang('All rights reserved.')
@endcomponent
@endslot
@endcomponent
