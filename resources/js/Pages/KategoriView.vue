<script setup>
import { reactive } from 'vue'
import { mdiBallotOutline,mdiFood } from '@mdi/js'
import SectionMain from '@/components/SectionMain.vue'
import CardBox from '@/components/CardBox.vue'
import FormField from '@/components/FormField.vue'
import FormControl from '@/components/FormControl.vue'
import BaseButton from '@/components/BaseButton.vue'
import BaseButtons from '@/components/BaseButtons.vue'
import LayoutAuthenticated from '@/layouts/LayoutAuthenticated.vue'
import SectionTitleLineWithButton from '@/components/SectionTitleLineWithButton.vue'
import TableSampleClients from '@/components/TableSampleClients.vue'

const selectOptions = [
  { id: 1, label: 'Makanan' },
  { id: 2, label: 'Minuman' },
  { id: 3, label: 'Sembako' }
]

const form = reactive({
  produk: 'Chitato',
  phone: '',
  department: selectOptions[0],
  question: ''
})

const submit = () => {
  // Handle form submission
}

</script>

<template>
  <LayoutAuthenticated>
    <SectionMain>
      <SectionTitleLineWithButton :icon="mdiBallotOutline" title="Forms Kategori" main/>

      <CardBox form @submit.prevent="submit">
        <FormField label="Nama Kategori" >
          <FormControl v-model="form.name" :icon="mdiFood  " placeholder="Chitato"/>
        </FormField>

        <template #footer>
          <BaseButtons>
            <BaseButton type="submit" color="info" label="Submit" />
            <BaseButton type="reset" color="info" outline label="Reset" />
          </BaseButtons>
        </template>
      </CardBox>

      <SectionTitleLineWithButton :icon="mdiBallotOutline" title="Table  Produk" main/>


          <CardBox class="mb-6" has-table>
        <TableSampleClients checkable />
      </CardBox>
    </SectionMain>
  </LayoutAuthenticated>
</template>
