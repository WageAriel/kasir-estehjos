<template>
  <div data-layername="catalog" class="flex overflow-hidden flex-col bg-white mb-[100px]">
    <main class="self-center mt-8 w-full max-w-[1556px] max-md:max-w-full">
      <div class="flex gap-5 max-md:flex-col">
        <aside data-layername="column" class="flex flex-col w-[24%] max-md:ml-0 max-md:w-full">
          <div class="flex flex-col max-md:mt-10">
            <div data-layername="minumanMakananSembako" class="self-start text-base leading-snug text-stone-800 text-opacity-70 max-md:ml-2.5">
              Minuman/Makanan/Sembako
            </div>
            <div data-layername="filtres" class="flex flex-col mt-9 w-full">
              <div class="flex gap-8 justify-between items-center max-w-full w-[360px]">
                <input data-layername="cari" class="self-stretch my-auto text-4xl font-bold text-stone-800 w-[226px]" placeholder="Cari">
                <button data-layername="resetAll" class="self-stretch my-auto text-2xl tracking-wider text-stone-800 text-opacity-50">
                  Reset all
                </button>
              </div>
              <nav class="flex flex-col items-center mt-8 max-w-full text-xl font-medium text-stone-800 w-[359px]">
                <div v-for="item in items" :key="item.label" class="flex flex-col w-full whitespace-nowrap max-w-[359px] mt-8">
                  <button @click="setFilter(item.component)" class="flex gap-5 justify-between items-center w-full text-left">
                    <span class="w-[317px]">{{ item.label }}</span>
                    <component :is="item.icon" class="w-6 h-6 text-gray-500" />
                  </button>
                  <div class="mt-2 w-full border border-solid bg-stone-50 border-stone-50 min-h-[1px]"></div>
                </div>
              </nav>
            </div>
          </div>
        </aside>
        <section data-layername="column" class="flex flex-col ml-5 w-[76%] max-md:ml-0 max-md:w-full">
          <div class="flex flex-col mt-3 w-full max-md:mt-10 max-md:max-w-full">
            <div class="flex flex-col w-full max-md:max-w-full">
              <img loading="lazy" src="https://cdn.builder.io/api/v1/image/assets/TEMP/f561ce3507ee89916cfdae0e6e2f2c9010d05fffc24830f584a3219357d03538?placeholderIfAbsent=true&apiKey=6ec180bda4e747f8b93eeebc21f59995"
                alt="Banner image" class="object-contain max-w-full aspect-[2.85] w-[1140px]" />
              <div class="flex flex-wrap gap-10 justify-between items-start mt-8 w-full text-xl font-medium max-w-[1140px] text-neutral-900 max-md:max-w-full">
                <div data-layername="hasil">Hasil:.....</div>
                <div data-layername="sort" class="flex gap-1 items-center">
                  <div data-layername="sortBy" class="self-stretch my-auto">Sort by</div>
                  <img loading="lazy" src="https://cdn.builder.io/api/v1/image/assets/TEMP/ffb839842664a3ba473bb30c66bb102d1da8ed3fc47eee6164f06b111acb1a2c?placeholderIfAbsent=true&apiKey=6ec180bda4e747f8b93eeebc21f59995"
                    alt="Sort icon" class="object-contain shrink-0 self-stretch my-auto w-6 aspect-square" />
                </div>
              </div>
              <div class="flex flex-wrap gap-8">
                <article v-for="item in allItems" :key="item.id" class="flex flex-col p-5 border border-solid border-stone-200 min-w-[240px] w-[360px]">
                  <img :src="item.image" :alt="item.name" class="object-cover" />
                  <div>{{ item.name }}</div>
                  <div>{{ item.price }}</div>
                </article>
              </div>
              <div>
                <component :is="currentView" />
              </div>
            </div>
          </div>
        </section>
      </div>
    </main>
  </div>
</template>


<script lang="ts">
import { defineComponent, ref } from "vue";
import Sembako from '@/components/ComponentUser/pemesanan/Sembako.vue';
import Minuman from '@/components/ComponentUser/pemesanan/Minuman.vue';
import { ChevronDownIcon } from '@heroicons/vue/24/solid';

export default defineComponent({
  components: {
    Sembako,
    Minuman
  },
  setup() {
    // Definisikan items dengan informasi setiap kategori
    const items = [
      { label: "Sembako", component: "Sembako", icon: ChevronDownIcon },
      { label: "Minuman", component: "Minuman", icon: ChevronDownIcon },
    ];

    // Menggunakan ref untuk melacak komponen yang sedang ditampilkan
    const currentView = ref<string | null>(null);

    // Fungsi untuk mengubah tampilan berdasarkan filter yang diklik
    const setFilter = (view: string) => {
      currentView.value = view;
    };

    return {
      items,
      currentView,
      setFilter,
    };
  },
});
</script>