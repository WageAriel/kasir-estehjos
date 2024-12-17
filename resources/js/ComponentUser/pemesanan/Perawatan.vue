<template>
    <div class="flex flex-col mt-8 max-md:max-w-full">
        <!-- Grid Produk -->
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
            <article v-for="item in paginatedItems" :key="item.produk_id"
                class="flex flex-col p-5 border border-solid border-stone-200 min-w-[240px] w-[300px]">
                <div data-layername="foto"
                    class="flex flex-col w-80 max-w-full text-base text-center lowercase whitespace-nowrap text-stone-200">
                    <div class="flex relative flex-col items-start pb-40 w-full aspect-[0.958] max-md:pr-5 max-md:pb-24">
                        <img
                            v-if="item.gambar"
                            :src="`/storage/${item.gambar}`"
                            :alt="item.produk_name"
                            class="object-cover absolute inset-0 size-[300px]"
                        />
                    </div>
                </div>
                <div class="flex flex-col items-center mt-6 w-full max-w-xs uppercase text-stone-800">
                    <h3 class="text-xl font-semibold text-center" :title="item.produk_name">
                        {{ truncateText(item.produk_name, 15) }}
                    </h3>
                    <p class="text-sm text-gray-600 mt-2 text-center" :title="item.deskripsi">
                        {{ truncateText(item.deskripsi, 50) }}
                    </p>
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

<script setup>
import { ref, computed, onMounted } from 'vue';
import axios from 'axios';

const props = defineProps({
    searchQuery: {
        type: String,
        required: true
    }
});

const items = ref([]);
const itemsPerPage = 12;
const currentPage = ref(1);
const cart = ref([]);

onMounted(async () => {
    try {
        const response = await axios.get('/produk/perawatanPribadi');
        items.value = response.data;
    } catch (error) {
        console.error('Gagal mengambil data produk:', error);
    }

    const savedCart = localStorage.getItem('cart');
    if (savedCart) {
        cart.value = JSON.parse(savedCart);
    }
});

const truncateText = (text, length) => {
    if (!text) return '';
    return text.length > length ? text.substring(0, length) + '...' : text;
};

const filteredItems = computed(() => {
    if (props.searchQuery.trim() === '') {
        return items.value;
    }
    return items.value.filter((item) =>
        item.produk_name.toLowerCase().includes(props.searchQuery.toLowerCase())
    );
});

const sortedItems = computed(() => {
    return filteredItems.value.slice().sort((a, b) =>
        a.produk_name.localeCompare(b.produk_name)
    );
});

const totalPages = computed(() => Math.ceil(sortedItems.value.length / itemsPerPage));

const paginatedItems = computed(() => {
    const start = (currentPage.value - 1) * itemsPerPage;
    const end = start + itemsPerPage;
    return sortedItems.value.slice(start, end);
});

const previousPage = () => {
    if (currentPage.value > 1) {
        currentPage.value--;
        scrollToTop();
    }
};

const nextPage = () => {
    if (currentPage.value < totalPages.value) {
        currentPage.value++;
        scrollToTop();
    }
};

const scrollToTop = () => {
    window.scrollTo({
        top: 0,
        behavior: "smooth"
    });
};

const addToCart = (item) => {
    const found = cart.value.find((cartItem) => cartItem.produk_id === item.produk_id);
    if (found) {
        found.quantity++;
    } else {
        cart.value.push({ ...item, quantity: 1 });
    }
    localStorage.setItem('cart', JSON.stringify(cart.value));
    alert(`${item.produk_name} berhasil ditambahkan ke keranjang!`);
};
</script>

<style scoped>
[title] {
    position: relative;
    cursor: pointer;
}

[title]:hover::after {
    content: attr(title);
    position: absolute;
    bottom: 100%;
    left: 50%;
    transform: translateX(-50%);
    padding: 5px 10px;
    background: rgba(0, 0, 0, 0.8);
    color: white;
    border-radius: 4px;
    font-size: 14px;
    white-space: nowrap;
    z-index: 10;
}
</style>
