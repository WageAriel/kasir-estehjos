<script setup lang="ts">
import HeaderContent from '@/ComponentUser/HeaderContent.vue'
import FooterContent from '@/ComponentUser/FooterContent.vue'
</script>

<template>
  <HeaderContent/>
  <slot></slot>
  <FooterContent/>
</template>
