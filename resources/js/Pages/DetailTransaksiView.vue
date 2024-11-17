<script setup>
import { defineProps, computed } from 'vue';
import { mdiBallotOutline } from '@mdi/js';
import SectionMain from '@/Components/SectionMain.vue';
import CardBox from '@/Components/CardBox.vue';
import LayoutAuthenticated from '@/Layouts/LayoutAuthenticated.vue';
import SectionTitleLineWithButton from '@/Components/SectionTitleLineWithButton.vue';
import TableDetail from '@/Components/DetailTransaksi/TableDetail.vue';

const props = defineProps({
  detail: {
    type: Array,
    default: () => [],
  },
});
</script>

<template>
  <LayoutAuthenticated>
    <SectionMain>
      <SectionTitleLineWithButton class="mt-5" :icon="mdiBallotOutline" title="Table Detail Transaksi" main />
      <CardBox class="mb-6" has-table>
        <TableDetail :detail="detail" />
      </CardBox>
    </SectionMain>
  </LayoutAuthenticated>
</template>
