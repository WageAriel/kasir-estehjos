<script setup>
import { defineProps, ref } from 'vue';
import { useForm, router } from '@inertiajs/vue3';

const props = defineProps({
    transaksi: {
        type: Array,
        default: () => [],
    },
    produk: {
        type: Array,
        default: () => [],
    },
    successMessage: {
        type: String,
        default: '',
    }
});

const isDetailModalOpen = ref(false);
const selectedProducts = ref([]);

const form = useForm({
    transaksi_id: '',
    tanggal_transaksi: '',
    total_jumlah: '',
    metode_pembayaran: '',
    kembalian: '',
    products: []
});

function openDetailModal(transaksiData) {
    form.transaksi_id = transaksiData.transaksi_id;
    form.tanggal_transaksi = transaksiData.tanggal_transaksi;
    form.total_jumlah = transaksiData.total_jumlah;
    form.metode_pembayaran = transaksiData.metode_pembayaran;
    form.kembalian = transaksiData.kembalian;

    selectedProducts.value = transaksiData.detail_transaksi.map(detail => ({
        produk_name: detail.produk.produk_name,
        jumlah: detail.jumlah,
        subtotal: detail.subtotal
    }));

    isDetailModalOpen.value = true;
}

function destroy(transaksi_id) {
    if (confirm("Apakah Anda yakin ingin menghapus transaksi ini?")) {
        router.delete(`/dashboard/transaksi/${transaksi_id}`);
    }
}
</script>

<template>
    <div class="container mx-auto mt-6">
        <h1 class="text-2xl font-semibold">Daftar Transaksi</h1>

        <div v-if="successMessage" class="mt-4 p-4 bg-green-100 text-green-700 border border-green-300 rounded">
            {{ successMessage }}
        </div>

        <table class="table-auto w-full border-collapse border border-gray-200">
            <thead>
                <tr>
                    <th class="border px-4 py-2">Tanggal Transaksi</th>
                    <th class="border px-4 py-2">Jumlah Produk</th>
                    <th class="border px-4 py-2">Total</th>
                    <th class="border px-4 py-2">Metode Pembayaran</th>
                    <th class="border px-4 py-2">Kembalian</th>
                    <th class="border px-4 py-2">Aksi</th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="transaksiData in transaksi" :key="transaksiData.transaksi_id">
                    <td class="border px-4 py-2">{{ transaksiData.tanggal_transaksi }}</td>
                    <td class="border px-4 py-2">{{ transaksiData.detail_transaksi.length }} produk</td>
                    <td class="border px-4 py-2">Rp{{ transaksiData.total_jumlah }}</td>
                    <td class="border px-4 py-2">{{ transaksiData.metode_pembayaran }}</td>
                    <td class="border px-4 py-2">Rp{{ transaksiData.kembalian }}</td>
                    <td class="border px-4 py-2">
                        <button @click="openDetailModal(transaksiData)"
                            class="px-4 py-2 text-blue-600 hover:text-blue-800">Detail</button>
                        <button @click="destroy(transaksiData.transaksi_id)"
                            class="px-4 py-2 text-red-600 hover:text-red-800 ml-2">Hapus</button>
                    </td>
                </tr>
            </tbody>
        </table>

        <!-- Detail Modal -->
        <div v-if="isDetailModalOpen" class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center">
            <div class="bg-white p-6 rounded-lg w-full max-w-2xl">
                <h2 class="text-xl font-semibold mb-4">Detail Transaksi</h2>

                <div class="space-y-4">
                    <!-- Product Details -->
                    <div v-for="product in selectedProducts" :key="product.produk_name" class="flex justify-between">
                        <span>{{ product.produk_name }}</span>
                        <span>{{ product.jumlah }} x Rp{{ product.subtotal / product.jumlah }}</span>
                        <span class="font-semibold">Rp{{ product.subtotal }}</span>
                    </div>
                    <!-- Close Button -->
                    <div class="flex justify-end mt-6">
                        <button @click="isDetailModalOpen = false"
                            class="px-4 py-2 border rounded-md hover:bg-gray-100">
                            Tutup
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
