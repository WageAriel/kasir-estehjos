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
            <Link href="" class="left-0 top-[102px] absolute text-black text-xl font-medium font-['Poppins'] capitalize">Overview</Link>
            <Link href="/cart" class="left-0 top-[150px] absolute text-black text-xl font-medium font-['Poppins'] capitalize">Pricing</Link>
            <Link href="" class="left-0 top-[198px] absolute text-black text-xl font-medium font-['Poppins'] capitalize">Releases</Link>
          </div>

          <!-- Company Links -->
          <div class="w-[113px] h-[228px] relative">
            <Link href="" class="left-0 top-0 absolute text-black text-[22px] font-medium font-['Roboto Slab'] uppercase">COMPANY</Link>
            <Link href="" class="left-0 top-[54px] absolute text-black text-xl font-medium font-['Poppins'] capitalize">About Us</Link>
            <Link href="" class="left-0 top-[102px] absolute text-black text-xl font-medium font-['Poppins'] capitalize">Contact</Link>
            <Link href="" class="left-0 top-[150px] absolute text-black text-xl font-medium font-['Poppins'] capitalize">News</Link>
            <Link href="" class="left-0 top-[198px] absolute text-black text-xl font-medium font-['Poppins'] capitalize">Support</Link>
          </div>

          <!-- Newsletter Subscription -->
          <div class="w-[487px]">
            <h2 class="text-black text-[22px] font-medium font-['Roboto Slab'] uppercase">Stay up to date</h2>
            <form class="flex items-center gap-2 mt-2">
              <input
                type="email"
                placeholder="Enter your email"
                class="flex-grow h-[57px] px-3 border-2 border-black bg-transparent rounded-[3px] text-xl font-['Poppins']"
                required
              />
              <button type="submit" class="w-[115px] h-[57px] bg-black text-[#f9a825] text-xl font-medium font-['Poppins'] uppercase">
                Submit
              </button>
            </form>
          </div>
        </div>

        <!-- Footer Links -->
        <nav class="flex flex-wrap gap-5 justify-between mt-8 text-xl font-semibold text-black whitespace-nowrap">
          <hr class="shrink-0 my-auto max-w-full h-0.5 border-2 border-black border-solid w-[1051px]" />
          <a href="#">Terms</a>
          <a href="#">Privacy</a>
          <a href="#">Cookies</a>
        </nav>
      </div>
    </div>
  </footer>
</template>

<script setup>
import { Link } from '@inertiajs/vue3'
</script>
