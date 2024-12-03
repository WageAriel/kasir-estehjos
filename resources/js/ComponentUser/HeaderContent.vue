<template>
    <header class="flex flex-col font-medium uppercase whitespace-nowrap text-neutral-800">
        <nav class="flex justify-between items-center px-16 py-4 w-full bg-white max-md:px-5 max-md:py-3 max-md:max-w-full">
            <div class="flex items-center">
                <img loading="lazy" src="@/assets/images/esteh.jpg" alt="Company Logo" class="object-contain h-10" />
            </div>

            <ul class="flex gap-8 self-stretch my-auto text-lg">
                <Link href="/" class="hover:text-yellow-600">HOME</Link>
                <Link href="/pemesanan" class="hover:text-yellow-600">SHOP</Link>
                <Link href="/featured" class="hover:text-yellow-600">FEATURED</Link>
                <Link href="/contact" class="hover:text-yellow-600">CONTACT</Link>
            </ul>

            <div class="flex items-center gap-5">
                <!-- Cart Icon -->
                <Link href="/cart" aria-label="Shopping Cart" class="flex items-center">
                    <img loading="lazy" src="@/assets/images/Tas.png" alt="Cart Icon"
                        class="object-contain h-9 mt-[10px] transition-transform duration-200 hover:scale-110" />
                </Link>

                <!-- Kondisi untuk tombol Login / Logout -->
                <Link v-if="!auth.user" :href="route('login')" class="px-4 py-2 border border-neutral-800 rounded hover:bg-yellow-200 text-sm">
                    LOGIN
                </Link>
                <Link v-else @click="logout">
                    <button type="submit" class="px-4 py-2 border border-neutral-800 rounded hover:bg-yellow-200 text-sm">
                        LOGOUT
                    </button>
                </Link>
            </div>
        </nav>
    </header>
</template>

<script setup>
    import {
        Link, usePage
    } from '@inertiajs/vue3'
    import { Inertia } from '@inertiajs/inertia';
import { defineProps } from 'vue'

// Menerima prop isAuthenticated yang dikirim dari Laravel
const { auth } = usePage().props;


const logout = () => {
    auth.user = null; // Kosongkan auth.user secara lokal
    Inertia.post(route('logout'), {
        onSuccess: () => {
            Inertia.reload({
                only: ['auth'],
            }); // Pastikan auth terbaru
        },
    });
};
</script>