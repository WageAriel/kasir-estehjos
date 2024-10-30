<template>
  <div>
    <h3 class="text-3xl font-medium text-gray-700">Kasir</h3>

    <!-- Alerts -->
    <div class="mt-4">
      <div class="mt-4">
        <div class="relative px-4 py-4 overflow-x-auto bg-white rounded-md whitespace-nowrap">
          <span class="absolute inset-y-0 left-0 flex items-center pl-3">
            <svg class="w-5 h-5 text-gray-500" viewBox="0 0 24 24" fill="none">
              <path
                d="M21 21L15 15M17 10C17 13.866 13.866 17 10 17C6.13401 17 3 13.866 3 10C3 6.13401 6.13401 3 10 3C13.866 3 17 6.13401 17 10Z"
                stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
            </svg>
          </span>
          <input
            class="w-32 pl-10 pr-4 text-indigo-600 border-gray-200 rounded-md sm:w-64 focus:border-indigo-600 focus:ring focus:ring-opacity-40 focus:ring-indigo-500"
            type="text" placeholder="Search" />
          <button
            class="px-4 py-2 ml-3 font-medium tracking-wide text-white capitalize transition-colors duration-200 transform bg-indigo-600 rounded-md hover:bg-indigo-500 focus:outline-none focus:bg-indigo-500">
            Search
          </button>
          <button @click="open = true"
            class="absolute top-4 right-4 px-6 py-3 font-medium tracking-wide text-white bg-indigo-600 rounded-md hover:bg-indigo-500 focus:outline-none">
            Open Modal
          </button>
        </div>
        <div class="w-full mt-6">
          <div
            class="flex flex-col justify-between p-6 leading-normal bg-white border-b border-l border-r border-gray-200 rounded-b lg:border-l-0 lg:border-t lg:border-gray-200 lg:rounded-b-none lg:rounded-r">
            <div class="mb-8">
              <div class="flex flex-col mt-8">
                <div class="py-2 -my-2 overflow-x-auto sm:-mx-6 sm:px-6 lg:-mx-8 lg:px-8">
                  <div
                    class="inline-block min-w-full overflow-hidden align-middle border-b border-gray-200 shadow sm:rounded-lg">
                    <table class="min-w-full">
                      <thead>
                        <tr>
                          <th
                            class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase border-b border-gray-200 bg-gray-50">
                            Produk
                          </th>
                          <th
                            class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase border-b border-gray-200 bg-gray-50">
                            Jumlah
                          </th>
                          <th
                            class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase border-b border-gray-200 bg-gray-50">
                            Harga
                          </th>
                          <th
                            class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase border-b border-gray-200 bg-gray-50">
                            Subtotal
                          </th>
                        </tr>
                      </thead>

                      <tbody class="bg-white">
                        <tr v-for="(u, index) in users" :key="index">
                          <td class="px-6 py-4 border-b border-gray-200 whitespace-nowrap">
                            <div class="flex items-center">
                              <div class="flex-shrink-0 w-10 h-10">
                                <img class="w-10 h-10 rounded-full"
                                  src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80"
                                  alt="" />
                              </div>

                              <div class="ml-4">
                                <div class="text-sm font-medium leading-5 text-gray-900">
                                  {{ u.name }}
                                </div>
                                <div class="text-sm leading-5 text-gray-500">
                                  {{ u.email }}
                                </div>
                              </div>
                            </div>
                          </td>

                          <td class="px-6 py-4 border-b border-gray-200 whitespace-nowrap">
                            <div class="flex items-center">
                              <button @click="decreaseQuantity(index)"
                                class="px-2 py-1 text-sm font-bold text-white bg-red-500 rounded-full">-</button>
                              <span class="mx-2 text-sm">{{ u.quantity }}</span>
                              <button @click="increaseQuantity(index)"
                                class="px-2 py-1 text-sm font-bold text-white bg-green-500 rounded-full">+</button>
                            </div>
                          </td>

                          <td class="px-6 py-4 border-b border-gray-200 whitespace-nowrap">
                            <span
                              class="inline-flex px-2 text-xs font-semibold leading-5 text-green-800 bg-green-100 rounded-full">{{ u.status }}</span>
                          </td>

                          <td
                            class="px-6 py-4 text-sm leading-5 text-gray-500 border-b border-gray-200 whitespace-nowrap">
                            {{ u.role }}
                          </td>
                        </tr>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div :class="`modal ${
        !open && 'opacity-0 pointer-events-none'
      } z-50 fixed w-full h-full top-0 left-0 flex items-center justify-center`">
          <div @click="open = false" class="absolute w-full h-full bg-gray-900 opacity-50 modal-overlay"></div>

          <div class="z-50 w-11/12 mx-auto overflow-y-auto bg-white rounded shadow-lg modal-container md:max-w-md">
            <div
              class="absolute top-0 right-0 z-50 flex flex-col items-center mt-4 mr-4 text-sm text-white cursor-pointer modal-close">
              <svg class="text-white fill-current" xmlns="http://www.w3.org/2000/svg" width="18" height="18"
                viewBox="0 0 18 18">
                <path
                  d="M14.53 4.53l-1.06-1.06L9 7.94 4.53 3.47 3.47 4.53 7.94 9l-4.47 4.47 1.06 1.06L9 10.06l4.47 4.47 1.06-1.06L10.06 9z" />
              </svg>
              <span class="text-sm">(Esc)</span>
            </div>

            <!-- Add margin if you want to see some of the overlay behind the modal-->
            <div class="px-6 py-4 text-left modal-content">
              <!--Title-->
              <div class="flex items-center justify-between pb-3">
                <p class="text-2xl font-bold">Transaksi</p>
                <div class="z-50 cursor-pointer modal-close" @click="open = false">
                  <svg class="text-black fill-current" xmlns="http://www.w3.org/2000/svg" width="18" height="18"
                    viewBox="0 0 18 18">
                    <path
                      d="M14.53 4.53l-1.06-1.06L9 7.94 4.53 3.47 3.47 4.53 7.94 9l-4.47 4.47 1.06 1.06L9 10.06l4.47 4.47 1.06-1.06L10.06 9z" />
                  </svg>
                </div>
              </div>

              <!--Body-->
              <form @submit.prevent="">
                <div>
                  <label class="text-gray-700" for="">Methode Pembayaran</label> <br>
                  <label>
                    <input type="radio" class="w-5 h-5 text-indigo-600 focus:ring-indigo-500" name="radio" /><span
                      class="ml-2 text-gray-700">Cash</span>
                  </label>
                  <label>
                    <input type="radio" class="w-5 h-5 ml-3 text-indigo-600 focus:ring-indigo-500" name="radio" /><span
                      class="ml-2 text-gray-700">QRis</span>
                  </label>
                </div>
                <div class="mt-3">
                  <label class="text-gray-700" for="username">Total Belanja</label>
                  <input
                    class="w-full mt-2 border-gray-200 rounded-md focus:border-indigo-600 focus:ring focus:ring-opacity-40 focus:ring-indigo-500"
                    type="text" disabled />
                </div>
                <div class="mt-3">
                  <label class="text-gray-700" for="username">Nominal</label>
                  <input
                    class="w-full mt-2 border-gray-200 rounded-md focus:border-indigo-600 focus:ring focus:ring-opacity-40 focus:ring-indigo-500"
                    type="text" />
                </div>
                <div class="mt-3">
                  <label class="text-gray-700" for="username">Kembalian</label>
                  <input
                    class="w-full mt-2 border-gray-200 rounded-md focus:border-indigo-600 focus:ring focus:ring-opacity-40 focus:ring-indigo-500"
                    type="text" disabled />
                </div>
              </form>

              <!--Footer-->
              <div class="flex justify-end pt-2">
                <button @click="open = false"
                  class="p-3 px-6 py-3 mr-2 text-indigo-500 bg-transparent rounded-lg hover:bg-gray-100 hover:text-indigo-400 focus:outline-none">
                  Close
                </button>
                <button @click="open = false"
                  class="px-6 py-3 font-medium tracking-wide text-white bg-indigo-600 rounded-md hover:bg-indigo-500 focus:outline-none">
                  Submit
                </button>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script lang="ts">
  import {
    defineComponent,
    ref
  } from "vue";

  interface User {
    name: string;
    email: string;
    title: string;
    title2: string;
    status: string;
    role: string;
    quantity: number;
  }

  export default defineComponent({
    setup() {
      const testUser: User = {
        name: "John Doe",
        email: "john@example.com",
        title: "Software Engineer",
        title2: "Web dev",
        status: "Rp. 10.000",
        role: "Owner",
        quantity: 1, // default quantity
      };

      const users = ref < User[] > ([...Array(10).keys()].map(() => ({
        ...testUser
      })));

      const increaseQuantity = (index: number) => {
        users.value[index].quantity++;
      };

      const decreaseQuantity = (index: number) => {
        if (users.value[index].quantity > 0) {
          users.value[index].quantity--;
        }
      };

      const open = ref(false);

      return {
        users,
        open,
        increaseQuantity,
        decreaseQuantity,
      };
    },
  });
</script>

<style>
  .modal {
    transition: opacity 0.25s ease;
  }
</style>