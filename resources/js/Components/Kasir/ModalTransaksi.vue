<script setup>
    import {
        defineProps,
        reactive,
        watch
    } from 'vue';
    import { router } from '@inertiajs/vue3';

    const props = defineProps({
        products: {
            type: Array,
            required: true
        },
        isModalOpen: Boolean,
        totalPayment: Number // Properti totalPayment diterima dari parent
    });

    const emit = defineEmits(['close-modal']);

    const form = reactive({
        paymentMethod: 'Cash',
        totalPayment: 0,
        amountGiven: 0,
        change: 0
    });

    // Sinkronisasi totalPayment dari props ke form.totalPayment
    watch(() => props.totalPayment, (newValue) => {
        form.totalPayment = newValue;
    });

    // Hitung kembalian secara otomatis saat amountGiven berubah
    watch(() => form.amountGiven, () => {
        calculateChange();
    });

    function closeModal() {
        emit('close-modal');
    }

    function calculateChange() {
        if (form.paymentMethod === 'Cash') {
            form.change = form.amountGiven - form.totalPayment;
        } else {
            form.change = 0;
        }
    }

    function handleConfirmTransaction() {
        // Membuat objek transaksi
        const transaction = {
            tanggal_transaksi: new Date().toISOString().split('T')[0],
            total_jumlah: form.totalPayment,
            metode_pembayaran: form.paymentMethod,
            kembalian: form.change,
            products: props.products.map(product => ({
                produk_id: product.produk_id,
                jumlah: product.quantity,
                subtotal: product.harga * product.quantity
            }))
        };

        // Kirim data transaksi ke server menggunakan route transaksi.store
        router.post(route('transaksi.store'), transaction, {
            onSuccess: () => {
                // Cetak struk menggunakan fungsi printReceipt yang sudah ada
                printReceipt();
                closeModal();
            },
            onError: (errors) => {
                console.error('Transaction error:', errors);
            },
            preserveScroll: true // Tambahkan ini agar scroll position tetap
        });
    }

    function printReceipt() {
        const printContent = document.getElementById('receipt').innerHTML;
        const originalContent = document.body.innerHTML;
        document.body.innerHTML = printContent;
        window.print();
        document.body.innerHTML = originalContent;

        // Reduce stock after printing
        router.post(route('produk.reduce-stock'), {
            products: props.products.map(product => ({
                produk_id: product.produk_id,
                quantity: product.quantity
            }))
        }, {
            onSuccess: () => {
                closeModal();
            },
            onError: (errors) => {
                console.error('Stock reduction error:', errors);
                // Optionally show error to user
            }
        });
    }

</script>

<template>
    <div v-if="isModalOpen" class="fixed inset-0 flex items-center justify-center bg-gray-900 bg-opacity-75 z-50">
        <div class="bg-white rounded-lg p-5 w-full max-w-md">
            <h4 class="text-lg font-semibold mb-4">Pembayaran</h4>
            <form @submit.prevent="handleConfirmTransaction">
                <!-- Metode Pembayaran -->
                <div class="mb-4">
                    <label class="block text-sm font-medium text-gray-700">Metode Pembayaran</label>
                    <div class="flex items-center mt-2">
                        <input type="radio" id="cash" value="Cash" v-model="form.paymentMethod" />
                        <label for="cash" class="ml-2 mr-4">Cash</label>

                        <input type="radio" id="qris" value="QRIS" v-model="form.paymentMethod" />
                        <label for="qris" class="ml-2">QRIS</label>
                    </div>
                </div>
                <!-- Total Pembayaran -->
                <div class="mb-4">
                    <label for="totalPayment" class="block text-sm font-medium text-gray-700">Total Pembayaran</label>
                    <input type="number" v-model="form.totalPayment" id="totalPayment"
                        class="mt-1 p-2 w-full border rounded" disabled />
                </div>

                <!-- Uang yang Diberikan -->
                <div class="mb-4" v-if="form.paymentMethod === 'Cash'">
                    <label for="amountGiven" class="block text-sm font-medium text-gray-700">Uang yang Diberikan</label>
                    <input type="number" v-model="form.amountGiven" id="amountGiven"
                        class="mt-1 p-2 w-full border rounded" required />
                </div>

                <!-- Kembalian -->
                <div class="mb-4" v-if="form.paymentMethod === 'Cash'">
                    <label for="change" class="block text-sm font-medium text-gray-700">Kembalian</label>
                    <input type="number" v-model="form.change" id="change" class="mt-1 p-2 w-full border rounded"
                        disabled />
                </div>

                <!-- Buttons -->
                <div class="flex justify-end space-x-2">
                    <button type="button" @click="closeModal"
                        class="px-4 py-2 text-sm font-medium text-gray-500 bg-gray-200 rounded">Cancel</button>
                    <button type="submit" :disabled="form.paymentMethod === 'Cash' && form.change < 0"
                        class="px-4 py-2 text-sm font-medium text-white bg-blue-600 rounded"
                        :class="{ 'opacity-50 cursor-not-allowed': form.paymentMethod === 'Cash' && form.change < 0 }">
                        Confirm
                    </button>
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
                    <div v-if="form.paymentMethod === 'Cash'">
                        <p style="text-align: right;"><strong>Uang yang Diberikan:</strong> Rp
                            {{ form.amountGiven.toLocaleString() }}</p>
                        <p style="text-align: right;"><strong>Kembalian:</strong> Rp {{ form.change.toLocaleString() }}
                        </p>
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
