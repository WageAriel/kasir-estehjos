<script setup>
    import {
        defineProps
    } from 'vue';

    const props = defineProps({
        detail: {
            type: Array,
            required: true,
        },
    })

</script>

<template>
    <table>
        <thead>
            <tr>
                <th>Id Transaksi</th>
                <th>Nama Produk</th>
                <th>Jumlah Produk</th>
                <th>Subtotal</th>
                <th>Kembalian</th>
            </tr>
        </thead>
        <tbody>
            <tr v-for="item in detail" :key="item.transaksi_id">
                <!-- <td>{{ detail.detail_id }}</td> -->
                <td>{{ item.transaksi_id }}</td>
                <td>{{ item.produk_name }}</td>
                <td>{{ item.jumlah }}</td>
                <td>{{ item.subtotal }}</td>
                <td>{{ item.kembalian }}</td>
            </tr>
        </tbody>
    </table>
</template>

<style scoped>
    .modal {
        position: fixed;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background: rgba(0, 0, 0, 0.5);
        display: flex;
        justify-content: center;
        align-items: center;
    }

    .modal-content {
        background: white;
        padding: 20px;
        border-radius: 10px;
        width: 300px;
    }

</style>
