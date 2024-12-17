<template>
    <MainLayout>
        <Hero />
        <div class="mt-10 mb-10">
            <Partner />
        </div>
        <div class="mt-10 mb-10">
            <Product />
        </div>
        <div class="mt-10 mb-10">
            <Feedback :feedbacks="feedback" />
        </div>
    </MainLayout>
</template>

<script setup>
    import MainLayout from '@/ComponentUser/layout/MainLayout.vue';
    import Hero from '@/Pages/Landing/Hero.vue';
    import Partner from '@/Pages/Landing/Partner.vue';
    import Product from '@/Pages/Landing/product.vue';
    import Feedback from '@/Pages/Landing/Feedback.vue';
    import { usePage } from '@inertiajs/vue3';
    import { ref, watch } from 'vue';

    const { props } = usePage();
    const feedback = ref(props.feedback || []);

    // Watching to detect changes in feedbacks
    watch(() => props.feedback, (newFeedbacks) => {
        feedback.value = newFeedbacks;
    });

</script>
