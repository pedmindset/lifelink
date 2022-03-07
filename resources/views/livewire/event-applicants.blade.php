<div class="w-full h-full" x-data="{ viewItem: false }">
   {{-- index table --}}
   <div class="max-w-5xl mx-auto p-3">
      <div class="bg-white shadow overflow-hidden sm:rounded-md my-8">
         <ul role="list" class="divide-y divide-gray-200">

            @forelse ($data as $index => $person)
            <li x-data="{ open: false }">
               <p class="block hover:bg-gray-50">
                  <div class="flex items-center px-4 py-4 sm:px-6">
                     <div class="min-w-0 flex-1 flex items-center">
                        <div class="flex-shrink-0">
                           <img class="h-12 w-12 rounded-full" src="{{ $person->thumb_image_url != '' ? $person->thumb_image_url : asset('img/face.jpg') }}" alt="">
                        </div>
                        <div class="min-w-0 flex-1 px-4 md:grid md:grid-cols-2 md:gap-4">
                           <div>
                              <p class="text-sm font-medium text-indigo-600 truncate">{{ $person->name }}</p>
                              <p class="mt-2 flex items-center text-sm text-gray-500">
                                 <!-- Heroicon name: solid/mail -->
                                 <svg class="flex-shrink-0 mr-1.5 h-5 w-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                    <path d="M2.003 5.884L10 9.882l7.997-3.998A2 2 0 0016 4H4a2 2 0 00-1.997 1.884z" />
                                    <path d="M18 8.118l-8 4-8-4V14a2 2 0 002 2h12a2 2 0 002-2V8.118z" />
                                 </svg>
                                 <span class="truncate">{{ $person->email }}</span>
                              </p>
                           </div>
                           <div class="hidden md:block">
                              <div>
                                 <p class="text-sm text-gray-900 font-semibold">
                                    Applied on
                                 <time datetime="2020-01-07">{{ date("F jS, Y", strtotime($person->pivot->created_at)) }}</time>
                                 </p>
                                 {{-- <p class="mt-2 flex items-center text-sm text-gray-500">
                                 <!-- Heroicon name: solid/check-circle -->
                                 <svg class="flex-shrink-0 mr-1.5 h-5 w-5 text-green-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                                 </svg>
                                    Completed phone screening
                                 </p> --}}
                              </div>
                           </div>
                        </div>
                     </div>
                     <div>
                        <span class="cursor-pointer" x-on:click="open = !open">
                           <svg class="h-5 w-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                              <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd" />
                           </svg>
                        </span>
                     </div>
                  </div>
               </p>
               <div class="flex flex-col" x-show="open" style="display: none">
                  <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                     <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                        <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                           <table class="min-w-full divide-y divide-gray-200">
                              <thead class="bg-gray-50">
                                 <tr>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Title</th>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Answer</th>
                                 </tr>
                              </thead>
                              <tbody>
                                 @foreach (json_decode($person->pivot->form_data) as $key => $value)
                                 <tr class="bg-white">
                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">{{ $key }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                       <span class="font-semibold">{{ $value }}</span></td>
                                 </tr>
                                 @endforeach
                              </tbody>
                           </table>
                        </div>
                     </div>
                  </div>
               </div>
                   
            </li>
            @empty
               <li class="flex justify-center items-center font-sans leading-7 tracking-wider font-medium text-lg text-gray-600 py-12">
                  <p>Applicant list is empty</p>
               </li>
            @endforelse
         </ul>
      </div>
   </div>
</div>
 
