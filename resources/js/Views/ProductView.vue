<template>
  <div class="mt-8">
    <h1 class="text-2xl font-semibold text-gray-800">Form Produk</h1>

    <div class="mt-4">
      <div class="p-6 bg-white rounded-md shadow-md">
        <h2 class="text-lg font-semibold text-gray-700 capitalize">
          Produk
        </h2>

        <form @submit.prevent="register">
          <div class="grid grid-cols-1 gap-6 mt-4 sm:grid-cols-2">
            <div>
              <label class="text-gray-700" for="name">Nama</label>
              <input
                class="w-full mt-2 border-gray-200 rounded-md focus:border-indigo-600 focus:ring focus:ring-opacity-40 focus:ring-indigo-500"
                type="text" v-model="user.name" />
            </div>

            <div>
              <label class="text-gray-700" for="kategori">Kategori</label>
              <input
                class="w-full mt-2 border-gray-200 rounded-md focus:border-indigo-600 focus:ring focus:ring-opacity-40 focus:ring-indigo-500"
                type="text" v-model="user.kategori" />
            </div>

            <div>
              <label class="text-gray-700" for="harga">Harga</label>
              <input
                class="w-full mt-2 border-gray-200 rounded-md focus:border-indigo-600 focus:ring focus:ring-opacity-40 focus:ring-indigo-500"
                type="text" v-model="user.harga" />
            </div>

            <div>
              <label class="text-gray-700" for="stock">Stock</label>
              <input
                class="w-full mt-2 border-gray-200 rounded-md focus:border-indigo-600 focus:ring focus:ring-opacity-40 focus:ring-indigo-500"
                type="text" v-model="user.stock" />
            </div>

          </div>

          <div class="flex justify-end mt-4">
            <button
              class="px-4 py-2 text-gray-200 bg-gray-800 rounded-md hover:bg-gray-700 focus:outline-none focus:bg-gray-700">
              Save
            </button>
          </div>
        </form>
      </div>
    </div>
  </div>

  <div class="flex flex-col mt-8">
  <h1 class="text-2xl font-semibold text-gray-800">Daftar Produk</h1>
    <div class="py-2 -my-2 mt-4 overflow-x-auto sm:-mx-6 sm:px-6 lg:-mx-8 lg:px-8">
      <div class="inline-block min-w-full overflow-hidden align-middle border-b border-gray-200 shadow sm:rounded-lg">
        <table class="min-w-full">
          <thead>
            <tr>
              <th
                class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase border-b border-gray-200 bg-gray-50">
                Nama</th>
              <th
                class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase border-b border-gray-200 bg-gray-50">
                Kategori</th>
              <th
                class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase border-b border-gray-200 bg-gray-50">
                Harga</th>
              <th
                class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase border-b border-gray-200 bg-gray-50">
                Stock</th>
              <th class="px-6 py-3 border-b border-gray-200 bg-gray-50"></th>
            </tr>
          </thead>

          <tbody class="bg-white">
            <tr v-for="(u, index) in users" :key="index">
              <td class="px-6 py-4 border-b border-gray-200 whitespace-nowrap">
                <div class="flex items-center">
                  <div class="ml-4">
                    <div class="text-sm font-medium leading-5 text-gray-900">{{ u.name }}</div>
                  </div>
                </div>
              </td>
              <td class="px-6 py-4 border-b border-gray-200 whitespace-nowrap">
                <div class="text-sm leading-5 text-gray-900">{{ u.category }}</div>
              </td>
              <td class="px-6 py-4 border-b border-gray-200 whitespace-nowrap">
                <span
                  class="inline-flex px-2 text-xs font-semibold leading-5 text-green-800 bg-green-100 ">{{
                  u.price }}</span>
              </td>
              <td class="px-6 py-4 text-sm leading-5 text-gray-500 border-b border-gray-200 whitespace-nowrap">
                {{ u.stock }}
              </td>
              <td class="px-6 py-4 text-sm font-medium leading-5 text-right border-b border-gray-200 whitespace-nowrap">
                <a href="#" class="text-indigo-600 hover:text-indigo-900">Edit</a>
              </td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</template>

<script lang="ts">
import { defineComponent, ref } from "vue";

interface User {
  name: string;
  category: string;
  price: string;
  stock: string;
}

interface FormUser {
  name: string;
  kategori: string;
  harga: string;
  stock: string;
}

export default defineComponent({
  setup() {
    const testUser: User = {
      name: "Chitato",
      category: "Makanan",
      price: "Rp.100.000",
      stock: "100",
    };

    const users = ref<User[]>([...Array(10).keys()].map(() => testUser));

    const user = ref<FormUser>({
      name: "",
      kategori: "",
      harga: "",
      stock: "",
    });

    const register = () => {
      const data = JSON.parse(JSON.stringify(user.value));
      console.log("Registered: ", data);
    };

    return {
      users,
      user,
      register,
    };
  },
});
</script>
