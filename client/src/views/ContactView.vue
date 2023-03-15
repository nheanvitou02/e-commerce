<template>
  <div class="container mx-auto pb-4">
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
              >Contact</span
            >
          </div>
        </li>
      </ol>
    </nav>
    <!-- Section: Design Block -->
    <section class=" text-gray-800 bg-white py-4">
      <div class="flex justify-center">
        <div class="text-center lg:max-w-3xl md:max-w-xl">
          <h2 class="text-3xl font-bold mb-12 px-6">Contact Us</h2>
        </div>
      </div>

      <div class="flex flex-wrap">
        <div
          class="grow-0 shrink-0 basis-auto mb-12 lg:mb-0 w-full lg:w-5/12 px-3 lg:px-6"
        >
          <form name="form" @submit.prevent="handleMessage">
            <div class="form-group mb-6">
              <input
                type="text"
                class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-sm focus:ring-sky-600 focus:border-sky-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-sky-500 dark:focus:border-sky-500"
                id="exampleInput7"
                placeholder="Name"
                v-model="user.name"
                required
              />
            </div>
            <div class="form-group mb-6">
              <input
                type="email"
                class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-sm focus:ring-sky-600 focus:border-sky-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-sky-500 dark:focus:border-sky-500"
                id="exampleInput8"
                placeholder="Email address"
                v-model="user.email"
                required
              />
            </div>
            <div class="form-group mb-4">
              <textarea
                class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-sm focus:ring-sky-600 focus:border-sky-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-sky-500 dark:focus:border-sky-500"
                id="exampleFormControlTextarea13"
                rows="2"
                placeholder="Message"
                v-model="user.message"
                required
              ></textarea>
            </div>
            <span
              v-if="message != ''"
              class="flex justify-center text-sm text-sky-500 mb-4"
              >{{ message }}</span
            >
            <button
              type="submit"
              class="w-full px-6 py-2.5 bg-sky-600 text-white font-medium text-xs leading-tight uppercase rounded-sm hover:bg-sky-700 hover:shadow-lg focus:bg-sky-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-sky-800 active:shadow-lg transition duration-150 ease-in-out"
            >
              Send
            </button>
          </form>
        </div>
        <div class="grow-0 shrink-0 basis-auto w-full lg:w-7/12">
          <div class="flex flex-wrap">
            <div
              class="mb-12 grow-0 shrink-0 basis-auto w-full lg:w-6/12 px-3 lg:px-6"
            >
              <div class="flex items-start">
                <div class="shrink-0">
                  <div
                    class="p-4 bg-sky-600 rounded-sm-md shadow-md w-14 h-14 flex items-center justify-center"
                  >
                    <svg
                      aria-hidden="true"
                      focusable="false"
                      data-prefix="fas"
                      data-icon="headset"
                      class="w-5 text-white"
                      role="img"
                      xmlns="http://www.w3.org/2000/svg"
                      viewBox="0 0 512 512"
                    >
                      <path
                        fill="currentColor"
                        d="M192 208c0-17.67-14.33-32-32-32h-16c-35.35 0-64 28.65-64 64v48c0 35.35 28.65 64 64 64h16c17.67 0 32-14.33 32-32V208zm176 144c35.35 0 64-28.65 64-64v-48c0-35.35-28.65-64-64-64h-16c-17.67 0-32 14.33-32 32v112c0 17.67 14.33 32 32 32h16zM256 0C113.18 0 4.58 118.83 0 256v16c0 8.84 7.16 16 16 16h16c8.84 0 16-7.16 16-16v-16c0-114.69 93.31-208 208-208s208 93.31 208 208h-.12c.08 2.43.12 165.72.12 165.72 0 23.35-18.93 42.28-42.28 42.28H320c0-26.51-21.49-48-48-48h-32c-26.51 0-48 21.49-48 48s21.49 48 48 48h181.72c49.86 0 90.28-40.42 90.28-90.28V256C507.42 118.83 398.82 0 256 0z"
                      ></path>
                    </svg>
                  </div>
                </div>
                <div class="grow ml-6">
                  <p class="font-bold mb-1">Technical support</p>
                  <p class="text-gray-500">nheanvitou@gmail.com</p>
                  <p class="text-gray-500">+855662606</p>
                </div>
              </div>
            </div>
            <div
              class="mb-12 grow-0 shrink-0 basis-auto w-full lg:w-6/12 px-3 lg:px-6"
            >
              <div class="flex items-start">
                <div class="shrink-0">
                  <div
                    class="p-4 bg-sky-600 rounded-sm-md shadow-md w-14 h-14 flex items-center justify-center"
                  >
                    <svg
                      aria-hidden="true"
                      focusable="false"
                      data-prefix="fas"
                      data-icon="dollar-sign"
                      class="w-3 text-white"
                      role="img"
                      xmlns="http://www.w3.org/2000/svg"
                      viewBox="0 0 288 512"
                    >
                      <path
                        fill="currentColor"
                        d="M209.2 233.4l-108-31.6C88.7 198.2 80 186.5 80 173.5c0-16.3 13.2-29.5 29.5-29.5h66.3c12.2 0 24.2 3.7 34.2 10.5 6.1 4.1 14.3 3.1 19.5-2l34.8-34c7.1-6.9 6.1-18.4-1.8-24.5C238 74.8 207.4 64.1 176 64V16c0-8.8-7.2-16-16-16h-32c-8.8 0-16 7.2-16 16v48h-2.5C45.8 64-5.4 118.7.5 183.6c4.2 46.1 39.4 83.6 83.8 96.6l102.5 30c12.5 3.7 21.2 15.3 21.2 28.3 0 16.3-13.2 29.5-29.5 29.5h-66.3C100 368 88 364.3 78 357.5c-6.1-4.1-14.3-3.1-19.5 2l-34.8 34c-7.1 6.9-6.1 18.4 1.8 24.5 24.5 19.2 55.1 29.9 86.5 30v48c0 8.8 7.2 16 16 16h32c8.8 0 16-7.2 16-16v-48.2c46.6-.9 90.3-28.6 105.7-72.7 21.5-61.6-14.6-124.8-72.5-141.7z"
                      ></path>
                    </svg>
                  </div>
                </div>
                <div class="grow ml-6">
                  <p class="font-bold mb-1">Sales questions</p>
                  <p class="text-gray-500">nheanvitou@gmail.com</p>
                  <p class="text-gray-500">+855662606</p>
                </div>
              </div>
            </div>
            <div
              class="mb-12 grow-0 shrink-0 basis-auto w-full lg:w-6/12 px-3 lg:px-6"
            >
              <div class="flex align-start">
                <div class="shrink-0">
                  <div
                    class="p-4 bg-sky-600 rounded-sm-md shadow-md w-14 h-14 flex items-center justify-center"
                  >
                    <svg
                      aria-hidden="true"
                      focusable="false"
                      data-prefix="fas"
                      data-icon="newspaper"
                      class="w-5 text-white"
                      role="img"
                      xmlns="http://www.w3.org/2000/svg"
                      viewBox="0 0 576 512"
                    >
                      <path
                        fill="currentColor"
                        d="M552 64H88c-13.255 0-24 10.745-24 24v8H24c-13.255 0-24 10.745-24 24v272c0 30.928 25.072 56 56 56h472c26.51 0 48-21.49 48-48V88c0-13.255-10.745-24-24-24zM56 400a8 8 0 0 1-8-8V144h16v248a8 8 0 0 1-8 8zm236-16H140c-6.627 0-12-5.373-12-12v-8c0-6.627 5.373-12 12-12h152c6.627 0 12 5.373 12 12v8c0 6.627-5.373 12-12 12zm208 0H348c-6.627 0-12-5.373-12-12v-8c0-6.627 5.373-12 12-12h152c6.627 0 12 5.373 12 12v8c0 6.627-5.373 12-12 12zm-208-96H140c-6.627 0-12-5.373-12-12v-8c0-6.627 5.373-12 12-12h152c6.627 0 12 5.373 12 12v8c0 6.627-5.373 12-12 12zm208 0H348c-6.627 0-12-5.373-12-12v-8c0-6.627 5.373-12 12-12h152c6.627 0 12 5.373 12 12v8c0 6.627-5.373 12-12 12zm0-96H140c-6.627 0-12-5.373-12-12v-40c0-6.627 5.373-12 12-12h360c6.627 0 12 5.373 12 12v40c0 6.627-5.373 12-12 12z"
                      ></path>
                    </svg>
                  </div>
                </div>
                <div class="grow ml-6">
                  <p class="font-bold mb-1">Press</p>
                  <p class="text-gray-500">nheanvitou@gmail.com</p>
                  <p class="text-gray-500">+855662606</p>
                </div>
              </div>
            </div>
            <div
              class="mb-12 grow-0 shrink-0 basis-auto w-full lg:w-6/12 px-3 lg:px-6"
            >
              <div class="flex align-start">
                <div class="shrink-0">
                  <div
                    class="p-4 bg-sky-600 rounded-sm-md shadow-md w-14 h-14 flex items-center justify-center"
                  >
                    <svg
                      aria-hidden="true"
                      focusable="false"
                      data-prefix="fas"
                      data-icon="bug"
                      class="w-5 text-white"
                      role="img"
                      xmlns="http://www.w3.org/2000/svg"
                      viewBox="0 0 512 512"
                    >
                      <path
                        fill="currentColor"
                        d="M511.988 288.9c-.478 17.43-15.217 31.1-32.653 31.1H424v16c0 21.864-4.882 42.584-13.6 61.145l60.228 60.228c12.496 12.497 12.496 32.758 0 45.255-12.498 12.497-32.759 12.496-45.256 0l-54.736-54.736C345.886 467.965 314.351 480 280 480V236c0-6.627-5.373-12-12-12h-24c-6.627 0-12 5.373-12 12v244c-34.351 0-65.886-12.035-90.636-32.108l-54.736 54.736c-12.498 12.497-32.759 12.496-45.256 0-12.496-12.497-12.496-32.758 0-45.255l60.228-60.228C92.882 378.584 88 357.864 88 336v-16H32.666C15.23 320 .491 306.33.013 288.9-.484 270.816 14.028 256 32 256h56v-58.745l-46.628-46.628c-12.496-12.497-12.496-32.758 0-45.255 12.498-12.497 32.758-12.497 45.256 0L141.255 160h229.489l54.627-54.627c12.498-12.497 32.758-12.497 45.256 0 12.496 12.497 12.496 32.758 0 45.255L424 197.255V256h56c17.972 0 32.484 14.816 31.988 32.9zM257 0c-61.856 0-112 50.144-112 112h224C369 50.144 318.856 0 257 0z"
                      ></path>
                    </svg>
                  </div>
                </div>
                <div class="grow ml-6">
                  <p class="font-bold mb-1">Bug report</p>
                  <p class="text-gray-500">nheanvitou@gmail.com</p>
                  <p class="text-gray-500">+855662606</p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <GoogleMap
      class="my-4"
      style="width: 100%; height: 500px"
      :center="center"
      :zoom="15"
    >
      <Marker :options="{ position: center }" />
    </GoogleMap>
  </div>
  <!-- Container for demo purpose -->
</template>

<script>
import { defineComponent } from "vue";
import { GoogleMap, Marker } from "vue3-google-map";
import userService from "../services/user.service";
import User from "../models/user";

export default defineComponent({
  components: { GoogleMap, Marker },
  setup() {
    const center = { lat: 11.587942719870483, lng: 104.8998462067285 };

    return { center };
  },
  name: "Contact",
  data() {
    return {
      user: new User("", "", "", "", ""),
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
    if (this.loggedIn) this.$store.dispatch("getNoti");
    window.scrollTo(0, 0);
  },
  methods: {
    handleMessage() {
      this.loading = true;
      userService
        .postPublic("/v1/contacts", this.user)
        .then((res) => {
          this.message = res.data.message;
          this.user = new User("", "", "", "",""),
          setTimeout(() => {
            this.message = "";
          }, 2000);
        })
        .catch((err) => {
          this.message = err.response.data.message;
          setTimeout(() => {
            this.message = "";
          }, 2000);
        });
    },
  },
});
</script>
