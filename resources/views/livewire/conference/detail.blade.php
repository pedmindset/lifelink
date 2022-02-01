<div class="h-full flex" x-show="openView" x-data="{ showDetailTab: @entangle('detailTab') ,showFormTab: @entangle('formTab'), showOfficialTab:  @entangle('officialTab'), 
   showAwardTab:  @entangle('awardtab'), openAddAward:  @entangle('addAwardMode') }" style="display: none">
   <div class="flex-1 relative z-0 overflow-y-auto focus:outline-none xl:order-last">
      <nav class="flex items-start pb-3" aria-label="Breadcrumb">
         <a href="#" x-on:click.prevent="openView = false" class="inline-flex items-center space-x-3 text-sm font-medium text-gray-900">
           <!-- Heroicon name: solid/chevron-left -->
           <svg class="-ml-1 h-5 w-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
             <path fill-rule="evenodd" d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z" clip-rule="evenodd" />
           </svg>
           <span>Listing</span>
         </a>
      </nav>

      <x-card>
         <div>
            <img class="h-32 w-full object-cover lg:h-48" src="https://images.unsplash.com/photo-1444628838545-ac4016a5418a?ixid=MXwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHw%3D&ixlib=rb-1.2.1&auto=format&fit=crop&w=1950&q=80" alt="image back">
         </div>

         <div class="pt-3">
            <div class="hidden sm:block">
               <div class="border-b border-gray-200">
                  <nav class="-mb-px flex" aria-label="Tabs">
                     <span wire:click.prevent="switchtab(1)" class="{{ $detailTab ? 'border-indigo-500 text-indigo-600' : 'border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300' }} cursor-pointer  w-1/4 py-4 px-1 text-center border-b-2 font-medium text-sm">Details</span>
                     <span wire:click.prevent="switchtab(2)" class="{{ $formTab ? 'border-indigo-500 text-indigo-600' : 'border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300' }} cursor-pointer w-1/4 py-4 px-1 text-center border-b-2 font-medium text-sm">Forms</span>
                     <span wire:click.prevent="switchtab(3)" class="{{ $officialTab ? 'border-indigo-500 text-indigo-600' : 'border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300' }} cursor-pointer w-1/4 py-4 px-1 text-center border-b-2 font-medium text-sm">Officials</span>
                     <span wire:click.prevent="switchtab(4)" class="{{ $awardTab ? 'border-indigo-500 text-indigo-600' : 'border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300' }} cursor-pointer w-1/4 py-4 px-1 text-center border-b-2 font-medium text-sm">Award</span>
                  </nav>
               </div>

            </div>

            <div x-show="showDetailTab">
               <div class="py-4 px-8">
                  <dl class="grid grid-cols-1 gap-x-4 gap-y-8 sm:grid-cols-2">
                
                     <div class="sm:col-span-1">
                        <dt class="text-sm font-medium text-gray-500">
                           Name / Title
                        </dt>
                        <dd class="mt-1 text-sm text-gray-900">
                           {{ $viewItem->name ?? 'N/A' }}
                        </dd>
                     </div>
                   
                     <div class="sm:col-span-1">
                        <dt class="text-sm font-medium text-gray-500">
                           Description
                        </dt>
                        <dd class="mt-1 text-sm text-gray-900">
                           {{ $viewItem->description ?? 'N/A' }}
                        </dd>
                     </div>
                  </dl>
               </div>
            </div>
            <div x-show="showOfficialTab">
               <div class="py-4 px-8">
                  <div class="w-3/4 mx-auto text-center py-8 my-2">
                     <i class="las la-folder-plus text-6xl text-gray-600 py-3"></i>
                     <p class="text-gray-600 text-base font-bold">No Official Found</p>
               
                     <p class="mt-6 mb-10"><span @click="openAddOfficial = true" class="px-4 py-2 text-sm rounded-md text-white w-auto bg-indigo-600 hover:bg-indigo-700 cursor-pointer"> <i class="las la-plus text-md px-1"></i> Add Official </span></p>
                  </div>
               </div>
            </div>

            <div x-show="showFormTab">
               <div class="py-4 px-8">
                  <div class="flex place-content-end mb-4">
                     <button type="button" @click="openCreateForm = true" class="inline-flex items-center px-4 py-2 border border-transparent shadow-sm text-sm font-medium rounded-md text-white capitalize bg-cyan-600 hover:bg-cyan-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-cyan-500">
                        new event form
                     </button>
                  </div>
               </div>
               @forelse ($viewItem->applications as $item)
                  <ul class="p-3">
                     <li wire:click="showForm()" class="bg-gray-100 rounded cursor-pointer shadow-sm mb-2 hover:shadow-lg transition duration-300 ease-linear" x-data="{ showDelete: false, showCategory: false, showEdit: false }">
                        <div class="flex p-3">
                           <div class="ml-3 mr-auto">
                              <p class="text-sm leading-5 font-medium text-gray-600">
                                 {{ $item['name'] }}
                              </p>
                           </div>
                     
                           {{-- <div class="pl-3">
                              <div class="-mx-1.5 -my-1.5">
                                 <button class="rounded-md p-1 font-bold text-gray-500 hover:bg-green-100 hover:text-green-500 focus:outline-none focus:bg-green-100 transition ease-in-out duration-150">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 13h6M3 17V7a2 2 0 012-2h6l2 2h6a2 2 0 012 2v8a2 2 0 01-2 2H5a2 2 0 01-2-2z" />
                                    </svg>
                                 </button>
                              </div>
                           </div> --}}
                        </div>
                     </li>
                  </ul>
               @empty
               <div class="px-8 pb-8 w-full overflow-hidden">
                  <button type="button" @click="openCreateForm = true" class="w-full border-2 border-gray-300 border-dashed rounded-lg p-12 text-center hover:border-gray-400 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                     <svg class="mx-auto h-12 w-12 text-gray-400" xmlns="http://www.w3.org/2000/svg" stroke="currentColor" fill="none" viewBox="0 0 48 48" aria-hidden="true">
                       <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 14v20c0 4.418 7.163 8 16 8 1.381 0 2.721-.087 4-.252M8 14c0 4.418 7.163 8 16 8s16-3.582 16-8M8 14c0-4.418 7.163-8 16-8s16 3.582 16 8m0 0v14m0-4c0 4.418-7.163 8-16 8S8 28.418 8 24m32 10v6m0 0v6m0-6h6m-6 0h-6" />
                     </svg>
                     <span class="mt-2 block text-sm font-medium text-gray-900">
                       Create a new Application Form
                     </span>
                  </button>
               </div>
               @endforelse
            </div>

            <div x-show="showAwardTab">
               <div class="py-4 px-8">
                  <div class="py-4 px-8">
                     <div class="w-3/4 mx-auto text-center py-8 my-2">
                        <span class="text-gray-600 py-3 flex justify-center items-center">
                           <svg xmlns="http://www.w3.org/2000/svg" class="h-14 w-14" viewBox="0 0 20 20" fill="currentColor">
                              <path d="M10.394 2.08a1 1 0 00-.788 0l-7 3a1 1 0 000 1.84L5.25 8.051a.999.999 0 01.356-.257l4-1.714a1 1 0 11.788 1.838L7.667 9.088l1.94.831a1 1 0 00.787 0l7-3a1 1 0 000-1.838l-7-3zM3.31 9.397L5 10.12v4.102a8.969 8.969 0 00-1.05-.174 1 1 0 01-.89-.89 11.115 11.115 0 01.25-3.762zM9.3 16.573A9.026 9.026 0 007 14.935v-3.957l1.818.78a3 3 0 002.364 0l5.508-2.361a11.026 11.026 0 01.25 3.762 1 1 0 01-.89.89 8.968 8.968 0 00-5.35 2.524 1 1 0 01-1.4 0zM6 18a1 1 0 001-1v-2.065a8.935 8.935 0 00-2-.712V17a1 1 0 001 1z" />
                           </svg>
                        </span>
                        {{-- <i class="las la-folder-plus text-6xl text-gray-600 py-3"></i> --}}
                        <p class="text-gray-600 text-base font-bold">No Award / Citation Found</p>
                  
                        <p class="mt-6 mb-10"><span @click="openAddAward = true" class="px-4 py-2 text-sm rounded-md text-white w-auto bg-indigo-600 hover:bg-indigo-700 cursor-pointer"> <i class="las la-plus text-md px-1"></i> Add Award / Citation </span></p>
                     </div>
                  </div>
               </div>
            </div>
         </div>
         
      </x-card>


   </div>
</div>