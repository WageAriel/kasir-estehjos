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
              <img
                v-if="product.gambar"
                :src="`/storage/${product.gambar}`"
                :alt="product.produk_name"
                class="object-cover w-full h-full rounded"
              />
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
const products = ref([]);
const kategoriList = ref(['Sale', 'Hot', 'New Arrivals', 'Accessories']);
const activeKategori = ref('Sale');

onMounted(async () => {
  try {
    const response = await axios.get('/produk/all');
    products.value = response.data;
    console.log('Data produk:', products.value);
  } catch (error) {
    console.error('Gagal mengambil data produk:', error);
  }
});

const changeKategori = (Kategori) => {
  activeKategori.value = Kategori;
};

// Filter produk berdasarkan kategori aktif
const filteredProducts = computed(() => {
  console.log('Filtering products for kategori:', activeKategori.value);
  console.log('Available products:', products.value);

  if (activeKategori.value === 'Sale') {
    return products.value;
  }
  return products.value.filter(product => product.Kategori === activeKategori.value);
});
</script>

<style scoped>
.cursor-pointer {
  cursor: pointer;
}

img {
  transition: transform 0.2s;
}

img:hover {
  transform: scale(1.05);
}

.bg-yellow-200 {
  overflow: hidden;
  border-radius: 8px;
}
</style>
