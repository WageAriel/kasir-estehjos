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
  import MainLayout from '@/components/ComponentUser/layout/MainLayout.vue';
  import Hero from '../../components/ComponentUser/Landing/Hero.vue';
  import Partner from '../../components/ComponentUser/Landing/Partner.vue';
  import Product from '../../components/ComponentUser/Landing/Product.vue';
  import About from '../../components/ComponentUser/Landing/About.vue';
  import Feedback from '../../components/ComponentUser/Landing/Feedback.vue';
</script>
