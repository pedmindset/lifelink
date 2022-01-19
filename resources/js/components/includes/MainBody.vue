<template>
   <div class="w-full h-full">
      <div class="flex mx-3 mt-3">
         <nav-sidebar></nav-sidebar>
         <router-view/>
      </div>
   </div>
</template>

<script>
import SideBar from './Sidebar.vue';
export default {
   data() {
      return {
         
      }
   },
   components:{
      'nav-sidebar': SideBar,
   }
}
</script>
