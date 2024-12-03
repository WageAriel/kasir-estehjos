<template>
    <section class="flex flex-col px-11 pt-10 pb-11 bg-white border border-gray-400 max-w-[490px] max-md:px-5">
        <!-- Header Section -->
        <header
            class="flex gap-10 justify-between items-center pb-2 w-full text-2xl font-semibold leading-10 text-slate-950">
            <h1>Pesanan</h1>
            <!-- <img loading="lazy" src="@/Assets/images/esteh" alt="User Icon" class="w-[30px] rounded-full" /> -->
        </header>

        <!-- Order Items Section -->
        <main class="flex flex-col items-center mt-6 w-full max-w-[400px]">
            <div v-for="(item, index) in orderItems" :key="index"
                class="px-0.5 py-1.5 w-full mb-8 border border-gray-300 rounded-md">
                <div class="flex gap-5 max-md:flex-col">
                    <div class="w-[24%]">
                        <img :src="item.imageSrc" :alt="item.name" class="object-contain aspect-square w-[90px]" />
                    </div>
                    <div class="flex flex-col ml-5 w-[76%]">
                        <div class="text-lg">
                            <div class="flex justify-between text-sm font-light w-[280px]">
                                <span class="text-neutral-900">{{ item.name }}</span>
                                <span class="text-right text-gray-500">{{ item.quantity }} x</span>
                            </div>
                            <div class="mt-2 font-semibold uppercase text-neutral-900">{{ item.description }}</div>
                            <div class="font-bold text-right text-neutral-900 w-[280px]">{{ item.price }}</div>
                        </div>
                    </div>
                    <div class="flex items-center gap-2">
                        <button @click="decreaseQuantity(index)" aria-label="Decrease quantity" class="w-8">
                        </button>
                        <span>{{ item.quantity }}</span>
                        <button @click="increaseQuantity(index)" aria-label="Increase quantity" class="w-8">
                            <img src="" alt="Increase" />
                        </button>
                        <button @click="removeItem(index)" aria-label="Remove item" class="w-8 rounded-full">
                            <img src="" alt="Remove" />
                        </button>
                    </div>
                </div>
            </div>

            <!-- Order Summary Total Section -->
            <section class="flex flex-col mt-8 w-full">
                <div class="flex gap-10 justify-between py-2 text-lg">
                    <span>Subtotal</span>
                    <span class="font-bold text-right">{{ subtotal }}</span>
                </div>
                <div class="flex gap-10 justify-between py-2 text-lg text-neutral-900">
                    <span>Shipping</span>
                    <span class="font-bold text-right text-green-700">{{ shipping }}</span>
                </div>
                <div class="flex gap-10 justify-between py-2 text-lg text-neutral-900">
                    <span>Discount</span>
                    <span class="font-bold text-right">{{ discount }}</span>
                </div>
                <div class="flex gap-10 justify-between py-2 text-lg text-neutral-900">
                    <span>Tax</span>
                    <span class="font-bold text-right">{{ tax }}</span>
                </div>
                <div class="w-full border-t mt-2 pt-2"></div>
                <div class="flex gap-10 justify-between py-2 text-2xl font-bold text-neutral-900">
                    <span>Total</span>
                    <span>{{ total }}</span>
                </div>
            </section>
        </main>
    </section>
</template>

<script>
    export default {
        name: 'OrderSummary',
        data() {
            return {
                // orderItems: [
                //   {
                //     imageSrc: '',
                //     name: 'esteh',
                //     quantity: 1,
                //     description: 'LOREM IPSUM',
                //     price: 'Rp xxx.xxx',
                //   },
                //   {
                //     imageSrc: '',
                //     name: 'esteh',
                //     quantity: 1,
                //     description: 'LOREM IPSUM',
                //     price: 'Rp xxx.xxx',
                //   },
                // ],
                // subtotal: 'Rp xxx.xxx',
                // shipping: 'FREE',
                // discount: '-',
                // tax: '-',
                // total: 'Rp xxx.xxx',
            };
        },
        methods: {
            decreaseQuantity(index) {
                if (this.orderItems[index].quantity > 1) {
                    this.orderItems[index].quantity -= 1;
                }
            },
            increaseQuantity(index) {
                this.orderItems[index].quantity += 1;
            },
            removeItem(index) {
                this.orderItems.splice(index, 1);
            },
        },
    };

</script>
