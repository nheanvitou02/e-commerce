<template>
  <div class="container mx-auto py-4">
    <Carousel :data="bannerData" v-if="!loadBanner" />
    <BannerSkeleton v-else />
    <div class="my-4">
      <TitleSkeleton v-if="loadBrand" />
      <div
        v-else-if="brandData.length != 0"
        class="flex justify-between items-center pt-2"
      >
        <span
          class="text-gray-800 text-md flex items-center justify-center lg:text-2xl line-clamp-1"
        >
          Brand</span
        >
        <div>
          <a
            v-if="brandData.length > 6"
            @click="onViewAllBrand"
            class="cursor-pointer text-gray-800 text-xs sm:text-sm lg:text-base flex items-center hover:text-red-500"
          >
            <span v-if="viewAllBrand"
              ><svg
                class="h-5 w-5"
                fill="none"
                viewBox="0 0 24 24"
                stroke="currentColor"
              >
                <path
                  stroke-linecap="round"
                  stroke-linejoin="round"
                  stroke-width="2"
                  d="M6 18L18 6M6 6l12 12"
                />
              </svg>
            </span>
            <span v-else class="flex items-center"
              >View All<svg
                class="h-5 w-5"
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
                <polyline points="9 6 15 12 9 18" />
              </svg>
            </span>
          </a>
        </div>
      </div>
    </div>
    <CarurselBrandListAll :data="brandData" v-if="viewAllBrand" />
    <div v-else>
      <CarouselBrand :data="brandData" v-if="!loadBrand" />
      <BrandSkeleton v-else />
    </div>
    <div class="my-4">
      <TitleSkeleton v-if="loadProduct" />
      <div
        v-else-if="newData.length != 0"
        class="flex justify-between items-center pt-2"
      >
        <span
          class="text-gray-800 text-md flex items-center justify-center lg:text-2xl line-clamp-1"
        >
          New Arrival</span
        >
        <div>
          <a
            v-if="newData.length > 6"
            @click="onViewAllNew"
            class="cursor-pointer text-gray-800 text-xs sm:text-sm lg:text-base flex items-center hover:text-red-500"
          >
            <span v-if="viewAllNew"
              ><svg
                class="h-5 w-5"
                fill="none"
                viewBox="0 0 24 24"
                stroke="currentColor"
              >
                <path
                  stroke-linecap="round"
                  stroke-linejoin="round"
                  stroke-width="2"
                  d="M6 18L18 6M6 6l12 12"
                />
              </svg>
            </span>
            <span v-else class="flex items-center"
              >View All<svg
                class="h-5 w-5"
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
                <polyline points="9 6 15 12 9 18" />
              </svg>
            </span>
          </a>
        </div>
      </div>
    </div>
    <div
      v-if="viewAllNew"
      class="grid grid-cols-2 gap-2 sm:grid-cols-3 md:grid-cols-5 lg:grid-cols-6 xl:grid-col-6"
    >
      <CardAllProduct :data="newData" />
    </div>
    <div v-else>
      <CardProduct
        @refresh="getDataNew"
        :data="newData"
        v-if="!loadProductNew"
      />
      <div
        v-else
        class="grid grid-cols-2 gap-2 sm:grid-cols-3 md:grid-cols-5 lg:grid-cols-6 xl:grid-col-6"
      >
        <CardSkeleton :data="6" />
      </div>
    </div>
    <div class="my-4">
      <TitleSkeleton v-if="loadProduct" />
      <div
        v-else-if="data.length != 0"
        class="flex justify-between items-center pt-2"
      >
        <span
          class="text-gray-800 text-md flex items-center justify-center lg:text-2xl line-clamp-1"
        >
          Best Product</span
        >
        <div>
          <a
            v-if="data.length > 6"
            @click="onViewAllBest"
            class="cursor-pointer text-gray-800 text-xs sm:text-sm lg:text-base hover:text-red-500"
          >
            <span v-if="viewAllBest"
              ><svg
                class="h-5 w-5"
                fill="none"
                viewBox="0 0 24 24"
                stroke="currentColor"
              >
                <path
                  stroke-linecap="round"
                  stroke-linejoin="round"
                  stroke-width="2"
                  d="M6 18L18 6M6 6l12 12"
                />
              </svg>
            </span>
            <span v-else class="flex items-center"
              >View All<svg
                class="h-5 w-5"
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
                <polyline points="9 6 15 12 9 18" />
              </svg>
            </span>
          </a>
        </div>
      </div>
    </div>
    <div
      v-if="viewAllBest"
      class="grid grid-cols-2 gap-2 sm:grid-cols-3 md:grid-cols-5 lg:grid-cols-6 xl:grid-col-6"
    >
      <CardAllProduct :data="data" />
    </div>
    <div v-else>
      <CardProduct @refresh="getData" v-if="!loadProduct" :data="data" />
      <div
        v-else
        class="grid grid-cols-2 gap-2 sm:grid-cols-3 md:grid-cols-5 lg:grid-cols-6 xl:grid-col-6"
      >
        <CardSkeleton :data="6" />
      </div>
    </div>

    <div class="flex justify-center my-4">
      <button
        class="bg-sky-600 hover:bg-sky-500 font-semibold text-white py-2 px-4 border border-sky-500 hover:border-transparent rounded flex items-center"
        @click="$router.push('/products')"
      >
        <span> View Products </span
        ><svg
          class="h-5 w-5"
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
          <line x1="5" y1="12" x2="19" y2="12" />
          <line x1="15" y1="16" x2="19" y2="12" />
          <line x1="15" y1="8" x2="19" y2="12" />
        </svg>
      </button>
    </div>
  </div>
</template>

<script>
import CardProduct from "../components/CardProduct.vue";
import Carousel from "../components/Carousel.vue";
import CarouselBrand from "../components/CarurselBrand.vue";
import CarurselBrandListAll from "../components/CarurselBrandListAll.vue";
import userService from "../services/user.service";
import CardAllProduct from "../components/CardAllProduct.vue";
import CardSkeleton from "../components/skeleton/CardSkeleton.vue";
import BrandSkeleton from "../components/skeleton/BrandSkeleton.vue";
import BannerSkeleton from "../components/skeleton/BannerSkeleton.vue";
import TitleSkeleton from "../components/skeleton/TitleSkeleton.vue";
export default {
  name: "Home",
  components: {
    CardAllProduct,
    Carousel,
    CarouselBrand,
    CarurselBrandListAll,
    CardProduct,
    BrandSkeleton,
    CardSkeleton,
    BannerSkeleton,
    TitleSkeleton,
  },
  data() {
    return {
      newData: Array,
      brandData: Array,
      bannerData: Array,
      data: Array,
      viewAllBrand: false,
      viewAllNew: false,
      viewAllBest: false,
      loadProductNew: false,
      loadProduct: false,
      loadBrand: false,
      loadBanner: false,
    };
  },
  computed: {
    loggedIn() {
      return this.$store.state.status.loggedIn;
    },
  },
  created() {
    this.loadProduct = true;
    this.loadBrand = true;
    this.loadBanner = true;
    this.loadProductNew = true;
    window.scrollTo(0, 0);
    userService.getPublic("/v1/sliders").then((res) => {
      this.bannerData = res.data.data;
      this.loadBanner = false;
    });

    userService.getPublic("/v1/brands").then((res) => {
      this.brandData = res.data;
      this.loadBrand = false;
    });

    userService.getPublic("/v1/product-new").then((res) => {
      this.newData = res.data.data;
      this.loadProductNew = false;
    });

    userService.getPublic("/v1/products?level=top").then((res) => {
      this.data = res.data.data;
      this.loadProduct = false;
    });
    if (this.loggedIn) this.$store.dispatch("getNoti");
  },
  methods: {
    getDataNew() {
      userService.getPublic("/v1/product-new").then((res) => {
        this.newData = res.data.data;
      });
    },
    getData() {
      userService.getPublic("/v1/products?level=top").then((res) => {
        this.data = res.data.data;
      });
    },
    onViewAllBrand() {
      this.viewAllBrand = !this.viewAllBrand;
    },
    onViewAllNew() {
      this.viewAllNew = !this.viewAllNew;
    },
    onViewAllBest() {
      this.viewAllBest = !this.viewAllBest;
    },
  },
};
</script>
