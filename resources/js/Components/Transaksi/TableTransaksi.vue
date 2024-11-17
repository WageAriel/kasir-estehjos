<script setup>
    import {
        defineProps,
        ref
    } from 'vue';
    import {
        useForm,
        router
    } from '@inertiajs/vue3';

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
    const selectedProducts = ref([{
        produk_id: null,
        jumlah: 1,
        subtotal: 0
    }]);

    const form = useForm({
        transaksi_id: '',
        tanggal_transaksi: '',
        total_jumlah: '',
        metode_pembayaran: '',
        kembalian: '',
        products: []
    });

    function addProduct() {
        selectedProducts.value.push({
            produk_id: null,
            jumlah: 1,
            subtotal: 0
        });
    }

    function removeProduct(index) {
        selectedProducts.value.splice(index, 1);
    }

    function calculateSubtotal(product, index) {
        const selectedProduk = props.produk.find(p => p.produk_id === product.produk_id);
        if (selectedProduk) {
            selectedProducts.value[index].subtotal = selectedProduk.harga * product.jumlah;
            updateTotalJumlah();
        }
    }

    function updateTotalJumlah() {
        form.total_jumlah = selectedProducts.value.reduce((total, product) => {
            return total + (product.subtotal || 0);
        }, 0);
    }

    function submit() {
        form.products = selectedProducts.value;
        form.post('/dashboard/transaksi', {
            onSuccess: () => {
                isDetailModalOpen.value = false;
                selectedProducts.value = [{
                    produk_id: null,
                    jumlah: 1,
                    subtotal: 0
                }];
                form.reset();
            }
        });
    }

    function destroy(transaksi_id) {
        if (confirm("Apakah Anda yakin ingin menghapus transaksi ini?")) {
            router.delete(`/dashboard/transaksi/${transaksi_id}`);
        }
    }

    function openDetailModal(transaksiData) {
        form.transaksi_id = transaksiData.transaksi_id;
        form.tanggal_transaksi = transaksiData.tanggal_transaksi;
        form.total_jumlah = transaksiData.total_jumlah;
        form.metode_pembayaran = transaksiData.metode_pembayaran;
        form.kembalian = transaksiData.kembalian;

        selectedProducts.value = transaksiData.detail_transaksi.map(detail => ({
            produk_id: detail.produk_id,
            jumlah: detail.jumlah,
            subtotal: detail.subtotal
        }));

        isDetailModalOpen.value = true;
    }

</script>

<template>
    <div class="container mx-auto mt-6">
        <h1 class="text-2xl font-semibold">Daftar Transaksi</h1>

        <div v-if="successMessage" class="mt-4 p-4 bg-green-100 text-green-700 border border-green-300 rounded">
            {{ successMessage }}
        </div>

        <table class="min-w-full mt-4 table-auto border-collapse border border-gray-200">
            <thead>
                <tr>
                    <th class="border px-4 py-2">Tanggal Transaksi</th>
                    <th class="border px-4 py-2">Produk</th>
                    <th class="border px-4 py-2">Total</th>
                    <th class="border px-4 py-2">Metode Pembayaran</th>
                    <th class="border px-4 py-2">Kembalian</th>
                    <th class="border px-4 py-2">Aksi</th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="transaksiData in transaksi" :key="transaksiData.transaksi_id">
                    <td class="border px-4 py-2">{{ transaksiData.tanggal_transaksi }}</td>
                    <td class="border px-4 py-2">
                        <div v-for="detail in transaksiData.detail_transaksi" :key="detail.id">
                            {{ detail.produk.produk_name }} ({{ detail.jumlah }}) - Rp{{ detail.subtotal }}
                        </div>
                    </td>
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

        <!-- Form Modal -->
        <div v-if="isDetailModalOpen" class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center">
            <div class="bg-white p-6 rounded-lg w-full max-w-2xl">
                <h2 class="text-xl font-semibold mb-4">Detail Transaksi</h2>

                <div class="space-y-4">
                    <!-- Product Selection -->
                    <div v-for="(product, index) in selectedProducts" :key="index" class="space-y-2">
                        <div class="flex space-x-4">
                            <select v-model="product.produk_id" @change="calculateSubtotal(product, index)"
                                class="border rounded px-2 py-1 w-1/3">
                                <option value="">Pilih Produk</option>
                                <option v-for="p in produk" :key="p.produk_id" :value="p.produk_id">
                                    {{ p.produk_name }} - Rp{{ p.harga }}
                                </option>
                            </select>

                            <input type="number" v-model="product.jumlah" @input="calculateSubtotal(product, index)"
                                class="border rounded px-2 py-1 w-24" min="1">

                            <div class="flex items-center">
                                Subtotal: Rp{{ product.subtotal }}
                            </div>

                            <button @click="removeProduct(index)" class="text-red-600 hover:text-red-800"
                                :disabled="selectedProducts.length === 1">
                                Hapus
                            </button>
                        </div>
                    </div>

                    <button @click="addProduct" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">
                        Tambah Produk
                    </button>

                    <!-- Other Transaction Details -->
                    <div class="grid grid-cols-2 gap-4">
                        <div>
                            <label class="block text-sm font-medium text-gray-700">Tanggal Transaksi</label>
                            <input type="date" v-model="form.tanggal_transaksi"
                                class="mt-1 block w-full border rounded-md shadow-sm">
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-700">Metode Pembayaran</label>
                            <select v-model="form.metode_pembayaran"
                                class="mt-1 block w-full border rounded-md shadow-sm">
                                <option value="cash">Cash</option>
                                <option value="debit">Debit</option>
                                <option value="credit">Credit</option>
                            </select>
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-700">Total</label>
                            <input type="number" v-model="form.total_jumlah" readonly
                                class="mt-1 block w-full border rounded-md shadow-sm bg-gray-100">
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-700">Kembalian</label>

                            <input type="number" v-model="form.kembalian"
                                class="mt-1 block w-full border rounded-md shadow-sm">
                        </div>
                    </div>

                    <!-- Action Buttons -->
                    <div class="flex justify-end space-x-4 mt-6">
                        <button @click="isDetailModalOpen = false"
                            class="px-4 py-2 border rounded-md hover:bg-gray-100">
                            Batal
                        </button>
                        <button @click="submit" class="px-4 py-2 bg-blue-500 text-white rounded-md hover:bg-blue-600">
                            Simpan
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<style scoped>
    .modal-mask {
        position: fixed;
        z-index: 9998;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background-color: rgba(0, 0, 0, .5);
        transition: opacity .3s ease;
    }

    .modal-container {
        max-height: 90vh;
        overflow-y: auto;
    }

</style>
