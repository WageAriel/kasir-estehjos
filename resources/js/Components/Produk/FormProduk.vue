<script setup>
    import FormControlIcon from '@/Components/FormControlIcon.vue';
    import {
        useForm,
        router
    } from '@inertiajs/vue3';
    import {
        ref,
        onMounted
    } from 'vue';

    const kategoriOptions = ref([]);
    const fetchOptions = async () => {
        const kategoriResponse = await fetch('/api/kategori');
        kategoriOptions.value = await kategoriResponse.json();
    };

    onMounted(() => {
        fetchOptions();
    });

    const form = useForm({
        produk_name: '',
        kategori: null,
        harga: '',
        stok: '',
        deskripsi: ''
    });

    // Fungsi untuk submit form
    const submitForm = () => {
        form.post('/api/produk', {
            onSuccess: () => {
                router.get(route('produk')); // Setelah berhasil, arahkan kembali ke halaman kategori
                alert('Kategori berhasil ditambahkan!'); // Menampilkan alert success},
            },
            onError: () => {
                /* handle error */ },
        });
    };

    function clearForm() {
        form.reset();
    }

</script>

<template>
    <form @submit.prevent="submitForm">
        <div class="space-y-4">
            <!-- Nama Produk -->
            <div>
                <label class="mb-3 block text-sm font-medium text-black dark:text-white">
                    Nama Produk
                </label>
                <div class="relative">
                    <input type="text" placeholder="Nama Produk" v-model="form.produk_name"
                        class="w-full rounded-lg border-[1.5px] text-black border-stroke bg-transparent py-3 px-5 pl-12 font-normal outline-none transition focus:border-primary active:border-primary disabled:cursor-default disabled:bg-whiter dark:text-white dark:border-form-strokedark dark:bg-form-input dark:focus:border-primary" />
                    <FormControlIcon v-if="icon" :icon="icon" :h="controlIconH"
                        class="absolute top-1/2 left-2 transform -translate-y-1/2 text-black dark:text-white" />
                </div>
                <div v-if="form.errors.produk_name" class="text-red-500 text-sm mt-1">
                    {{ form.errors.produk_name }}
                </div>
            </div>

            <!-- Kategori -->
            <div>
                <label class="mb-3 block text-sm font-medium text-black dark:text-white">
                    Kategori
                </label>
                <div class="relative">
                    <select v-model="form.kategori"
                        class="w-full rounded-lg border-[1.5px] text-black border-stroke bg-transparent py-3 px-5 pl-12 font-normal outline-none transition focus:border-primary active:border-primary disabled:cursor-default disabled:bg-whiter dark:text-white dark:border-form-strokedark dark:bg-form-input dark:focus:border-primary">
                        <option value="">Pilih Kategori</option>
                        <!-- <option
                            v-for="kat in kategori"
                            :key="kat.kategori_id"
                            :value="kat.kategori_id"
                        >
                            {{ kat.kategori }}
                        </option> -->
                        <option v-for="option in kategoriOptions" :key="option.kategori_id" :value="option.kategori_id">
                            {{ option.kategori }}
                        </option>
                    </select>
                </div>
                <div v-if="form.errors.kategori_id" class="text-red-500 text-sm mt-1">
                    {{ form.errors.kategori_id }}
                </div>
            </div>

            <!-- Harga -->
            <div>
                <label class="mb-3 block text-sm font-medium text-black dark:text-white">
                    Harga
                </label>
                <div class="relative">
                    <input type="number" placeholder="Harga" v-model="form.harga"
                        class="w-full rounded-lg border-[1.5px] text-black border-stroke bg-transparent py-3 px-5 pl-12 font-normal outline-none transition focus:border-primary active:border-primary disabled:cursor-default disabled:bg-whiter dark:text-white dark:border-form-strokedark dark:bg-form-input dark:focus:border-primary" />
                </div>
                <div v-if="form.errors.harga" class="text-red-500 text-sm mt-1">
                    {{ form.errors.harga }}
                </div>
            </div>

            <!-- Stok -->
            <div>
                <label class="mb-3 block text-sm font-medium text-black dark:text-white">
                    Stok
                </label>
                <div class="relative">
                    <input type="number" placeholder="Stok" v-model="form.stok"
                        class="w-full rounded-lg border-[1.5px] text-black border-stroke bg-transparent py-3 px-5 pl-12 font-normal outline-none transition focus:border-primary active:border-primary disabled:cursor-default disabled:bg-whiter dark:text-white dark:border-form-strokedark dark:bg-form-input dark:focus:border-primary" />
                </div>
                <div v-if="form.errors.stok" class="text-red-500 text-sm mt-1">
                    {{ form.errors.stok }}
                </div>
            </div>

            <!-- Deskripsi -->
            <div>
                <label class="mb-3 block text-sm font-medium text-black dark:text-white">
                    Deskripsi
                </label>
                <div class="relative">
                    <textarea placeholder="Deskripsi" v-model="form.deskripsi"
                        class="w-full rounded-lg border-[1.5px] text-black border-stroke bg-transparent py-3 px-5 pl-12 font-normal outline-none transition focus:border-primary active:border-primary disabled:cursor-default disabled:bg-whiter dark:text-white dark:border-form-strokedark dark:bg-form-input dark:focus:border-primary"></textarea>
                </div>
                <div v-if="form.errors.deskripsi" class="text-red-500 text-sm mt-1">
                    {{ form.errors.deskripsi }}
                </div>
            </div>

            <!-- Buttons -->
            <div class="grid grid-cols-2 mt-5">
                <button type="submit"
                    class="bg-slate-600 text-white rounded-full mr-3 px-8 py-4 text-lg">Submit</button>
                <button type="button" @click="clearForm"
                    class="bg-slate-600 text-white rounded-full ml-3 px-8 py-4 text-lg">Clear</button>
            </div>
        </div>
    </form>
</template>
