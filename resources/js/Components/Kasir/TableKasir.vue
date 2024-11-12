<script setup>
import { ref, reactive } from 'vue'
import BaseButtons from '@/Components/BaseButtons.vue'
import BaseButton from '@/Components/BaseButton.vue'
import { mdiEye, mdiTrashCan } from '@mdi/js'

// Data produk dengan `quantity` sebagai `ref` di dalam item `reactive`
const products = reactive([
  { id: 1, Produk: 'P001', name: 'Produk A', price: 10000, quantity: ref(1) },
  { id: 2, Produk: 'P002', name: 'Produk B', price: 20000, quantity: ref(1) },
  { id: 3, Produk: 'P003', name: 'Produk C', price: 15000, quantity: ref(1) },
  { id: 4, Produk: 'P004', name: 'Produk D', price: 5000, quantity: ref(1) },
  { id: 5, Produk: 'P005', name: 'Produk E', price: 25000, quantity: ref(1) },
  { id: 6, Produk: 'P006', name: 'Produk F', price: 30000, quantity: ref(1) },
])

// Fungsi untuk menambah dan mengurangi jumlah
function incrementQuantity(product) {
  product.quantity.value += 1
}

function decrementQuantity(product) {
  if (product.quantity.value > 1) {
    product.quantity.value -= 1
  }
}
</script>

<template>
  <table>
    <thead>
      <tr>
        <th>ID Produk</th>
        <th>Nama Produk</th>
        <th>Jumlah</th>
        <th>Harga</th>
        <th>Subtotal</th>
        <th>Aksi</th>
      </tr>
    </thead>
    <tbody>
      <tr v-for="product in products" :key="product.id">
        <td>{{ product.Produk }}</td>
        <td>{{ product.name }}</td>
        <td class="flex items-center space-x-2">
          <button @click="decrementQuantity(product)" class="px-2 py-1 bg-gray-300 rounded">-</button>
          <span>{{ product.quantity.value }}</span>
          <button @click="incrementQuantity(product)" class="px-2 py-1 bg-gray-300 rounded">+</button>
        </td>
        <td>{{ product.price }}</td>
        <td>{{ product.price * product.quantity.value }}</td>
        <td class="before:hidden lg:w-1 whitespace-nowrap">
            <BaseButton
              color="danger"
              :icon="mdiTrashCan"
              small
              @click="isModalDangerActive = true"
            />
        </td>
      </tr>
    </tbody>
  </table>
</template>
