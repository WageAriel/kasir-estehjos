<script setup lang="ts">
import MainLayout from '@/ComponentUser/layout/MainLayout.vue';
</script>

<template>
  <MainLayout>
    <!-- Hero Section -->
    <section class="flex flex-col items-center px-6 py-12 text-black rounded-lg shadow-md">
      <h1 class="text-4xl font-bold text-center">Bergabunglah Dengan Kami</h1>
      <!-- <p class="text-xl font-medium text-center mt-4 max-w-2xl">
        Posisi yang dibutuhkan: Kasir beserta pengelolaan franchise yang ditempati.
      </p> -->
      <img
        loading="lazy"
        src="@/Assets/images/Sumber Berkat.png"
        alt="Ilustrasi posisi kasir yang tersedia"
        class="mt-8 max-w-[800px] w-full object-contain rounded-lg shadow-lg"
      />
      <a
        href="/contact"
        class="mt-6 px-4 py-2 text-white text-lg font-medium bg-blue-600 rounded-lg shadow-md hover:bg-blue-700 transition duration-300"
      >
        Contact Us
      </a>
    </section>

    <!-- Contact Form Section -->
    <section class="flex flex-col items-center px-6 py-12">
      <!-- Title -->
      <h1 class="text-4xl font-bold text-red-600 text-center">
        Join Us
      </h1>

      <!-- Form -->
      <form
        class="mt-8 w-full max-w-3xl bg-white rounded-lg shadow-lg p-8 border border-gray-200"
      >
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
          <!-- Name -->
          <div>
            <label for="name" class="block text-sm font-medium text-gray-600">Name</label>
            <input
              type="text"
              id="name"
              placeholder="Enter your name"
              class="mt-1 w-full border border-green-400 rounded-lg p-3 focus:outline-none focus:ring-2 focus:ring-green-400"
            />
          </div>

          <!-- Email -->
          <div>
            <label for="email" class="block text-sm font-medium text-gray-600">Email Address</label>
            <input
              type="email"
              id="email"
              placeholder="Enter your email address"
              class="mt-1 w-full border border-green-400 rounded-lg p-3 focus:outline-none focus:ring-2 focus:ring-green-400"
            />
          </div>

          <!-- Phone Number -->
          <div>
            <label for="phone" class="block text-sm font-medium text-gray-600">Phone Number</label>
            <input
              type="tel"
              id="phone"
              placeholder="Enter your phone number"
              class="mt-1 w-full border border-green-400 rounded-lg p-3 focus:outline-none focus:ring-2 focus:ring-green-400"
            />
          </div>
        </div>

        <!-- Message -->
        <div class="mt-6">
          <label for="message" class="block text-sm font-medium text-gray-600">Message</label>
          <textarea
            id="message"
            placeholder="Write your message here..."
            class="mt-1 w-full border border-green-400 rounded-lg p-3 focus:outline-none focus:ring-2 focus:ring-green-400"
          ></textarea>
        </div>

        <!-- Submit Button -->
        <button
          type="submit"
          class="mt-6 w-full md:w-auto px-6 py-3 text-white bg-green-600 rounded-lg shadow-md hover:bg-green-700 transition duration-300"
        >
          Submit
        </button>
      </form>
    </section>
  </MainLayout>
</template>
