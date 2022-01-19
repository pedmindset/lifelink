<template>
   <div>
      <my-header></my-header>
      <my-body></my-body>
      <!-- <router-view/> -->
   </div>
</template>

<script>
import Header from './includes/Header.vue';
import Body from './includes/MainBody.vue';
export default {
   data() {
      return {
         isLoggedIn: false,
      }
   },
   components:{
      'my-header': Header,
      'my-body': Body,
   }
}
</script>
