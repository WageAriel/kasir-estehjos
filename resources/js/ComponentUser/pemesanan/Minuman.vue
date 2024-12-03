<template>
    <div class="flex flex-col mt-8 max-md:max-w-full">
        <!-- Grid Produk -->
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
            <article v-for="item in paginatedItems" :key="item.produk_id"
                class="flex flex-col p-5 border border-solid border-stone-200 min-w-[240px] w-[300px]">
                <div data-layername="foto"
                    class="flex flex-col w-80 max-w-full text-base text-center lowercase whitespace-nowrap text-stone-200">
                    <div
                        class="flex relative flex-col items-start pb-40 w-full aspect-[0.958] max-md:pr-5 max-md:pb-24">
                        <img loading="lazy" :src="item.image" :alt="item.produk_name"
                            class="object-cover absolute inset-0 size-[300px]" />
                    </div>
                </div>
                <div class="flex flex-col items-center mt-6 w-full max-w-xs uppercase text-stone-800">
                    <h3 class="text-xl font-semibold text-center">{{ item.produk_name }}</h3>
                    <div class="flex gap-2 items-center mt-2 text-3xl font-bold whitespace-nowrap">
                        <div class="flex gap-1.5 items-start self-stretch my-auto">
                            <span class="text-center">Rp</span>
                            <span>{{ item.harga }}</span>
                        </div>
                    </div>
                    <button @click="addToCart(item)" class="mt-4 px-6 py-2 bg-blue-600 text-white rounded-full">
                        Tambah Keranjang
                    </button>
                </div>
            </article>
        </div>

        <!-- Pagination Controls -->
        <div class="flex justify-center mt-8">
            <button @click="previousPage" :disabled="currentPage === 1"
                class="px-4 py-2 mx-2 bg-gray-300 rounded disabled:bg-gray-100">
                Previous
            </button>
            <span class="px-4 py-2">Page {{ currentPage }} of {{ totalPages }}</span>
            <button @click="nextPage" :disabled="currentPage === totalPages"
                class="px-4 py-2 mx-2 bg-gray-300 rounded disabled:bg-gray-100">
                Next
            </button>
        </div>
    </div>
</template>


<script lang="ts">
import {
    defineComponent,
    ref,
    computed,
    onMounted
} from "vue";
import axios from "axios";
import { usePage } from '@inertiajs/inertia-vue3'; // Menggunakan usePage untuk navigasi

export default defineComponent({
    props: {
    searchQuery: {
      type: String,
      required: true,
    },
  },
    setup(props) {
        const items = ref([]);
        const itemsPerPage = 12;
        const currentPage = ref(1);
        const cart = ref([]);

        // Mengambil data produk kategori Sembako dari API
        onMounted(async () => {
            try {
                const response = await axios.get('/produk/minuman');
                items.value = response.data; // Menyimpan data produk
            } catch (error) {
                console.error('Gagal mengambil data produk:', error);
            }

            // Ambil data keranjang dari localStorage saat halaman dimuat
            const savedCart = localStorage.getItem('cart');
            if (savedCart) {
                cart.value = JSON.parse(savedCart);
            }
        });

        const filteredItems = computed(() => {
      if (props.searchQuery.trim() === '') {
        return items.value; // Jika tidak ada kata kunci, tampilkan semua produk
      }

      return items.value.filter((item) =>
        item.produk_name.toLowerCase().includes(props.searchQuery.toLowerCase())
      );
    });

        // Menambahkan produk ke keranjang
        const addToCart = (item) => {
    const found = cart.value.find((cartItem) => cartItem.produk_id === item.produk_id);
    if (found) {
        found.quantity++;
    } else {
        cart.value.push({ ...item, quantity: 1 });
    }

    // Simpan data keranjang ke localStorage
    localStorage.setItem('cart', JSON.stringify(cart.value));

    // Tampilkan notifikasi
    alert(`${item.produk_name} berhasil ditambahkan ke keranjang!`);
};

        // Mengurutkan produk berdasarkan nama
        const sortedItems = computed(() => {
            return filteredItems.value.slice().sort((a, b) =>
        a.produk_name.localeCompare(b.produk_name)
      );
        });

        // Menghitung total halaman
        const totalPages = computed(() => Math.ceil(sortedItems.value.length / itemsPerPage));

        // Mendapatkan item yang akan ditampilkan pada halaman saat ini
        const paginatedItems = computed(() => {
            const start = (currentPage.value - 1) * itemsPerPage;
            const end = start + itemsPerPage;
            return sortedItems.value.slice(start, end);
        });

        // Fungsi untuk berpindah ke halaman sebelumnya
        const previousPage = () => {
            if (currentPage.value > 1) {
                currentPage.value--;
                scrollToTop();
            }
        };

        // Fungsi untuk berpindah ke halaman berikutnya
        const nextPage = () => {
            if (currentPage.value < totalPages.value) {
                currentPage.value++;
                scrollToTop();
            }
        };

        // Fungsi untuk scroll ke atas
        const scrollToTop = () => {
            window.scrollTo({
                top: 0,
                behavior: "smooth"
            });
        };

        // Fungsi untuk pergi ke halaman cart
        const goToCart = () => {
            // Navigasi ke halaman keranjang
            window.location.href = '/cart';  // Bisa juga menggunakan Inertia.js navigasi
        };

        return {
            items,
            paginatedItems,
            currentPage,
            totalPages,
            previousPage,
            nextPage,
            cart,
            addToCart,
            goToCart
        };
    },
});
</script>


<style scoped>
    .size-full {
        width: 100%;
        height: 100%;
    }
</style>