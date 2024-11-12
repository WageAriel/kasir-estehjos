<script setup>
import { reactive, ref } from 'vue'
import { mdiBallotOutline, mdiBasketPlus, mdiBasketCheck, mdiCurrencyUsd } from '@mdi/js'
import SectionMain from '@/Components/SectionMain.vue'
import CardBox from '@/Components/CardBox.vue'
import FormField from '@/Components/FormField.vue'
import FormControl from '@/Components/FormControl.vue'
import BaseDivider from '@/Components/BaseDivider.vue'
import BaseButton from '@/Components/BaseButton.vue'
import BaseButtons from '@/Components/BaseButtons.vue'
import LayoutAuthenticated from '@/Layouts/LayoutAuthenticated.vue'
import SectionTitleLineWithButton from '@/Components/SectionTitleLineWithButton.vue'

const selectOptions = [
  { id: 1, label: 'Makanan' },
  { id: 2, label: 'Minuman' },
  { id: 3, label: 'Sembako' }
]

// Form data
const form = reactive({
  produk: '',
  department: selectOptions[0],
  price: '',
  stock: '',
  description: ''
})

// Table data
const products = ref([])

const submit = () => {
  // Push the form data to the products array
  products.value.push({
    produk: form.produk,
    department: form.department.label,
    price: form.price,
    stock: form.stock,
    description: form.description
  })

  // Reset form fields
  form.produk = ''
  form.department = selectOptions[0]
  form.price = ''
  form.stock = ''
  form.description = ''
}

</script>

<template>
  <LayoutAuthenticated>
    <SectionMain>
      <SectionTitleLineWithButton :icon="mdiBallotOutline" title="Forms Produk" main />

      <CardBox form @submit.prevent="submit">
        <FormField label="Nama Produk">
          <FormControl v-model="form.produk" :icon="mdiBasketPlus" placeholder="Chitato" />
        </FormField>

        <FormField label="Kategori">
          <FormControl v-model="form.department" :options="selectOptions" />
        </FormField>

        <FormField label="Harga">
          <FormControl v-model="form.harga" :icon="mdiCurrencyUsd" placeholder="..." />
        </FormField>

        <FormField label="Stok">
          <FormControl v-model="form.stock" :icon="mdiBasketCheck" placeholder="..." />
        </FormField>

        <BaseDivider />

        <FormField label="Deskripsi" help="Max 255 characters">
          <FormControl v-model="form.description" type="textarea" placeholder="Chitato adalah" />
        </FormField>

        <template #footer>
          <BaseButtons>
            <BaseButton type="submit" color="info" label="Submit" />
            <BaseButton type="reset" color="info" outline label="Reset" @click="submit" />
          </BaseButtons>
        </template>
      </CardBox>

      <SectionTitleLineWithButton :icon="mdiBallotOutline" title="Table Produk" main />

      <CardBox class="mb-6" has-table>
        <table class="min-w-full">
          <thead>
            <tr>
              <th>Nama Produk</th>
              <th>Kategori</th>
              <th>Harga</th>
              <th>Stok</th>
              <th>Deskripsi</th>
            </tr>
          </thead>
          <tbody>
            <tr v-for="(product, index) in products" :key="index">
              <td>{{ product.produk }}</td>
              <td>{{ product.department }}</td>
              <td>{{ product.harga }}</td>
              <td>{{ product.stock }}</td>
              <td>{{ product.description }}</td>
            </tr>
          </tbody>
        </table>
      </CardBox>
    </SectionMain>
  </LayoutAuthenticated>
</template>
