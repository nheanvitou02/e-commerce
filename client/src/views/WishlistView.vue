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
              >Shopping WishList</span
            >
          </div>
        </li>
      </ol>
    </nav>
    <div v-if="wishlist.length == 0" class="flex justify-center">
      <div class="text-center my-24 leading-8">
        <div class="flex justify-center">
          <img src="../assets/image/heart.png" alt="cart" class="w-32" />
        </div>
        <span
          class="text-gray-800 text-md flex items-center justify-center lg:text-2xl line-clamp-1"
        >
          Your WishList is Empty</span
        >
        <span
          class="text-gray-800 text-md flex items-center justify-center line-clamp-1"
        >
          Add something to make me happy:)</span
        >
        <div class="flex justify-center my-4">
          <button
            class="bg-sky-600 hover:bg-sky-500 font-semibold text-white py-[5px] px-4 border border-sky-500 hover:border-transparent rounded flex items-center"
            @click="$router.push('/products')"
          >
            <span> Continue Shopping </span>
          </button>
        </div>
      </div>
    </div>
    <section v-else class="py-4 text-gray-800">
      <div class="flex justify-center">
        <div class="text-center lg:max-w-3xl md:max-w-xl">
          <h2
            class="dark:text-white text-gray-800 text-md font-bold flex items-center justify-center lg:text-2xl line-clamp-1 py-6"
          >
            WishList
          </h2>
        </div>
      </div>
      <div
        class="grid grid-cols-2 gap-2 sm:grid-cols-3 md:grid-cols-5 lg:grid-cols-6"
      >
        <div
          class="relative max-w-sm bg-white cursor-pointer overflow-x-hidden group"
          v-for="item in wishlist"
          :key="item.product.id"
        >
          <router-link :to="'/products/' + item.product.slug">
            <div class="bg-white cursor-pointer relative p-4">
              <div
                class="py-2 min-h-[10rem] sm:min-h-[12rem] lg:min-h-[14rem] flex items-center justify-center bg-transparent rounded-sm"
              >
                <img
                  alt="product"
                  :src="item.product.image"
                  class="w-full h-32 lg:h-44 object-contain mix-blend-multiply"
                />
              </div>
              <div class="mt-1">
                <div class="text-left space-y-1">
                  <div class="bg-transparent overflow-hidden">
                    <span
                      class="text-xs font-semibold line-clamp-1 text-gray-500"
                    >
                      {{ item.product.brand?.name }}
                    </span>
                    <p
                      class="line-clamp-2 leading-6 h-12 dark:text-white text-gray-800"
                    >
                      <span class="tooltip-wrapper">{{
                        item.product.title
                      }}</span>
                    </p>
                  </div>
                  <p class="text-base lg:text-lg font-bold text-gray-800">
                    {{
                      vueNumberFormat(item.product.price, {
                        prefix: "$",
                        decimal: ".",
                      })
                    }}
                  </p>
                </div>
              </div>
            </div>
          </router-link>
          <div class="absolute top-2 right-4 transition-all space-y-2">
            <div
              class="bg-white shadow-lg p-1 h-8 w-8 rounded-full flex justify-center items-center cursor-pointer transform translate-x-16 transition-all delay-100 group-hover:translate-x-0"
              @click="addToWishlist(item)"
            >
              <svg
                class="h-5 w-5 text-red-500"
                viewBox="0 0 24 24"
                fill="none"
                stroke="currentColor"
                stroke-width="2"
                stroke-linecap="round"
                stroke-linejoin="round"
              >
                <polyline points="3 6 5 6 21 6" />
                <path
                  d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"
                />
                <line x1="10" y1="11" x2="10" y2="17" />
                <line x1="14" y1="11" x2="14" y2="17" />
              </svg>
            </div>
          </div>
          <div class="absolute bottom-1/3 right-4 transition-all space-y-2">
            <div
              class="bg-red-500 shadow-lg p-1 lg:p-2 h-8 w-8 rounded-full flex justify-center items-center cursor-pointer transform translate-x-16 transition-all delay-100 group-hover:translate-x-0"
              @click="addToCart(item)"
            >
              <svg
                width="20"
                height="20"
                viewBox="0 0 24 24"
                fill="none"
                xmlns="http://www.w3.org/2000/svg"
              >
                <path
                  d="M3.82743 4.65486H4.76466L5.1356 7.25143L6.00954 13.6749C6.06138 14.056 6.10644 14.3873 6.16506 14.6598C6.22733 14.9493 6.31638 15.2329 6.48678 15.5012C6.7433 15.9051 7.11105 16.2262 7.54579 16.4259C7.83457 16.5586 8.12763 16.6085 8.42289 16.6312C8.7008 16.6526 9.03515 16.6526 9.4198 16.6526H16.5583C16.9241 16.6526 17.243 16.6526 17.509 16.6327C17.7921 16.6116 18.073 16.5649 18.352 16.4421C18.7735 16.2565 19.1351 15.9574 19.3962 15.578C19.5692 15.3269 19.6676 15.0597 19.7413 14.7855C19.8105 14.528 19.8702 14.2148 19.9386 13.8554L21.0432 8.05626C21.0652 7.94078 21.0907 7.80756 21.1026 7.69007C21.1161 7.5579 21.1238 7.357 21.0464 7.13756C20.9484 6.86022 20.7551 6.62667 20.501 6.47856C20.3 6.36138 20.1011 6.33142 19.9688 6.31988C19.8512 6.30963 19.7155 6.30967 19.598 6.30971L6.67272 6.30972L6.38017 4.26178C6.36801 4.17639 6.35315 4.07213 6.3328 3.98039C6.30884 3.87237 6.26582 3.72319 6.16801 3.5708C6.03942 3.37043 5.85591 3.21126 5.63936 3.1123C5.47467 3.03704 5.32091 3.01554 5.21058 3.0071C5.11689 2.99993 5.01158 2.99997 4.92533 3.00001H3.82743C3.37046 3.00001 3 3.37046 3 3.82743C3 4.28441 3.37046 4.65486 3.82743 4.65486Z"
                  fill="white"
                ></path>
                <path
                  d="M7.96484 19.5484C7.96484 18.6344 8.70575 17.8936 9.6197 17.8936C10.5337 17.8936 11.2746 18.6344 11.2746 19.5484C11.2746 20.4624 10.5337 21.2033 9.6197 21.2033C8.70575 21.2033 7.96484 20.4624 7.96484 19.5484Z"
                  fill="white"
                ></path>
                <path
                  d="M14.584 19.5484C14.584 18.6344 15.3249 17.8936 16.2388 17.8936C17.1528 17.8936 17.8937 18.6344 17.8937 19.5484C17.8937 20.4624 17.1528 21.2033 16.2388 21.2033C15.3249 21.2033 14.584 20.4624 14.584 19.5484Z"
                  fill="white"
                ></path>
              </svg>
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>
</template>

<script>
export default {
  name: "wishlist",
  computed: {
    wishlist() {
      return this.$store.state.wishlist;
    },
    user() {
      return this.$store.state.user;
    },
    loggedIn() {
      return this.$store.state.status.loggedIn;
    },
  },
  created() {
    if (this.loggedIn) this.$store.dispatch("getNoti");
    window.scrollTo(0, 0);
  },
  methods: {
    addToCart(data) {
      this.$store
        .dispatch("addCart", {
          qty: 1,
          customer_id: this.user.id,
          product_id: data.product.id,
          price: data.product.price,
        })
        .then(() => this.$store.dispatch("getCart"));
    },
    addToWishlist(data) {
      this.$store
        .dispatch("addWishlist", {
          customer_id: this.user.id,
          product_id: data.product_id,
        })
        .then(() => this.$store.dispatch("getWishlist"));
    },
  },
};
</script>
