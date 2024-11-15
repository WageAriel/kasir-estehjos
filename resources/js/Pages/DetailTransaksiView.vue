<script setup>
    import {
        mdiBallotOutline
    } from '@mdi/js'
    import SectionMain from '@/Components/SectionMain.vue'
    import CardBox from '@/Components/CardBox.vue'
    import LayoutAuthenticated from '@/Layouts/LayoutAuthenticated.vue'
    import SectionTitleLineWithButton from '@/Components/SectionTitleLineWithButton.vue'
    import {
        defineProps
    } from 'vue'

    const props = defineProps({
        detail: {
            type: Array,
            required: true,
        },
    })

</script>

<template>
    <LayoutAuthenticated>
        <SectionMain>
            <SectionTitleLineWithButton :icon="mdiBallotOutline" title="Detail Transaksi" main />
            <CardBox class="mb-6" has-table>
                <table class="min-w-full">
                    <thead>
                        <tr>
                            <th>Id Product</th>
                            <th>Jumlah Produk</th>
                            <th>Subtotal</th>
                            <th>Kembalian</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr v-for="detail in detail" :key="detail.id">
                            <td>{{ detail.detail_id }}</td>
                            <td>{{ detail.transaksi_id }}</td>
                            <td>{{ detail.produk_id }}</td>
                            <td>{{ detail.jumlah }}</td>
                            <td>{{ detail.subtotal }}</td>
                            <td>{{ detail.kembali }}</td>
                        </tr>
                    </tbody>
                </table>
            </CardBox>
        </SectionMain>
    </LayoutAuthenticated>
</template>
