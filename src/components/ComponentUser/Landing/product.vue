<template>
  <main class="flex flex-col items-center">
    <!-- Header Section -->
    <header class="flex flex-col items-center">
      <!-- Main Title Centered -->
      <div class="flex flex-col items-center text-center">
        <h1 data-layername="partners" class="text-4xl font-medium text-green-800 max-md:text-4xl text-center">
          Our Products
        </h1>
      </div>

    <!-- Navigation Items -->
    <nav class="flex flex-row gap-x-10 items-center mt-8">
      <!-- "SALE" Section with underline -->
      <div class="flex flex-col items-center cursor-pointer" @click="changeCategory('Sale')">
        <h2 
          class="text-lg uppercase"
          :class="{'text-green-900': activeCategory === 'Sale', 'text-zinc-700': activeCategory !== 'Sale'}"
        >
          Sale
        </h2>
        <div v-if="activeCategory === 'Sale'" class="shrink-0 h-0.5 w-full border-b-2 border-green-900"></div>
      </div>

      <!-- "HOT" Section with underline -->
      <div class="flex flex-col items-center cursor-pointer" @click="changeCategory('Hot')">
        <h2 
          class="text-lg uppercase"
          :class="{'text-green-900': activeCategory === 'Hot', 'text-zinc-700': activeCategory !== 'Hot'}"
        >
          HOT
        </h2>
        <div v-if="activeCategory === 'Hot'" class="shrink-0 h-0.5 w-full border-b-2 border-green-900"></div>
      </div>

      <!-- "New Arrivals" Section with underline -->
      <div class="flex flex-col items-center cursor-pointer" @click="changeCategory('New Arrivals')">
        <h2 
          class="text-lg uppercase"
          :class="{'text-green-900': activeCategory === 'New Arrivals', 'text-zinc-700': activeCategory !== 'New Arrivals'}"
        >
          New Arrivals
        </h2>
        <div v-if="activeCategory === 'New Arrivals'" class="shrink-0 h-0.5 w-full border-b-2 border-green-900"></div>
      </div>
      
      <!-- "Accessories" Section with underline -->
      <div class="flex flex-col items-center cursor-pointer" @click="changeCategory('Accessories')">
        <h2 
          class="text-lg uppercase"
          :class="{'text-green-900': activeCategory === 'Accessories', 'text-zinc-700': activeCategory !== 'Accessories'}"
        >
          Accessories
        </h2>
        <div v-if="activeCategory === 'Accessories'" class="shrink-0 h-0.5 w-full border-b-2 border-green-900"></div>
      </div>
    </nav>

    </header>
    <!-- Product List Section -->
    <section class="self-stretch mt-20 w-full max-md:mt-10">
      <div class="grid grid-cols-4 gap-5 justify-center max-w-6xl mx-auto max-md:grid-cols-2"> 
        <!-- Mengatur grid menjadi 4 kolom pada layar besar dan 2 kolom pada layar kecil -->
        
        <!-- Product Cards filtered by category -->
        <article
          v-for="product in filteredProducts"
          :key="product.id"
          class="flex flex-col w-full max-w-[200px] mx-auto"
        >
          <div class="flex flex-col grow text-center text-neutral-700">
            <div class="flex shrink-0 bg-yellow-200 h-[250px]" role="img" :aria-label="product.name">
              <img :src="product.image" :alt="product.name" class="object-cover w-full h-full rounded" />
            </div>
            <h3 class="mt-2 text-xl font-semibold">{{ product.name }}</h3>
            <span class="mt-1 text-lg">{{ product.price }}</span>
          </div>
        </article>
      </div>
    </section>
  </main>
</template>

<script setup>
import { ref, computed } from 'vue';

// Data produk
const products = ref([
  { id: 1, name: 'Spread Collar Shirt', price: '$48.99', category: 'Sale', image: '@/assets/images/spread-collar-shirt.jpg' },
  { id: 2, name: 'White Solid Formal Shirt', price: '$39.00', category: 'Sale', image: '@/assets/images/white-solid-formal-shirt.jpg' },
  { id: 3, name: 'Shine On Me Blouse', price: '$42.99', category: 'Hot', image: '@/assets/images/shine-on-me-blouse.jpg' },
  { id: 4, name: 'Gray Solid Padded Jacket', price: '$32.99', category: 'Hot', image: '@/assets/images/gray-solid-padded-jacket.jpg' },
  { id: 5, name: 'Printed Loose T-shirt', price: '$39.99', category: 'New Arrivals', image: '@/assets/images/printed-loose-t-shirt.jpg' },
  { id: 6, name: 'Summer Wind Crop Shirt', price: '$39.95', category: 'New Arrivals', image: '@/assets/images/summer-wind-crop-shirt.jpg' },
  { id: 7, name: 'Tailored Jacket', price: '$46.00', category: 'Accessories', image: '@/assets/images/tailored-jacket.jpg' },
  { id: 8, name: 'Solid Round Neck T-shirt', price: '$36.00', category: 'Accessories', image: '@/assets/images/solid-round-neck-t-shirt.jpg' },
]);

// State kategori aktif
const activeCategory = ref('Sale');

// Method untuk mengganti kategori
const changeCategory = (category) => {
  activeCategory.value = category;
};

// Filter produk berdasarkan kategori aktif
const filteredProducts = computed(() => {
  // Jika kategori aktif "Sale", tampilkan semua produk
  if (activeCategory.value === 'Sale') {
    return products.value;
  }
  // Jika tidak, tampilkan produk berdasarkan kategori yang dipilih
  return products.value.filter(product => product.category === activeCategory.value);
});
</script>


<style scoped>
.cursor-pointer {
  cursor: pointer;
}
</style>
