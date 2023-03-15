<template>
  <div class="bg-white dark:bg-transparent dark:px-0 px-4">
    <div
      class="relative bg-white cursor-pointer w-full py-6 border-t"
      v-for="item in data"
      :key="item.id"
    >
      <router-link :to="{ name: 'detail', params: { id: item.slug } }">
        <div class="flex-col lg:flex lg:flex-row lg:space-x-3">
          <div
            class="w-full lg:w-1/5 flex justify-center items-center rounded-[2px] dark:text-white text-gray-800 bg-transparent dark:bg-slate-300"
          >
            <span class="flex items-center justify-center mb-4 lg:mb-0"
              ><img
                :src="item.image"
                alt="product"
                class="w-full h-32 lg:w-44 lg:h-32 object-contain mix-blend-multiply"
            /></span>
          </div>
          <div
            class="w-full lg:w-[74.5%] flex-col lg:flex lg:flex-row lg:space-x-2"
          >
            <div class="w-full lg:w-5/6 flex-col flex">
              <div class="flex items-center justify-between">
                <h2 class="line-clamp-2 font-semibold block lg:hidden">
                  <span class="text-lg font-bold dark:text-white mb-1">{{
                    vueNumberFormat(item.price, {
                      prefix: "$",
                      decimal: ".",
                    })
                  }}</span>
                </h2>
                <div class="block lg:hidden">
                  <div
                    class="bg-white shadow-lg p-1 h-8 w-8 rounded-full flex justify-center items-center cursor-pointer"
                    @click="addToWishlist(item)"
                  >
                    <svg
                      :class="
                        item?.customer_id?.find((e) => e == user.id)
                          ? ' fill-red-500 '
                          : ''
                      "
                      width="20"
                      height="20"
                      viewBox="0 0 24 24"
                      fill="none"
                      xmlns="http://www.w3.org/2000/svg"
                    >
                      <path
                        fill-rule="evenodd"
                        clip-rule="evenodd"
                        d="M11.9939 5.91615C10.1944 3.81914 7.19378 3.25504 4.93922 5.17528C2.68468 7.09552 2.36727 10.3061 4.13778 12.5771C5.60984 14.4654 10.0648 18.4478 11.5249 19.7368C11.6882 19.881 11.77 19.9531 11.8652 19.9814C11.9483 20.0062 12.0393 20.0062 12.1225 19.9814C12.2177 19.9531 12.2994 19.881 12.4628 19.7368C13.9229 18.4478 18.3779 14.4654 19.8499 12.5771C21.6204 10.3061 21.3417 7.07532 19.0485 5.17528C16.7552 3.27525 13.7933 3.81914 11.9939 5.91615Z"
                        stroke="#ef4444"
                        stroke-width="2"
                        stroke-linecap="round"
                        stroke-linejoin="round"
                      ></path>
                    </svg>
                  </div>
                </div>
              </div>
              <span
                class="line-clamp-2 font-semibold leading-6 text-gray-700 dark:text-white"
                >{{ item.title }}</span
              >
              <div class="lg:space-y-[4px] space-y-1 my-2">
                <div v-html="item.content" class="text-gray-500"></div>
              </div>
            </div>
            <div class="w-full lg:w-2 text-xl font-bold dark:text-white">
              <h2 class="font-semibold hidden lg:block">
                {{
                  vueNumberFormat(item.price, {
                    prefix: "$",
                    decimal: ".",
                  })
                }}
              </h2>
            </div>
          </div>
        </div>
      </router-link>
      <div class="space-y-2 absolute bottom-4 right-0">
        <div
          class="flex justify-between w-full space-x-2 lg:space-x-0 lg:space-y-2 lg:flex-col"
        >
          <div class="w-full">
            <button
              @click="addToCart(item)"
              class="button bg-sky-600 hover:bg-sky-600 text-white dark:text-white rounded-sm h-11 px-8 py-2 w-full font-poppins"
            >
              Add to Cart
            </button>
          </div>
        </div>
        <span
          @click="addToWishlist(item)"
          class="hidden items-center justify-center space-x-2 cursor-pointer lg:flex"
          ><svg
            width="24"
            height="24"
            viewBox="0 0 24 24"
            fill="none"
            xmlns="http://www.w3.org/2000/svg"
            :class="
              item?.customer_id?.find((e) => e == user.id)
                ? ' fill-red-500 '
                : ''
            "
          >
            <path
              fill-rule="evenodd"
              clip-rule="evenodd"
              d="M11.9939 5.91615C10.1944 3.81914 7.19378 3.25504 4.93922 5.17528C2.68468 7.09552 2.36727 10.3061 4.13778 12.5771C5.60984 14.4654 10.0648 18.4478 11.5249 19.7368C11.6882 19.881 11.77 19.9531 11.8652 19.9814C11.9483 20.0062 12.0393 20.0062 12.1225 19.9814C12.2177 19.9531 12.2994 19.881 12.4628 19.7368C13.9229 18.4478 18.3779 14.4654 19.8499 12.5771C21.6204 10.3061 21.3417 7.07532 19.0485 5.17528C16.7552 3.27525 13.7933 3.81914 11.9939 5.91615Z"
              stroke="#ef4444"
              stroke-width="2"
              stroke-linecap="round"
              stroke-linejoin="round"
            ></path>
          </svg>
          <span class="text-sm line-clamp-1">Add to Wishlist</span></span
        >
      </div>
    </div>
  </div>
</template>

<script>
export default {
  props: {
    data: Array,
  },
  data() {
    return {
      qty: 1,
    };
  },
  computed: {
    user() {
      return this.$store.state.user;
    },
    loggedIn() {
      return this.$store.state.status.loggedIn;
    },
  },
  methods: {
    addToCart(data) {
      if (this.loggedIn)
        this.$store
          .dispatch("addCart", {
            qty: this.qty,
            customer_id: this.user.id,
            product_id: data.id,
            price: data.price,
          })
          .then(() => this.$store.dispatch("getCart"));
      else return this.$router.push("/sign-in");
    },
    addToWishlist(data) {
      if (this.loggedIn)
        this.$store
          .dispatch("addWishlist", {
            customer_id: this.user.id,
            product_id: data.id,
          })
          .then(() => {
            this.$store.dispatch("getWishlist");
            this.$emit("refresh");
          });
      else return this.$router.push("/sign-in");
    },
  },
};
</script>
