<div>
   <div class="pb-5 space-y-3 flex-1 flex-col flex">
      @foreach ($schema as $s)

         @isset($s->fieldType)
            @switch($s->fieldType)
               @case(1)
                  <div class="mt-3">
                     <label for="{{ $s->model }}" class="block text-sm font-bold text-gray-900">{{ $s->fieldName }}</label>
                     <div class="mt-1">
                        <input wire:change.prevent="getFieldValue($event.target.value,'{{ $s->fieldName }}')" {{ $s->rules ? 'required' : '' }} type ="text" id="{{ $s->model }}" placeholder="{{ $s->placeholder }}" class="block w-full shadow-sm sm:text-sm focus:ring-indigo-500 focus:border-indigo-500 border-gray-300 rounded-md">
                     </div>
                  </div>
               @break
               @case(2)
                  <div class="mt-3">
                     <label for="{{ $s->model }}" class="block text-sm font-bold text-gray-900">{{ $s->fieldName }}</label>
                     <div class="mt-1">
                        <textarea wire:change.prevent="getFieldValue($event.target.value,'{{ $s->fieldName }}')" rows="4" {{ $s->rules ? 'required' : '' }} id="{{ $s->model }}" class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-gray-300 rounded-md"></textarea>
                     </div>
                  </div>
                  @break
                  @case(3)
                  <div class="mt-3">
                     <label for="{{ $s->model }}" class="block text-sm font-bold text-gray-900">{{ $s->fieldName }}</label>
                     <select wire:change.prevent="getFieldValue($event.target.value,'{{ $s->fieldName }}')" id="{{ $s->model }}" {{ $s->rules ? 'required' : '' }} class="mt-1 block w-full pl-3 pr-10 py-2 text-base border-gray-300 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm rounded-md">
                        @foreach ($s->options as $op)
                        <option value="{{ $op }}">{{ $op }}</option>
                        @endforeach
                     </select>
                  </div>
               @break
               @case(4)
                  <div class="mt-3">
                     <label class="text-sm font-bold text-gray-900">{{ $s->fieldName }}</label>
                     <fieldset class="mt-4">
                        <legend class="sr-only">{{ $s->fieldName }}</legend>
                        <div class="space-y-4 sm:flex sm:items-center sm:space-y-0 sm:space-x-10">
                           @foreach ($s->options as $op)
                           <div class="flex items-center">
                              <input id="{{ $op[$loop->index] }}" wire:change.prevent="getFieldValue($event.target.value,'{{ $s->fieldName }}')" value="{{ $op }}" type="radio" class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300">
                              <label for="{{ $op[$loop->index] }}" class="ml-3 block text-sm font-medium text-gray-700">
                                 {{ $op }}
                              </label>
                           </div>
                           @endforeach
                        </div>
                     </fieldset>
                  </div>
               @break
               @case(5)
                  <div class="mt-3">
                     <fieldset class="space-y-5">
                        <legend class="text-sm font-bold text-gray-900">{{ $s->fieldName }}</legend>
                        @foreach ($s->options as $op)
                        <div class="relative flex items-start">
                           <div class="flex items-center h-5">
                              <input id="{{ $op[$loop->index] }}" wire:change.prevent="getFieldValue($event.target.value,'{{ $s->fieldName }}')" value="{{ $op }}" {{ $s->rules ? 'required' : '' }} aria-describedby="comments-description" name="comments" type="checkbox" class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300 rounded">
                           </div>
                           <div class="ml-3 text-sm">
                              <label for="{{ $op[$loop->index] }}" class="font-medium text-gray-700">{{ $op }}</label>
                              <span id="comments-description" class="text-gray-500"><span class="sr-only">{{ $op }}</span>so you always know what's happening.</span>
                           </div>
                        </div>
                        @endforeach
                     </fieldset>
                  </div>
               @break
               @default
               @break   
            @endswitch
         @endisset
      @endforeach
   </div>
</div>

{{-- @isset($s['fieldType'])
            @switch($s['fieldType'])
               @case(1)
                  <div class="mt-3">
                     <label for="{{ $s['model'] }}" class="block text-sm font-bold text-gray-900">{{ $s['fieldName'] }}</label>
                     <div class="mt-1">
                        <input wire:change.prevent="getFieldValue($event.target.value,'{{ $s['fieldName'] }}')" {{ $s['rules'] ? 'required' : '' }} type ="text" id="{{ $s['model'] }}" placeholder="{{ $s['placeholder'] }}" class="block w-full shadow-sm sm:text-sm focus:ring-indigo-500 focus:border-indigo-500 border-gray-300 rounded-md">
                     </div>
                  </div>
               @break
               @case(2)
                  <div class="mt-3">
                     <label for="{{ $s['model'] }}" class="block text-sm font-bold text-gray-900">{{ $s['fieldName'] }}</label>
                     <div class="mt-1">
                        <textarea wire:change.prevent="getFieldValue($event.target.value,'{{ $s['fieldName'] }}')" rows="4" {{ $s['rules'] ? 'required' : '' }} id="{{ $s['model'] }}" class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-gray-300 rounded-md"></textarea>
                     </div>
                  </div>
                  @break
                  @case(3)
                  <div class="mt-3">
                     <label for="{{ $s['model'] }}" class="block text-sm font-bold text-gray-900">{{ $s['fieldName'] }}</label>
                     <select wire:change.prevent="getFieldValue($event.target.value,'{{ $s['fieldName'] }}')" id="{{ $s['model'] }}" {{ $s['rules'] ? 'required' : '' }} class="mt-1 block w-full pl-3 pr-10 py-2 text-base border-gray-300 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm rounded-md">
                        @foreach ($s['options'] as $op)
                        <option value="{{ $op }}">{{ $op }}</option>
                        @endforeach
                     </select>
                  </div>
               @break
               @case(4)
                  <div class="mt-3">
                     <label class="text-sm font-bold text-gray-900">{{ $s['fieldName'] }}</label>
                     <fieldset class="mt-4">
                        <legend class="sr-only">{{ $s['fieldName'] }}</legend>
                        <div class="space-y-4 sm:flex sm:items-center sm:space-y-0 sm:space-x-10">
                           @foreach ($s['options'] as $op)
                           <div class="flex items-center">
                              <input id="{{ $op[$loop->index] }}" wire:change.prevent="getFieldValue($event.target.value,'{{ $s['fieldName'] }}')" value="{{ $op }}" type="radio" class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300">
                              <label for="{{ $op[$loop->index] }}" class="ml-3 block text-sm font-medium text-gray-700">
                                 {{ $op }}
                              </label>
                           </div>
                           @endforeach
                        </div>
                     </fieldset>
                  </div>
               @break
               @case(5)
                  <div class="mt-3">
                     <fieldset class="space-y-5">
                        <legend class="text-sm font-bold text-gray-900">{{ $s['fieldName'] }}</legend>
                        @foreach ($s['options'] as $op)
                        <div class="relative flex items-start">
                           <div class="flex items-center h-5">
                              <input id="{{ $op[$loop->index] }}" wire:change.prevent="getFieldValue($event.target.value,'{{ $s['fieldName'] }}')" value="{{ $op }}" {{ $s['rules'] ? 'required' : '' }} aria-describedby="comments-description" name="comments" type="checkbox" class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300 rounded">
                           </div>
                           <div class="ml-3 text-sm">
                              <label for="{{ $op[$loop->index] }}" class="font-medium text-gray-700">{{ $op }}</label>
                              <span id="comments-description" class="text-gray-500"><span class="sr-only">{{ $op }}</span>so you always know what's happening.</span>
                           </div>
                        </div>
                        @endforeach
                     </fieldset>
                  </div>
               @break
               @default
               @break   
            @endswitch
         @endisset --}}
