<script setup>
import { computed } from 'vue'

const props = defineProps({
  username: {
    type: String,
    required: true
  },
  avatar: {
    type: String,
    default: null
  },
  api: {
    type: String,
    default: 'avataaars'
  }
})

// Computed property untuk avatar dengan pengecekan
const avatar = computed(() => {
  // Cek apakah username ada, jika tidak, gunakan avatar default
  if (!props.username) {
    return `https://api.dicebear.com/7.x/${props.api}/svg?seed=default-avatar.svg`; // Gunakan avatar default jika username tidak ada
  }

  // Jika avatar ada, gunakan avatar tersebut, jika tidak, buat avatar menggunakan username
  return (
    props.avatar ??
    `https://api.dicebear.com/7.x/${props.api}/svg?seed=${props.username.replace(
      /[^a-z0-9]+/gi,
      '-'
    )}.svg`
  );
});

const username = computed(() => props.username)
</script>

<template>
  <div>
    <!-- Menampilkan gambar avatar dengan fallback jika gagal -->
    <img
      :src="avatar"
      :alt="username"
      class="rounded-full block h-auto w-full max-w-full bg-gray-100 dark:bg-slate-800"
      :onError="(event) => event.target.src = '/path/to/default-avatar.svg'"
    />
    <slot />
  </div>
</template>
