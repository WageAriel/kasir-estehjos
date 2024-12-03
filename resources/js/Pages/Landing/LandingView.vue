<template>
  <MainLayout>
      <Hero />
      <div class="mt-10 mb-10"> 
        <Partner />
      </div>
      <div class="mt-10 mb-10"> 
        <Product />
      </div>
      <div class="mt-10 mb-10"> 
        <About />
      </div>
      <div class="mt-10 mb-10"> 
        <Feedback />
      </div>
  </MainLayout>
</template>

<script setup lang="ts">
  import MainLayout from '@/ComponentUser/layout/MainLayout.vue';
  import Hero from '@/Pages/Landing/Hero.vue';
  import Partner from '@/Pages/Landing/Partner.vue';
  import Product from '@/Pages/Landing/product.vue';
  import About from '@/Pages/Landing/About.vue';
  import Feedback from '@/Pages/Landing/Feedback.vue';
</script>
