import { ref } from 'vue'
import axios from "axios";
import { useRouter } from 'vue-router';

export default function useCompanies() {
   const conferences = ref([])
   const conference = ref([])
   const router = useRouter()
   const errors = ref('')

   const getConferences = async () => {
       let response = await axios.get('/api/conferences')
       companies.value = response.data.data;
   }

   const getConference = async (id) => {
      let response = await axios.get('/api/conferences/' + id)
      company.value = response.data.data;
   }

   const storeConference = async (data) => {
      errors.value = ''
      try {
         await axios.post('/api/conferences', data)
         await router.push({name: 'conferences.index'})
      } catch (e) {
         if (e.response.status === 422) {
            errors.value = e.response.data.errors
         }
      }
   }

   const updateConference = async (id) => {
      errors.value = ''
      try {
         await axios.put('/api/conferences/' + id, company.value)
         await router.push({name: 'conferences.index'})
      } catch (e) {
         if (e.response.status === 422) {
            errors.value = e.response.data.errors
         }
      }
   }

   const destroyConference = async (id) => {
      await axios.delete('/api/conferences/' + id)
   }


   return {
      conferences,
      conference,
      errors,
      getConferences,
      getConference,
      storeConference,
      updateConference,
      destroyConference
   }
}
