<script setup>
import { containerMaxW } from '@/config.js'
import BaseLevel from '@/Components/BaseLevel.vue'

const year = new Date().getFullYear()
</script>

<<<<<<< Updated upstream
<template>
  <footer class="py-2 px-6" :class="containerMaxW">
    <BaseLevel>
      <div class="text-center md:text-left">
        <b>&copy;{{ year }}.<a href="">Vendor Cowo Imut</a></b>
        <slot />
      </div>
    </BaseLevel>
  </footer>
</template>
=======
<style scoped>
    footer {
        background-color: #2d3748;
        /* Warna abu-abu gelap */
        color: #ffffff;
        /* Warna teks putih */
    }

</style>
>>>>>>> Stashed changes
