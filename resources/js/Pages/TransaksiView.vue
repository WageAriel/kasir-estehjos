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

    // Tangkap data transaksi dari Laravel
    const props = defineProps({
        data: {
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
                            <th>Transaksi ID</th>
                            <th>Transaksi Date</th>
                            <th>Total Amount</th>
                            <th>Payment Method</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr v-for="transaksi in data" :key="transaksi.id">
                            <td>{{ transaksi.transaksi_id }}</td>
                            <td>{{ transaksi.transaksi_date }}</td>
                            <td>{{ transaksi.total_amount }}</td>
                            <td>{{ transaksi.payment_method }}</td>
                        </tr>
                    </tbody>
                </table>
            </CardBox>
        </SectionMain>
    </LayoutAuthenticated>
</template>
