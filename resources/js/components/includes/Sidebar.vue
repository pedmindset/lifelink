<template>
   <div class="h-auto flex flex-shrink-0 bg-white shadow rounded" v-bind:class="isMini ? 'w-16' : 'w-60'">
      
      <nav class="flex-1 space-y-2">
         <span>
            <router-link :to="{ name: 'dashboard'}" class="group flex items-center hover:bg-gray-500 px-2 py-3 mb-1 text-sm leading-5 font-medium focus:outline-none transition ease-in-out duration-70">
               <i class="las la-home text-2xl mr-3 h-6 w-6 text-gray-300 group-hover:text-gray-300 group-focus:text-gray-300 transition ease-in-out duration-70"></i>
               Dashboard
            </router-link>
         </span>
         <span>
            <router-link :to="{ name: 'conference.index'}" class="group flex items-center hover:bg-gray-500 px-2 py-3 my-1 text-sm leading-5 font-medium focus:outline-none transition ease-in-out duration-70">
               <i class="las la-home text-2xl mr-3 h-6 w-6 text-gray-300 group-hover:text-gray-300 group-focus:text-gray-300 transition ease-in-out duration-70"></i>
               Conferences
            </router-link>
         </span>
         <span>
            <router-link :to="{ name: 'conference.staff'}" class="group flex items-center hover:bg-gray-500 px-2 py-3 my-1 text-sm leading-5 font-medium focus:outline-none transition ease-in-out duration-70">
               <i class="las la-home text-2xl mr-3 h-6 w-6 text-gray-300 group-hover:text-gray-300 group-focus:text-gray-300 transition ease-in-out duration-70"></i>
               Conference Staff
            </router-link>
         </span>
         <span>
            <router-link :to="{ name: 'conference.members'}" class="group flex items-center hover:bg-gray-500 px-2 py-3 my-1 text-sm leading-5 font-medium focus:outline-none transition ease-in-out duration-70">
               <i class="las la-home text-2xl mr-3 h-6 w-6 text-gray-300 group-hover:text-gray-300 group-focus:text-gray-300 transition ease-in-out duration-70"></i>
               Conference Members
            </router-link>
         </span>
         <span>
            <router-link :to="{ name: 'aluminia.index'}" class="group flex items-center hover:bg-gray-500 px-2 py-3 my-1 text-sm leading-5 font-medium focus:outline-none transition ease-in-out duration-70">
               <i class="las la-home text-2xl mr-3 h-6 w-6 text-gray-300 group-hover:text-gray-300 group-focus:text-gray-300 transition ease-in-out duration-70"></i>
               Aluminia
            </router-link>
         </span>
         <span>
            <router-link :to="{ name: 'award.citation'}" class="group flex items-center hover:bg-gray-500 px-2 py-3 my-1 text-sm leading-5 font-medium focus:outline-none transition ease-in-out duration-70">
               <i class="las la-home text-2xl mr-3 h-6 w-6 text-gray-300 group-hover:text-gray-300 group-focus:text-gray-300 transition ease-in-out duration-70"></i>
               Award and Citation
            </router-link>
         </span>
         <span>
            <router-link :to="{ name: 'payment.index'}" class="group flex items-center hover:bg-gray-500 px-2 py-3 my-1 text-sm leading-5 font-medium focus:outline-none transition ease-in-out duration-70">
               <i class="las la-home text-2xl mr-3 h-6 w-6 text-gray-300 group-hover:text-gray-300 group-focus:text-gray-300 transition ease-in-out duration-70"></i>
               Payments
            </router-link>
         </span>
         
      </nav>
   </div>
</template>

<script>
export default {
   data() {
      return {
         isMini: false,
      }
   },
   computed: {
      
   },
   methods: {
      setMini(){
         this.isMini = !this.isMini;
         console.log(this.isMini);
      },
   },
}
</script>
