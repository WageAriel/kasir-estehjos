<template>
  <section class="flex flex-col items-center px-5">
    <h1 class="text-4xl font-medium text-green-800 max-md:text-4xl text-center">
      Our Partners
    </h1>
    <p class="mt-4 text-2xl font-medium text-green-900 text-center max-md:max-w-full">
      Find our partners and their locations on Google Maps.
    </p>
    
    <div class="mt-10 w-full max-w-screen-lg flex justify-center">
      <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-10 justify-center">
        <!-- Partner 1 -->
        <div class="flex flex-col items-center w-full max-w-[250px] bg-white rounded-lg shadow-md p-4">
          <div class="flex bg-yellow-300 w-full h-[250px] rounded-md" role="img" aria-label="Partner image"></div>
          <div class="mt-5 text-center">
            <h2 class="text-xl font-semibold text-neutral-700">Partner Name</h2>
            <p class="mt-2 text-neutral-500">123 Main St, Anytown, USA</p>
            <a 
              href="https://www.google.com/maps/search/?api=1&query=123+Main+St,+Anytown,+USA"
              target="_blank"
              rel="noopener noreferrer"
              class="block w-full text-center px-5 py-2 mt-4 text-sm font-medium text-yellow-400 bg-white border border-yellow-400 rounded-md hover:bg-black hover:text-white transition duration-150 ease-in-out"
            >
              Open in Google Maps
            </a>
          </div>
        </div>

        <!-- Partner 2 -->
        <div class="flex flex-col items-center w-full max-w-[250px] bg-white rounded-lg shadow-md p-4">
          <div class="flex bg-yellow-300 w-full h-[250px] rounded-md" role="img" aria-label="Partner image"></div>
          <div class="mt-5 text-center">
            <h2 class="text-xl font-semibold text-neutral-700">Partner Name 2</h2>
            <p class="mt-2 text-neutral-500">456 Another St, Anothertown, USA</p>
            <a 
              href="https://www.google.com/maps/search/?api=1&query=456+Another+St,+Anothertown,+USA"
              target="_blank"
              rel="noopener noreferrer"
              class="block w-full text-center px-5 py-2 mt-4 text-sm font-medium text-yellow-400 bg-white border border-yellow-400 rounded-md hover:bg-black hover:text-white transition duration-150 ease-in-out"
            >
              Open in Google Maps
            </a>
          </div>
        </div>

        <!-- Partner 3 -->
        <div class="flex flex-col items-center w-full max-w-[250px] bg-white rounded-lg shadow-md p-4">
          <div class="flex bg-yellow-300 w-full h-[250px] rounded-md" role="img" aria-label="Partner image"></div>
          <div class="mt-5 text-center">
            <h2 class="text-xl font-semibold text-neutral-700">Partner Name 3</h2>
            <p class="mt-2 text-neutral-500">789 Third St, Thistown, USA</p>
            <a 
              href="https://www.google.com/maps/search/?api=1&query=789+Third+St,+Thistown,+USA"
              target="_blank"
              rel="noopener noreferrer"
              class="block w-full text-center px-5 py-2 mt-4 text-sm font-medium text-yellow-400 bg-white border border-yellow-400 rounded-md hover:bg-black hover:text-white transition duration-150 ease-in-out"
            >
              Open in Google Maps
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

