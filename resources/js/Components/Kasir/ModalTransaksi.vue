<script setup>
import { defineProps, reactive, watch } from 'vue'

const props = defineProps({
  isModalOpen: Boolean,
  totalPayment: Number // Properti totalPayment diterima dari parent
})

const emit = defineEmits(['close-modal'])

const form = reactive({
  paymentMethod: 'Cash',
  totalPayment: 0,
  amountGiven: 0,
  change: 0
})

// Sinkronisasi totalPayment dari props ke form.totalPayment
watch(() => props.totalPayment, (newValue) => {
  form.totalPayment = newValue
})

// Hitung kembalian secara otomatis saat amountGiven berubah
watch(() => form.amountGiven, () => {
  calculateChange()
})

function closeModal() {
  emit('close-modal')
}

function calculateChange() {
  if (form.paymentMethod === 'Cash') {
    form.change = form.amountGiven - form.totalPayment
  } else {
    form.change = 0
  }
}
</script>

<template>
  <div v-if="isModalOpen" class="fixed inset-0 flex items-center justify-center bg-gray-900 bg-opacity-75 z-50">
    <div class="bg-white rounded-lg p-5 w-full max-w-md">
      <h4 class="text-lg font-semibold mb-4">Pembayaran</h4>
      <form @submit.prevent="closeModal">
        <!-- Metode Pembayaran -->
        <div class="mb-4">
          <label class="block text-sm font-medium text-gray-700">Metode Pembayaran</label>
          <div class="flex items-center mt-2">
            <input type="radio" id="cash" value="Cash" v-model="form.paymentMethod" />
            <label for="cash" class="ml-2 mr-4">Cash</label>

            <input type="radio" id="qris" value="QRIS" v-model="form.paymentMethod" />
            <label for="qris" class="ml-2">QRIS</label>
          </div>
        </div>

        <!-- Total Pembayaran -->
        <div class="mb-4">
          <label for="totalPayment" class="block text-sm font-medium text-gray-700">Total Pembayaran</label>
          <input type="number" v-model="form.totalPayment" id="totalPayment" class="mt-1 p-2 w-full border rounded" disabled />
        </div>

        <!-- Uang yang Diberikan -->
        <div class="mb-4" v-if="form.paymentMethod === 'Cash'">
          <label for="amountGiven" class="block text-sm font-medium text-gray-700">Uang yang Diberikan</label>
          <input type="number" v-model="form.amountGiven" id="amountGiven" class="mt-1 p-2 w-full border rounded" />
        </div>

        <!-- Kembalian -->
        <div class="mb-4" v-if="form.paymentMethod === 'Cash'">
          <label for="change" class="block text-sm font-medium text-gray-700">Kembalian</label>
          <input type="number" v-model="form.change" id="change" class="mt-1 p-2 w-full border rounded" disabled />
        </div>

        <!-- Buttons -->
        <div class="flex justify-end space-x-2">
          <button type="button" @click="closeModal" class="px-4 py-2 text-sm font-medium text-gray-500 bg-gray-200 rounded">Cancel</button>
          <button type="submit" class="px-4 py-2 text-sm font-medium text-white bg-blue-600 rounded">Confirm</button>
        </div>
      </form>
    </div>
  </div>
</template>
