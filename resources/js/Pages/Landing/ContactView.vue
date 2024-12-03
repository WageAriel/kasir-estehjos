<script setup lang="ts">
import MainLayout from '@/ComponentUser/layout/MainLayout.vue';
import { mdiMapMarker, mdiEmail, mdiPhone } from '@mdi/js'
</script>

<template>
  <MainLayout>
    <main class="py-10 bg-gray-100">
      <!-- Header Section -->
      <header class="text-center mb-10">
        <h1 class="text-4xl font-extrabold text-gray-800">Contact Us</h1>
        <p class="mt-4 text-lg font-medium text-gray-600 max-w-lg mx-auto">
          Have questions or need assistance? Our team is always here to help.
        </p>
      </header>

      <!-- Main Section -->
      <section class="grid grid-cols-1 lg:grid-cols-2 gap-10 w-4/5 mx-auto">
        <!-- Contact Info -->
        <aside class="bg-white rounded-lg shadow-lg p-8">
          <h2 class="text-2xl font-bold text-gray-800 mb-6">Contact Information</h2>
          <p class="text-gray-600 mb-8">Reach out to us through the details below:</p>

          <div class="space-y-6">
                <!-- Phone -->
                <div class="flex items-center gap-4">
                <a href="tel:0271852591" class="flex items-center gap-4 text-decoration-none">
                    <!-- Tambahkan ikon menggunakan SVG -->
                    <svg
                    xmlns="http://www.w3.org/2000/svg"
                    class="w-8 h-8 text-gray-800"
                    viewBox="0 0 24 24"
                    fill="currentColor"
                    >
                    <path :d="mdiPhone" />
                    </svg>
                    <p class="text-lg font-medium text-gray-800">(0271) 852591</p>
                </a>
                </div>

                <!-- Email -->
                <div class="flex items-center gap-4">
                <a href="mailto:estehjozz@gmail.com" class="flex items-center gap-4 text-decoration-none">
                    <!-- Tambahkan ikon menggunakan SVG -->
                    <svg
                    xmlns="http://www.w3.org/2000/svg"
                    class="w-8 h-8 text-gray-800"
                    viewBox="0 0 24 24"
                    fill="currentColor"
                    >
                    <path :d="mdiEmail" />
                    </svg>
                    <p class="text-lg font-medium text-gray-800">estehjozz@gmail.com</p>
                </a>
                </div>

                <!-- Address -->
                <div class="flex items-center gap-4">
                <a
                    href="https://maps.app.goo.gl/hjAQxU9rFzdEtDZg9"
                    target="_blank"
                    rel="noopener noreferrer"
                    class="flex items-center gap-4 text-decoration-none"
                >
                    <!-- Tambahkan ikon menggunakan SVG -->
                    <svg
                    xmlns="http://www.w3.org/2000/svg"
                    class="w-8 h-8 text-gray-800"
                    viewBox="0 0 24 24"
                    fill="currentColor"
                    >
                    <path :d="mdiMapMarker" />
                    </svg>
                    <p class="text-lg font-medium text-gray-800">Toko Sumber Berkat</p>
                </a>
                </div>
        </div>

          <!-- Social Media -->
          <div class="flex justify-start gap-6 mt-10">
            <a href="#" class="hover:opacity-75">
              <img
                src="@/Assets/images/FB.png"
                alt="Facebook"
                class="w-10 h-10"
              />
            </a>
            <a href="#" class="hover:opacity-75">
              <img
                src="@/Assets/images/X .png"
                alt="Twitter"
                class="w-15 h-10"
              />
            </a>
            <a href="#" class="hover:opacity-75">
              <img
                src="@/Assets/images/IG.png"
                alt="Instagram"
                class="w-10 h-10"
              />
            </a>
          </div>
        </aside>

        <!-- Contact Form -->
        <section class="bg-white rounded-lg shadow-lg p-8">
          <h2 class="text-2xl font-bold text-gray-800 mb-6">Send Us a Message</h2>
          <form class="space-y-6">
            <!-- Name Fields -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
              <div>
                <label for="fullName" class="text-sm font-medium text-gray-600">Full Name</label>
                <input
                  type="text"
                  id="fullName"
                  placeholder="Enter your full name"
                  class="mt-1 w-full border border-gray-300 rounded-lg p-3 focus:outline-none focus:ring-2 focus:ring-blue-500"
                />
              </div>
              <div>
                <label for="nickname" class="text-sm font-medium text-gray-600">Nickname</label>
                <input
                  type="text"
                  id="nickname"
                  placeholder="Enter your nickname"
                  class="mt-1 w-full border border-gray-300 rounded-lg p-3 focus:outline-none focus:ring-2 focus:ring-blue-500"
                />
              </div>
            </div>

            <!-- Contact Fields -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
              <div>
                <label for="email" class="text-sm font-medium text-gray-600">Email</label>
                <input
                  type="email"
                  id="email"
                  placeholder="Enter your email"
                  class="mt-1 w-full border border-gray-300 rounded-lg p-3 focus:outline-none focus:ring-2 focus:ring-blue-500"
                />
              </div>
              <div>
                <label for="phone" class="text-sm font-medium text-gray-600">Phone</label>
                <input
                  type="tel"
                  id="phone"
                  placeholder="Enter your phone number"
                  class="mt-1 w-full border border-gray-300 rounded-lg p-3 focus:outline-none focus:ring-2 focus:ring-blue-500"
                />
              </div>
            </div>

            <!-- Message Field -->
            <div>
              <label for="message" class="text-sm font-medium text-gray-600">Message</label>
              <textarea
                id="message"
                placeholder="Write your message..."
                class="mt-1 w-full border border-gray-300 rounded-lg p-3 focus:outline-none focus:ring-2 focus:ring-blue-500"
              ></textarea>
            </div>

            <!-- Submit Button -->
            <button
              type="submit"
              class="w-full py-3 bg-blue-500 text-white font-semibold rounded-lg shadow-md hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-400 focus:ring-offset-2"
            >
              Send Message
            </button>
          </form>
        </section>
      </section>
    </main>
  </MainLayout>
</template>
