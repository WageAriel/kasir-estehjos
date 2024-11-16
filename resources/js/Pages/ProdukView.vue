<script setup>
import { defineProps, computed } from 'vue';
import { mdiBallotOutline } from '@mdi/js';
import SectionMain from '@/Components/SectionMain.vue';
import CardBox from '@/Components/CardBox.vue';
import LayoutAuthenticated from '@/Layouts/LayoutAuthenticated.vue';
import SectionTitleLineWithButton from '@/Components/SectionTitleLineWithButton.vue';
import FormProduk from '@/Components/Produk/FormProduk.vue';
import TableProduk from '@/Components/Produk/TableProduk.vue';

// Access props using usePage and set a default value for produk
// Define props
const props = defineProps({
  kategoriOptions: {
    type: Array,
    default: () => [],
  },
  produk: {
    type: Array,
    default: () => [],
  },
});

// Create computed property for produk data
const produkData = computed(() => props.produk);
</script>

<template>
  <LayoutAuthenticated>
    <SectionMain>
      <SectionTitleLineWithButton :icon="mdiBallotOutline" title="Forms Produk" main />
      <FormProduk/>
      <SectionTitleLineWithButton class="mt-5" :icon="mdiBallotOutline" title="Table Produk" main />
      <CardBox class="mb-6" has-table>
        <!-- Pass Produk data as prop to TableProduk -->
        <TableProduk :produk="produkData" :kategoriOptions="kategoriOptions" />
      </CardBox>
    </SectionMain>
  </LayoutAuthenticated>
</template>
