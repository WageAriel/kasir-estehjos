<template>
  <footer class="bg-yellow-400">
    <div class="flex justify-between items-start px-20 py-10 max-md:px-5 max-md:max-w-full">
      <!-- Logo and Social Media Links -->
      <div class="flex flex-col items-center w-1/4">
        <img 
          loading="lazy" 
          src="@/assets/images/esteh.jpg" 
          alt="Company logo" 
          class="object-contain w-32 h-32" 
        />
        <h3 class="mt-5 text-xl font-medium text-black">Social Media</h3>
        <nav class="flex gap-5 justify-center mt-2">
          <a href="#" aria-label="Facebook">
            <img 
              loading="lazy" 
              src="https://cdn.builder.io/api/v1/image/assets/TEMP/17a282d476aa7c5a0133dd781105c4f69899333bdbce103378189fdc24b20c50?placeholderIfAbsent=true&apiKey=c8698c43222e44c9baf2ff8bdf6a77c2" 
              alt="Facebook" 
              class="object-contain w-8" 
            />
          </a>
          <a href="#" aria-label="Twitter">
            <img 
              loading="lazy" 
              src="https://cdn.builder.io/api/v1/image/assets/TEMP/2b22a299a06d4ddd347be970dba81e95326735fce09b186a71ee44932a96e628?placeholderIfAbsent=true&apiKey=c8698c43222e44c9baf2ff8bdf6a77c2" 
              alt="Twitter" 
              class="object-contain w-8" 
            />
          </a>
          <a href="#" aria-label="Instagram">
            <img 
              loading="lazy" 
              src="https://cdn.builder.io/api/v1/image/assets/TEMP/64c26a0ea3662745864af556ab761e501f20e3e1093cd049e5b316dc1a1d1286?placeholderIfAbsent=true&apiKey=c8698c43222e44c9baf2ff8bdf6a77c2" 
              alt="Instagram" 
              class="object-contain w-8" 
            />
          </a>
        </nav>
      </div>

      <!-- Footer Links -->
      <div class="flex flex-wrap justify-between items-start w-3/4">
        <!-- Shop Links -->
        <nav class="flex flex-col text-lg font-medium text-black w-1/3">
          <h3 class="text-xl uppercase mb-4">SHOP</h3>
          <ul class="space-y-2">
            <li><a href="#" class="font-normal">Products</a></li>
            <li><a href="#" class="font-normal">Overview</a></li>
            <li><a href="#" class="font-normal">Pricing</a></li>
            <li><a href="#" class="font-normal">Releases</a></li>
          </ul>
        </nav>

        <!-- Company Links -->
        <nav class="flex flex-col text-lg font-medium text-black w-1/3">
          <h3 class="text-xl uppercase mb-4">COMPANY</h3>
          <ul class="space-y-2">
            <li><a href="#" class="font-normal">About Us</a></li>
            <li><a href="#" class="font-normal">Contact</a></li>
            <li><a href="#" class="font-normal">News</a></li>
            <li><a href="#" class="font-normal">Support</a></li>
          </ul>
        </nav>

        <!-- Subscription Section -->
        <nav class="flex flex-col text-lg font-medium text-black w-1/3">
          <h3 class="text-xl uppercase mb-4">STAY UP TO DATE</h3>
          <form class="flex flex-wrap gap-4 justify-between pl-4 mt-6 border-2 border-black rounded">
            <label for="emailInput" class="sr-only">Enter your email</label>
            <input 
              type="email" 
              id="emailInput" 
              placeholder="Enter your email" 
              aria-label="Enter your email" 
              class="my-auto text-black bg-transparent border-none outline-none" 
            />
            <button type="submit" class="px-4 py-2 font-normal text-amber-400 uppercase whitespace-nowrap bg-transparent rounded">Submit</button>
          </form>
        </nav>
      </div>
    </div>

    <!-- Footer Links -->
    <nav class="flex flex-col items-center mt-8 text-lg font-semibold text-black whitespace-nowrap">
      <hr class="w-full h-px border-0 bg-black" />
      <div class="flex gap-10 justify-center mt-2"> <!-- Mengubah margin atas untuk menempatkan tautan di bawah garis -->
        <a href="#" class="hover:underline">Terms</a>
        <a href="#" class="hover:underline">Privacy</a>
        <a href="#" class="hover:underline">Cookies</a>
      </div>
    </nav>

  </footer>
</template>

<script>
export default {
  name: 'Footer'
}
</script>
