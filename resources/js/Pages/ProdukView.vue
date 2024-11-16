<script setup>
import { ref } from 'vue';
import { usePage } from '@inertiajs/vue3';
import { mdiBallotOutline } from '@mdi/js';
import SectionMain from '@/Components/SectionMain.vue';
import CardBox from '@/Components/CardBox.vue';
import LayoutAuthenticated from '@/Layouts/LayoutAuthenticated.vue';
import SectionTitleLineWithButton from '@/Components/SectionTitleLineWithButton.vue';
import FormProduk from '@/Components/Produk/FormProduk.vue';
import TableProduk from '@/Components/Produk/TableProduk.vue';

// Access props using usePage and set a default value for kategori
const { props } = usePage();
const kategoriData = ref(props.kategori || []);
</script>

<template>
  <LayoutAuthenticated>
    <SectionMain>
      <SectionTitleLineWithButton :icon="mdiBallotOutline" title="Forms Kategori" main />
      <FormProduk/>
      <SectionTitleLineWithButton class="mt-5" :icon="mdiBallotOutline" title="Table Kategori" main />
      <CardBox class="mb-6" has-table>
        <!-- Pass kategori data as prop to TableKategori -->
        <TableProduk :kategori="kategoriData" />
      </CardBox>
    </SectionMain>
  </LayoutAuthenticated>
</template>
