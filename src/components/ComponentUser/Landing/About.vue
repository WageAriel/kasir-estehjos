<template>
    <div class="flex w-full max-w-5xl mx-auto h-auto relative flex-col mt-[50px] px-6 items-start text-base font-bold">
      <div class="flex relative flex-col md:flex-row items-center px-16 pt-20 max-w-full min-h-[500px] w-full">
        <img 
          loading="lazy" 
          src="@/assets/images/esteh.jpg"
          class="object-cover w-full h-full md:w-1/2"
          alt="Background image"
        />
        <div 
          class="flex flex-col p-10 bg-yellow-400 w-full md:w-1/2 h-auto absolute"
          :style="{ top: userTop + 'px', left: userLeft + 'px' }"
        >
          <div class="font-semibold leading-tight text-gray-800 uppercase tracking-[2px]">
            Why we started
          </div>
          <div class="mt-4 text-[32px] tracking-tight w-full md:w-[400px] text-gray-800 leading-[42px]">
            It started out as a simple idea and evolved into our passion
          </div>
          <div class="mt-4 leading-6 text-sm font-normal text-gray-500">
            Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
          </div>
          <router-link 
            to="/about"
            class="gap-3 self-start px-10 py-3 mt-6 text-sm leading-none text-yellow-400 bg-white hover:bg-black transition duration-150 ease-in-out"
            >
            Discover our story >
          </router-link>
        </div>
      </div>
    </div>
  </template>
  
  <script>
  export default {
    name: 'AboutUs',
    data() {
      return {
        userTop: 120,   // Set default value for top position
        userLeft: 450,  // Set default value for left position
      };
    }
  }
  </script>
  