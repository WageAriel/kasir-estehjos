<template>
    <div class="flex flex-col mt-8 max-md:max-w-full">
        <!-- Grid Produk -->
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
            <article v-for="item in paginatedItems" :key="item.id"
                class="flex flex-col p-5 border border-solid border-stone-200 min-w-[240px] w-[360px]">
                <div data-layername="foto"
                    class="flex flex-col w-80 max-w-full text-base text-center lowercase whitespace-nowrap text-stone-200">
                    <div
                        class="flex relative flex-col items-start pb-40 w-full aspect-[0.958] max-md:pr-5 max-md:pb-24">
                        <img loading="lazy" :src="item.image" :alt="item.name"
                            class="object-cover absolute inset-0 size-full" />
                        <div
                            class="flex relative flex-col items-start mb-0 max-w-full min-h-[180px] w-[129px] max-md:mb-2.5">
                            <div v-if="item.sale" class="gap-2.5 self-stretch px-4 py-1.5 bg-orange-600 min-h-[32px]">
                                Sale
                            </div>
                            <div v-if="item.bestseller"
                                class="gap-2.5 self-stretch px-4 py-1.5 mt-2 bg-pink-700 min-h-[32px]">
                                Bestseller
                            </div>
                        </div>
                    </div>
                </div>
                <div class="flex flex-col items-center mt-6 w-full max-w-xs uppercase text-stone-800">
                    <h3 class="text-xl font-semibold text-center">{{ item.name }}</h3>
                    <div class="flex gap-2 items-center mt-2 text-3xl font-bold whitespace-nowrap">
                        <div class="flex gap-1.5 items-start self-stretch my-auto">
                            <span class="text-center">Rp</span>
                            <span>{{ item.price }}</span>
                        </div>
                    </div>
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
        computed
    } from "vue";
    import Bimoli from "@/assets/images/Sembako/Bimoli.png";
    import GulaPasir from "@/assets/images/Sembako/Gula Pasir.png";
    import indomieAB from "@/assets/images/Sembako/indomie ayam Bwang.png";
    import IndomieGeprek from "@/assets/images/Sembako/Indomie Geprek.png";
    import IndomieGoreng from "@/assets/images/Sembako/Indomie Goreng.png";
    import IndomieRendang from "@/assets/images/Sembako/Indomie Rendang.png";
    import KecapBango from "@/assets/images/Sembako/Kecap Bango.png";
    import Masako from "@/assets/images/Sembako/Masako.png";
    import MieDara from "@/assets/images/Sembako/Mie Dara.png";
    import Rinso from "@/assets/images/Sembako/Rinso.png";
    import SaosSambal from "@/assets/images/Sembako/Saos Sambal.png";
    import Sarden from "@/assets/images/Sembako/Sarden.png";
    import SarimiAyamBawang from "@/assets/images/Sembako/Sarimi 2 Ayam Bawang.png";
    import SarimiBaso from "@/assets/images/Sembako/Sarimi 2 Baso.png";
    import SarimiGoreng from "@/assets/images/Sembako/Sarimi 2 Goreng.png";
    import SariWangi from "@/assets/images/Sembako/SariWangi.png";
    import SedapGoreng from "@/assets/images/Sembako/Sedap Goreng.png";
    import SedapSoto from "@/assets/images/Sembako/Sedap Soto.png";
    import Sunlight from "@/assets/images/Sembako/Sunlight.png";
    import Telur from "@/assets/images/Sembako/Telur.png";
    import TepungBeras from "@/assets/images/Sembako/Tepung Beras.png";

    export default defineComponent({
        setup() {
            // Data produk (15 produk sebagai contoh)
            const items = [{
                    id: 1,
                    name: "Gula Pasir",
                    image: GulaPasir,
                    price: "12.000",
                    sale: false,
                    bestseller: true
                },
                {
                    id: 2,
                    name: "Indomie Ayam Bawang",
                    image: indomieAB,
                    price: "3.500",
                    sale: true,
                    bestseller: false
                },
                {
                    id: 3,
                    name: "Indomie Geprek",
                    image: IndomieGeprek,
                    price: "4.500",
                    sale: true,
                    bestseller: true
                },
                {
                    id: 4,
                    name: "Indomie Goreng",
                    image: IndomieGoreng,
                    price: "3.000",
                    sale: true,
                    bestseller: false
                },
                {
                    id: 5,
                    name: "Indomie Rendang",
                    image: IndomieRendang,
                    price: "4.000",
                    sale: true,
                    bestseller: false
                },
                {
                    id: 6,
                    name: "Kecap Bango",
                    image: KecapBango,
                    price: "5.500",
                    sale: false,
                    bestseller: false
                },
                {
                    id: 7,
                    name: "Masako",
                    image: Masako,
                    price: "7.000",
                    sale: false,
                    bestseller: false
                },
                {
                    id: 8,
                    name: "Mie Dara",
                    image: MieDara,
                    price: "2.500",
                    sale: true,
                    bestseller: false
                },
                {
                    id: 9,
                    name: "Rinso",
                    image: Rinso,
                    price: "10.000",
                    sale: true,
                    bestseller: true
                },
                {
                    id: 10,
                    name: "Saos Sambal",
                    image: SaosSambal,
                    price: "4.000",
                    sale: false,
                    bestseller: false
                },
                {
                    id: 11,
                    name: "Sarden",
                    image: Sarden,
                    price: "8.000",
                    sale: true,
                    bestseller: false
                },
                {
                    id: 12,
                    name: "Sarimi Ayam Bawang",
                    image: SarimiAyamBawang,
                    price: "3.000",
                    sale: true,
                    bestseller: false
                },
                {
                    id: 13,
                    name: "Sarimi Baso",
                    image: SarimiBaso,
                    price: "3.000",
                    sale: true,
                    bestseller: false
                },
                {
                    id: 14,
                    name: "Sarimi Goreng",
                    image: SarimiGoreng,
                    price: "3.500",
                    sale: false,
                    bestseller: false
                },
                {
                    id: 15,
                    name: "Sari Wangi",
                    image: SariWangi,
                    price: "6.000",
                    sale: false,
                    bestseller: false
                },
                {
                    id: 16,
                    name: "Sedap Goreng",
                    image: SedapGoreng,
                    price: "3.500",
                    sale: true,
                    bestseller: true
                },
                {
                    id: 17,
                    name: "Sedap Soto",
                    image: SedapSoto,
                    price: "3.500",
                    sale: false,
                    bestseller: false
                },
                {
                    id: 18,
                    name: "Sunlight",
                    image: Sunlight,
                    price: "9.000",
                    sale: true,
                    bestseller: false
                },
                {
                    id: 19,
                    name: "Telur",
                    image: Telur,
                    price: "27.000",
                    sale: true,
                    bestseller: false
                },
                {
                    id: 20,
                    name: "Tepung Beras",
                    image: TepungBeras,
                    price: "5.500",
                    sale: true,
                    bestseller: false
                },
                {
                    id: 21,
                    name: "Bimoli",
                    image: Bimoli,
                    price: "5.500",
                    sale: true,
                    bestseller: false
                },
            ];

            const itemsPerPage = 12;
            const currentPage = ref(1);

            // Mengurutkan produk berdasarkan nama
            const sortedItems = computed(() => {
                return items.slice().sort((a, b) => a.name.localeCompare(b.name));
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

            return {
                items,
                paginatedItems,
                currentPage,
                totalPages,
                previousPage,
                nextPage,
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