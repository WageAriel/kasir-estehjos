<template>
    <footer class="flex flex-col">
      <div class="flex flex-col justify-center items-center px-20 py-24 w-full bg-yellow-300 max-md:px-5 max-md:max-w-full">
        <div class="flex flex-col w-full max-w-[1386px] max-md:max-w-full">
          <div class="flex flex-wrap gap-5 justify-between items-start max-md:max-w-full">
            <div class="flex flex-col items-center self-stretch">
              <img loading="lazy" src="https://cdn.builder.io/api/v1/image/assets/TEMP/7b2cdcc5f4a54c853a49578735544cc6bcda56c9be329ef8434ba70852cf9454?placeholderIfAbsent=true&apiKey=c8698c43222e44c9baf2ff8bdf6a77c2" alt="Company logo" class="object-contain self-stretch w-full aspect-square" />
              <h3 class="mt-5 text-2xl font-medium text-black">Social Media</h3>
              <nav class="flex gap-5 justify-between items-start mt-7 max-w-full w-[178px]">
                <a href="#" aria-label="Facebook">
                  <img loading="lazy" src="https://cdn.builder.io/api/v1/image/assets/TEMP/17a282d476aa7c5a0133dd781105c4f69899333bdbce103378189fdc24b20c50?placeholderIfAbsent=true&apiKey=c8698c43222e44c9baf2ff8bdf6a77c2" alt="" class="object-contain shrink-0 w-8 aspect-square" />
                </a>
                <a href="#" aria-label="Twitter">
                  <img loading="lazy" src="https://cdn.builder.io/api/v1/image/assets/TEMP/2b22a299a06d4ddd347be970dba81e95326735fce09b186a71ee44932a96e628?placeholderIfAbsent=true&apiKey=c8698c43222e44c9baf2ff8bdf6a77c2" alt="" class="object-contain shrink-0 mt-1 aspect-[1.21] w-[35px]" />
                </a>
                <a href="#" aria-label="Instagram">
                  <img loading="lazy" src="https://cdn.builder.io/api/v1/image/assets/TEMP/64c26a0ea3662745864af556ab761e501f20e3e1093cd049e5b316dc1a1d1286?placeholderIfAbsent=true&apiKey=c8698c43222e44c9baf2ff8bdf6a77c2" alt="" class="object-contain shrink-0 self-stretch aspect-square w-[34px]" />
                </a>
              </nav>
            </div>
            <nav class="flex flex-col mt-2.5 text-xl font-medium text-black whitespace-nowrap">
              <h3 class="self-start text-2xl uppercase">SHOP</h3>
              <ul>
                <li><a href="#" class="mt-6 max-md:mr-1">Products</a></li>
                <li><a href="#" class="mt-5">Overview</a></li>
                <li><a href="#" class="self-start mt-5">Pricing</a></li>
                <li><a href="#" class="mt-5 max-md:mr-1">Releases</a></li>
              </ul>
            </nav>
            <nav class="flex flex-col items-start mt-2.5 text-xl font-medium text-black">
              <h3 class="self-stretch text-2xl uppercase">Company</h3>
              <ul>
                <li><a href="#" class="mt-6">About us</a></li>
                <li><a href="#" class="mt-5">Contact</a></li>
                <li><a href="#" class="mt-5">News</a></li>
                <li><a href="#" class="mt-5">Support</a></li>
              </ul>
            </nav>
            <div class="flex flex-col mt-2.5 max-md:max-w-full">
              <h3 class="self-start text-2xl font-medium text-black uppercase">Stay up to date</h3>
              <form class="flex flex-wrap gap-5 justify-between pl-7 mt-10 text-xl rounded border-2 border-black border-solid max-md:pl-5 max-md:max-w-full">
                <label for="emailInput" class="sr-only">Enter your email</label>
                <input type="email" id="emailInput" placeholder="Enter your email" aria-label="Enter your email" class="my-auto text-black bg-transparent border-none outline-none" />
                <button type="submit" class="px-5 py-3.5 font-medium text-amber-400 uppercase whitespace-nowrap bg-black max-md:px-5">Submit</button>
              </form>
            </div>
          </div>
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
  
  <script>
  export default {
    name: 'Footer'
  }
  </script>