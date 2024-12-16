<script setup>
import {
    reactive,
    watch
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

const form = reactive({
    totalPayment: 0,
    amountGiven: 0,
    change: 0
});

// Sinkronisasi totalPayment dari props ke form.totalPayment
watch(() => props.totalPayment, (newValue) => {
    form.totalPayment = newValue;
});

// Fungsi untuk menutup modal
function closeModal() {
    emit('close-modal');
}

// Fungsi untuk menyimpan transaksi dan mencetak struk
async function printReceipt() {
    try {
        // Persiapkan data transaksi sesuai dengan format yang diharapkan
        const transactionData = {
            tanggal_transaksi: new Date().toISOString(),
            total_jumlah: form.totalPayment,
            metode_pembayaran: 'QRIS',
            kembalian: 0,
            products: props.products.map(product => ({
                produk_id: product.produk_id,
                jumlah: product.quantity,
                subtotal: product.quantity * product.harga
            }))
        };

        // Gunakan route yang sudah ada
        const response = await axios.post(route('transaksi.store'), transactionData);

        if (response.data) {
            // Kurangi stok produk
            router.post(route('produk.reduce-stock'), {
                products: props.products.map(product => ({
                    produk_id: product.produk_id,
                    quantity: product.quantity
                }))
            }, {
                onSuccess: () => {
                    emit('clear-cart');
                    closeModal();
                    alert('Transaksi berhasil!');
                },
                onError: (errors) => {
                    console.error('Stock reduction error:', errors);
                    alert('Gagal mengurangi stok produk!');
                }
            });
        }
    } catch (error) {
        console.error('Transaction error:', error);
        alert('Gagal menyimpan transaksi!');
    }
}
</script>


<template>
    <div v-if="isModalOpen" class="fixed inset-0 flex items-center justify-center bg-gray-900 bg-opacity-75 z-50">
        <div class="bg-white rounded-lg p-5 w-full max-w-md">
            <h4 class="text-lg font-semibold mb-4">Pembayaran</h4>
            <form @submit.prevent="printReceipt">
                <!-- QRIS Barcode -->
                <div class="mb-4 flex justify-center items-center border border-gray-300 rounded-lg p-4">
                    <img src="@/Assets/images/Barcode Qris.jpeg" alt="QRIS Barcode">
                </div>

                <!-- Total Pembayaran -->
                <div class="mb-4">
                    <label for="totalPayment" class="block text-sm font-medium text-gray-700">Total Pembayaran</label>
                    <input type="number" v-model="form.totalPayment" id="totalPayment"
                        class="mt-1 p-2 w-full border rounded" disabled />
                </div>

                <!-- Buttons -->
                <div class="flex justify-end space-x-2">
                    <button type="button" @click="closeModal"
                        class="px-4 py-2 text-sm font-medium text-gray-500 bg-gray-200 rounded">Cancel</button>
                    <button type="submit"
                        class="px-4 py-2 text-sm font-medium text-white bg-blue-600 rounded">Confirm</button>
                </div>
            </form>

            <!-- Receipt (Hidden for UI, used for printing) -->
            <div id="receipt" class="hidden">
                <div class="receipt-content">
                    <h2 class="font-bold text-center">Toko Sumber Berkat</h2>
                    <p class="text-center">Jln Kelud Selatan no.6 Joglo, Banjarsari, Surakarta</p>
                    <p class="text-center">Telp: (0271) 852591</p>
                    <hr />
                    <p><strong>Tanggal:</strong> {{ new Date().toLocaleString() }}</p>
                    <hr />
                    <p><strong>Daftar Belanja:</strong></p>
                    <table style="width: 100%; font-size: 12px; text-align: left; border-collapse: collapse;">
                        <thead>
                            <tr>
                                <th style="width: 70%;">Description</th>
                                <th style="width: 30%; text-align: right;">Total</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr v-for="product in props.products" :key="product.produk_id"
                                style="border-bottom: 1px dashed #000;">
                                <td>
                                    {{ product.quantity }} x {{ product.produk_name }}
                                    ({{ new Intl.NumberFormat('id-ID', { style: 'currency', currency: 'IDR' }).format(product.harga) }})
                                </td>
                                <td style="text-align: right;">
                                    {{ new Intl.NumberFormat('id-ID', { style: 'currency', currency: 'IDR' }).format(product.quantity * product.harga) }}
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    <hr />
                    <div>
                        <p style="text-align: right;"><strong>Total:</strong> Rp
                            {{ form.totalPayment.toLocaleString() }}</p>
                    </div>
                    <hr />
                    <p class="text-center">Terima kasih atas kunjungan Anda!</p>
                    <p class="text-center">--- Simpan struk ini sebagai bukti ---</p>
                </div>
            </div>
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
