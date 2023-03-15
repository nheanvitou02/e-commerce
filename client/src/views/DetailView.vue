<template>
  <div class="bg-white">
    <div class="container mx-auto">
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
        class="lg:grid lg:grid-cols-4 xl:grid-cols-5 lg:gap-x-2 lg:items-start mt-2 pb-2"
      >
        <div class="lg:col-span-2 xl:col-span-2">
          <vue-photo-zoom-pro
            :key="data.image"
            :url="data.image"
            :highUrl="data.image"
          ></vue-photo-zoom-pro>
        </div>

        <div
          class="mt-0 px-2 sm:px-2 sm:mt-4 lg:mt-0 lg:px-2 lg:col-span-2 xl:col-span-2"
        >
          <span
            class="text-base sm:text-lg lg:text-xl font-bold dark:text-white text-gray-800"
            >{{ data.title }}</span
          >
          <div class="mt-1 lg:block">
            <span class="text-gray-400 font-thin"
              ><a href="/products?brand=">{{ data.brand?.name }}</a></span
            >
          </div>
          <hr class="my-4 bg-hover border-hover" />
          <div class="mt-3 hidden lg:block">
            <p
              class="text-[25px] sm:text-2xl lg:text-3xl dark:text-white text-gray-800 font-bold"
            >
              {{
                vueNumberFormat(data.price, {
                  prefix: "$",
                  decimal: ".",
                })
              }}
            </p>
          </div>

          <div class="mt-3 space-y-1">
            <h3 class="sr-only">Product Info</h3>
            <div v-html="data.content"></div>
          </div>
          <div class="mt-4">
            <div
              class="text-sm ml-1 mb-2 dark:text-gray-400 text-gray-500 lg:text-base"
            >
              Quantity
            </div>
            <div
              class="flex dark:bg-gray-700 items-center justify-between p-4 border dark:border-none border-gray-300 rounded-sm h-11 w-36 text-xl"
              bis_skin_checked="1"
            >
              <button
                @click="decrementQty"
                class="select-none"
                :class="qty == 1 ? 'cursor-not-allowed' : 'cursor-pointer'"
              >
                -
              </button>
              <div class="input-qty" bis_skin_checked="1">
                <input
                  min="1"
                  type="number"
                  class="min-w-11 w-full text-center bg-transparent focus:border-transparent focus:ring-transparent"
                  v-model="qty"
                />
              </div>
              <button @click="incrementQty" class="select-none cursor-pointer">
                +
              </button>
            </div>
            <div class="mt-4 flex sm:flex-col1 space-x-2">
              <button
                @click="addToCart"
                class="button bg-sky-500 dark:bg-sky-600 hover:bg-sky-600 dark:hover:bg-sky-700 active:bg-sky-600 dark:active:bg-sky-700 text-white dark:text-white rounded-sm h-11 px-8 py-2 font-poppins"
              >
                Add to Cart
              </button>
              <div
                @click="addToWishlist"
                class="flex items-center justify-center space-x-2 cursor-pointer ml-2 group"
              >
                <svg
                  xmlns="http://www.w3.org/2000/svg"
                  class="h-6 w-6 group-hover:opacity-70 text-red-500"
                  :class="
                    data?.customer_id?.find((e) => e == user.id)
                      ? ' fill-red-500 '
                      : ''
                  "
                  fill="none"
                  viewBox="0 0 24 24"
                  stroke="currentColor"
                >
                  <path
                    stroke-linecap="round"
                    stroke-linejoin="round"
                    stroke-width="1.5"
                    d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"
                  />
                </svg>

                <span>Add to Wishlist</span>
              </div>
            </div>
            <hr class="my-4 bg-hover border-hover" />
            <div class="mt-2 flex items-center">
              <span class="text-sm dark:text-white text-gray-800 mr-2"
                >Share: </span
              ><button
                aria-label="facebook"
                style="
                  background-color: transparent;
                  border: none;
                  padding: 0px;
                  font: inherit;
                  color: inherit;
                  cursor: pointer;
                  outline: none;
                "
              >
                <div class="flex items-center">
                  <svg viewBox="0 0 64 64" width="32" height="32">
                    <circle cx="32" cy="32" r="31" fill="#3b5998"></circle>
                    <path
                      d="M34.1,47V33.3h4.6l0.7-5.3h-5.3v-3.4c0-1.5,0.4-2.6,2.6-2.6l2.8,0v-4.8c-0.5-0.1-2.2-0.2-4.1-0.2 c-4.1,0-6.9,2.5-6.9,7V28H24v5.3h4.6V47H34.1z"
                      fill="white"
                    ></path>
                  </svg>
                  <span class="ml-1">Facebook</span>
                </div>
              </button>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="container mx-auto py-4">
    <div class="my-2">
      <TitleSkeleton v-if="loadProduct" />
      <div
        v-else-if="dataSimilar.length != 0"
        class="flex justify-between items-center"
      >
        <span
          class="dark:text-white text-gray-800 text-md font-bold flex items-center justify-center lg:text-2xl line-clamp-1"
        >
          Similar Product</span
        >
        <div>
          <a
            v-if="dataSimilar.length > 6"
            @click="onViewAllSimilar"
            class="dark:text-white cursor-pointer text-gray-800 text-xs sm:text-sm lg:text-base flex items-center hover:text-red-500"
          >
            <span v-if="viewAllSimilar"
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
      v-if="viewAllSimilar"
      class="grid grid-cols-2 gap-2 sm:grid-cols-2 md:grid-cols-4 lg:grid-cols-5 xl:grid-col-5"
    >
      <CardAllProduct :data="dataSimilar" />
    </div>
    <div v-else>
      <CardProduct
        @refresh="getDataSimilar"
        :data="dataSimilar"
        v-if="!loadProduct"
      />
      <div
        v-else
        class="grid grid-cols-2 gap-2 sm:grid-cols-2 md:grid-cols-4 lg:grid-cols-5 xl:grid-col-5"
      >
        <CardSkeleton :data="5" />
      </div>
    </div>
  </div>
</template>
<script>
import VuePhotoZoomPro from "vue-photo-zoom-pro";
import "vue-photo-zoom-pro/dist/style/vue-photo-zoom-pro.css";
import CardAllProduct from "../components/CardAllProduct.vue";
import CardProduct from "../components/CardProduct.vue";
import CardSkeleton from "../components/skeleton/CardSkeleton.vue";
import TitleSkeleton from "../components/skeleton/TitleSkeleton.vue";
import userService from "../services/user.service";

export default {
  components: {
    VuePhotoZoomPro,
    CardProduct,
    CardSkeleton,
    CardAllProduct,
    TitleSkeleton,
  },
  data() {
    return {
      data: Object,
      qty: 1,
      dataSimilar: Array,
      loadProduct: false,
      viewAllSimilar: false,
    };
  },
  created() {
    window.scrollTo(0, 0);
  },
  computed: {
    user() {
      return this.$store.state.user;
    },
    loggedIn() {
      return this.$store.state.status.loggedIn;
    },
  },
  created() {
    this.loadProduct = true;
    userService
      .getPublic(`/v1/products/${this.$route.params.id}`)
      .then((res) => {
        this.data = res.data;
        userService
          .getPublic(
            `/v1/product-similar?id=${this.data.id}&category_id=${this.data.category_id}`
          )
          .then((res) => {
            this.dataSimilar = res.data.data;
            this.loadProduct = false;
          });
      });
    window.scrollTo(0, 0);
    if (this.loggedIn) this.$store.dispatch("getNoti");
  },
  methods: {
    getData() {
      userService
        .getPublic(`/v1/products/${this.$route.params.id}`)
        .then((res) => {
          this.data = res.data;
          this.getDataSimilar();
          window.scrollTo(0, 0);
        });
    },
    getDataSimilar() {
      userService
        .getPublic(
          `/v1/product-similar?id=${this.data.id}&category_id=${this.data.category_id}`
        )
        .then((res) => {
          this.dataSimilar = res.data.data;
        });
    },
    addToCart() {
      if (this.loggedIn) {
        this.$store
          .dispatch("addCart", {
            qty: this.qty > 0 ? this.qty : 1,
            customer_id: this.user.id,
            product_id: this.data.id,
            price: this.data.price,
          })
          .then(() => this.$store.dispatch("getCart"));
      } else return this.$router.push("/sign-in");
    },
    addToWishlist() {
      if (this.loggedIn)
        this.$store
          .dispatch("addWishlist", {
            customer_id: this.user.id,
            product_id: this.data.id,
          })
          .then(() => {
            this.$store.dispatch("getWishlist");
            userService
              .getPublic(`/v1/products/${this.$route.params.id}`)
              .then((res) => {
                this.data = res.data;
              });
          });
      else return this.$router.push("/sign-in");
    },
    incrementQty() {
      this.qty++;
    },
    decrementQty() {
      if (this.qty > 1) this.qty--;
    },
    setMin() {
      if (this.qty < 0) this.qty = 1;
    },
    onViewAllSimilar() {
      this.viewAllSimilar = !this.viewAllSimilar;
    },
  },
  watch: {
    "$route.params.id"() {
      if (this.$route.params.id != undefined) return this.getData();
    },
  },
};
</script>

<style>
.input-qty input[type="number"] {
  outline-offset: 0 !important;
  outline: 0 solid transparent !important;
  border-color: transparent;
  background-color: transparent;
}
input::-webkit-outer-spin-button,
input::-webkit-inner-spin-button {
  -webkit-appearance: none;
  margin: 0;
}

input[type="number"] {
  -moz-appearance: textfield;
}
</style>
