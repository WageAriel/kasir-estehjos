<template>
  <LayoutAuthenticated>
    <SectionMain>
      <SectionTitle first>KASIR TOKO SUMBER BERKAT</SectionTitle>
      <CardBox form class="card-box-spacing" @submit.prevent="submit">
        <FormField label="Search Produk">
          <FormSearch v-model="form.search" :icon="mdiMagnify" />
          <div class="flex justify-end mt-4">
            <BaseButton label="Confirm" color="info" @click.prevent="openModal" />
          </div>
        </FormField>
        <TableKasir />
      </CardBox>
      <!-- Pass isModalOpen as prop and listen for close event from ModalTransaksi -->
      <ModalTransaksi :is-modal-open="isModalOpen" @close-modal="closeModal" />
    </SectionMain>
  </LayoutAuthenticated>
</template>

<script setup>
import { reactive, ref } from 'vue'
import { mdiMagnify } from '@mdi/js'
import SectionTitle from '@/Components/SectionTitle.vue'
import LayoutAuthenticated from '@/Layouts/LayoutAuthenticated.vue'
import CardBox from '@/Components/CardBox.vue'
import FormField from '@/Components/FormField.vue'
import BaseButton from '@/Components/BaseButton.vue'
import ModalTransaksi from '@/Components/Kasir/ModalTransaksi.vue'
import TableKasir from '@/Components/Kasir/TableKasir.vue'
import FormSearch from '@/Components/Kasir/FormSearch.vue'

const form = reactive({
  search: '',
  paymentMethod: 'Cash',
  totalPayment: 0,
  amountGiven: 0,
  change: 0,
})

function submit(){

}

const isModalOpen = ref(false)

function openModal() {
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
  // Close modal after calculation
  closeModal()
}
</script>

<style scoped>
.card-box-spacing {
  padding-left: 1rem;
  padding-right: 1rem;
  margin-left: 1rem;
  margin-right: 1rem;
}
</style>
