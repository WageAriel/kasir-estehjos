<script setup>
import { ref, watch } from 'vue'
import { usePage } from '@inertiajs/inertia-vue3'
import debounce from 'lodash.debounce'

// Variabel untuk query pencarian dan produk
const searchQuery = ref('')
const produk = ref([])  // Menyimpan produk yang ditemukan
const isLoading = ref(false)

// Ambil data produk dan searchQuery dari Inertia
const { props } = usePage()

// Inisialisasi produk dengan data yang sudah dikirimkan oleh controller
produk.value = props.produks || []

// Fungsi untuk melakukan pencarian produk
const fetchProduk = async (query) => {
  if (!query.trim()) {
    produk.value = [] // Kosongkan produk jika query kosong
    return
  }

  isLoading.value = true
  try {
    const response = await fetch(route('kasir.search') + '?search=' + encodeURIComponent(query))

    if (response.ok) {
      const data = await response.json()
      console.log('Produk ditemukan:', data.produks)  // Periksa data produk yang diterima
      produk.value = data.produks
    } else {
      console.error('Error fetching products')
    }
  } catch (error) {
    console.error('An error occurred:', error)
  } finally {
    isLoading.value = false
  }
}


// Debounce untuk mencegah pencarian terlalu sering
const debouncedSearch = debounce((query) => {
  fetchProduk(query)
}, 300)

// Watcher untuk menangani perubahan pada searchQuery
watch(searchQuery, (newQuery) => {
  debouncedSearch(newQuery)
})
</script>

<template>
  <div class="p-4">
    <!-- Input pencarian -->
    <div class="relative">
      <input
        v-model="searchQuery"
        type="text"
        placeholder="Search produk..."
        class="px-3 py-2 max-w-full focus:ring focus:outline-none border-gray-700 rounded w-full"
      />
    </div>

    <!-- Indikator loading -->
    <div v-if="isLoading" class="mt-2 text-gray-500">
      Loading...
    </div>

    <!-- Daftar produk yang ditemukan -->
    <ul v-else-if="produk.length" class="mt-2 border rounded bg-white">
      <li
        v-for="item in produk"
        :key="item.produk_id"
        class="px-3 py-2 border-b last:border-b-0"
      >
        {{ item.produk_name }} - {{ item.harga | currency }}
      </li>
    </ul>

    <!-- Pesan jika tidak ada hasil -->
    <div v-else-if="searchQuery && !produk.length" class="mt-2 text-gray-500">
      No produk found.
    </div>
  </div>
</template>

<style scoped>
/* Tambahkan styling tambahan sesuai kebutuhan */
</style>
