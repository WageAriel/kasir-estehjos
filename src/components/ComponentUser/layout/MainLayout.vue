<script setup lang="ts">
import HeaderContent from '@/components/ComponentUser/HeaderContent.vue'
import FooterContent from '@/components/ComponentUser/FooterContent.vue'
</script>

<template>
  <HeaderContent/>
  <slot></slot>
  <FooterContent/>
</template>
