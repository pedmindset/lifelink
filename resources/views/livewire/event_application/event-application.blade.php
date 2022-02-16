<div class="w-full" x-data="{ }">
   <div class="py-10">
      <div class="max-w-full sm:px-6 lg:px-8">
         <x-card class="rounded-lg">

            <div class="flex justify-center items-center p-3">
               <h2 class="text-xl font-bold text-green-800 tracking-wide leading-6 capitalize" id="slide-over-title">
                  {{ $data->name ?? '' }}
               </h2>
            </div>

            @if(isset($data->schema))
            <div class="mt-2 pt-3 pb-10 px-8 grid grid-cols-1 gap-6 sm:grid-cols-2">
               @foreach ($schema as $item)
                  @switch($item->fieldType)
                     @case(1)
                     <div class="mt-3 col-span-1">
                        <label for="input" class="block text-sm font-bold text-gray-900">{{ $item->fieldName }}</label>
                        <div class="mt-1">
                           <input type="text" id="input" placeholder="{{ $item->placeholder }}" class="block w-full shadow-sm sm:text-sm focus:ring-indigo-500 focus:border-indigo-500 border-gray-300 rounded-md">
                        </div>
                     </div>
                     @break
                     @case(2)
                     <div class="mt-3 col-span-1">
                        <label for="comment" class="block text-sm font-bold text-gray-900">{{ $item->fieldName }}</label>
                        <div class="mt-1">
                           <textarea rows="4" name="comment" id="comment" class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-gray-300 rounded-md"></textarea>
                        </div>
                     </div>
                     @break
                     @case(3)
                     <div class="mt-3 col-span-1">
                        <label for="location" class="block text-sm font-bold text-gray-900">{{ $item->fieldName }}</label>
                        <select id="location" name="location" class="mt-1 block w-full pl-3 pr-10 py-2 text-base border-gray-300 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm rounded-md">
                           @foreach ($item->options as $op)
                           <option>{{ $op }}</option>
                           @endforeach
                        </select>
                     </div>
                     @break
                     @case(4)
                     <div class="mt-3 col-span-1">
                        <label class="text-sm font-bold text-gray-900">{{ $item->fieldName }}</label>
                        <fieldset class="mt-4">
                           <legend class="sr-only">Notification method</legend>
                           <div class="space-y-4 sm:flex sm:items-center sm:space-y-0 sm:space-x-10">
                              @foreach ($item->options as $op)
                              <div class="flex items-center">
                                 <input id="noti" name="notification-method" type="radio" checked class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300">
                                 <label for="noti" class="ml-3 block text-sm font-medium text-gray-700">
                                    {{ $op }}
                                 </label>
                              </div>
                              @endforeach
                           </div>
                        </fieldset>
                     </div>
                     @break
                     @case(5)
                     <div class="mt-3 col-span-1">
                        <fieldset class="space-y-5">
                           <legend class="text-sm font-bold text-gray-900">{{ $item->fieldName }}</legend>
                           @foreach ($item->options as $op)
                           <div class="relative flex items-start">
                              <div class="flex items-center h-5">
                                 <input id="comments" aria-describedby="comments-description" name="comments" type="checkbox" class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300 rounded">
                              </div>
                              <div class="ml-3 text-sm">
                                 <label for="comments" class="font-medium text-gray-700">{{ $op }}</label>
                                 <span id="comments-description" class="text-gray-500"><span class="sr-only">{{ $op }}</span>so you always know what's happening.</span>
                              </div>
                           </div>
                           @endforeach
                        </fieldset>
                     </div>
                     @break
                     @default
                  @endswitch
               @endforeach
               </div>      
            @endif
         </x-card>
      </div>
   </div>
</div>

@push('custom-scripts')

@endpush