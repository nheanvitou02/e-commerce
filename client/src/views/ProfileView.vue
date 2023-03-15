<template>
  <div class=" container mx-auto pt-24 pb-4">
    <div class="p-8 bg-white">
      <div class="grid grid-cols-1 md:grid-cols-3">
        <div
          class="grid grid-cols-3 text-center order-last md:order-first mt-20 md:mt-0"
        >
          <div>
            <p class="font-bold text-gray-700 text-xl">{{ wishlist }}</p>
            <p class="text-gray-400">WishList</p>
          </div>
          <div>
            <p class="font-bold text-gray-700 text-xl">{{ cart }}</p>
            <p class="text-gray-400">Cart</p>
          </div>
          <div>
            <p class="font-bold text-gray-700 text-xl">{{ data.length }}</p>
            <p class="text-gray-400">Ordered</p>
          </div>
        </div>
        <div class="relative">
          <div
            class="w-48 h-48 bg-indigo-100 mx-auto rounded-full shadow-2xl absolute inset-x-0 top-0 -mt-24 flex items-center justify-center text-indigo-500"
          >
            <svg
              xmlns="http://www.w3.org/2000/svg"
              class="h-24 w-24"
              viewBox="0 0 20 20"
              fill="currentColor"
            >
              <path
                fill-rule="evenodd"
                d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z"
                clip-rule="evenodd"
              />
            </svg>
          </div>
        </div>
        <!-- <div class="space-x-8 flex justify-end items-center">
          <svg width="30" height="30" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" id="IconChangeColor"> <path d="M13.8199 22H10.1799C9.71003 22 9.30347 21.673 9.20292 21.214L8.79592 19.33C8.25297 19.0921 7.73814 18.7946 7.26092 18.443L5.42392 19.028C4.97592 19.1709 4.48891 18.9823 4.25392 18.575L2.42992 15.424C2.19751 15.0165 2.27758 14.5025 2.62292 14.185L4.04792 12.885C3.98312 12.2961 3.98312 11.7019 4.04792 11.113L2.62292 9.816C2.27707 9.49837 2.19697 8.98372 2.42992 8.576L4.24992 5.423C4.48491 5.0157 4.97192 4.82714 5.41992 4.97L7.25692 5.555C7.50098 5.37416 7.75505 5.20722 8.01792 5.055C8.27026 4.91269 8.52995 4.78385 8.79592 4.669L9.20392 2.787C9.30399 2.32797 9.71011 2.00049 10.1799 2H13.8199C14.2897 2.00049 14.6958 2.32797 14.7959 2.787L15.2079 4.67C15.4887 4.79352 15.7622 4.93308 16.0269 5.088C16.2742 5.23078 16.5132 5.38736 16.7429 5.557L18.5809 4.972C19.0286 4.82967 19.515 5.01816 19.7499 5.425L21.5699 8.578C21.8023 8.98548 21.7223 9.49951 21.3769 9.817L19.9519 11.117C20.0167 11.7059 20.0167 12.3001 19.9519 12.889L21.3769 14.189C21.7223 14.5065 21.8023 15.0205 21.5699 15.428L19.7499 18.581C19.515 18.9878 19.0286 19.1763 18.5809 19.034L16.7429 18.449C16.5103 18.6203 16.2687 18.7789 16.0189 18.924C15.7567 19.0759 15.4863 19.2131 15.2089 19.335L14.7959 21.214C14.6954 21.6726 14.2894 21.9996 13.8199 22ZM11.9959 8C9.78678 8 7.99592 9.79086 7.99592 12C7.99592 14.2091 9.78678 16 11.9959 16C14.2051 16 15.9959 14.2091 15.9959 12C15.9959 9.79086 14.2051 8 11.9959 8Z" fill="black" id="mainIconPathAttribute"></path> </svg>
          <button
            @click="logOut"
            class="text-white py-2 px-4 flex rounded bg-red-400 hover:bg-red-500 font-medium transition transform space-x-1"
          >
            <svg
              class="h-6 w-6"
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
              <path
                d="M14 8v-2a2 2 0 0 0 -2 -2h-7a2 2 0 0 0 -2 2v12a2 2 0 0 0 2 2h7a2 2 0 0 0 2 -2v-2"
              />
              <path d="M7 12h14l-3 -3m0 6l3 -3" />
            </svg>
            <span>Logout</span>
          </button>
        </div> -->
      </div>
      <div class="mt-20 text-center border-b pb-12">
        <h1 class="text-4xl font-medium text-gray-700">
          {{ user.name }}
        </h1>
        <p class="font-light text-gray-600 mt-3">{{ user.email }}</p>
      </div>
      <div class="my-10">
        <h2 class="text-2xl font-bold">Products Ordered</h2>
      </div>
      <div>
        <NoItem v-if="data.length == 0" title="No Product Order" />
        <CardOrder v-else :data="data" />
      </div>
    </div>
  </div>
</template>

<script>
import CardOrder from "../components/CardOrder.vue";
import NoItem from "../components/NoItem.vue";
import userService from "../services/user.service";

export default {
  data() {
    return {
      data: Array,
      loading: false,
    };
  },
  computed: {
    user() {
      return this.$store.state.user;
    },
    cart() {
      return this.$store.state?.cart?.reduce((a, b) => {
        return a + b.qty;
      }, 0);
    },
    wishlist() {
      return this.$store.state.wishlist.length;
    },
    loggedIn() {
      return this.$store.state.status.loggedIn;
    },
  },
  created() {
    this.loading = true;
    userService.getPrivate("/invoice").then((res) => {
      this.data = res.data.data;
      this.loading = false;
    });
    if (this.loggedIn) this.$store.dispatch("getNoti");
    window.scrollTo(0, 0);
  },
  methods: {
    logOut() {
      this.$store.dispatch("logout");
      this.$router.push("/login");
    },
    receive(id) {
      this.loading = true;
      userService.postPrivate(`/invoice/${id}`).then(() => {
        this.$store.dispatch("getNoti");
        userService.getPrivate("/invoice").then((res) => {
          this.data = res.data.data;
          this.loading = false;
        });
      });
    },
  },
  components: { NoItem, CardOrder },
};
</script>
