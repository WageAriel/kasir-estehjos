<template>
  <main class="flex flex-col items-center">
    <!-- Header Section -->
    <header class="flex flex-col items-center">
      <div class="flex flex-col items-center text-center">
        <h1 data-layername="partners" class="text-4xl font-medium text-green-800 max-md:text-4xl text-center">
          Our Products
        </h1>
      </div>

      <!-- Navigation Items -->
      <nav class="flex flex-row gap-x-10 items-center mt-8">
        <div
          v-for="kategori in kategoriList"
          :key="kategori"
          class="flex flex-col items-center cursor-pointer"
          @click="changeKategori(kategori)"
        >
          <h2 
            class="text-lg uppercase"
            :class="{'text-green-900': activeKategori === kategori, 'text-zinc-700': activeKategori !== kategori}"
          >
            {{ kategori }}
          </h2>
          <div
            v-if="activeKategori === kategori"
            class="shrink-0 h-0.5 w-full border-b-2 border-green-900"
          ></div>
        </div>
      </nav>
    </header>

    <!-- Product List Section -->
    <section class="self-stretch mt-20 w-full max-md:mt-10">
      <div class="grid grid-cols-4 gap-5 justify-center max-w-6xl mx-auto max-md:grid-cols-2">
        <article
          v-for="product in filteredProducts"
          :key="product.produk_id"
          class="flex flex-col w-full max-w-[200px] mx-auto"
        >
          <div class="flex flex-col grow text-center text-neutral-700">
            <div class="flex shrink-0 bg-yellow-200 h-[250px]" role="img" :aria-label="product.produk_name">
              <img :src="product.image || '/placeholder.jpg'" :alt="product.produk_name" class="object-cover w-full h-full rounded" />
            </div>
            <h3 class="mt-2 text-xl font-semibold">{{ product.produk_name }}</h3>
            <span class="mt-1 text-lg">Rp {{ product.harga }}</span>
          </div>
        </article>
      </div>
    </section>
  </main>
</template>

<script setup>
import { ref, computed, onMounted } from 'vue';
import axios from 'axios';

// Data produk
const products = ref([]); // Produk akan diambil dari API
const kategoriList = ref(['Sale', 'Hot', 'New Arrivals', 'Accessories']); // Daftar kategori

// State kategori aktif
const activeKategori = ref('Sale');

onMounted(async () => {
  try {
    const response = await axios.get('/produk/all'); // Endpoint untuk mengambil semua produk
    products.value = response.data; // Simpan data produk
  } catch (error) {
    console.error('Gagal mengambil data produk:', error);
  }
});

// Method untuk mengganti kategori
const changeKategori = (Kategori) => {
  activeKategori.value = Kategori;
};

// Filter produk berdasarkan kategori aktif
const filteredProducts = computed(() => {
  // Jika kategori aktif "Sale", tampilkan semua produk
  if (activeKategori.value === 'Sale') {
    return products.value;
  }
  // Jika tidak, tampilkan produk berdasarkan kategori yang dipilih
  return products.value.filter(product => product.Kategori === activeKategori.value);
});
</script>


<style scoped>
.cursor-pointer {
  cursor: pointer;
}
</style>
