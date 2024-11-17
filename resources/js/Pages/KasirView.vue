<script setup>
import { reactive, ref, computed } from 'vue'
import { mdiMagnify } from '@mdi/js'
import SectionTitle from '@/Components/SectionTitle.vue'
import SectionMain from '@/Components/SectionMain.vue'
import LayoutAuthenticated from '@/Layouts/LayoutAuthenticated.vue'
import CardBox from '@/Components/CardBox.vue'
import FormField from '@/Components/FormField.vue'
import BaseButton from '@/Components/BaseButton.vue'
import ModalTransaksi from '@/Components/Kasir/ModalTransaksi.vue'
import TableKasir from '@/Components/Kasir/TableKasir.vue'
import FormSearch from '@/Components/Kasir/FormSearch.vue'

// Reactive form object to manage form fields
const form = reactive({
  search: '',
  paymentMethod: 'Cash',
  totalPayment: 0,
  amountGiven: 0,
  change: 0,
})

const isModalOpen = ref(false)

// Array to store the products in the cart
const productsInCart = reactive([])

// Function to add product to the cart
const addToCart = (product) => {
  const existingProduct = productsInCart.find((p) => p.produk_id === product.produk_id)
  if (existingProduct) {
    existingProduct.quantity += 1
  } else {
    // Add new product with default quantity of 1
    productsInCart.push({
      ...product,
      quantity: 1
    })
  }
}

// Compute total payment
const calculateTotalPayment = computed(() => {
  return productsInCart.reduce((total, product) => {
    return total + (product.harga * product.quantity)
  }, 0)
})

function openModal() {
  form.totalPayment = calculateTotalPayment.value
  isModalOpen.value = true
}

function closeModal() {
  isModalOpen.value = false
  resetForm()
}

function resetForm() {
  form.paymentMethod = 'Cash'
  form.totalPayment = 0
  form.amountGiven = 0
  form.change = 0
}

function calculateChange() {
  if (form.paymentMethod === 'Cash') {
    form.change = form.amountGiven - form.totalPayment
  } else {
    form.change = 0
  }
  closeModal()
}
</script>

<template>
  <LayoutAuthenticated>
    <SectionMain>
      <SectionTitle first>KASIR TOKO SUMBER BERKAT</SectionTitle>
      <CardBox form class="card-box-spacing">
        <FormField label="Search Produk">
          <FormSearch v-model="form.search" :icon="mdiMagnify" @addToCart="addToCart" />
          <div class="flex justify-end mt-4">
            <BaseButton 
              label="Confirm" 
              color="info" 
              @click.prevent="openModal"
              :disabled="!productsInCart.length"
            />
          </div>
        </FormField>
        <TableKasir 
          :products="productsInCart" 
          @update:totalPayment="form.totalPayment = $event"
        />
      </CardBox>
      <ModalTransaksi 
        :is-modal-open="isModalOpen" 
        :total-payment="calculateTotalPayment"
        @close-modal="closeModal" 
      />
    </SectionMain>
  </LayoutAuthenticated>
</template>

<style scoped>
.card-box-spacing {
  padding-left: 1rem;
  padding-right: 1rem;
  margin-left: 1rem;
  margin-right: 1rem;
}
</style>