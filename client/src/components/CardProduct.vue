<template>
  <div class="container mx-auto">
    <Carousel :settings="settings" :breakpoints="breakpoints">
      <Slide
        v-for="item in data"
        :key="item.id"
        class="group overflow-x-hidden"
      >
        <div class="mr-2">
          <router-link :to="{ name: 'detail', params: { id: item.slug } }">
            <div class="bg-white cursor-pointer relative p-4">
              <div
                class="py-2 min-h-[10rem] sm:min-h-[12rem] lg:min-h-[14rem] flex items-center justify-center bg-transparent rounded-sm"
              >
                <img
                  alt="product"
                  :src="item.image"
                  class="w-full h-32 lg:h-44 object-contain mix-blend-multiply"
                />
              </div>
              <div class="mt-1">
                <div class="text-left space-y-1">
                  <div class="bg-transparent overflow-hidden">
                    <span
                      class="text-xs font-semibold line-clamp-1 text-gray-500"
                    >
                      {{ item.brand.name }}
                    </span>
                    <p
                      class="line-clamp-2 leading-6 h-12 dark:text-white text-gray-800"
                    >
                      <span class="tooltip-wrapper">{{ item.title }}</span>
                    </p>
                  </div>
                  <p class="text-base lg:text-lg font-bold text-gray-800">
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
          </router-link>
          <div class="absolute top-2 right-4 transition-all space-y-2">
            <div
              class="bg-white shadow-lg p-1 h-8 w-8 rounded-full flex justify-center items-center cursor-pointer transform translate-x-16 transition-all delay-100 group-hover:translate-x-0"
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
      </Slide>
      <template #addons>
        <Navigation v-if="data.length > 5" />
      </template>
    </Carousel>
  </div>
</template>

<script>
import { Carousel, Navigation, Slide } from "vue3-carousel";
import "vue3-carousel/dist/carousel.css";
export default {
  props: {
    data: Array,
  },
  components: {
    Carousel,
    Slide,
    Navigation,
  },
  data: () => ({
    qty: 1,
    item: Object,
    settings: {
      itemsToShow: 2,
      snapAlign: "start",
    },
    breakpoints: {
      640: {
        itemsToShow: 3,
        snapAlign: "start",
      },
      768: {
        itemsToShow: 5,
        snapAlign: "start",
      },
      1024: {
        itemsToShow: 6,
        snapAlign: "start",
      },
    },
  }),
  computed: {
    user() {
      return this.$store.state.user;
    },
    loggedIn() {
      return this.$store.state.status.loggedIn;
    },
  },
  methods: {
    review(data) {
      this.$set(this.item, data);
      console.log(this.item);
    },
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
