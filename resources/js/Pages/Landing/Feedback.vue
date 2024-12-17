<template>
    <h1 class="text-3xl font-bold mb-6 text-center">Manajemen Feedback</h1>
    <section class="flex flex-col items-center py-10 bg-gray-50 rounded-sm shadow-lg">
        <!-- Feedback List -->
        <div class="relative w-full max-w-6xl overflow-hidden">
            <div class="flex gap-6 transition-transform duration-500"
                :style="{ transform: `translateX(-${activeIndex * 33.33}%)` }" style="width: 100%;">
                <div v-for="feedback in displayedFeedbacks" :key="feedback.feedback_id"
                    class="flex flex-col w-[33.33%] p-6 bg-white rounded-lg shadow-md hover:shadow-2xl transition-shadow duration-300">
                    <div>
                        <h3 class="text-2xl font-semibold text-green-900">{{ feedback.name }}</h3>
                        <p class="mt-4 text-gray-600">{{ feedback.feedback }}</p>
                    </div>
                    <div class="flex space-x-2">
                        <button @click="deleteFeedback(feedback.feedback_id)"
                            class="px-3 py-1 bg-red-500 text-white rounded hover:bg-red-600">
                            Hapus
                        </button>
                    </div>
                </div>
            </div>
        </div>
        <div class="flex justify-between mt-8 w-full max-w-md">
            <button @click="prev" :disabled="activeIndex === 0"
                class="px-4 py-2 bg-green-500 text-white rounded-lg hover:bg-green-600 disabled:bg-green-300 disabled:cursor-not-allowed">
                Previous
            </button>
            <button @click="next" :disabled="activeIndex >= maxIndex"
                class="px-4 py-2 bg-green-500 text-white rounded-lg hover:bg-green-600 disabled:bg-green-300 disabled:cursor-not-allowed">
                Next
            </button>
        </div>
        <!-- Feedback Form -->
        <div class="container mx-auto px-4 py-8">
            <form @submit.prevent="submitFeedback" class="max-w-lg mx-auto mb-8 p-6 bg-white rounded-lg shadow-md">
                <h2 class="text-2xl font-semibold mb-4">
                    {{ editingFeedback ? 'Edit' : 'Tambah' }} Feedback
                </h2>

                <textarea v-model="feedbackText"
                    :placeholder="editingFeedback ? 'Edit feedback Anda' : 'Tulis feedback Anda'"
                    class="w-full p-3 border rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500" rows="4"
                    required></textarea>

                <div class="flex justify-between mt-4">
                    <button type="submit" class="px-4 py-2 bg-green-500 text-white rounded-lg hover:bg-green-600">
                        {{ editingFeedback ? 'Perbarui' : 'Kirim' }} Feedback
                    </button>

                    <button v-if="editingFeedback" @click="cancelEdit" type="button"
                        class="px-4 py-2 bg-gray-500 text-white rounded-lg hover:bg-gray-600">
                        Batal
                    </button>
                </div>
            </form>
        </div>
    </section>
</template>

<script setup>
    import {
        ref,
        computed,
        onMounted
    } from 'vue'
    import {
        useForm,
        usePage,
        router
    } from '@inertiajs/vue3'
import LandingView from './LandingView.vue';

    const props = defineProps({
        feedbacks: {
            type: Array,
            required: true
        }
    })

    // Get authenticated user ID
    const authUserId = computed(() => usePage().props.auth.user.id)

    const ITEMS_PER_PAGE = 3
    const activeIndex = ref(0)

    // Computed property to determine the maximum index based on total feedbacks
    const maxIndex = computed(() => {
        return Math.max(0, Math.ceil(props.feedbacks.length / ITEMS_PER_PAGE) - 1)
    })

    // Computed property to get the current group of displayed feedbacks
    const displayedFeedbacks = computed(() => {
        const start = activeIndex.value * ITEMS_PER_PAGE
        const end = start + ITEMS_PER_PAGE
        return props.feedbacks.slice(start, end)
    })

    const next = () => {
        if (activeIndex.value < maxIndex.value) {
            activeIndex.value++
        }
    }

    const prev = () => {
        if (activeIndex.value > 0) {
            activeIndex.value--
        }
    }

    const feedbackText = ref('')
    const editingFeedback = ref(null)

    // Submit feedback (create or update)
    const submitFeedback = () => {
        const form = useForm({
            feedback: feedbackText.value,
            feedback_id: editingFeedback.value ? editingFeedback.value.feedback_id : null
        })

        form.post('/', {
            onSuccess: () => {
                feedbackText.value = '' // Reset textarea after submission
            }
        })
    }

    const deleteFeedback = (feedback_id) => {
        const form = useForm({})

        if (confirm("Apakah Anda yakin ingin menghapus feedback ini?")) {
            form.delete(`/feedback/${feedback_id}`, {
                onSuccess: () => {
                    alert('feedback berhasil dihapus!');
                },
                onError: () => {
                    alert('Gagal menghapus feedback!');
                }
            });
        }
    }

</script>
