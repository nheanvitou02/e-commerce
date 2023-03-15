<template>
  <div class="container mx-auto">
    <nav class="flex py-5" aria-label="Breadcrumb">
      <ol class="inline-flex items-center space-x-1 md:space-x-3">
        <li class="inline-flex items-center">
          <router-link
            to="/"
            class="inline-flex items-center text-sm font-medium text-gray-700 hover:text-sky-600 dark:text-gray-400 dark:hover:text-white"
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
              class="ml-1 cursor-pointer text-sm font-medium text-gray-700 hover:text-sky-600 md:ml-2 dark:text-gray-400 dark:hover:text-white"
              >Product</span
            >
          </div>
        </li>
      </ol>
    </nav>
    <div
      class="grid grid-cols-1 lg:grid-cols-4 gap-x-2 xl:gap-x-2 gap-y-10 pb-4"
    >
      <div class="bg-white shadow-md mr-2 hidden lg:block">
        <span
          class="text-base lg:text-lg font-bold tracking-tight flex items-center justify-between p-4 dark:text-white text-gray-800"
        >
          <span class="hidden lg:flex items-center gap-2"
            ><svg
              class="h-6 w-6"
              viewBox="0 0 24 24"
              fill="none"
              stroke="currentColor"
              stroke-width="2"
              stroke-linecap="round"
              stroke-linejoin="round"
            >
              <polygon points="22 3 2 3 10 12.46 10 19 14 21 14 12.46 22 3" />
            </svg>
            <span class="text-lg">Filter: </span>
          </span>
          <router-link to="/products">
            <span
              @click="reset()"
              class="opacity-50 hidden lg:flex items-center text-sm gap-1 cursor-pointer"
              ><svg
                stroke="currentColor"
                fill="currentColor"
                stroke-width="0"
                viewBox="0 0 512 512"
                class="text-base"
                height="1em"
                width="1em"
                xmlns="http://www.w3.org/2000/svg"
              >
                <path
                  d="M433 288.8c-7.7 0-14.3 5.9-14.9 13.6-6.9 83.1-76.8 147.9-161.8 147.9-89.5 0-162.4-72.4-162.4-161.4 0-87.6 70.6-159.2 158.2-161.4 2.3-.1 4.1 1.7 4.1 4v50.3c0 12.6 13.9 20.2 24.6 13.5L377 128c10-6.3 10-20.8 0-27.1l-96.1-66.4c-10.7-6.7-24.6.9-24.6 13.5v45.7c0 2.2-1.7 4-3.9 4C148 99.8 64 184.6 64 288.9 64 394.5 150.1 480 256.3 480c100.8 0 183.4-76.7 191.6-175.1.8-8.7-6.2-16.1-14.9-16.1z"
                ></path>
              </svg>
              Reset</span
            >
          </router-link></span
        >
        <hr />
        <div class="p-4">
          <span class="dark:text-white text-gray-800 text-md font-bold"
            >Categories</span
          >
        </div>
        <div>
          <div
            v-for="item in dataCategory"
            :key="item.id"
            @click="queryProduct(item, 'category')"
            class="cursor-pointer px-4 py-2 hover:bg-gray-100 flex items-center space-x-1"
            :class="routeQuery.category == item.id ? 'text-sky-600' : ''"
          >
            <span class="w-5">
              <svg
                class="h-5 w-5"
                :class="routeQuery.category == item.id ? '' : ' hidden'"
                viewBox="0 0 24 24"
                fill="none"
                stroke="currentColor"
                stroke-width="2"
                stroke-linecap="round"
                stroke-linejoin="round"
              >
                <polyline points="20 6 9 17 4 12" />
              </svg>
            </span>
            <span>{{ item.name }}</span>
          </div>
        </div>
        <div class="p-4">
          <span class="dark:text-white text-gray-800 text-md font-bold"
            >Brands</span
          >
        </div>
        <div>
          <div
            v-for="item in dataBrand"
            :key="item.id"
            @click="queryProduct(item, 'brand')"
            class="cursor-pointer px-4 py-2 hover:bg-gray-100 flex items-center space-x-1"
            :class="routeQuery.brand == item.id ? 'text-sky-600' : ''"
          >
            <span class="w-5">
              <svg
                class="h-5 w-5"
                :class="routeQuery.brand == item.id ? '' : ' hidden'"
                viewBox="0 0 24 24"
                fill="none"
                stroke="currentColor"
                stroke-width="2"
                stroke-linecap="round"
                stroke-linejoin="round"
              >
                <polyline points="20 6 9 17 4 12" />
              </svg>
            </span>
            <span>{{ item.name }}</span>
          </div>
        </div>
        <div class="p-4 mb-6">
          <span class="dark:text-white text-gray-800 text-md font-bold"
            >Price</span
          >
        </div>
        <div class="px-6 pb-6">
          <Slider v-model="value" :merge="merge" :format="format" :max="1000" />
        </div>
      </div>
      <div class="col-span-3 min-h-screen">
        <div class="flex justify-end md:justify-between p-3 pr-0 items-center">
          <div class="hidden md:block">
            <span class="text-sm text-gray-700 dark:text-gray-400">
              Showing
              <span class="font-semibold text-gray-900 dark:text-white">{{
                page
              }}</span>
              to
              <span class="font-semibold text-gray-900 dark:text-white">{{
                per_page
              }}</span>
              of
              <span class="font-semibold text-gray-900 dark:text-white">{{
                total
              }}</span>
              Entries
            </span>
          </div>
          <div class="space-x-4 flex justify-between items-center">
            <div class="flex justify-between items-center space-x-2">
              <label
                for="sort"
                class="text-sm font-medium text-gray-900 dark:text-white"
              >
                Sort by:
              </label>
              <select
                @change="onChangeSort($event)"
                id="sort"
                class="bg-gray-50 cursor-pointer border border-gray-300 text-gray-900 text-sm rounded-sm focus:ring-sky-500 focus:border-sky-500 block px-1 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-sky-500 dark:focus:border-sky-500"
              >
                <option selected value="created_at-asc">Choose sort...</option>
                <option value="title-asc">Name(A-Z)</option>
                <option value="title-desc">Name(Z-A)</option>
                <option value="price-asc">Price (Low-Hight)</option>
                <option value="price-desc">Price (Hight-Low)</option>
              </select>
            </div>
            <div class="space-x-2">
              <button
                type="button"
                @click="showProduct(false)"
                class="text-sm p-1 font-medium text-gray-900 focus:outline-none bg-white rounded-sm border border-gray-200 hover:bg-gray-100 hover:text-sky-700 focus:z-10 focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700"
              >
                <svg
                  class="h-6 w-6"
                  :class="!swicth ? 'text-red-500' : ''"
                  width="24"
                  height="24"
                  viewBox="0 0 24 24"
                  stroke-width="2"
                  stroke="currentColor"
                  fill="none"
                  stroke-linecap="round"
                  stroke-linejoin="round"
                >
                  <path stroke="none" d="M0 0h24v24H0z" />
                  <rect x="4" y="4" width="6" height="6" rx="1" />
                  <rect x="14" y="4" width="6" height="6" rx="1" />
                  <rect x="4" y="14" width="6" height="6" rx="1" />
                  <rect x="14" y="14" width="6" height="6" rx="1" />
                </svg>
              </button>
              <button
                type="button"
                @click="showProduct(true)"
                class="text-sm p-1 font-medium text-gray-900 focus:outline-none bg-white rounded-sm border border-gray-200 hover:bg-gray-100 hover:text-sky-700 focus:z-10 focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700"
              >
                <svg
                  class="h-6 w-6"
                  :class="swicth ? 'text-red-500' : ''"
                  width="24"
                  height="24"
                  viewBox="0 0 24 24"
                  stroke-width="2"
                  stroke="currentColor"
                  fill="none"
                  stroke-linecap="round"
                  stroke-linejoin="round"
                >
                  <path stroke="none" d="M0 0h24v24H0z" />
                  <line x1="9" y1="6" x2="20" y2="6" />
                  <line x1="9" y1="12" x2="20" y2="12" />
                  <line x1="9" y1="18" x2="20" y2="18" />
                  <line x1="5" y1="6" x2="5" y2="6.01" />
                  <line x1="5" y1="12" x2="5" y2="12.01" />
                  <line x1="5" y1="18" x2="5" y2="18.01" />
                </svg>
              </button>
            </div>
          </div>
        </div>
        <NoItem v-if="data == 0" title="No Product Found" />
        <div v-else>
          <div
            v-if="!swicth"
            class="grid grid-cols-2 gap-2 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 xl:grid-col-4"
          >
            <CardAllProduct
              @refresh="
                getProduct(
                  page,
                  field,
                  type,
                  category,
                  brand,
                  value[0],
                  value[1]
                )
              "
              :data="data"
              v-if="!loadProduct"
            />
            <CardSkeleton v-else :data="16" />
          </div>
          <CardListAllProduct
            @refresh="
              getProduct(page, field, type, category, brand, value[0], value[1])
            "
            v-else
            :data="data"
          />
        </div>
      </div>
    </div>
    <div class="flex justify-end py-4">
      <a
        @click="prev()"
        class="inline-flex items-center px-4 py-2 mr-3 text-sm font-medium text-gray-500 bg-white border border-gray-300 rounded-lg dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400"
        :class="
          page == 1
            ? ' cursor-not-allowed'
            : 'cursor-pointer hover:bg-gray-100 hover:text-gray-700 dark:hover:bg-gray-700 dark:hover:text-white'
        "
      >
        <svg
          aria-hidden="true"
          class="w-5 h-5 mr-2"
          fill="currentColor"
          viewBox="0 0 20 20"
          xmlns="http://www.w3.org/2000/svg"
        >
          <path
            fill-rule="evenodd"
            d="M7.707 14.707a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 1.414L5.414 9H17a1 1 0 110 2H5.414l2.293 2.293a1 1 0 010 1.414z"
            clip-rule="evenodd"
          ></path>
        </svg>
        Previous
      </a>
      <a
        @click="next()"
        class="inline-flex items-center px-4 py-2 mr-3 text-sm font-medium text-gray-500 bg-white border border-gray-300 rounded-lg dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400"
        :class="
          total < per_page
            ? ' cursor-not-allowed'
            : 'cursor-pointer hover:bg-gray-100 hover:text-gray-700 dark:hover:bg-gray-700 dark:hover:text-white'
        "
      >
        Next
        <svg
          aria-hidden="true"
          class="w-5 h-5 ml-2"
          fill="currentColor"
          viewBox="0 0 20 20"
          xmlns="http://www.w3.org/2000/svg"
        >
          <path
            fill-rule="evenodd"
            d="M12.293 5.293a1 1 0 011.414 0l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-2.293-2.293a1 1 0 010-1.414z"
            clip-rule="evenodd"
          ></path>
        </svg>
      </a>
    </div>
  </div>
  <!-- Button drawer filter -->
  <div class="fixed top-[35%] left-0 block lg:hidden">
    <div
      class="bg-white p-1.5 shadow-md rounded-r-full cursor-pointer"
      type="button"
      data-drawer-target="drawer-filter"
      data-drawer-show="drawer-filter"
      aria-controls="drawer-filter"
    >
      <svg
        class="h-8 w-8 text-black"
        fill="none"
        viewBox="0 0 24 24"
        stroke="currentColor"
      >
        <path
          stroke-linecap="round"
          stroke-linejoin="round"
          stroke-width="2"
          d="M9 5l7 7-7 7"
        />
      </svg>
    </div>
  </div>

  <!-- drawer component -->
  <div
    id="drawer-filter"
    class="fixed top-0 left-0 z-40 h-screen p-4 overflow-y-auto transition-transform -translate-x-full bg-white w-80 dark:bg-gray-800"
    tabindex="-1"
    aria-labelledby="drawer-label"
  >
    <button
      type="button"
      data-drawer-hide="drawer-filter"
      aria-controls="drawer-filter"
      class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 absolute top-2.5 right-2.5 inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white"
    >
      <svg
        aria-hidden="true"
        class="w-5 h-5"
        fill="currentColor"
        viewBox="0 0 20 20"
        xmlns="http://www.w3.org/2000/svg"
      >
        <path
          fill-rule="evenodd"
          d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
          clip-rule="evenodd"
        ></path>
      </svg>
      <span class="sr-only">Close menu</span>
    </button>
    <div class="bg-white mt-6">
      <span
        class="text-base lg:text-lg font-bold tracking-tight flex items-center justify-between p-4 dark:text-white text-gray-800"
      >
        <span class="flex items-center gap-2"
          ><svg
            class="h-6 w-6"
            viewBox="0 0 24 24"
            fill="none"
            stroke="currentColor"
            stroke-width="2"
            stroke-linecap="round"
            stroke-linejoin="round"
          >
            <polygon points="22 3 2 3 10 12.46 10 19 14 21 14 12.46 22 3" />
          </svg>
          <span class="text-lg">Filter: </span>
        </span>
        <router-link to="/products">
          <span
            @click="reset()"
            class="opacity-50 flex items-center text-sm gap-1 cursor-pointer"
            ><svg
              stroke="currentColor"
              fill="currentColor"
              stroke-width="0"
              viewBox="0 0 512 512"
              class="text-base"
              height="1em"
              width="1em"
              xmlns="http://www.w3.org/2000/svg"
            >
              <path
                d="M433 288.8c-7.7 0-14.3 5.9-14.9 13.6-6.9 83.1-76.8 147.9-161.8 147.9-89.5 0-162.4-72.4-162.4-161.4 0-87.6 70.6-159.2 158.2-161.4 2.3-.1 4.1 1.7 4.1 4v50.3c0 12.6 13.9 20.2 24.6 13.5L377 128c10-6.3 10-20.8 0-27.1l-96.1-66.4c-10.7-6.7-24.6.9-24.6 13.5v45.7c0 2.2-1.7 4-3.9 4C148 99.8 64 184.6 64 288.9 64 394.5 150.1 480 256.3 480c100.8 0 183.4-76.7 191.6-175.1.8-8.7-6.2-16.1-14.9-16.1z"
              ></path>
            </svg>
            Reset</span
          >
        </router-link></span
      >
      <hr />
      <div class="p-4">
        <span class="dark:text-white text-gray-800 text-md font-bold"
          >Categories</span
        >
      </div>
      <div>
        <div
          v-for="item in dataCategory"
          :key="item.id"
          @click="queryProduct(item, 'category')"
          class="cursor-pointer px-4 py-2 hover:bg-gray-100 flex items-center space-x-1"
          :class="routeQuery.category == item.id ? 'text-sky-600' : ''"
        >
          <span class="w-5">
            <svg
              class="h-5 w-5"
              :class="routeQuery.category == item.id ? '' : ' hidden'"
              viewBox="0 0 24 24"
              fill="none"
              stroke="currentColor"
              stroke-width="2"
              stroke-linecap="round"
              stroke-linejoin="round"
            >
              <polyline points="20 6 9 17 4 12" />
            </svg>
          </span>
          <span>{{ item.name }}</span>
        </div>
      </div>
      <div class="p-4">
        <span class="dark:text-white text-gray-800 text-md font-bold"
          >Brands</span
        >
      </div>
      <div>
        <div
          v-for="item in dataBrand"
          :key="item.id"
          @click="queryProduct(item, 'brand')"
          class="cursor-pointer px-4 py-2 hover:bg-gray-100 flex items-center space-x-1"
          :class="routeQuery.brand == item.id ? 'text-sky-600' : ''"
        >
          <span class="w-5">
            <svg
              class="h-5 w-5"
              :class="routeQuery.brand == item.id ? '' : ' hidden'"
              viewBox="0 0 24 24"
              fill="none"
              stroke="currentColor"
              stroke-width="2"
              stroke-linecap="round"
              stroke-linejoin="round"
            >
              <polyline points="20 6 9 17 4 12" />
            </svg>
          </span>
          <span>{{ item.name }}</span>
        </div>
      </div>
      <div class="p-4 mb-6">
        <span class="dark:text-white text-gray-800 text-md font-bold"
          >Price</span
        >
      </div>
      <div class="px-6 pb-6">
        <Slider v-model="value" :merge="merge" :format="format" :max="1000" />
      </div>
    </div>
  </div>
</template>

<script>
import CardAllProduct from "../components/CardAllProduct.vue";
import CardListAllProduct from "../components/CardListAllProduct.vue";
import Slider from "@vueform/slider";
import userService from "../services/user.service";
import CardSkeleton from "../components/skeleton/CardSkeleton.vue";
import NoItem from "../components/NoItem.vue";
export default {
  components: {
    CardAllProduct,
    CardListAllProduct,
    Slider,
    CardSkeleton,
    NoItem,
  },
  data() {
    return {
      data: Array,
      dataCategory: Array,
      dataBrand: Array,
      swicth: false,
      value: [1, 700],
      merge: 300,
      format: {
        prefix: "$",
        decimals: 2,
      },
      page: 1,
      total: 0,
      per_page: 0,
      loadProduct: false,
      field: "",
      type: "",
      category: "",
      brand: "",
      queryPath: "",
    };
  },
  computed: {
    loggedIn() {
      return this.$store.state.status.loggedIn;
    },
    routeQuery() {
      this.getProduct(
        1,
        this.field,
        this.type,
        this.$route.query.category != undefined
          ? this.$route.query.category
          : "",
        this.$route.query.brand != undefined ? this.$route.query.brand : "",
        this.value[0],
        this.value[1]
      );
      return this.$route.query;
    },
  },
  created() {
    this.loadProduct = true;
    window.scrollTo(0, 0);
    userService.getPublic("/v1/categories").then((res) => {
      this.dataCategory = res.data;
    });
    userService.getPublic("/v1/brands").then((res) => {
      this.dataBrand = res.data;
    });
    userService
      .getPublic(
        `/v1/products?page=${this.page}&field=${this.field}&type=${this.type}&category=${this.category}&brand=${this.brand}`
      )
      .then((res) => {
        this.per_page = res.data.meta.per_page;
        this.total = res.data.meta.total;
        this.data = res.data.data;
        this.loadProduct = false;
      });
    if (this.loggedIn) this.$store.dispatch("getNoti");
  },
  methods: {
    getProduct(page, field, type, category, brand, value1, value2) {
      this.page = page;
      userService
        .getPublic(
          `/v1/products?page=${page}&field=${field}&type=${type}&category=${category}&brand=${brand}&price1=${value1}&price2=${value2}`
        )
        .then((res) => {
          this.data = res.data.data;
          this.per_page = res.data.meta.per_page;
          this.total = res.data.meta.total;
        });
    },
    showProduct(e) {
      this.swicth = e;
    },
    onChangeSort(event) {
      this.field = event.target.value.split("-")[0];
      this.type = event.target.value.split("-")[1];
      this.getProduct(
        this.page,
        this.field,
        this.type,
        this.category,
        this.brand,
        this.value[0],
        this.value[1]
      );
    },
    queryProduct: function (data, link) {
      const l1 = this.$route.fullPath.split("?")[1]?.split("=")[0];
      const v1 = this.$route.fullPath.split("&")[0]?.split("=")[1];
      const l2 = this.$route.fullPath.split("&")[1]?.split("=")[0];
      const v2 = this.$route.fullPath.split("&")[1]?.split("=")[1];
      if (l1 != undefined && l1 != link && l2 != link)
        this.$router.push(`${this.$route.fullPath}&${link}=${data.id}`);
      else if (l1 == undefined && l2 == undefined) {
        this.$router.push(`/products?${link}=${data.id}`);
      } else if (l1 == link) {
        const r = this.$route.fullPath.replace(
          `${link}=${v1}`,
          `${link}=${data.id}`
        );
        this.$router.push(`${r}`);
      } else if (l2 == link) {
        const r = this.$route.fullPath.replace(
          `${link}=${v2}`,
          `${link}=${data.id}`
        );
        this.$router.push(`${r}`);
      }
      if (`${l1} = ${v1}` == `${link} = ${data.id}` && l2 != undefined) {
        const r = this.$route.fullPath.replace(`${link}=${data.id}&`, "");
        this.$router.push(`${r}`);
      } else if (`${l1} = ${v1}` == `${link} = ${data.id}`) {
        const r = this.$route.fullPath.replace(`${link}=${data.id}`, "");
        this.$router.push(`${r}`);
      }
      if (`${l2} = ${v2}` == `${link} = ${data.id}`) {
        const r = this.$route.fullPath.replace(`&${link}=${data.id}`, "");
        this.$router.push(`${r}`);
      }
    },
    prev() {
      if (this.page != 1) {
        this.page--;
        this.getProduct(
          this.page,
          this.field,
          this.type,
          this.category,
          this.brand,
          this.value[0],
          this.value[1]
        );
        window.scrollTo(0, 0);
      }
    },
    next() {
      if (this.total > this.per_page) {
        this.page++;
        this.getProduct(
          this.page,
          this.field,
          this.type,
          this.category,
          this.brand,
          this.value[0],
          this.value[1]
        );
        window.scrollTo(0, 0);
      }
    },
    reset() {
      this.value = [1, 700];
      this.getProduct(1, "", this.field, this.type, "", "", "");
    },
  },
  watch: {
    value() {
      this.getProduct(
        1,
        this.field,
        this.type,
        this.category,
        this.brand,
        this.value[0],
        this.value[1]
      );
    },
  },
};
</script>

<style src="@vueform/slider/themes/default.css">
.btn-accordion {
  background-color: white !important;
}
</style>
