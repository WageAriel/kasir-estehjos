<script setup>
import { computed } from 'vue'
import { mdiTrashCan } from '@mdi/js'
import BaseButton from '@/Components/BaseButton.vue'

const props = defineProps({
  products: {
    type: Array,
    required: true
  }
})

const emit = defineEmits(['update:totalPayment'])

// Function to increment the quantity of a product
function incrementQuantity(product) {
  product.quantity += 1
}

// Function to decrement the quantity of a product
function decrementQuantity(product) {
  if (product.quantity > 1) {
    product.quantity -= 1
  }
}

// Function to remove a product from the cart
function removeFromCart(product) {
  const index = props.products.indexOf(product)
  if (index !== -1) {
    props.products.splice(index, 1)
  }
}

// Compute total for all products
const total = computed(() => {
  return props.products.reduce((sum, product) => {
    return sum + (product.harga * product.quantity)
  }, 0)
})
</script>

<template>
  <div class="overflow-x-auto">
    <table v-if="props.products.length" class="mt-4 w-full">
      <thead>
        <tr class="bg-gray-100">
          <th class="px-4 py-2 text-left">ID Produk</th>
          <th class="px-4 py-2 text-left">Nama Produk</th>
          <th class="px-4 py-2 text-center">Jumlah</th>
          <th class="px-4 py-2 text-right">Harga</th>
          <th class="px-4 py-2 text-right">Subtotal</th>
          <th class="px-4 py-2 text-center">Aksi</th>
        </tr>
      </thead>
      <tbody>
        <tr v-for="product in props.products" :key="product.produk_id" class="border-b">
          <td class="px-4 py-2">{{ product.produk_id }}</td>
          <td class="px-4 py-2">{{ product.produk_name }}</td>
          <td class="px-4 py-2">
            <div class="flex items-center justify-center space-x-2">
              <button
                @click="decrementQuantity(product)"
                class="px-2 py-1 bg-gray-200 hover:bg-gray-300 rounded"
              >
                -
              </button>
              <span class="w-8 text-center">{{ product.quantity }}</span>
              <button
                @click="incrementQuantity(product)"
                class="px-2 py-1 bg-gray-200 hover:bg-gray-300 rounded"
              >
                +
              </button>
            </div>
          </td>
          <td class="px-4 py-2 text-right">
            {{ new Intl.NumberFormat('id-ID', { style: 'currency', currency: 'IDR' }).format(product.harga) }}
          </td>
          <td class="px-4 py-2 text-right">
            {{ new Intl.NumberFormat('id-ID', { style: 'currency', currency: 'IDR' }).format(product.harga * product.quantity) }}
          </td>
          <td class="px-4 py-2 text-center">
            <BaseButton
              color="danger"
              :icon="mdiTrashCan"
              small
              @click="removeFromCart(product)"
            />
          </td>
        </tr>
        <tr class="bg-gray-50 font-bold">
          <td colspan="4" class="px-4 py-2 text-right">Total:</td>
          <td class="px-4 py-2 text-right">
            {{ new Intl.NumberFormat('id-ID', { style: 'currency', currency: 'IDR' }).format(total) }}
          </td>
          <td></td>
        </tr>
      </tbody>
    </table>
  </div>
</template>
