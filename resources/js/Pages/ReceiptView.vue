<script setup>
import { defineProps, onMounted } from 'vue';

const props = defineProps({
    transaksi: {
        type: Object,
        required: true
    }
});

// Otomatis print saat halaman dimuat
onMounted(() => {
    window.print();
});
</script>

<template>
    <div class="receipt-page">
        <div class="receipt-content">
            <h2 class="font-bold text-center">Toko Sumber Berkat</h2>
            <p class="text-center">Jln Kelud Selatan no.6 Joglo, Banjarsari, Surakarta</p>
            <p class="text-center">Telp: (0271) 852591</p>
            <hr />
            <p><strong>Tanggal:</strong> {{ transaksi.tanggal_transaksi }}</p>
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
                    <tr v-for="detail in transaksi.detail_transaksi" :key="detail.detail_transaksi_id"
                        style="border-bottom: 1px dashed #000;">
                        <td>
                            {{ detail.jumlah }} x {{ detail.produk.produk_name }}
                            ({{ detail.produk.harga }})
                        </td>
                        <td style="text-align: right;">
                            {{ detail.subtotal }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <hr />
            <div>
                <p style="text-align: right;"><strong>Total:</strong>
                    {{ transaksi.total_jumlah }}
                </p>
            </div>
            <div v-if="transaksi.metode_pembayaran === 'Cash'">
                <p style="text-align: right;"><strong>Kembalian:</strong>
                    {{ transaksi.kembalian }}
                </p>
            </div>
            <hr />
            <p class="text-center">Terima kasih atas kunjungan Anda!</p>
            <p class="text-center">--- Simpan struk ini sebagai bukti ---</p>
        </div>
    </div>
</template>

<style scoped>
.receipt-page {
    width: 58mm;
    margin: 0 auto;
    font-family: monospace;
}

@media print {
    .receipt-page {
        width: 58mm;
        margin: 0;
        padding: 0;
    }

    .receipt-content {
        font-size: 12px;
    }

    hr {
        border: none;
        border-top: 1px dashed #000;
        margin: 5px 0;
    }
}
</style>
