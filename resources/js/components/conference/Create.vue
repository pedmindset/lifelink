<template>
   <div class="w-full flex flex-col sm:justify-center items-center pt-6 sm:pt-0">
      <div v-if="errors">
         <div v-for="(v, k) in errors" :key="k" class="bg-red-500 text-white rounded font-bold mb-4 shadow-lg py-2 px-4 pr-0">
            <p v-for="error in v" :key="error" class="text-sm">
               {{ error }}
            </p>
         </div>
      </div>

      <div class="w-full sm:max-w-4xl mt-6 px-6 py-4 bg-white shadow-md overflow-hidden sm:rounded-lg">
         <form class="space-y-6">
            <div class="grid grid-cols-6 gap-4">

            </div>

            <div class="flex place-content-end space-x-3">
               <button type="button" class="inline-flex items-center px-4 py-2 text-xs font-semibold tracking-widest text-white uppercase bg-green-600 rounded-md border border-transparent ring-green-300 transition duration-150 ease-in-out hover:bg-green-700 hover:shadow-inner active:bg-green-900 focus:outline-none focus:border-green-900 focus:ring disabled:opacity-25">
                  Add Field
               </button>
               <button type="submit" class="inline-flex items-center px-4 py-2 text-xs font-semibold tracking-widest text-white uppercase bg-gray-800 rounded-md border border-transparent ring-gray-300 transition duration-150 ease-in-out hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring disabled:opacity-25">
                  Submit
               </button>
            </div>
         </form>
      </div>

   </div>
</template>
<script>
import { reactive } from "vue";
import useConference from "../../composables/conference";

export default {
   setup() {

      const form = reactive([])

      const { errors, storeConference } = useConference()

      const saveConference = async () => {
         await storeConference({...form});
      }

      return {
         form,
         errors,
         saveConference
      }
   }
}
</script>
