<template>
  <div class="container mx-auto pb-2">
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
              >Shopping Cart</span
            >
          </div>
        </li>
      </ol>
    </nav>
    <div v-if="cart.length == 0" class="flex justify-center">
      <div class="text-center my-24 leading-8">
        <div class="flex justify-center">
          <img src="../assets/image/cart.png" alt="cart" class="w-32" />
        </div>
        <span
          class="text-gray-800 text-md flex items-center justify-center lg:text-2xl line-clamp-1"
        >
          Your Cart is Empty</span
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
    <div v-else>
      <div class="lg:grid lg:grid-cols-4 lg:gap-x-2 lg:items-start mt-2 pb-2">
        <div class="col-span-3 bg-white p-4">
          <div class="flex justify-between border-b pb-4">
            <h1 class="font-semibold text-xl">Shopping Cart</h1>
            <h2 class="font-semibold text-xl">{{ cartQty }} Items</h2>
          </div>
          <div class="flex mt-4 mb-5">
            <h3 class="font-semibold text-gray-600 text-xs uppercase w-[45%]">
              Product Details
            </h3>
            <h3
              class="font-semibold text-gray-600 text-xs uppercase w-[15%] text-center"
            >
              Quantity
            </h3>
            <h3
              class="font-semibold text-gray-600 text-xs uppercase w-1/5 text-center"
            >
              Price
            </h3>
            <h3
              class="font-semibold text-gray-600 text-xs uppercase w-1/5 text-center"
            >
              Total
            </h3>
          </div>
          <div class="max-h-screen overflow-auto bg-white">
            <div
              class="flex items-center justify-between border-b"
              v-for="item in cart"
              :key="item.id"
            >
              <div class="flex p-1 ">
                <div>
                  <img class="h-24 w-24 object-contain mix-blend-multiply" :src="item.product.image" alt="" />
                </div>
                <div class="flex flex-col justify-between ml-4 flex-grow py-3 max-w-[100px] sm:max-w-[158px] md:max-w-[218px] lg:max-w-[220px] xl:max-w-[318px] overflow-hidden">
                  <span class="font-bold text-sm h-9 overflow-hidden">{{
                    item.product.title
                  }}</span>
                  <span class="text-gray-500 text-xs">{{
                    item.product.brand.name
                  }}</span>
                  <span
                    @click="rmCart(item.id)"
                    class="font-semibold text-red-500 text-xs cursor-pointer"
                  >
                    Remove
                  </span>
                </div>
              </div>
              <div
                class="flex dark:bg-gray-700 items-center justify-center p-4 border dark:border-none border-gray-300 rounded-sm h-11 w-[15%] text-xl"
                bis_skin_checked="1"
              >
                <button
                  @click="decrementQty(item)"
                  class="select-none"
                  :class="
                    item.qty == 1 ? 'cursor-not-allowed' : 'cursor-pointer'
                  "
                >
                  -
                </button>
                <div class="input-qty" bis_skin_checked="1">
                  <input
                    min="1"
                    type="number"
                    class="min-w-11 w-full text-center bg-transparent focus:border-transparent focus:ring-transparent"
                    v-model="item.qty"
                    disabled
                  />
                </div>
                <button
                  @click="incrementQty(item.product)"
                  class="select-none cursor-pointer"
                >
                  +
                </button>
              </div>

              <span class="text-center w-1/5 font-semibold text-sm">{{
                vueNumberFormat(item.product.price, {
                  prefix: "$",
                  decimal: ".",
                })
              }}</span>
              <span class="text-center w-1/5 font-semibold text-sm">{{
                vueNumberFormat(item.price, {
                  prefix: "$",
                  decimal: ".",
                })
              }}</span>
            </div>
          </div>
        </div>

        <div id="summary" class="p-4 col-span-1 bg-white">
          <h1 class="font-semibold text-xl border-b pb-4">Order Summary</h1>
          <div class="flex justify-between mt-10 mb-5">
            <span class="font-semibold text-sm uppercase"
              >Items {{ cartQty }}</span
            >
            <span class="font-semibold text-sm">{{
              vueNumberFormat(cartPrice, {
                prefix: "$",
                decimal: ".",
              })
            }}</span>
          </div>
          <form @submit.prevent="handleCheckOut">
            <div>
              <label class="font-medium inline-block mb-3 text-sm uppercase"
                >Your name</label
              >
              <input
                v-model="name"
                type="text"
                placeholder="Enter your name"
                class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-sm focus:ring-sky-600 focus:border-sky-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-sky-500 dark:focus:border-sky-500"
                required
              />
            </div>
            <div class="pt-4">
              <label
                for="promo"
                class="font-semibold inline-block mb-3 text-sm uppercase"
                >Your phone</label
              >
              <input
                v-model="phone"
                type="text"
                placeholder="Enter your phone"
                class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-sm focus:ring-sky-600 focus:border-sky-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-sky-500 dark:focus:border-sky-500"
                required
              />
            </div>
            <div class="pt-4">
              <label
                for="promo"
                class="font-semibold inline-block mb-3 text-sm uppercase"
                >Your address</label
              >
              <input
                v-model="address"
                type="text"
                placeholder="Enter your address"
                class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-sm focus:ring-sky-600 focus:border-sky-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-sky-500 dark:focus:border-sky-500"
                required
              />
            </div>
            <div class="border-t mt-8">
              <div
                class="flex font-semibold justify-between py-6 text-sm uppercase"
              >
                <span>Total cost</span>
                <span>{{
                  vueNumberFormat(cartPrice, {
                    prefix: "$",
                    decimal: ".",
                  })
                }}</span>
              </div>
              <button
                type="submit"
                class="bg-sky-500 font-semibold hover:bg-sky-600 py-3 text-sm text-white uppercase w-full"
              >
                Order
              </button>
            </div>
          </form>
        </div>
      </div>
      <div class="flex justify-start my-4">
        <router-link to="/products" class="flex font-semibold text-sky-600 text-sm">
        <svg class="fill-current mr-2 text-sky-600 w-4" viewBox="0 0 448 512">
          <path
            d="M134.059 296H436c6.627 0 12-5.373 12-12v-56c0-6.627-5.373-12-12-12H134.059v-46.059c0-21.382-25.851-32.09-40.971-16.971L7.029 239.029c-9.373 9.373-9.373 24.569 0 33.941l86.059 86.059c15.119 15.119 40.971 4.411 40.971-16.971V296z"
          />
        </svg>
        Continue Shopping
      </router-link>
      </div>
    </div>
  </div>
</template>

<script>
import userService from "../services/user.service";

export default {
  data() {
    return {
      name: "",
      phone: "",
      address: "",
    };
  },
  computed: {
    user() {
      return this.$store.state.user;
    },
    cart() {
      return this.$store.state?.cart;
    },
    cartQty() {
      return this.$store.state?.cart?.reduce((a, b) => {
        return a + b.qty;
      }, 0);
    },
    cartPrice() {
      return this.$store.state?.cart?.reduce((a, b) => {
        return a + b.price;
      }, 0);
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
    rmCart(id) {
      userService
        .postPrivate("/cart/remove", { cart_id: id })
        .then(() => this.$store.dispatch("getCart"));
    },
    handleCheckOut: function () {
      userService
        .postPrivate("/checkout", {
          customer_id: this.user.id,
          service: "0",
          name: this.name,
          phone: this.phone,
          address: this.address,
          grand_total: this.cartPrice,
        })
        .then(() => this.$store.dispatch("getCart"));
    },
    decrementQty(data) {
      const { product } = data;
      if (data.qty > 1)
        this.$store
          .dispatch("addCart", {
            qty: -1,
            customer_id: this.user.id,
            product_id: product.id,
            price: product.price,
          })
          .then(() => this.$store.dispatch("getCart"));
    },
    incrementQty(data) {
      this.$store
        .dispatch("addCart", {
          qty: 1,
          customer_id: this.user.id,
          product_id: data.id,
          price: data.price,
        })
        .then(() => this.$store.dispatch("getCart"));
    },
  },
};
</script>
