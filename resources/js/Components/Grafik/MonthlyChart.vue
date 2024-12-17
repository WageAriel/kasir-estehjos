<script setup>
import { ref, onMounted, computed } from "vue";
import { Line } from "vue-chartjs";
import {
  Chart as ChartJS,
  Title,
  Tooltip,
  Legend,
  LineElement,
  LinearScale,
  CategoryScale,
  PointElement,
} from "chart.js";

ChartJS.register(Title, Tooltip, Legend, LineElement, LinearScale, CategoryScale, PointElement);

// Data reaktif
const monthlyLabels = ref([]);
const monthlyTotals = ref([]);

// Fetch data pendapatan bulanan dari backend
const fetchMonthlyData = async () => {
  try {
    const response = await fetch("/api/monthly-chart-data");
    const data = await response.json();

    // Isi data untuk chart
    monthlyLabels.value = data.monthlyData.map((item) => getMonthName(item.month));
    monthlyTotals.value = data.monthlyData.map((item) => parseFloat(item.total));
  } catch (error) {
    console.error("Error fetching chart data:", error);
  }
};

// Konversi angka bulan ke nama bulan
const getMonthName = (monthNumber) => {
  const months = [
    "Januari", "Februari", "Maret", "April", "Mei", "Juni", 
    "Juli", "Agustus", "September", "Oktober", "November", "Desember"
  ];
  return months[monthNumber - 1];
};

// Properti computed untuk chart data
const chartData = computed(() => ({
  labels: monthlyLabels.value,
  datasets: [
    {
      label: "Pendapatan Bulanan",
      backgroundColor: "#42A5F5",
      borderColor: "#1E88E5",
      data: monthlyTotals.value,
      fill: true,
      tension: 0.4,
    },
  ],
}));

// Konfigurasi chart options
const chartOptions = {
  responsive: true,
  plugins: {
    legend: { display: true },
  },
};

onMounted(() => {
  fetchMonthlyData();
});
</script>

<template>
  <div>
    <h3 class="text-xl font-semibold mb-4">Grafik Pendapatan Bulanan</h3>
    <Line v-if="monthlyLabels.length > 0" :data="chartData" :options="chartOptions" />
    <div v-else>Loading...</div>
  </div>
</template>
