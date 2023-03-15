<template>
  <div
    class="flex flex-col items-center justify-center px-6 mx-auto lg:py-0"
  >
    <div
      class="w-full bg-white rounded-sm my-4  dark:border sm:max-w-md xl:p-0 dark:bg-gray-800 dark:border-gray-700"
    >
      <div class="p-6 space-y-4 md:space-y-6 sm:p-8">
        <h1
          class="text-xl font-bold leading-tight tracking-tight text-gray-900 md:text-2xl dark:text-white"
        >
          Sign up to your account
        </h1>
        <form
          class="space-y-4 md:space-y-6"
          name="form"
          @submit.prevent="handleRegister"
        >
          <div>
            <label
              for="username"
              class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"
              >Your Name</label
            >
            <input
              type="text"
              v-model="user.name"
              id="username"
              class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-sm focus:ring-sky-600 focus:border-sky-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-sky-500 dark:focus:border-sky-500"
              placeholder="Name"
              required
            />
          </div>
          <div>
            <label
              for="email"
              class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"
              >Your Email</label
            >
            <input
              type="email"
              v-model="user.email"
              id="email"
              class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-sm focus:ring-sky-600 focus:border-sky-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-sky-500 dark:focus:border-sky-500"
              placeholder="name@example.com"
              required
            />
          </div>
          <div>
            <label
              for="password"
              class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"
              >Password</label
            >
            <input
              type="password"
              v-model="user.password"
              id="password"
              placeholder="••••••••"
              class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-sm focus:ring-sky-600 focus:border-sky-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-sky-500 dark:focus:border-sky-500"
              required
            />
          </div>
          <div>
            <label
              for="password"
              class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"
              >Confirmat password</label
            >
            <input
              type="password"
              v-model="user.password_confirmation"
              id="password"
              placeholder="••••••••"
              class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-sm focus:ring-sky-600 focus:border-sky-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-sky-500 dark:focus:border-sky-500"
              required
            />
          </div>
          <span
            v-if="message != ''"
            class="flex justify-center text-sm text-red-500 !mt-1"
            >{{ message }}</span
          >
          <button
            type="submit"
            class="w-full text-white bg-sky-600 hover:bg-sky-700 focus:ring-4 focus:outline-none focus:ring-sky-300 font-medium rounded-sm text-sm px-5 py-2.5 text-center dark:bg-sky-600 dark:hover:bg-sky-700 dark:focus:ring-sky-800"
          >
            Sign up
          </button>
          <p class="text-sm font-light text-gray-500 dark:text-gray-400">
            Have an account already
            <router-link
              to="/sign-in"
              class="font-medium text-sky-600 hover:underline dark:text-sky-500"
              >Sign in</router-link
            >
          </p>
        </form>
      </div>
    </div>
  </div>
</template>

<script>
import User from "../../models/user";

export default {
  name: "Register",
  data() {
    return {
      user: new User("", "", "", "",""),
      loading: false,
      message: "",
    };
  },
  computed: {
    loggedIn() {
      return this.$store.state.status.loggedIn;
    },
  },
  created() {
    if (this.loggedIn) {
      this.$router.push("/");
    }
    window.scrollTo(0, 0);
  },
  methods: {
    handleRegister() {
      this.loading = true;
      this.$store
        .dispatch("register", this.user)
        .then(() => {
          this.$store.dispatch("getWishlist");
          this.$store.dispatch("getCart");
          this.$router.push("/");
        })
        .catch((err) => {
          this.message = err.response.data.message;
          setTimeout(() => {
            this.message = "";
          }, 2000);
        });
    },
  },
};
</script>
