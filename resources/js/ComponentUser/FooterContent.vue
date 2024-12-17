<template>
  <footer class="flex flex-col">
    <div class="flex flex-col justify-center items-center px-20 py-24 w-full bg-yellow-300 max-md:px-5 max-md:max-w-full">
      <div class="flex flex-col w-full max-w-[1386px] max-md:max-w-full">
        <div class="flex flex-wrap gap-5 justify-between items-start max-md:max-w-full">
          <!-- Logo and Social Media Links -->
          <div class="flex flex-col items-center self-stretch">
            <img
              loading="lazy"
              src="@/Assets/images/esteh.jpg"
              alt="Company logo"
              class="w-[250px] h-[251.05px]"
            />
            <h3 class="mt-5 text-2xl font-medium text-black">Social Media</h3>
            <nav class="flex gap-5 justify-between items-start mt-7 max-w-full w-[178px]">
              <a href="#" aria-label="Facebook">
                <img
                  loading="lazy"
                  src="@/Assets/images/FB.png"
                  alt=""
                  class="object-contain shrink-0 w-8 aspect-square"
                />
              </a>
              <a href="#" aria-label="Twitter">
                <img
                  loading="lazy"
                  src="@/Assets/images/X .png"
                  alt=""
                  class="object-contain shrink-0 mt-[-2px] aspect-[1.7] w-[60px]"
                />
              </a>
              <a href="#" aria-label="Instagram">
                <img
                  loading="lazy"
                  src="@/Assets/images/IG.png"
                  alt=""
                  class="object-contain shrink-0 mt-[-1px] self-stretch aspect-square w-[34px]"
                />
              </a>
            </nav>
          </div>

          <!-- Shop Links -->
          <div class="w-[93px] h-[228px] relative">
            <div class="left-0 top-0 absolute text-black text-[22px] font-medium font-['Roboto Slab'] uppercase">SHOP</div>
            <Link href="/pemesanan" class="left-0 top-[54px] absolute text-black text-xl font-medium font-['Poppins'] capitalize">Products</Link>
            <Link href="/pemesanan" class="left-0 top-[102px] absolute text-black text-xl font-medium font-['Poppins'] capitalize">Releases</Link>
          </div>

          <!-- Company Links -->
          <div class="w-[113px] h-[228px] relative">
            <div class="left-0 top-0 absolute text-black text-[22px] font-medium font-['Roboto Slab'] uppercase">COMPANY</div>
            <Link href="/featured" class="left-0 top-[54px] absolute text-black text-xl font-medium font-['Poppins'] capitalize">About Us</Link>
            <Link href="/contact" class="left-0 top-[102px] absolute text-black text-xl font-medium font-['Poppins'] capitalize">Contact</Link>
          </div>

          <!-- Newsletter Subscription -->
          <div class="w-[487px]">            
          </div>
        </div>

        <!-- Footer Links -->
        <nav class="flex flex-wrap gap-5 justify-between mt-8 text-xl font-semibold text-black whitespace-nowrap">
            <div class="flex justify-between w-full border-t border-gray-800 pt-4">
                <p class="text-sm font-semibold">Designed by Cowo Imoet</p>
                <nav class="flex gap-4">
                    <a href="#" class="hover:underline">Privacy Policy</a>
                    <a href="#" class="hover:underline">Terms of Service</a>
                    <a href="#" class="hover:underline">Cookies Settings</a>
                </nav>
            </div>
        </nav>
      </div>
    </div>
  </footer>
</template>

<script setup>
import { Link } from '@inertiajs/vue3'
</script>
