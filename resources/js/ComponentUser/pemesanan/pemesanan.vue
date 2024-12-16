<template>
    <div data-layername="catalog" class="flex overflow-hidden flex-col bg-white mb-[100px]">
        <main class="self-center mt-8 w-full max-w-[1400px] max-md:max-w-full">
            <div class="flex gap-5 max-md:flex-col">
                <aside data-layername="column" class="flex flex-col w-[24%] max-md:ml-0 max-md:w-full">
                    <div class="flex flex-col max-md:mt-10">
                        <div data-layername="minumanMakananSembako"
                            class="self-start text-base leading-snug text-stone-800 text-opacity-70 max-md:ml-2.5">
                            Minuman/Makanan/Sembako
                        </div>
                        <div data-layername="filtres" class="flex flex-col mt-9 w-full">
                            <div class="flex gap-8 justify-between items-center max-w-full w-[360px]">
                                <input data-layername="cari"
                                    class="self-stretch my-auto text-4xl font-bold text-stone-800 w-[200px]"
                                    placeholder="Cari" v-model="searchQuery" />
                                <button @click="searchQuery = ''"
                                    class="self-stretch my-auto text-2xl tracking-wider text-stone-800 text-opacity-50">
                                    Reset Pencarian
                                </button>
                            </div>
                            <nav
                                class="flex flex-col items-center mt-8 max-w-full text-xl font-medium text-stone-800 w-[359px]">
                                <div v-for="item in items" :key="item.label"
                                    class="flex flex-col w-full whitespace-nowrap max-w-[359px] mt-8">
                                    <button @click="setFilter(item.component)"
                                        class="flex gap-5 justify-between items-center w-full text-left">
                                        <span class="w-[317px]">{{ item.label }}</span>
                                        <component :is="item.icon" class="w-6 h-6 text-gray-500" />
                                    </button>
                                    <div
                                        class="mt-2 w-full border border-solid bg-stone-50 border-stone-50 min-h-[1px]">
                                    </div>
                                </div>
                            </nav>
                        </div>
                    </div>
                </aside>
                <section data-layername="column" class="flex flex-col ml-5 w-[76%] max-md:ml-0 max-md:w-full">
                    <div class="flex flex-col mt-3 w-full max-md:mt-10 max-md:max-w-full">
                        <div class="flex flex-col w-full max-md:max-w-full">
                            <img loading="lazy" src="@/Assets/images/Sumber Berkat.png" alt="Banner image"
                                class="object-contain max-w-full aspect-[2.85] w-[1140px]" />

                            <div v-if="!isFiltering" class="flex flex-col mt-8 max-md:max-w-full">
                                <!-- Grid Produk -->
                                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
                                    <article v-for="item in paginatedItems" :key="item.produk_id"
                                        class="flex flex-col p-5 border border-solid border-stone-200 min-w-[240px] w-[300px]">
                                        <div data-layername="foto"
                                            class="flex flex-col w-80 max-w-full text-base text-center lowercase whitespace-nowrap text-stone-200">
                                            <div
                                                class="flex relative flex-col items-start pb-40 w-full aspect-[0.958] max-md:pr-5 max-md:pb-24">
                                                <img
                                                    v-if="item.gambar"
                                                    :src="`/storage/${item.gambar}`"
                                                    :alt="item.produk_name"
                                                    class="object-cover absolute inset-0 size-[300px]"
                                                />
                                            </div>
                                        </div>
                                        <div
                                            class="flex flex-col items-center mt-6 w-full max-w-xs uppercase text-stone-800">
                                            <h3 class="text-xl font-semibold text-center" :title="item.produk_name">
                                                {{ truncateText(item.produk_name, 15) }}
                                            </h3>
                                            <p class="text-sm text-gray-600 mt-2 text-center" :title="item.deskripsi">
                                                {{ truncateText(item.deskripsi, 50) }}
                                            </p>
                                            <div
                                                class="flex gap-2 items-center mt-2 text-3xl font-bold whitespace-nowrap">
                                                <div class="flex gap-1.5 items-start self-stretch my-auto">
                                                    <span class="text-center">Rp</span>
                                                    <span>{{ item.harga }}</span>
                                                </div>
                                            </div>
                                            <button @click="addToCart(item)"
                                                class="mt-4 px-6 py-2 bg-blue-600 text-white rounded-full">
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
                            <div v-else>
                                <component :is="currentView" :search-query="searchQuery" />
                            </div>

                            <!-- <div>
                                <component :is="currentView" />
                            </div> -->
                        </div>
                    </div>
                </section>
            </div>
        </main>
    </div>
</template>

<script lang="ts">
    import {
        defineComponent,
        ref,
        computed,
        onMounted
    } from "vue";
    import Sembako from "@/ComponentUser/pemesanan/Sembako.vue";
    import Minuman from "@/ComponentUser/pemesanan/Minuman.vue";
    import {
        ChevronDownIcon
    } from "@heroicons/vue/24/solid";
    import axios from "axios";

    export default defineComponent({
        components: {
            Sembako,
            Minuman,
        },
        setup() {
            // Data untuk items
            const items = [{
                    label: "Sembako",
                    component: "Sembako",
                    icon: ChevronDownIcon
                },
                {
                    label: "Minuman",
                    component: "Minuman",
                    icon: ChevronDownIcon
                },
            ];
            const searchQuery = ref('');

            const filteredItems = computed(() => {
                let filtered = itemsProduk.value;

                // Filter berdasarkan kategori (jika isFiltering aktif)
                if (isFiltering.value && currentView.value === 'Sembako') {
                    filtered = filtered.filter(item => item.kategori === 'Sembako');
                } else if (isFiltering.value && currentView.value === 'Minuman') {
                    filtered = filtered.filter(item => item.kategori === 'Minuman');
                }

                // Filter berdasarkan kata kunci pencarian
                if (searchQuery.value.trim() !== '') {
                    filtered = filtered.filter(item =>
                        item.produk_name.toLowerCase().includes(searchQuery.value.toLowerCase())
                    );
                }

                return filtered;
            });

            const itemsProduk = ref([]);
            const itemsPerPage = 12;
            const currentPage = ref(1);
            const cart = ref([]);

            onMounted(async () => {
                try {
                    const response = await axios.get('/produk/all');
                    itemsProduk.value = response.data; // Menyimpan data produk
                } catch (error) {
                    console.error('Gagal mengambil data produk:', error);
                }

                // Ambil data keranjang dari localStorage saat halaman dimuat
                const savedCart = localStorage.getItem('cart');
                if (savedCart) {
                    cart.value = JSON.parse(savedCart);
                }
            });

            const addToCart = (item) => {
                const found = cart.value.find((cartItem) => cartItem.produk_id === item.produk_id);
                if (found) {
                    found.quantity++;
                } else {
                    cart.value.push({
                        ...item,
                        quantity: 1
                    });
                }

                // Simpan data keranjang ke localStorage
                localStorage.setItem('cart', JSON.stringify(cart.value));

                // Tampilkan notifikasi
                alert(`${item.produk_name} berhasil ditambahkan ke keranjang!`);
            };

            const sortedItems = computed(() => {
                return itemsProduk.value.slice().sort((a, b) => a.produk_name.localeCompare(b
                    .produk_name));
            });

            // Menghitung total halaman
            const totalPages = computed(() => Math.ceil(sortedItems.value.length / itemsPerPage));

            // Mendapatkan item yang akan ditampilkan pada halaman saat ini
            const paginatedItems = computed(() => {
                const start = (currentPage.value - 1) * itemsPerPage;
                const end = start + itemsPerPage;
                return filteredItems.value.slice(start, end);
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
                window.location.href = '/cart'; // Bisa juga menggunakan Inertia.js navigasi
            };
            const isFiltering = ref(false);
            const currentView = ref < string | null > (null);
            const setFilter = (view) => {
                if (view) {
                    currentView.value = view; // Atur komponen yang akan ditampilkan
                    isFiltering.value = true; // Aktifkan status filtering
                    currentPage.value = 1;
                } else {
                    currentView.value = null; // Hapus filter
                    isFiltering.value = false; // Nonaktifkan status filtering
                    currentPage.value = 1;
                }
            };

            // Fungsi untuk menangani error gambar
            const handleImageError = (e) => {
                e.target.src = '/images/default-product.png'; // Ganti dengan path gambar default
            };

            // Fungsi untuk memotong teks
            const truncateText = (text, length) => {
                if (!text) return '';
                return text.length > length ? text.substring(0, length) + '...' : text;
            };

            return {
                items,
                // allItems,
                isFiltering,
                currentView,
                setFilter,
                itemsProduk,
                paginatedItems,
                currentPage,
                totalPages,
                previousPage,
                nextPage,
                cart,
                addToCart,
                goToCart,
                searchQuery,
                filteredItems,
                truncateText,

            };
        },
    });

</script>


<style scoped>
    .size-full {
        width: 100%;
        height: 100%;
    }

    /* Tambahkan style untuk hover tooltip */
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
