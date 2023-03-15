<template>
  <div class="container mx-auto pb-4">
    <nav class="flex py-5" aria-label="Breadcrumb">
      <ol class="inline-flex items-center space-x-1 md:space-x-3">
        <li class="inline-flex items-center">
          <router-link
            to="/"
            class="inline-flex items-center text-sm font-medium text-gray-700 hover:text-blue-600 dark:text-gray-400 dark:hover:text-white"
          >
            <svg
              aria-hidden="true"
              class="w-4 h-4 mr-2"
              fill="currentColor"
              viewBox="0 0 20 20"
              xmlns="http://www.w3.org/2000/svg"
            >
              <path
                d="M10.707 2.293a1 1 0 00-1.414 0l-7 7a1 1 0 001.414 1.414L4 10.414V17a1 1 0 001 1h2a1 1 0 001-1v-2a1 1 0 011-1h2a1 1 0 011 1v2a1 1 0 001 1h2a1 1 0 001-1v-6.586l.293.293a1 1 0 001.414-1.414l-7-7z"
              ></path>
            </svg>
            Home
          </router-link>
        </li>
        <li>
          <div class="flex items-center">
            <svg
              aria-hidden="true"
              class="w-6 h-6 text-gray-400"
              fill="currentColor"
              viewBox="0 0 20 20"
              xmlns="http://www.w3.org/2000/svg"
            >
              <path
                fill-rule="evenodd"
                d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                clip-rule="evenodd"
              ></path>
            </svg>
            <span
              class="ml-1 cursor-pointer text-sm font-medium text-gray-700 hover:text-blue-600 md:ml-2 dark:text-gray-400 dark:hover:text-white"
              >Detail</span
            >
          </div>
        </li>
      </ol>
    </nav>
    <div
      class="grid grid-cols-1 lg:grid-cols-3 gap-x-2 xl:gap-x-2 gap-y-10 bg-white p-8"
    >
      <div class="w-full rounded-sm">
        <table class="text-left w-full">
          <tbody>
            <tr class="h-12">
              <td class="w-36 text-xs sm:text-base">No. invoice</td>
              <td>:</td>
              <td class="p-1 text-xs sm:text-base break-all">
                {{ data.invoice }}
              </td>
            </tr>
            <tr class="h-12">
              <td class="w-36 text-xs sm:text-base">Name</td>
              <td>:</td>
              <td class="p-1 text-xs sm:text-base break-all">
                {{ data.name }}
              </td>
            </tr>
            <tr class="h-12">
              <td class="w-36 text-xs sm:text-base">Phone</td>
              <td>:</td>
              <td class="p-1 text-xs sm:text-base break-all">
                0{{ data.phone }}
              </td>
            </tr>
            <tr class="h-12">
              <td class="w-36 text-xs sm:text-base">Service</td>
              <td>:</td>
              <td class="p-1 text-xs sm:text-base break-all">
                {{ data.service }}
              </td>
            </tr>
            <tr class="h-12">
              <td class="w-36 text-xs sm:text-base">Grand Total</td>
              <td>:</td>
              <td class="p-1 text-xs sm:text-base break-all text-red-500">
                {{
                  vueNumberFormat(data.grand_total, {
                    prefix: "$",
                    decimal: ".",
                  })
                }}
              </td>
            </tr>
            <tr class="h-12">
              <td class="w-36 text-xs sm:text-base">Status</td>
              <td>:</td>
              <td
                class="p-1 text-xs sm:text-base break-all"
                :class="
                  data.status == 'success' ? 'text-blue-800' : 'text-yellow-800'
                "
              >
                {{ data.status }}
              </td>
            </tr>
          </tbody>
        </table>
        <div class="p-6 text-center" v-if="data.substatus == 'receive'">
          <svg
            aria-hidden="true"
            class="mx-auto mb-4 text-gray-400 w-14 h-14 dark:text-gray-200"
            fill="none"
            stroke="currentColor"
            viewBox="0 0 24 24"
            xmlns="http://www.w3.org/2000/svg"
          >
            <path
              stroke-linecap="round"
              stroke-linejoin="round"
              stroke-width="2"
              d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"
            ></path>
          </svg>
          <h3 class="mb-5 text-lg font-normal text-gray-500 dark:text-gray-400">
            Does the product you order received?
          </h3>
          <button
            type="button"
            @click="receive(data.id)"
            class="text-white bg-sky-600 hover:bg-sky-800 focus:ring-4 focus:outline-none focus:ring-sky-300 dark:focus:ring-sky-800 font-medium rounded-sm text-sm inline-flex items-center px-5 py-2.5 text-center mr-2"
          >
            Yes, I'm sure
          </button>
        </div>
      </div>
      <div class="relative overflow-x-auto h-[450px] col-span-2">
        <table
          class="w-full text-sm text-left text-gray-500 dark:text-gray-400"
        >
          <thead
            class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400"
          >
            <tr>
              <th class="px-6 py-3">Image</th>
              <th class="px-6 py-3">Product name</th>
              <th class="px-6 py-3">Invoice</th>
              <th class="px-6 py-3">Quantity</th>
              <th class="px-6 py-3">Price</th>
            </tr>
          </thead>
          <tbody>
            <tr v-for="product in data.orders" :key="product.id">
              <th
                class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white w-32"
              >
                <img :src="product.image" alt="product" />
              </th>
              <th
                class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white"
              >
                <div class="w-32 overflow-hidden">
                  {{ product.product_name }}
                </div>
              </th>
              <td class="px-6 py-4">{{ product.invoice }}</td>
              <td class="px-6 py-4">{{ product.qty }}</td>
              <td class="px-6 py-4 text-red-500">
                {{
                  vueNumberFormat(product.price, {
                    prefix: "$",
                    decimal: ".",
                  })
                }}
              </td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</template>

<script>
import userService from "../services/user.service";

export default {
  data() {
    return {
      data: Object,
      loading: false,
    };
  },
  computed: {
    loggedIn() {
      return this.$store.state.status.loggedIn;
    },
  },
  created() {
    this.loading = true;
    userService.getPrivate(`/invoice/${this.$route.params.id}`).then((res) => {
      this.data = res.data;
      this.loading = false;
    });
    if (this.loggedIn) this.$store.dispatch("getNoti");
    window.scrollTo(0, 0);
  },
  methods: {
    receive(id) {
      this.loading = true;
      userService.postPrivate(`/invoice/${id}`).then(() => {
        this.$store.dispatch("getNoti");
        userService
          .getPrivate(`/invoice/${this.$route.params.id}`)
          .then((res) => {
            this.data = res.data;
            this.loading = false;
          });
      });
    },
  },
};
</script>
