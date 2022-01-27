<div class="w-full">
   <div class="py-10">
      <div class="max-w-full sm:px-6 lg:px-8">
         <div class="w-full">
            @if (count($errors) > 0)
            <div class="alert alert-danger">
               <a href="#" class="close" data-dismiss="alert">&times;</a>
               <strong>Sorry!</strong> invalid input.<br><br>
               <ul style="list-style-type:none;">
                  @foreach ($errors->all() as $error)
                  <li>{{ $error }}</li>
                  @endforeach
               </ul>
            </div>
            @endif
      
            @if($updateMode)
               @include('livewire.users.update')
            @else
               @include('livewire.users.create')
            @endif

            @if (count($data) > 0)
            <div class="flex place-content-end mb-4">
               <div class="px-4 py-2 text-white bg-indigo-600 hover:bg-indigo-700 cursor-pointer rounded-tr-md">
                  <button type="button" class="text-sm font-medium">New User</button>
               </div>
            </div>

            <table class="min-w-full border divide-y divide-gray-200">
               <thead>
                  <tr>
                     <th class="px-6 py-3 bg-gray-50">
                        <span class="text-xs font-medium tracking-wider leading-4 text-left text-gray-500 uppercase">Index</span>
                     </th>
                     <th class="px-6 py-3 bg-gray-50">
                        <span class="text-xs font-medium tracking-wider leading-4 text-left text-gray-500 uppercase">Name</span>
                     </th>
                     <th class="px-6 py-3 bg-gray-50">
                        <span class="text-xs font-medium tracking-wider leading-4 text-left text-gray-500 uppercase">Email</span>
                     </th>
                     <th class="px-6 py-3 bg-gray-50">
                        <span
                           class="text-xs font-medium tracking-wider leading-4 text-left text-gray-500 uppercase">Phone</span>
                     </th>
                     <th class="px-6 py-3 bg-gray-50">
                     </th>
                  </tr>
               </thead>

               <tbody class="bg-white divide-y divide-gray-200 divide-solid w-full">
                  @foreach($data as $person)
                  <tr class="bg-white w-full">
                     <td class="px-6 py-4 text-sm leading-5 text-gray-900 whitespace-no-wrap">
                        <span class="items-center flex justify-center">{{ $loop->index + 1 }} </span>
                     </td>
                     <td class="px-6 py-4 text-sm leading-5 text-gray-900 whitespace-no-wrap">
                        <span class="items-center flex justify-center">{{ $person->name }}</span>
                     </td>
                     <td class="px-6 py-4 text-sm leading-5 text-gray-900 whitespace-no-wrap">
                        <span class="items-center flex justify-center">{{ $person->email }}</span>
                     </td>
                     <td class="px-6 py-4 text-sm leading-5 text-gray-900 whitespace-no-wrap">
                        <span class="items-center flex justify-center">{{ $person->profile->phone }}</span>
                     </td>
                     <td class="space-x-2">
                        <button wire:click="edit({{$person->id}})" type="button" class="inline-flex items-center px-4 py-2 text-xs font-semibold tracking-widest text-white uppercase bg-blue-600 rounded-md border border-transparent ring-blue-300 transition duration-150 ease-in-out hover:bg-blue-700 hover:shadow-inner active:bg-blue-900 focus:outline-none focus:border-blue-900 focus:ring disabled:opacity-25">
                           Edit 
                        </button> 
                        <button wire:click="destroy({{$person->id}})" class="inline-flex items-center px-4 py-2 text-xs font-semibold tracking-widest text-white uppercase bg-red-600 rounded-md border border-transparent ring-red-300 transition duration-150 ease-in-out hover:bg-red-700 hover:shadow-inner active:bg-red-900 focus:outline-none focus:border-red-900 focus:ring disabled:opacity-25">Delete</button>
                     </td>
                  </tr>
                  @endforeach
               </tbody>
            </table>
            @else
            <div class="w-3/4 mx-auto text-center py-8 bg-white shadow my-8 border-t-4 border-r-4 border-gray-400 rounded-t-lg">
               <i class="las la-folder-plus text-6xl text-gray-600 py-3"></i>
               <p class="text-gray-600 text-base font-bold">No Users available</p>
               <p class="text-gray-400 font-medium">Get started by creating a new user</p>
   
               <p class="mt-6 mb-10"><span class="px-4 py-2 text-sm rounded-md text-white w-auto bg-indigo-600 hover:bg-indigo-700 cursor-pointer"> <i class="las la-plus text-md px-1"></i> New User </span></p>
            </div>
            @endif
         </div>
      </div>
   </div>
</div>
