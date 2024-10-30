<template>
  <MainLayout>
    <Header/>
    <Content/>
    <div clas='mb-10'> 
      <Product />
    </div>
  </MainLayout>
</template>
  
  <script setup lang="ts">
  import MainLayout from '@/components/ComponentUser/layout/MainLayout.vue';
  import Header from '@/components/ComponentUser/Landing/HeaderLanding.vue';
  import Content from '../../components/ComponentUser/Landing/Content.vue';
  import Product from '../../components/ComponentUser/Landing/product.vue';
  </script>
  