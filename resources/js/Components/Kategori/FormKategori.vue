<script setup>
    import FormControlIcon from '@/Components/FormControlIcon.vue';
    import {
        useForm,
        router
    } from '@inertiajs/vue3';

    const props = defineProps({
        kategori: {
            type: Array,
            default: () => [],
        },
    })

    const form = useForm({
        kategori: null
    });

    function submit() {
    form.post(route('kategori.store'), {
        forceFormData: true,
        onSuccess: () => {
            clearForm();
            router.get(route('kategori')); // Setelah berhasil, arahkan kembali ke halaman kategori
            alert('Kategori berhasil ditambahkan!'); // Menampilkan alert success
        },
    });
}

    function clearForm() {
        form.reset();
    }

</script>

<template>
    <form @submit.prevent="submit">
        <div class="relative">
            <div>
                <label class="mb-3 block text-sm font-medium text-black dark:text-white">
                    Kategori
                </label>
                <div class="relative">
                    <input type="text" placeholder="Kategori" v-model="form.kategori"
                        class="w-full rounded-lg border-[1.5px] text-black border-stroke bg-transparent py-3 px-5 pl-12 font-normal outline-none transition focus:border-primary active:border-primary disabled:cursor-default disabled:bg-whiter dark:text-white dark:border-form-strokedark dark:bg-form-input dark:focus:border-primary" />
                    <FormControlIcon v-if="icon" :icon="icon" :h="controlIconH"
                        class="absolute top-1/2 left-2 transform -translate-y-1/2 text-black dark:text-white" />
                </div>
                <div class="grid grid-cols-2 mt-5">
                    <button type="submit"
                        class="bg-slate-600 text-white rounded-full mr-3 px-8 py-4 text-lg">Submit</button>
                    <button type="button" @click="clearForm"
                        class="bg-slate-600 text-white rounded-full ml-3 px-8 py-4 text-lg">Clear</button>
                </div>
            </div>
        </div>
    </form>
</template>
