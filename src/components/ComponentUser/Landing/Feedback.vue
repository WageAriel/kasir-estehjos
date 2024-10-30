<template>
  <section class="flex flex-col items-center py-10 bg-gray-50 rounded-lg shadow-lg">
    <h1 class="text-4xl font-semibold text-green-800 mb-8 text-center">
      Feedback Corner
    </h1>
    <div class="relative w-full max-w-6xl overflow-hidden">
      <!-- Container for the feedback cards -->
      <div class="flex gap-6 transition-transform duration-500" :style="{ transform: `translateX(-${activeIndex * 33.33}%)` }" style="width: 300%;">
        <!-- Feedback Card 1 -->
        <article
          v-for="(feedback, index) in feedbacks"
          :key="index"
          class="flex flex-col w-[33.33%] p-6 bg-white rounded-lg shadow-md hover:shadow-2xl transition-shadow duration-300"
        >
          <h3 class="text-2xl font-semibold text-green-900">{{ feedback.name }}</h3>
          <p class="mt-4 text-gray-600">{{ feedback.text }}</p>
        </article>
      </div>
    </div>

    <!-- Navigation Buttons -->
    <div class="flex justify-between mt-8 w-full max-w-md">
      <button @click="prev" class="px-4 py-2 bg-green-500 text-white rounded-lg hover:bg-green-600">Previous</button>
      <button @click="next" class="px-4 py-2 bg-green-500 text-white rounded-lg hover:bg-green-600">Next</button>
    </div>
  </section>
</template>

<script>
export default {
  name: 'FeedbackCorner',
  data() {
    return {
      activeIndex: 0, // controls the index of the visible feedback cards
      feedbacks: [
        { name: 'Emily Wilson', text: 'The customer experience was exceptional from start to finish. The website is user-friendly, the checkout process was smooth, and the clothes I ordered fit perfectly. I am beyond satisfied!' },
        { name: 'Sarah Thompson', text: 'I absolutely love the quality and style of the clothing I purchased from this website. Customer service was outstanding, and I received my order quickly. Highly recommended!' },
        { name: 'Olivia Martinez', text: 'I had a great experience shopping on this website. The clothes I bought are fashionable and comfortable. Highly satisfied!' },
        { name: 'John Doe', text: 'Great selection of products and fast delivery. I am very happy with my purchase. Will shop again!' },
        { name: 'Jane Smith', text: 'The ordering process was seamless, and the product quality is top-notch. I will definitely recommend this to my friends!' },
        { name: 'Michael Brown', text: 'Amazing service and great quality! Will definitely buy again.' },
      ],
    };
  },
  methods: {
    next() {
      // Prevent scrolling past the last group of cards
      if (this.activeIndex < Math.ceil(this.feedbacks.length / 3) - 1) {
        this.activeIndex++;
      }
    },
    prev() {
      // Prevent scrolling before the first group of cards
      if (this.activeIndex > 0) {
        this.activeIndex--;
      }
    }
  }
};
</script>

<style scoped>
/* Custom styles for the hover effect */
.hover\:shadow-2xl:hover {
  box-shadow: 0 10px 25px rgba(0, 0, 0, 0.2);
}
</style>
