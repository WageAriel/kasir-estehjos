<script setup>
import {
    reactive,
    watch,
    ref
} from 'vue';
import { router } from '@inertiajs/vue3';
import axios from 'axios';

const props = defineProps({
    products: {
        type: Array,
        required: true
    },
    isModalOpen: Boolean,
    totalPayment: Number // Properti totalPayment diterima dari parent
});

const emit = defineEmits(['close-modal','clear-cart']);
const showConfirmationModal = ref(false);

const form = reactive({
    totalPayment: 0,
    amountGiven: 0,
    change: 0,
    customer_name: '',
    payment_proof: null
});

// Sinkronisasi totalPayment dari props ke form.totalPayment
watch(() => props.totalPayment, (newValue) => {
    form.totalPayment = newValue;
});

// Fungsi untuk menutup modal
function closeModal() {
    emit('close-modal');
}

function handleFileUpload(event) {
    form.payment_proof = event.target.files[0];
}

// Fungsi untuk menampilkan modal konfirmasi
function showConfirmation() {
    emit('close-modal');
    showConfirmationModal.value = true;
}

// Fungsi untuk menyimpan transaksi final
async function finalizeTransaction() {
    try {
        // Validasi input
        if (!form.customer_name || !form.payment_proof) {
            alert('Mohon lengkapi nama dan bukti pembayaran');
            return;
        }

        const formData = new FormData();
formData.append('customer_name', form.customer_name);
formData.append('payment_proof', form.payment_proof);

        // Konversi tanggal ke format 'Y-m-d H:i:s'
        const now = new Date();
        const formattedDate = now.getFullYear() + '-' +
                            String(now.getMonth() + 1).padStart(2, '0') + '-' +
                            String(now.getDate()).padStart(2, '0') + ' ' +
                            String(now.getHours()).padStart(2, '0') + ':' +
                            String(now.getMinutes()).padStart(2, '0') + ':' +
                            String(now.getSeconds()).padStart(2, '0');

        formData.append('tanggal_transaksi', formattedDate);
        formData.append('total_jumlah', form.totalPayment);
        formData.append('metode_pembayaran', 'QRIS');
        formData.append('kembalian', 0);


        // Append products data
        props.products.forEach((product, index) => {
            formData.append(`products[${index}][produk_id]`, product.produk_id);
            formData.append(`products[${index}][jumlah]`, product.quantity);
            formData.append(`products[${index}][subtotal]`, product.quantity * product.harga);
        });

        console.log('Sending data:', Object.fromEntries(formData)); // Untuk debugging

        const response = await axios.post(route('transaksi.store'), formData, {
            headers: {
                'Content-Type': 'multipart/form-data'
            }
        });

        console.log('Response:', response.data); // Untuk debugging

        if (response.data.success) {
            // Kurangi stok
            await router.post(route('produk.reduce-stock'), {
                products: props.products.map(product => ({
                    produk_id: product.produk_id,
                    quantity: product.quantity
                }))
            });

            emit('clear-cart');
            showConfirmationModal.value = false;
            alert('Transaksi berhasil!');
        } else {
            throw new Error(response.data.message || 'Terjadi kesalahan');
        }
    } catch (error) {
        console.error('Transaction error:', error);
        alert(error.response?.data?.message || 'Gagal menyimpan transaksi!');
    }
}
</script>


<template>
    <!-- Modal Pembayaran -->
    <div v-if="isModalOpen" class="fixed inset-0 flex items-center justify-center bg-gray-900 bg-opacity-75 z-50">
        <div class="bg-white rounded-lg p-5 w-full max-w-md">
            <h4 class="text-lg font-semibold mb-4">Pembayaran</h4>
            <div class="mb-4 flex justify-center items-center border border-gray-300 rounded-lg p-4">
                <img src="@/Assets/images/Barcode Qris.jpeg" alt="QRIS Barcode" class="w-96 h-96 object-contain">
            </div>

            <div class="mb-4">
                <label class="block text-sm font-medium text-gray-700">Total Pembayaran</label>
                <input type="number" v-model="form.totalPayment" class="mt-1 p-2 w-full border rounded" disabled />
            </div>

            <div class="flex justify-end space-x-2">
                <button type="button" @click="closeModal"
                    class="px-4 py-2 text-sm font-medium text-gray-500 bg-gray-200 rounded">
                    Cancel
                </button>
                <button @click="showConfirmation"
                    class="px-4 py-2 text-sm font-medium text-white bg-blue-600 rounded">
                    Confirm
                </button>
            </div>
        </div>
    </div>

    <!-- Modal Konfirmasi -->
    <div v-if="showConfirmationModal" class="fixed inset-0 flex items-center justify-center bg-gray-900 bg-opacity-75 z-50">
        <div class="bg-white rounded-lg p-5 w-full max-w-md">
            <h4 class="text-lg font-semibold mb-4">Konfirmasi Pembayaran</h4>

            <form @submit.prevent="finalizeTransaction">
                <!-- Nama Customer -->
                <div class="mb-4">
                    <label class="block text-sm font-medium text-gray-700">Nama Customer</label>
                    <input
                        type="text"
                        v-model="form.customer_name"
                        class="mt-1 p-2 w-full border rounded"
                        required
                    />
                </div>

                <!-- Upload Bukti Pembayaran -->
                <div class="mb-4">
                    <label class="block text-sm font-medium text-gray-700">Upload Bukti Pembayaran</label>
                    <input
                        type="file"
                        @change="handleFileUpload"
                        accept="image/*"
                        class="mt-1 p-2 w-full border rounded"
                        required
                    />
                </div>

                <!-- Total Pembelian -->
                <div class="mb-4">
                    <label class="block text-sm font-medium text-gray-700">Total Pembelian</label>
                    <input
                        type="number"
                        v-model="form.totalPayment"
                        class="mt-1 p-2 w-full border rounded"
                        disabled
                    />
                </div>

                <!-- Buttons -->
                <div class="flex justify-end space-x-2">
                    <button
                        type="button"
                        @click="showConfirmationModal = false"
                        class="px-4 py-2 text-sm font-medium text-gray-500 bg-gray-200 rounded"
                    >
                        Back
                    </button>
                    <button
                        type="submit"
                        class="px-4 py-2 text-sm font-medium text-white bg-green-600 rounded"
                    >
                        Finalize Transaction
                    </button>
                </div>
            </form>
        </div>
    </div>
</template>


<style>
    /* Styling khusus untuk printer thermal */
    @media print {
        body {
            width: 58mm;
            /* Lebar standar printer thermal 58mm */
            margin: 0 auto;
        }

        .receipt-content {
            font-family: monospace;
            font-size: 12px;
            text-align: left;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th,
        td {
            padding: 2px 0;
        }

        th {
            font-weight: bold;
        }

        td:last-child {
            text-align: right;
        }

        hr {
            border: 0;
            border-top: 1px dashed #000;
            margin: 5px 0;
        }
    }

</style>
