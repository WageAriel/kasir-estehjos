<template>
    <header class="flex flex-col font-medium uppercase whitespace-nowrap text-neutral-800">
      <nav class="flex justify-between items-center px-16 py-4 w-full bg-white max-md:px-5 max-md:py-3 max-md:max-w-full">
        <div class="flex items-center">
          <!-- Logo -->
          <img loading="lazy" src="@/assets/images/esteh.jpg" alt="Company Logo" class="object-contain h-10" /> <!-- Ganti dengan path logo Anda -->
        </div>
  
        <ul class="flex gap-8 self-stretch my-auto text-lg"> <!-- Ukuran teks diubah dari text-2xl menjadi text-lg -->
          <router-link to="/" class="hover:text-yellow-600">HOME</router-link>
          <router-link to="/pemesanan" class="hover:text-yellow-600">SHOP</router-link>
          <router-link to="/featured" class="hover:text-yellow-600">FEATURED</router-link>
          <router-link to="/contact" class="hover:text-yellow-600">CONTACT</router-link>
        </ul>
  
        <div class="flex items-center gap-5">
            <!-- Cart Icon -->
            <router-link to="/cart" aria-label="Shopping Cart" class="flex items-center">
              <img 
                loading="lazy" 
                src="@/assets/images/Tas.png" 
                alt="Cart Icon" 
                class="object-contain h-9 mt-[10px] transition-transform duration-200 hover:scale-110" 
              />
            </router-link>

          <router-link to="/dashboard" class="px-4 py-2 border border-neutral-800 rounded hover:bg-yellow-200 text-sm"> <!-- Ukuran teks diubah menjadi text-sm -->
            LOGIN
          </router-link>
        </div>
      </nav>
    </header>
  </template>
  
  <script>
  export default {
    name: 'NavigationBar'
  }
  </script>
  