<template>
    <div class="flex flex-col mt-8 max-md:max-w-full">
        <!-- Grid Produk -->
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
            <article v-for="item in paginatedItems" :key="item.id"
                class="flex flex-col p-5 border border-solid border-stone-200 min-w-[240px] w-[360px]">
                <div data-layername="foto"
                    class="flex flex-col w-80 max-w-full text-base text-center lowercase whitespace-nowrap text-stone-200">
                    <div class="flex relative flex-col items-start pb-40 w-full aspect-[0.958] max-md:pr-5 max-md:pb-24">
                        <img loading="lazy" :src="item.image" :alt="item.name"
                            class="object-cover absolute inset-0 size-full" />
                        <div class="flex relative flex-col items-start mb-0 max-w-full min-h-[180px] w-[129px] max-md:mb-2.5">
                            <div v-if="item.sale" class="gap-2.5 self-stretch px-4 py-1.5 bg-yellow-600 min-h-[32px]">
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
import { defineComponent, ref, computed } from "vue";

// Impor gambar
import Aqua from "@/Assets/images/Minuman/Aqua.png";
import C1000 from "@/Assets/images/Minuman/C1000.png";
import EstehJozz from "@/Assets/images/Minuman/EstehJozz.png";
import EstehSirup from "@/Assets/images/Minuman/EstehSirup.png";
import EstehSusu from "@/Assets/images/Minuman/EstehSusu.png";
import Floridina from "@/Assets/images/Minuman/Floridina.png";
import Golda from "@/Assets/images/Minuman/Golda.png";
import GoodDay from "@/Assets/images/Minuman/GoodDay.png";
import Hydro from "@/Assets/images/Minuman/Hydro.png";
import IsoPlus from "@/Assets/images/Minuman/IsoPlus.png";
import KopiAbc from "@/Assets/images/Minuman/KopiAbc.png";
import LeMineral from "@/assets/images/Minuman/LeMineral.png";
import Pocari from "@/assets/images/Minuman/Pocari.png";
import PureLife from "@/assets/images/Minuman/PureLife.png";

// Definisikan tipe untuk produk
interface Product {
    id: number;
    name: string;
    image: string;
    price: string;
    sale: boolean;
    bestseller: boolean;
}

export default defineComponent({
    setup() {
        // Data produk
        const items: Product[] = [
            { id: 1, name: "Aqua", image: Aqua, price: "3.000", sale: false, bestseller: false },
            { id: 2, name: "C1000", image: C1000, price: "6.000", sale: true, bestseller: true },
            { id: 3, name: "Esteh Jozz", image: EstehJozz, price: "4.000", sale: false, bestseller: true },
            { id: 4, name: "Esteh Sirup", image: EstehSirup, price: "3.500", sale: true, bestseller: false },
            { id: 5, name: "Esteh Susu", image: EstehSusu, price: "5.000", sale: false, bestseller: false },
            { id: 6, name: "Floridina", image: Floridina, price: "3.000", sale: true, bestseller: false },
            { id: 7, name: "Golda", image: Golda, price: "5.500", sale: false, bestseller: false },
            { id: 8, name: "Good Day", image: GoodDay, price: "4.500", sale: true, bestseller: true },
            { id: 9, name: "Hydro", image: Hydro, price: "4.000", sale: false, bestseller: false },
            { id: 10, name: "Iso Plus", image: IsoPlus, price: "5.000", sale: true, bestseller: false },
            { id: 11, name: "Kopi Abc", image: KopiAbc, price: "3.500", sale: false, bestseller: true },
            { id: 12, name: "Le Mineral", image: LeMineral, price: "3.000", sale: false, bestseller: false },
            { id: 13, name: "Pocari", image: Pocari, price: "6.000", sale: true, bestseller: true },
            { id: 14, name: "Pure Life", image: PureLife, price: "5.500", sale: false, bestseller: false },
        ];

        const itemsPerPage = 12;
        const currentPage = ref(1);

        // Menghitung total halaman
        const totalPages = computed(() => Math.ceil(items.length / itemsPerPage));

        // Mendapatkan item yang akan ditampilkan pada halaman saat ini
        const paginatedItems = computed(() => {
            const start = (currentPage.value - 1) * itemsPerPage;
            const end = start + itemsPerPage;
            return items.slice(start, end);
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
