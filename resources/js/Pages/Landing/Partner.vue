<template>
  <section class="flex flex-col items-center px-5">
    <h1 class="text-4xl font-medium text-green-800 max-md:text-4xl text-center">
      Cabang Kami
    </h1>
    <p class="mt-4 text-2xl font-medium text-green-900 text-center max-md:max-w-full">
      Temukan Mitra Kami disii
    </p>
    
    <div class="mt-20 w-full max-md:mt-10">
      <div class="flex flex-wrap justify-center gap-5 max-md:flex-col">
        
        <!-- Partner 1 -->
        <div class="flex flex-col w-full max-w-[300px] bg-white rounded-lg shadow-md p-4">
          <div class="flex bg-yellow-300 w-full h-[250px] rounded-md" role="img" aria-label="Partner image"></div>
          <div class="mt-5 text-center">
            <h2 class="text-xl font-semibold text-neutral-700">Cabang 1</h2>
            <p class="mt-2 text-neutral-500">123 Main St, Anytown, USA</p>
            <a 
              href="https://www.google.com/maps/search/?api=1&query=123+Main+St,+Anytown,+USA"
              target="_blank"
              rel="noopener noreferrer"
              class="block w-full text-center px-5 py-2 mt-4 text-sm font-medium text-yellow-400 bg-white border border-yellow-400 rounded-md hover:bg-black hover:text-white transition duration-150 ease-in-out"
            >
              Buka di Google Maps
            </a>
          </div>
        </div>

        <!-- Partner 2 -->
        <div class="flex flex-col w-full max-w-[300px] bg-white rounded-lg shadow-md p-4">
          <div class="flex bg-yellow-300 w-full h-[250px] rounded-md" role="img" aria-label="Partner image"></div>
          <div class="mt-5 text-center">
            <h2 class="text-xl font-semibold text-neutral-700">Cabang 2</h2>
            <p class="mt-2 text-neutral-500">456 Another St, Anothertown, USA</p>
            <a 
              href="https://www.google.com/maps/search/?api=1&query=456+Another+St,+Anothertown,+USA"
              target="_blank"
              rel="noopener noreferrer"
              class="block w-full text-center px-5 py-2 mt-4 text-sm font-medium text-yellow-400 bg-white border border-yellow-400 rounded-md hover:bg-black hover:text-white transition duration-150 ease-in-out"
            >
              Buka di Google Maps
            </a>
          </div>
        </div>

        <!-- Partner 3 -->
        <div class="flex flex-col w-full max-w-[300px] bg-white rounded-lg shadow-md p-4">
          <div class="flex bg-yellow-300 w-full h-[250px] rounded-md" role="img" aria-label="Partner image"></div>
          <div class="mt-5 text-center">
            <h2 class="text-xl font-semibold text-neutral-700">Cabang 3</h2>
            <p class="mt-2 text-neutral-500">789 Third St, Thistown, USA</p>
            <a 
              href="https://www.google.com/maps/search/?api=1&query=789+Third+St,+Thistown,+USA"
              target="_blank"
              rel="noopener noreferrer"
              class="block w-full text-center px-5 py-2 mt-4 text-sm font-medium text-yellow-400 bg-white border border-yellow-400 rounded-md hover:bg-black hover:text-white transition duration-150 ease-in-out"
            >
              Buka di Google Maps
            </a>
          </div>
        </div>

      </div>
    </div>
  </section>
</template>

<script>
export default {
  name: 'PartnerComponent'
}
</script>
