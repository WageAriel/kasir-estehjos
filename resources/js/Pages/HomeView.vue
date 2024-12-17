<script setup>
import { computed, ref, onMounted } from "vue";
import { useMainStore } from "@/stores/main";
import axios from 'axios';
import MonthlyChart from "@/Components/Grafik/MonthlyChart.vue";
import {
  mdiAccountMultiple,
  mdiCartOutline,
  mdiChartTimelineVariant,
  mdiMonitorCellphone,
  mdiReload,
  mdiGithub,
  mdiChartPie,
  mdiAlertCircle,
  mdiCashRegister,
} from "@mdi/js";
import LineChart from "@/Components/Charts/LineChart.vue";
import SectionMain from "@/Components/SectionMain.vue";
import CardBoxWidget from "@/Components/CardBoxWidget.vue";
import CardBox from "@/Components/CardBox.vue";
import TableSampleClients from "@/Components/TableSampleClients.vue";
import NotificationBar from "@/Components/NotificationBar.vue";
import BaseButton from "@/Components/BaseButton.vue";
import CardBoxTransaction from "@/Components/CardBoxTransaction.vue";
import CardBoxClient from "@/Components/CardBoxClient.vue";
import LayoutAuthenticated from "@/Layouts/LayoutAuthenticated.vue";
import SectionTitleLineWithButton from "@/Components/SectionTitleLineWithButton.vue";
import SectionBannerStarOnGitHub from "@/Components/SectionBannerStarOnGitHub.vue";

const chartConfig = {
  sampleChartData() {
    return {
      labels: ["January", "February", "March", "April", "May"],
      datasets: [
        {
          label: "Sample Data",
          backgroundColor: "#42A5F5",
          borderColor: "#1E88E5",
          data: [40, 20, 12, 39, 10],
        },
      ],
    };
  },
};

const formatNumber = (value) => {
  return new Intl.NumberFormat("id-ID").format(value); // Format Indonesia
};

const props = defineProps({
    transaksi: { type: Array, default: () => [] },
});

const totalHarian = ref(0);
const latestAmount = ref(0);
const totalMingguan = ref(0);
const pendapatanMingguanTerakhir = ref(0);
const totalBulanan = ref(0);
const pendapatanBulananTerakhir = ref(0);
const produkStokKurang = ref([]);
const produkStokHabis = ref([]);

const fetchData = async () => {
  try {
    const response = await axios.get(`/api/dashboard-data?timestamp=${new Date().getTime()}`);
    totalHarian.value = response.data.totalHarian;
    latestAmount.value = response.data.latestAmount;
    totalMingguan.value = response.data.totalMingguan;
    pendapatanMingguanTerakhir.value = response.data.pendapatanMingguanTerakhir;
    totalBulanan.value = response.data.totalBulanan;
    pendapatanBulananTerakhir.value = response.data.pendapatanMingguanTerakhir;
  } catch (error) {
    console.error("Error fetching data:", error);
  }
};

const fetchProdukStokKurang = async () => {
  try {
    const response = await fetch("/api/produk-stok-kurang");
    const data = await response.json();
    produkStokKurang.value = data.produkMenipis;
  } catch (error) {
    console.error("Error fetching produk:", error);
  }
};
const fetchProdukStokHabis = async () => {
  try {
    const response = await fetch("/api/produk-stok-habis");
    const data = await response.json();
    produkStokHabis.value = data.produkHabis;
  } catch (error) {
    console.error("Error fetching produk:", error);
  }
};


const chartData = ref(null);

const fillChartData = () => {
  chartData.value = chartConfig.sampleChartData();
};

onMounted(() => {
  fillChartData();
  fetchData();
  setInterval(fetchData, 5000);
  fetchProdukStokKurang();
  fetchProdukStokHabis();
});

const mainStore = useMainStore();

const clientBarItems = computed(() => mainStore.clients.slice(0, 4));

const transactionBarItems = computed(() => mainStore.history);
</script>

<template>
  <LayoutAuthenticated>
    <SectionMain>
      <SectionTitleLineWithButton :icon="mdiChartTimelineVariant" title="Overview" main>
        <BaseButton
          href="https://github.com/justboil/admin-one-vue-tailwind"
          target="_blank"
          :icon="mdiGithub"
          label="Star on GitHub"
          color="contrast"
          rounded-full
          small
        />
      </SectionTitleLineWithButton>

      <div class="grid grid-cols-1 gap-6 lg:grid-cols-3 mb-6">
        <CardBoxWidget
          :trend="`+Rp ${formatNumber(latestAmount)}`"
          trend-type="up"
          color="text-emerald-500"
          :icon="mdiCashRegister"
          :number="formatNumber(totalHarian)"
          prefix="Rp "
          label="Pendapatan Harian"
        />
        <CardBoxWidget
          :trend="`+Rp ${formatNumber(pendapatanMingguanTerakhir)}`"
          trend-type="up"
          color="text-emerald-500"
          :icon="mdiCashRegister"
          :number="formatNumber(totalMingguan)"
          prefix="Rp "
          label="Pendapatan Mingguan"
        />
        <CardBoxWidget
          :trend="`+Rp ${formatNumber(pendapatanBulananTerakhir)}`"
          trend-type="up"
          color="text-emerald-500"
          :icon="mdiCashRegister"
          :number="formatNumber(totalBulanan)"
          prefix="Rp "
          label="Pendapatan Bulanan"
        />
      </div>
      <div class="grid grid-cols-1 gap-6 lg:grid-cols-3 mb-6">
        <CardBoxWidget
          v-for="(produk, index) in produkStokKurang"
          :key="index"
          :trend="`Stok: ${produk.stok}`"
          trend-type="alert"
          color="text-amber-500"
          :icon="mdiAlertCircle"
          :prefix="produk.produk_name"
          label="Produk"
    />
    <CardBoxWidget
          v-for="(produk, index) in produkStokHabis"
          :key="index"
          :trend="`Stok: ${produk.stok}`"
          trend-type="danger"
          color="text-red-500"
          :icon="mdiAlertCircle"
          :prefix="produk.produk_name"
          label="Produk"
    />
      </div>
      <SectionBannerStarOnGitHub class="mt-6 mb-6" />

      <SectionTitleLineWithButton :icon="mdiChartPie" title="Pendapatan Bulanan" />
      <CardBox>
        <MonthlyChart />
      </CardBox>

      <SectionTitleLineWithButton :icon="mdiAccountMultiple" title="Clients" />

      <NotificationBar color="info" :icon="mdiMonitorCellphone">
        <b>Responsive table.</b> Collapses on mobile
      </NotificationBar>

      <CardBox has-table>
        <TableSampleClients />
      </CardBox>
    </SectionMain>
  </LayoutAuthenticated>
</template>
