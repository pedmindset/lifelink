import { ref } from 'vue'
import axios from "axios";
import { useRouter } from 'vue-router';

export default function useAluminias() {
   const aluminias = ref([])
   const aluminia = ref([])
   const router = useRouter()
   const errors = ref('')

   const getAluminias = async () => {
      let response = await axios.get('/api/aluminias')
      console.log(response);
      aluminias.value = response.data.data;
   }

   const getAluminia = async (id) => {
      let response = await axios.get('/api/aluminias/' + id)
      aluminia.value = response.data.data;
   }

   const storeAluminia = async (data) => {
      errors.value = ''
      try {
         await axios.post('/api/aluminias', data)
         await router.push({name: 'aluminia.index'})
      } catch (e) {
         if (e.response.status === 422) {
            errors.value = e.response.data.errors
         }
      }
   }

   const updateAluminia = async (id) => {
      errors.value = ''
      try {
         await axios.put('/api/aluminias/' + id, aluminia.value)
         await router.push({name: 'aluminia.index'})
      } catch (e) {
         if (e.response.status === 422) {
            errors.value = e.response.data.errors
         }
      }
   }

   const destroyAluminia = async (id) => {
      await axios.delete('/api/aluminia/' + id)
   }


   return {
      aluminias,
      aluminia,
      errors,
      getAluminias,
      getAluminia,
      storeAluminia,
      updateAluminia,
      destroyAluminia
   }
}
