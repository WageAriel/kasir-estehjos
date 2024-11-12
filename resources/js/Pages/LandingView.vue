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
  import Hero from '@/ComponentUser/Landing/Hero.vue';
  import Partner from '@/ComponentUser/Landing/Partner.vue';
  import Product from '@/ComponentUser/Landing/Product.vue';
  import About from '@/ComponentUser/Landing/About.vue';
  import Feedback from '@/ComponentUser/Landing/Feedback.vue';
</script>
