<script setup>
    import {
        defineProps,
        ref
    } from 'vue';
    import {
        useForm,
        router
    } from '@inertiajs/vue3';

    const props = defineProps({
        errors: {
            type: Object,
            default: () => ({}),
        },
        produk: {
            type: Array,
            default: () => [],
        },
        kategoriOptions: {
            type: Array,
            default: () => []
        },
    });

    const form = useForm({
        produk_id: '',
        produk_name: '',
        kategori: null,
        harga: '',
        stok: '',
        deskripsi: '',
        gambar: null
    });

    // Delete functionality
    function destroy(produk_id) {
        if (confirm("Apakah Anda yakin ingin menghapus produk ini?")) {
            form.delete(`/dashboard/produk/${produk_id}`, {
                onSuccess: () => {
                    alert('Produk berhasil dihapus!');
                    router.get(route('produk.index'));
                },
                onError: () => {
                    alert('Gagal menghapus produk!');
                }
            });
        }
    }

    // Edit functionality
    const isEditModalOpen = ref(false);

    function openEditModal(produkData) {
        form.produk_id = produkData.produk_id;
        form.produk_name = produkData.produk_name;
        form.kategori = produkData.kategori ? produkData.kategori.kategori_id : '';
        form.harga = produkData.harga;
        form.stok = produkData.stok;
        form.deskripsi = produkData.deskripsi;
        form.gambar = produkData.gambar;
        isEditModalOpen.value = true;
    }

    function saveChanges() {
        const formData = new FormData();
        Object.keys(form).forEach(key => {
            formData.append(key, form[key]);
        });

        // Tambahkan method _method untuk simulasi PUT
        formData.append('_method', 'PUT');

        form.post(`/dashboard/produk/${form.produk_id}`, formData, {
            onSuccess: () => {
                closeEditModal();
                alert('Produk berhasil diupdate!');
                router.get(route('produk.index'));
            },
            onError: () => {
                alert('Gagal mengupdate produk!');
            },
        });
    }

    function closeEditModal() {
        isEditModalOpen.value = false;
        form.reset();
    }

    const handleFileUpload = (event) => {
        form.gambar = event.target.files[0];
    };

</script>

<template>
    <table>
        <thead>
            <tr>
                <th>Gambar</th>
                <th>ID Produk</th>
                <th>Nama Produk</th>
                <th>Kategori</th>
                <th>Harga</th>
                <th>Stok</th>
                <th>Deskripsi</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <tr v-for="produkData in produk" :key="produkData.produk_id">
                <td>
                    <img
                        :src="`/storage/${produkData.gambar}`"
                        :alt="produkData.produk_name"
                        class="w-16 h-16 object-cover rounded"
                    />
                </td>
                <td data-label="Nama Produk">{{ produkData.produk_id }}</td>
                <td data-label="Nama Produk">{{ produkData.produk_name }}</td>
                <td data-label="Kategori">{{ produkData.kategori ? produkData.kategori.kategori : 'N/A' }}</td>
                <td data-label="Harga">{{ produkData.harga }}</td>
                <td data-label="Stok">{{ produkData.stok }}</td>
                <td data-label="Deskripsi">{{ produkData.deskripsi }}</td>
                <td class="before:hidden lg:w-1 whitespace-nowrap">
                    <button @click.prevent="openEditModal(produkData)" class="hover:text-warning">
                        <svg class="fill-current" width="18" height="18" viewBox="0 0 18 18" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M8.99981 14.8219C3.43106 14.8219 0.674805 9.50624 0.562305 9.28124C0.47793 9.11249 0.47793 8.88749 0.562305 8.71874C0.674805 8.49374 3.43106 3.20624 8.99981 3.20624C14.5686 3.20624 17.3248 8.49374 17.4373 8.71874C17.5217 8.88749 17.5217 9.11249 17.4373 9.28124C17.3248 9.50624 14.5686 14.8219 8.99981 14.8219ZM1.85605 8.99999C2.4748 10.0406 4.89356 13.5562 8.99981 13.5562C13.1061 13.5562 15.5248 10.0406 16.1436 8.99999C15.5248 7.95936 13.1061 4.44374 8.99981 4.44374C4.89356 4.44374 2.4748 7.95936 1.85605 8.99999Z"
                                fill="" />
                            <path
                                d="M9 11.3906C7.67812 11.3906 6.60938 10.3219 6.60938 9C6.60938 7.67813 7.67812 6.60938 9 6.60938C10.3219 6.60938 11.3906 7.67813 11.3906 9C11.3906 10.3219 10.3219 11.3906 9 11.3906ZM9 7.875C8.38125 7.875 7.875 8.38125 7.875 9C7.875 9.61875 8.38125 10.125 9 10.125C9.61875 10.125 10.125 9.61875 10.125 9C10.125 8.38125 9.61875 7.875 9 7.875Z"
                                fill="" />
                        </svg>
                    </button>
                    <button @click.prevent="destroy(produkData.produk_id)" class="hover:text-danger">
                        <svg class="fill-current" width="18" height="18" viewBox="0 0 18 18" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M13.7535 2.47502H11.5879V1.9969C11.5879 1.15315 10.9129 0.478149 10.0691 0.478149H7.90352C7.05977 0.478149 6.38477 1.15315 6.38477 1.9969V2.47502H4.21914C3.40352 2.47502 2.72852 3.15002 2.72852 3.96565V4.8094C2.72852 5.42815 3.09414 5.9344 3.62852 6.1594L4.07852 15.4688C4.13477 16.6219 5.09102 17.5219 6.24414 17.5219H11.7004C12.8535 17.5219 13.8098 16.6219 13.866 15.4688L14.3441 6.13127C14.8785 5.90627 15.2441 5.3719 15.2441 4.78127V3.93752C15.2441 3.15002 14.5691 2.47502 13.7535 2.47502ZM7.67852 1.9969C7.67852 1.85627 7.79102 1.74377 7.93164 1.74377H10.0973C10.2379 1.74377 10.3504 1.85627 10.3504 1.9969V2.47502H7.70664V1.9969H7.67852ZM4.02227 3.96565C4.02227 3.85315 4.10664 3.74065 4.24727 3.74065H13.7535C13.866 3.74065 13.9785 3.82502 13.9785 3.96565V4.8094C13.9785 4.9219 13.8941 5.0344 13.7535 5.0344H4.24727C4.13477 5.0344 4.02227 4.95002 4.02227 4.8094V3.96565ZM11.7285 16.2563H6.27227C5.79414 16.2563 5.40039 15.8906 5.37227 15.3844L4.95039 6.2719H13.0785L12.6566 15.3844C12.6004 15.8625 12.2066 16.2563 11.7285 16.2563Z"
                                fill="" />
                            <path
                                d="M9.00039 9.11255C8.66289 9.11255 8.35352 9.3938 8.35352 9.75942V13.3313C8.35352 13.6688 8.63477 13.9782 9.00039 13.9782C9.33789 13.9782 9.64727 13.6969 9.64727 13.3313V9.75942C9.64727 9.3938 9.33789 9.11255 9.00039 9.11255Z"
                                fill="" />
                            <path
                                d="M11.2502 9.67504C10.8846 9.64692 10.6033 9.90004 10.5752 10.2657L10.4064 12.7407C10.3783 13.0782 10.6314 13.3875 10.9971 13.4157C11.0252 13.4157 11.0252 13.4157 11.0533 13.4157C11.3908 13.4157 11.6721 13.1625 11.6721 12.825L11.8408 10.35C11.8408 9.98442 11.5877 9.70317 11.2502 9.67504Z"
                                fill="" />
                            <path
                                d="M6.72245 9.67504C6.38495 9.70317 6.1037 10.0125 6.13182 10.35L6.3287 12.825C6.35683 13.1625 6.63808 13.4157 6.94745 13.4157C6.97558 13.4157 6.97558 13.4157 7.0037 13.4157C7.3412 13.3875 7.62245 13.0782 7.59433 12.7407L7.39745 10.2657C7.39745 9.90004 7.08808 9.64692 6.72245 9.67504Z"
                                fill="" />
                        </svg>
                    </button>
                </td>
            </tr>
        </tbody>
    </table>

    <!-- Edit Modal -->
    <div v-if="isEditModalOpen" class="fixed inset-0 flex items-center justify-center bg-gray-900 bg-opacity-75 z-50">
        <div class="bg-white rounded-lg p-5 w-full max-w-md">
            <h4 class="text-lg font-semibold mb-4">Edit Produk</h4>
            <form @submit.prevent="saveChanges">
                <div class="mb-4">
                    <label for="produk_name" class="block text-sm font-medium text-gray-700">Nama Produk</label>
                    <input type="text" v-model="form.produk_name" class="mt-1 p-2 w-full border rounded" required />
                    <div class="text-danger text-xs" v-if="errors.produk_name">{{ errors.produk_name }}</div>
                </div>

                <div class="mb-4">
                    <label for="kategori" class="block text-sm font-medium text-gray-700">Kategori</label>
                    <select v-model="form.kategori" class="mt-1 p-2 w-full border rounded">
                            <option value="" disabled>Select kategori</option>
                            <option v-for="kategori in props.kategoriOptions" :key="kategori.kategori_id" :value="kategori.kategori_id">
                                {{ kategori.kategori }}
                            </option>
                        </select>
                    <div class="text-danger text-xs" v-if="errors.kategori_id">{{ errors.kategori_id }}</div>
                </div>

                <div class="mb-4">
                    <label for="harga" class="block text-sm font-medium text-gray-700">Harga</label>
                    <input type="number" v-model="form.harga" class="mt-1 p-2 w-full border rounded" required />
                    <div class="text-danger text-xs" v-if="errors.harga">{{ errors.harga }}</div>
                </div>

                <div class="mb-4">
                    <label for="stok" class="block text-sm font-medium text-gray-700">Stok</label>
                    <input type="number" v-model="form.stok" class="mt-1 p-2 w-full border rounded" required />
                    <div class="text-danger text-xs" v-if="errors.stok">{{ errors.stok }}</div>
                </div>

                <div class="mb-4">
                    <label for="deskripsi" class="block text-sm font-medium text-gray-700">Deskripsi</label>
                    <textarea v-model="form.deskripsi" class="mt-1 p-2 w-full border rounded"></textarea>
                    <div class="text-danger text-xs" v-if="errors.deskripsi">{{ errors.deskripsi }}</div>
                </div>

                <div class="mb-4">
                    <label class="block text-sm font-medium text-gray-700">Gambar Produk</label>
                    <div class="mt-2">
                        <img
                            v-if="form.gambar && typeof form.gambar === 'string'"
                            :src="`/storage/${form.gambar}`"
                            class="w-32 h-32 object-cover rounded mb-2"
                        />
                        <input
                            type="file"
                            @input="handleFileUpload"
                            accept="image/*"
                            class="w-full border rounded p-2"
                        />
                    </div>
                </div>

                <div class="flex justify-end space-x-2">
                    <button type="button" @click="closeEditModal"
                        class="px-4 py-2 text-sm font-medium text-gray-500 bg-gray-200 rounded">Cancel</button>
                    <button type="submit"
                        class="px-4 py-2 text-sm font-medium text-white bg-blue-600 rounded">Save</button>
                </div>
            </form>
        </div>
    </div>
</template>

<style scoped>
    .modal {
        position: fixed;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background: rgba(0, 0, 0, 0.5);
        display: flex;
        justify-content: center;
        align-items: center;
    }

    .modal-content {
        background: white;
        padding: 20px;
        border-radius: 10px;
        width: 300px;
    }

</style>
