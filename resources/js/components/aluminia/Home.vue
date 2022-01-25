<template>
   <div class="px-4 pb-8 overflow-auto md:px-6 w-full">
      <div class="overflow-hidden overflow-x-auto min-w-full align-middle sm:rounded-md">
         <div class="px-4 py-3 text-gray-500">
            <p class="text-lg font-medium">List of Aluminias </p>
         </div>

         <table class="min-w-full border divide-y divide-gray-200">
            <thead>
               <tr>
                  <th class="px-6 py-3 bg-gray-50">
                     <span
                        class="text-xs font-medium tracking-wider leading-4 text-left text-gray-500 uppercase">Name</span>
                  </th>
                  <th class="px-6 py-3 bg-gray-50">
                     <span
                        class="text-xs font-medium tracking-wider leading-4 text-left text-gray-500 uppercase">Email</span>
                  </th>
                  <th class="px-6 py-3 bg-gray-50">
                     <span
                        class="text-xs font-medium tracking-wider leading-4 text-left text-gray-500 uppercase">Address</span>
                  </th>
                  <th class="px-6 py-3 bg-gray-50">
                     <span
                        class="text-xs font-medium tracking-wider leading-4 text-left text-gray-500 uppercase">Phone</span>
                  </th>
                  <th class="px-6 py-3 bg-gray-50">
                  </th>
               </tr>
            </thead>

            <tbody class="bg-white divide-y divide-gray-200 divide-solid">
               <template v-for="aluminia in aluminias" :key="aluminia.id">
                  <tr class="bg-white">
                     <td class="px-6 py-4 text-sm leading-5 text-gray-900 whitespace-no-wrap">
                        {{ aluminia.first_name }}
                     </td>
                     <td class="px-6 py-4 text-sm leading-5 text-gray-900 whitespace-no-wrap">
                        {{ aluminia.email }}
                     </td>
                     <td class="px-6 py-4 text-sm leading-5 text-gray-900 whitespace-no-wrap">
                        {{ aluminia.address }}
                     </td>
                     <td class="px-6 py-4 text-sm leading-5 text-gray-900 whitespace-no-wrap">
                        {{ aluminia.phone }}
                     </td>
                     <td class="px-6 py-4 text-sm leading-5 text-gray-900 whitespace-no-wrap">
                        <!-- <router-link :to="{ name: 'aluminia.edit', params: { id: aluminia.id } }"
                           class="mr-2 inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring ring-gray-300 disabled:opacity-25 transition ease-in-out duration-150">
                              Edit
                        </router-link> -->
                        <button @click="deleteAluminia(aluminia.id)"
                           class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring ring-gray-300 disabled:opacity-25 transition ease-in-out duration-150">
                           Delete</button>
                     </td>
                  </tr>
               </template>
            </tbody>
         </table>
      </div>
   </div>
</template>

<script>
import useAluminias from "../../composables/aluminia";
import { onMounted } from "vue";
export default {
   setup() {
      const { aluminias, getAluminias, destroyAluminia } = useAluminias()

      onMounted(getAluminias)

      const deleteAluminia = async (id) => {
         if (!window.confirm('Are you sure?')) {
            return
         }

         await destroyAluminia(id);
         await getAluminias();
      }

      return {
         aluminias,
         deleteAluminia
      }
   }
}
</script>
