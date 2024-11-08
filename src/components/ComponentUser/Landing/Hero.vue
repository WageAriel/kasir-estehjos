<template>
  <main 
    data-layername="landingPage" 
    class="flex overflow-hidden flex-col justify-center items-center px-8 py-16 bg-[#fff600] max-md:px-5 max-md:py-10 mb-10" 
  > 
    <div class="w-full max-w-[800px] max-md:max-w-full"> 
      <div class="flex gap-5 max-md:flex-col">
        <!-- Left Section -->
        <section data-layername="column" class="flex flex-col w-6/12 max-md:ml-0 max-md:w-full">
          <div class="flex flex-col items-start mt-6 font-medium max-md:mt-10 max-md:max-w-full">
            <h1 
              data-layername="discoverAndFindYourOwnFashion" 
              class="self-stretch text-5xl font-bold text-green-900 max-md:max-w-full max-md:text-3xl"
            >
              Mari belanja di Toko Sumber Berkat!
            </h1>
            <p 
              data-layername="exploreOurCuratedCollectionOfStylishClothingAndAccessoriesTailoredToYourUniqueTaste" 
              class="mt-4 text-xl text-green-700 leading-[30px] max-md:max-w-full"
            >
              Toko terlengkap se antero Mojosongo.
            </p>
            <button 
              data-layername="exploreNow" 
              class="px-10 py-4 mt-10 text-lg text-white uppercase rounded bg-black shadow-[4px_20px_40px_rgba(0,0,0,0.3)] max-md:px-4 max-md:mt-5"
            >
              Explore Now
            </button>
          </div>
        </section>

        <!-- Right Section -->
        <section data-layername="column" class="flex flex-col ml-5 w-6/12 max-md:ml-0 max-md:w-full">
          <div class="flex relative flex-col grow pt-24 pr-3 pb-10 pl-4 rounded-none min-h-[500px] max-md:pt-16 max-md:pl-5 max-md:mt-10 max-md:max-w-full">
            <img 
              loading="lazy" 
              src="https://cdn.builder.io/api/v1/image/assets/TEMP/0e3c3f45a1eb821739e039703dc829e2de0fa9f9f26b3b78e10638eb42bba640?placeholderIfAbsent=true&apiKey=c8698c43222e44c9baf2ff8bdf6a77c2" 
              alt="" 
              class="object-cover absolute inset-0 size-full" 
            />
            <img 
              loading="lazy" 
              src="https://cdn.builder.io/api/v1/image/assets/TEMP/11057a124c8d0a4a4de0dac8ab453823e0c41535a639494a2ba675701234f1e8?placeholderIfAbsent=true&apiKey=c8698c43222e44c9baf2ff8bdf6a77c2" 
              alt="" 
              class="object-contain self-end max-w-full aspect-[1.08] w-[90px]" 
            />
            <img 
              loading="lazy" 
              src="https://cdn.builder.io/api/v1/image/assets/TEMP/s11057a124c8d0a4a4de0dac8ab453823e0c41535a639494a2ba675701234f1e8?placeholderIfAbsent=true&apiKey=c8698c43222e44c9baf2ff8bdf6a77c2" 
              alt="" 
              class="object-contain mt-32 max-w-full aspect-[1.08] w-[90px] max-md:mt-8" 
            />
          </div>
        </section>
      </div>
    </div>
  </main>
</template>

<script>
export default {
  name: 'LandingPage'
}
</script>
