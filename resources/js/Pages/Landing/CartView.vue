<template>
    <MainLayout>
        <div class="flex flex-col px-20 w-full mb-[100px] max-md:px-5 max-md:max-w-full">
            <main class="mt-7 max-md:max-w-full">
                <div class="flex gap-5 max-md:flex-col">
                    <!-- Cart items section -->
                    <section class="flex flex-col w-[67%] max-md:ml-0 max-md:w-full">
                        <div class="flex flex-col max-md:mt-10 max-md:max-w-full">
                            <h2 class="text-2xl font-semibold leading-10 text-slate-950 max-md:max-w-full">
                                Pesanan
                            </h2>

                            <!-- Cart items loop -->
                            <article v-for="item in cart" :key="item.produk_id"
                                class="flex flex-col justify-center items-end px-8 py-10 mt-4 w-full border border-gray-400 border-solid max-w-[1010px] min-h-[180px] max-md:px-5 max-md:max-w-full">
                                <div
                                    class="flex flex-wrap gap-10 justify-between items-center w-full max-w-[930px] max-md:max-w-full">
                                    <img
                                        v-if="item.gambar"
                                        :src="`/storage/${item.gambar}`"
                                        :alt="item.produk_name"
                                        class="object-contain shrink-0 self-stretch my-auto aspect-square w-[100px]"
                                    />
                                    <div class="flex flex-col self-stretch my-auto min-w-[240px] w-[344px]">
                                        <h3 class="text-lg font-semibold uppercase text-neutral-900">
                                            {{ item.produk_name }}</h3>
                                        <p class="text-sm font-light text-[color:var(--,#6E7582)]">{{ item.quantity }} x
                                        </p>
                                    </div>
                                    <p
                                        class="gap-10 self-stretch my-auto text-2xl font-bold text-center text-neutral-900 w-[180px]">
                                        Rp {{ item.harga * item.quantity }}
                                    </p>
                                    <div
                                        class="flex items-start self-stretch p-1 my-auto text-lg font-light tracking-normal leading-7 text-center whitespace-nowrap bg-stone-50 text-neutral-900">
                                        <button aria-label="Decrease quantity" @click="decreaseQuantity(item)"
                                            class="w-[35px]">
                                            <img loading="lazy"
                                                src="https://cdn.builder.io/api/v1/image/assets/d32ba014fd2f43b69edb017a43e6b422/f41028e0a64800d7886db08fe996713f95cc839d7e4ec1649c86731cf8fbb4e0?apiKey=d32ba014fd2f43b69edb017a43e6b422&"
                                                alt="" class="object-contain shrink-0 aspect-square w-[35px]" />
                                        </button>
                                        <span class="w-[35px]">{{ item.quantity }}</span>
                                        <button aria-label="Increase quantity" @click="increaseQuantity(item)"
                                            class="w-[35px]">
                                            <img loading="lazy"
                                                src="https://cdn.builder.io/api/v1/image/assets/d32ba014fd2f43b69edb017a43e6b422/9bdfc3c720c3b644e02588581ae0e74531d6c2c60bc09904c3471deb663e939f?apiKey=d32ba014fd2f43b69edb017a43e6b422&"
                                                alt="" class="object-contain shrink-0 aspect-square w-[35px]" />
                                        </button>
                                    </div>
                                    <button aria-label="Remove item" @click="removeFromCart(item)"
                                        class="self-stretch my-auto">
                                        <img loading="lazy"
                                            src="https://cdn.builder.io/api/v1/image/assets/d32ba014fd2f43b69edb017a43e6b422/23d7dab32ea78268349c01ce09ed44e263438280ffdb1a101f5f08f3643b9413?apiKey=d32ba014fd2f43b69edb017a43e6b422&"
                                            alt="" class="object-contain shrink-0 w-10 aspect-square rounded-[100px]" />
                                    </button>
                                </div>
                            </article>
                        </div>
                    </section>

                    <!-- Order Summary Sidebar -->
                    <aside class="flex flex-col ml-5 w-[33%] max-md:ml-0 max-md:w-full">
                        <div
                            class="flex flex-col px-11 pt-10 pb-11 mx-auto w-full bg-white border border-gray-400 border-solid max-md:px-5 max-md:mt-10 max-md:max-w-full">
                            <div
                                class="flex gap-10 justify-between items-center pb-2 max-w-full text-2xl font-semibold leading-10 whitespace-nowrap h-[42px] text-slate-950 w-[400px]">
                                <h2 class="self-stretch my-auto">Struk</h2>
                            </div>

                            <!-- Cart Item List for Sidebar -->
                            <div class="flex flex-col items-center mt-6 w-full max-w-[400px]">
                                <div v-for="item in cart" :key="item.produk_id" class="px-0.5 py-1.5 w-full">
                                    <div class="flex gap-5 max-md:flex-col">
                                        <div class="flex flex-col w-[24%] max-md:ml-0 max-md:w-full">
                                            <img
                                                v-if="item.gambar"
                                                :src="`/storage/${item.gambar}`"
                                                :alt="item.produk_name"
                                                class="object-contain shrink-0 aspect-square w-[90px] max-md:mt-8"
                                            />
                                        </div>
                                        <div class="flex flex-col ml-5 w-[76%] max-md:ml-0 max-md:w-full">
                                            <div class="flex flex-col w-full text-lg max-md:mt-7">
                                                <div
                                                    class="flex justify-between items-center max-w-full text-sm font-light w-[280px]">
                                                    <p class="self-stretch my-auto text-neutral-900 w-[140px]">
                                                        {{ item.produk_name }}
                                                    </p>
                                                    <p
                                                        class="self-stretch my-auto text-right text-[color:var(--,#6E7582)] w-[140px]">
                                                        {{ item.quantity }} x
                                                    </p>
                                                </div>
                                                <h3 class="mt-2 font-semibold uppercase text-neutral-900">
                                                    {{ item.produk_name }}
                                                </h3>
                                                <p
                                                    class="gap-10 mt-2 max-w-full font-bold text-right text-neutral-900 w-[280px]">
                                                    Rp {{ item.harga * item.quantity }}
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Price Summary -->
                            <div class="flex flex-col mt-8 w-full">
                                <div class="flex flex-col pt-4 pb-2.5 w-full">
                                    <hr
                                        class="w-full border border-solid border-gray-400 border-opacity-50 min-h-[1px]" />
                                </div>
                                <div
                                    class="flex gap-10 justify-between items-start py-2 mt-2 w-full text-lg text-neutral-900">
                                    <p>Subtotal</p>
                                    <p class="font-bold text-right">Rp {{ subtotal }}</p>
                                </div>
                                <div
                                    class="flex gap-10 justify-between items-start py-2 mt-2 w-full text-lg whitespace-nowrap">
                                    <p class="text-neutral-900">Shipping</p>
                                    <p class="font-bold text-right text-green-700">FREE</p>
                                </div>
                                <div class="flex flex-col justify-center py-2.5 mt-2 w-full">
                                    <hr
                                        class="w-full border border-solid border-gray-400 border-opacity-50 min-h-[1px]" />
                                </div>
                                <div class="flex gap-10 justify-between items-center py-2 mt-2 w-full text-neutral-900">
                                    <p class="self-stretch my-auto text-lg">Total</p>
                                    <p class="self-stretch my-auto text-2xl font-bold text-right">
                                        Rp {{ total }}
                                    </p>
                                </div>
                                <div class="flex justify-center mt-4">
                                    <button
                                        @click="openModal"
                                        :disabled="cart.length === 0"
                                        :class="[
                                            'px-6 py-2 text-lg font-semibold rounded-full',
                                            cart.length === 0
                                                ? 'bg-gray-400 cursor-not-allowed'
                                                : 'bg-blue-600 text-white hover:bg-blue-700'
                                        ]"
                                    >
                                        {{ cart.length === 0 ? 'Keranjang Kosong' : 'Konfirmasi Pembayaran' }}
                                    </button>
                                </div>
                            </div>
                        </div>
                    </aside>
                </div>
            </main>
        </div>
    </MainLayout>
    <ModalTransaksi
  :products="cart"
  :isModalOpen="isModalOpen"
  :totalPayment="total"
  @close-modal="closeModal"
  @clear-cart="clearCart"
/>

</template>

<script setup>
    import {
        ref,
        computed,
        onMounted
    } from "vue";
    import MainLayout from '@/ComponentUser/layout/MainLayout.vue';
    import ModalTransaksi from '@/ComponentUser/pemesanan/ModalTransaksi.vue';

    // Sample data for the cart
    const cart = ref([]);

    const isModalOpen = ref(false);

    // Fungsi untuk membuka modal
const openModal = () => {
  isModalOpen.value = true;
};

// Fungsi untuk menutup modal
const closeModal = () => {
  isModalOpen.value = false;
};

const clearCart = () => {
    cart.value = []; // Kosongkan cart
    updateCartInLocalStorage(); // Perbarui localStorage
};

    // Fetching cart data from localStorage
    onMounted(() => {
        const savedCart = localStorage.getItem('cart');
        if (savedCart) {
            cart.value = JSON.parse(savedCart);
            console.log('Cart data:', cart.value); // Untuk debugging
        }
    });

    // Function to decrease quantity
    const decreaseQuantity = (item) => {
        if (item.quantity > 1) {
            item.quantity--;
            updateCartInLocalStorage();
        }
    };

    // Function to increase quantity
    const increaseQuantity = (item) => {
        item.quantity++;
        updateCartInLocalStorage();
    };

    // Function to remove item from cart
    const removeFromCart = (item) => {
        const index = cart.value.indexOf(item);
        if (index > -1) {
            cart.value.splice(index, 1);
            updateCartInLocalStorage();
        }
    };

    // Update cart data in localStorage
    const updateCartInLocalStorage = () => {
        localStorage.setItem('cart', JSON.stringify(cart.value));
    };

    // Calculate Subtotal
    const subtotal = computed(() => {
        return cart.value.reduce((total, item) => total + item.harga * item.quantity, 0);
    });

    // Calculate Total price
    const total = computed(() => {
        return subtotal.value; // You can add shipping, discount, and tax logic here
    });

    // Computed property untuk mengecek apakah cart kosong
    const isCartEmpty = computed(() => {
        return cart.value.length === 0;
    });

</script>

<style scoped>
    /* Tambahkan style untuk button disabled */
    button:disabled {
        opacity: 0.7;
        cursor: not-allowed;
    }

    /* Optional: Tambahkan hover effect hanya untuk button yang tidak disabled */
    button:not(:disabled):hover {
        transform: translateY(-1px);
        transition: transform 0.2s;
    }
</style>
