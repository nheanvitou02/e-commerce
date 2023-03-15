<template>
  <footer class="relative bg-white py-4 lg:py-10">
    <div class="container mx-auto">
      <div class="flex flex-wrap">
        <div class="w-full lg:w-1/3">
          <div class="mb-10 w-full">
            <router-link
              to=""
              href="javascript:void(0)"
              class="mb-6 inline-block max-w-[160px]"
            >
              <img
                src="../assets/image/shop.webp"
                class="h-9 mr-1 sm:h-12"
                alt="Logo"
              />
            </router-link>
            <p class="text-gray-600 text-xs lg:text-sm mb-7">
              We are the authorized reseller of ASUS, DXRACER, Razer and Lenovo
              gaming product in Cambodia. We focus on professional gaming
              products only.
            </p>
            <p class="text-dark flex items-center text-sm font-medium">
              <span class="text-primary mr-3">
                <svg
                  width="19"
                  height="21"
                  viewBox="0 0 19 21"
                  class="fill-current"
                >
                  <path
                    d="M17.8076 11.8129C17.741 11.0475 17.1088 10.5151 16.3434 10.5151H2.16795C1.40261 10.5151 0.803643 11.0808 0.703816 11.8129L0.00502514 18.8008C-0.0282506 19.2001 0.104853 19.6327 0.371059 19.9322C0.637265 20.2317 1.03657 20.398 1.46916 20.398H17.0755C17.4748 20.398 17.8741 20.2317 18.1736 19.9322C18.4398 19.6327 18.5729 19.2334 18.5396 18.8008L17.8076 11.8129ZM17.2751 19.1668C17.2419 19.2001 17.1753 19.2667 17.0422 19.2667H1.46916C1.36933 19.2667 1.2695 19.2001 1.23623 19.1668C1.20295 19.1336 1.1364 19.067 1.16968 18.9339L1.86847 11.9127C1.86847 11.7463 2.00157 11.6465 2.16795 11.6465H16.3767C16.5431 11.6465 16.6429 11.7463 16.6762 11.9127L17.375 18.9339C17.3417 19.0337 17.3084 19.1336 17.2751 19.1668Z"
                  />
                  <path
                    d="M9.25704 13.1106C7.95928 13.1106 6.92773 14.1422 6.92773 15.4399C6.92773 16.7377 7.95928 17.7693 9.25704 17.7693C10.5548 17.7693 11.5863 16.7377 11.5863 15.4399C11.5863 14.1422 10.5548 13.1106 9.25704 13.1106ZM9.25704 16.6046C8.6248 16.6046 8.09239 16.0722 8.09239 15.4399C8.09239 14.8077 8.6248 14.2753 9.25704 14.2753C9.88928 14.2753 10.4217 14.8077 10.4217 15.4399C10.4217 16.0722 9.88928 16.6046 9.25704 16.6046Z"
                  />
                  <path
                    d="M0.802807 6.05619C0.869358 7.52032 2.16711 8.11928 2.83263 8.11928H5.16193C5.19521 8.11928 5.19521 8.11928 5.19521 8.11928C6.19348 8.05273 7.19175 7.38722 7.19175 6.05619V5.25757C8.28985 5.25757 10.8188 5.25757 11.9169 5.25757V6.05619C11.9169 7.38722 12.9152 8.05273 13.9135 8.11928H13.9467H16.2428C16.9083 8.11928 18.206 7.52032 18.2726 6.05619C18.2726 5.95636 18.2726 5.59033 18.2726 5.25757C18.2726 4.99136 18.2726 4.75843 18.2726 4.72516C18.2726 4.69188 18.2726 4.6586 18.2726 4.6586C18.1727 3.72688 17.84 2.96154 17.2743 2.36258L17.241 2.3293C16.4091 1.56396 15.4109 1.13138 14.6455 0.865169C12.416 0 9.62088 0 9.48778 0C7.52451 0.0332757 6.26003 0.199654 4.36331 0.865169C3.63125 1.0981 2.63297 1.53068 1.80108 2.29603L1.7678 2.3293C1.20212 2.92827 0.869359 3.69361 0.769531 4.62533C0.769531 4.6586 0.769531 4.69188 0.769531 4.69188C0.769531 4.75843 0.769531 4.95809 0.769531 5.22429C0.802807 5.52377 0.802807 5.92308 0.802807 6.05619ZM2.5997 3.12792C3.26521 2.52896 4.09711 2.16292 4.7959 1.89672C6.52624 1.26448 7.65761 1.13138 9.55433 1.0981C9.68743 1.0981 12.2829 1.13138 14.2795 1.89672C14.9783 2.16292 15.8102 2.49568 16.4757 3.12792C16.8417 3.52723 17.0746 4.05964 17.1412 4.69188C17.1412 4.79171 17.1412 4.95809 17.1412 5.22429C17.1412 5.55705 17.1412 5.92308 17.1412 6.02291C17.1079 6.78825 16.3759 6.95463 16.276 6.95463H13.98C13.6472 6.92135 13.1148 6.78825 13.1148 6.05619V4.69188C13.1148 4.42567 12.9485 4.22602 12.7155 4.12619C12.5159 4.05964 6.69262 4.05964 6.49296 4.12619C6.26003 4.19274 6.09365 4.42567 6.09365 4.69188V6.05619C6.09365 6.78825 5.56124 6.92135 5.22848 6.95463H2.93246C2.83263 6.95463 2.10056 6.78825 2.06729 6.02291C2.06729 5.92308 2.06729 5.55705 2.06729 5.22429C2.06729 4.95809 2.06729 4.82498 2.06729 4.72516C2.00073 4.05964 2.23366 3.52723 2.5997 3.12792Z"
                  />
                </svg>
              </span>
              <span>+855 66 260 605</span>
            </p>
          </div>
        </div>
        <div
          class="grid grid-cols-2 w-full text-sm gap-x-3 gap-y-8 lg:w-2/3 sm:grid-cols-4"
        >
          <div class="space-y-3">
            <span
              class="tracking-wide text-sm md:text-lg font-bold uppercase dark:text-gray-50 text-gray-800"
              >About</span
            >
            <ul class="space-y-1 text-gray-400">
              <li><router-link to="/contacts">Contact Us</router-link></li>
              <li><router-link to="#">Terms and conditions</router-link></li>
              <li><router-link to="">Privacy Policy</router-link></li>
            </ul>
          </div>
          <div class="space-y-3">
            <span
              class="tracking-wide text-sm md:text-lg font-bold uppercase dark:text-gray-50 text-gray-800"
              >My Account</span
            >
            <ul class="space-y-1 text-gray-400">
              <li><router-link to="/profiles">Profile</router-link></li>
              <li><router-link to="/change-password">Change Password</router-link></li>
              <li><router-link to="/wishlists">My Wishlist</router-link></li>
              <li><router-link to="/carts">My Shopping Cart</router-link></li>
            </ul>
          </div>
          <div class="space-y-3">
            <span
              class="tracking-wide text-sm md:text-lg font-bold uppercase dark:text-gray-50 text-gray-800"
              >Order</span
            >
            <ul class="space-y-1 text-gray-400">
              <li><router-link to="">Track Order</router-link></li>
              <li><router-link to="">Order History</router-link></li>
            </ul>
          </div>
          <div class="space-y-3">
            <div class="uppercase text-gray-800 dark:text-gray-50">
              Follow Us
            </div>
            <div class="flex gap-1 items-center mt-2">
              <router-link
                to=""
                target="_blank"
                rel="noreferrer"
                href="https://www.facebook.com/ugamerkh/"
                class="bg-bg p-2 rounded-full h-10 w-10 flex items-center justify-center"
                ><svg
                  stroke="currentColor"
                  fill="currentColor"
                  stroke-width="0"
                  viewBox="0 0 512 512"
                  class="text-2xl text-gray-800"
                  height="1em"
                  width="1em"
                  xmlns="http://www.w3.org/2000/svg"
                >
                  <path
                    fill-rule="evenodd"
                    d="M480 257.35c0-123.7-100.3-224-224-224s-224 100.3-224 224c0 111.8 81.9 204.47 189 221.29V322.12h-56.89v-64.77H221V208c0-56.13 33.45-87.16 84.61-87.16 24.51 0 50.15 4.38 50.15 4.38v55.13H327.5c-27.81 0-36.51 17.26-36.51 35v42h62.12l-9.92 64.77H291v156.54c107.1-16.81 189-109.48 189-221.31z"
                  ></path>
                </svg>
              </router-link>
              <router-link
                to=""
                target="_blank"
                rel="noreferrer"
                href="https://www.instagram.com/u_gamerstore/"
                class="bg-bg p-2 rounded-full h-10 w-10 flex items-center justify-center"
                ><svg
                  stroke="currentColor"
                  fill="currentColor"
                  stroke-width="0"
                  version="1.1"
                  viewBox="0 0 16 16"
                  class="text-lg text-gray-800"
                  height="1em"
                  width="1em"
                  xmlns="http://www.w3.org/2000/svg"
                >
                  <path
                    d="M14.5 0h-13c-0.825 0-1.5 0.675-1.5 1.5v13c0 0.825 0.675 1.5 1.5 1.5h13c0.825 0 1.5-0.675 1.5-1.5v-13c0-0.825-0.675-1.5-1.5-1.5zM11 2.5c0-0.275 0.225-0.5 0.5-0.5h2c0.275 0 0.5 0.225 0.5 0.5v2c0 0.275-0.225 0.5-0.5 0.5h-2c-0.275 0-0.5-0.225-0.5-0.5v-2zM8 5c1.656 0 3 1.344 3 3s-1.344 3-3 3c-1.656 0-3-1.344-3-3s1.344-3 3-3zM14 13.5v0c0 0.275-0.225 0.5-0.5 0.5h-11c-0.275 0-0.5-0.225-0.5-0.5v0-6.5h1.1c-0.066 0.322-0.1 0.656-0.1 1 0 2.762 2.237 5 5 5s5-2.238 5-5c0-0.344-0.034-0.678-0.1-1h1.1v6.5z"
                  ></path></svg></router-link
              ><router-link
                to=""
                target="_blank"
                rel="noreferrer"
                href="https://www.youtube.com/channel/UClMQmIhM1ySFVjNkuJ7628w"
                class="bg-bg p-2 rounded-full h-10 w-10 flex items-center justify-center"
                ><svg
                  stroke="currentColor"
                  fill="currentColor"
                  stroke-width="0"
                  viewBox="0 0 16 16"
                  class="text-xl text-gray-800"
                  height="1em"
                  width="1em"
                  xmlns="http://www.w3.org/2000/svg"
                >
                  <path
                    d="M8.051 1.999h.089c.822.003 4.987.033 6.11.335a2.01 2.01 0 0 1 1.415 1.42c.101.38.172.883.22 1.402l.01.104.022.26.008.104c.065.914.073 1.77.074 1.957v.075c-.001.194-.01 1.108-.082 2.06l-.008.105-.009.104c-.05.572-.124 1.14-.235 1.558a2.007 2.007 0 0 1-1.415 1.42c-1.16.312-5.569.334-6.18.335h-.142c-.309 0-1.587-.006-2.927-.052l-.17-.006-.087-.004-.171-.007-.171-.007c-1.11-.049-2.167-.128-2.654-.26a2.007 2.007 0 0 1-1.415-1.419c-.111-.417-.185-.986-.235-1.558L.09 9.82l-.008-.104A31.4 31.4 0 0 1 0 7.68v-.123c.002-.215.01-.958.064-1.778l.007-.103.003-.052.008-.104.022-.26.01-.104c.048-.519.119-1.023.22-1.402a2.007 2.007 0 0 1 1.415-1.42c.487-.13 1.544-.21 2.654-.26l.17-.007.172-.006.086-.003.171-.007A99.788 99.788 0 0 1 7.858 2h.193zM6.4 5.209v4.818l4.157-2.408L6.4 5.209z"
                  ></path>
                </svg>
              </router-link>
            </div>
          </div>
        </div>
      </div>
    </div>
  </footer>
  <!-- ====== Footer Section End -->
</template>
