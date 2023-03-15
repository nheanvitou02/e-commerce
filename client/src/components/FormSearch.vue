<template>
  <div>
    <div class="w-full relative space-y-3">
      <div class="relative w-full">
        <div
          class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none"
        >
          <svg
            aria-hidden="true"
            class="w-5 h-5 text-gray-500 dark:text-gray-400"
            fill="currentColor"
            viewBox="0 0 20 20"
            xmlns="http://www.w3.org/2000/svg"
          >
            <path
              fill-rule="evenodd"
              d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z"
              clip-rule="evenodd"
            ></path>
          </svg>
        </div>
        <input
          type="text"
          id="search"
          v-model="searchTerm"
          class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-sm focus:ring-sky-500 focus:border-sky-500 block w-full pl-10 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-sky-500 dark:focus:border-sky-500"
          placeholder="Search"
          required
        />
      </div>
      <ul
        v-if="dataProducts.length"
        class="w-full rounded-sm bg-white border border-gray-300 px-4 py-2 space-y-1 absolute z-10"
      >
        <!-- <li class="px-1 pt-1 pb-2 font-bold border-b border-gray-200">
                    Showing {{ searchCountries.length }} of {{ countries.length }} results
                </li> -->
        <li
          v-for="item in dataProducts"
          :key="item.id"
          @click="detail(item.slug)"
          class="cursor-pointer hover:bg-gray-100 px-4"
        >
          <div class="flex item-center mb-2">
            <div>
              <img
                class="h-24 w-24 object-contain mix-blend-multiply"
                :src="item.image"
                alt="product"
              />
            </div>
            <div class="px-4 flex justify-between">
              <div class="text-left">
                <p
                  class="text-sm font-semibold text-gray-900 h-11 overflow-hidden"
                >
                  {{ item.title }}
                </p>
                <span class="text-gray-500 text-xs">{{ item.brand.name }}</span>
                <p class="text-sm text-red-500">
                  {{
                    vueNumberFormat(item.price, {
                      prefix: "$",
                      decimal: ".",
                    })
                  }}
                </p>
              </div>
            </div>
          </div>
        </li>
      </ul>

      <!-- <p v-if="selectedCountry" class="text-lg pt-2 absolute">
                You have selected: <span class="font-semibold">{{ selectedCountry }}</span>
            </p> -->
    </div>
  </div>
</template>

<script>
import userService from "../services/user.service";
export default {
  data() {
    return {
      dataProducts: [],
      searchTerm: "",
    };
  },
  watch: {
    searchTerm: function (val) {
      if (val === "") {
        return (this.dataProducts = []);
      }
      userService
        .getPublic(`/v1/products?q=${val}`)
        .then((res) => (this.dataProducts = res.data.data));
    },
  },
  methods: {
    detail: function (slug) {
      this.$router.push(`/products/${slug}`);
      this.dataProducts = [];
      this.searchTerm = "";
    },
  },
};
</script>
