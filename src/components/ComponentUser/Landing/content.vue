<template>
  <section class="flex flex-col items-center">
    <h1 data-layername="partners" class="text-6xl font-medium text-green-900 max-md:text-4xl text-center">
      Our Partners
    </h1>
    <p data-layername="findOurPartners" class="mt-4 text-2xl font-medium text-green-900 text-center max-md:max-w-full">
      Find our partners and their locations on Google Maps.
    </p>
    
    <div class="mt-20 w-full max-md:mt-10">
      <div class="flex flex-wrap justify-center gap-5 max-md:flex-col">
        <!-- Partner 1 -->
        <div data-layername="column" class="flex flex-col w-full max-w-[300px]">
          <div class="flex shrink-0 mx-auto max-w-full bg-yellow-300 rounded h-[400px]" role="img" aria-label="Partner image"></div>
          <div class="mt-5 text-center">
            <h2 class="text-xl font-semibold text-neutral-700">Partner Name</h2>
            <p class="mt-2 text-neutral-500">123 Main St, Anytown, USA</p>
            <a 
              href="https://www.google.com/maps/search/?api=1&query=123+Main+St,+Anytown,+USA"
              target="_blank"
              rel="noopener noreferrer"
              class="mt-4 inline-block px-4 py-2 bg-transparent border border-blue-600 text-blue-600 rounded"
            >
              Open in Google Maps
            </a>
          </div>
        </div>

        <!-- Partner 2 -->
        <div data-layername="column" class="flex flex-col w-full max-w-[300px]">
          <div class="flex shrink-0 mx-auto max-w-full bg-yellow-300 rounded h-[400px]" role="img" aria-label="Partner image"></div>
          <div class="mt-5 text-center">
            <h2 class="text-xl font-semibold text-neutral-700">Partner Name 2</h2>
            <p class="mt-2 text-neutral-500">456 Another St, Anothertown, USA</p>
            <a 
              href="https://www.google.com/maps/search/?api=1&query=456+Another+St,+Anothertown,+USA"
              target="_blank"
              rel="noopener noreferrer"
              class="mt-4 inline-block px-4 py-2 bg-transparent border border-blue-600 text-blue-600 rounded"
            >
              Open in Google Maps
            </a>
          </div>
        </div>

        <!-- Partner 3 -->
        <div data-layername="column" class="flex flex-col w-full max-w-[300px]">
          <div class="flex shrink-0 mx-auto max-w-full bg-yellow-300 rounded h-[400px]" role="img" aria-label="Partner image"></div>
          <div class="mt-5 text-center">
            <h2 class="text-xl font-semibold text-neutral-700">Partner Name 3</h2>
            <p class="mt-2 text-neutral-500">789 Third St, Thistown, USA</p>
            <a 
              href="https://www.google.com/maps/search/?api=1&query=789+Third+St,+Thistown,+USA"
              target="_blank"
              rel="noopener noreferrer"
              class="mt-4 inline-block px-4 py-2 bg-transparent border border-blue-600 text-blue-600 rounded"
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
