<template>
  <div class="hidden md:block bg-white">
    <div class="container mx-auto justify-between flex">
      <div class="header-action header-action-start py-2">
        <span
          class="flex justify-center items-center gap-2 text-gray-700 text-sm"
          ><svg
            stroke="currentColor"
            fill="currentColor"
            stroke-width="0"
            viewBox="0 0 16 16"
            height="1em"
            width="1em"
            xmlns="http://www.w3.org/2000/svg"
          >
            <path
              d="M3.654 1.328a.678.678 0 0 0-1.015-.063L1.605 2.3c-.483.484-.661 1.169-.45 1.77a17.568 17.568 0 0 0 4.168 6.608 17.569 17.569 0 0 0 6.608 4.168c.601.211 1.286.033 1.77-.45l1.034-1.034a.678.678 0 0 0-.063-1.015l-2.307-1.794a.678.678 0 0 0-.58-.122l-2.19.547a1.745 1.745 0 0 1-1.657-.459L5.482 8.062a1.745 1.745 0 0 1-.46-1.657l.548-2.19a.678.678 0 0 0-.122-.58L3.654 1.328zM1.884.511a1.745 1.745 0 0 1 2.612.163L6.29 2.98c.329.423.445.974.315 1.494l-.547 2.19a.678.678 0 0 0 .178.643l2.457 2.457a.678.678 0 0 0 .644.178l2.189-.547a1.745 1.745 0 0 1 1.494.315l2.306 1.794c.829.645.905 1.87.163 2.611l-1.034 1.034c-.74.74-1.846 1.065-2.877.702a18.634 18.634 0 0 1-7.01-4.42 18.634 18.634 0 0 1-4.42-7.009c-.362-1.03-.037-2.137.703-2.877L1.885.511zm10.762.135a.5.5 0 0 1 .708 0l2.5 2.5a.5.5 0 0 1 0 .708l-2.5 2.5a.5.5 0 0 1-.708-.708L14.293 4H9.5a.5.5 0 0 1 0-1h4.793l-1.647-1.646a.5.5 0 0 1 0-.708z"
            ></path>
          </svg>
          <span class="font-semibold">Call: +855 66 260 605</span></span
        >
      </div>
      <div class="header-action header-action-end"></div>
    </div>
    <nav>
      <div class="container mx-auto">
        <div
          class="flex flex-wrap justify-between items-center max-w-screen-xl py-4"
        >
          <router-link to="/" class="flex items-center">
            <img
              src="../assets/image/shop.webp"
              class="h-9 mr-1 sm:h-12"
              alt="Logo"
            />
          </router-link>
          <FormSearch class="w-[40%]" />
          <div class="flex items-center space-x-3">
            <router-link
              to="/wishlists"
              class="relative text-sm font-medium text-center bg-red-400 h-9 w-9 flex justify-center items-center rounded-full cursor-pointer"
              ><svg
                width="24"
                height="24"
                viewBox="0 0 24 24"
                fill="none"
                xmlns="http://www.w3.org/2000/svg"
              >
                <path
                  fill-rule="evenodd"
                  clip-rule="evenodd"
                  d="M11.9942 5.38646C10.0797 3.73702 7.24843 3.39949 5.04972 5.25154C2.67144 7.25487 2.32589 10.6288 4.20659 13.0146C4.92048 13.9202 6.31383 15.2808 7.65288 16.5268C9.00761 17.7875 10.3592 18.9787 11.0257 19.5606C11.0299 19.5643 11.0342 19.568 11.0385 19.5718C11.1011 19.6265 11.1792 19.6947 11.2539 19.7502C11.3434 19.8167 11.472 19.8992 11.6436 19.9497C11.8718 20.0168 12.1171 20.0168 12.3454 19.9497C12.517 19.8992 12.6456 19.8167 12.7351 19.7502C12.8099 19.6947 12.8878 19.6265 12.9505 19.5718C12.9549 19.568 12.9591 19.5643 12.9633 19.5606C13.6298 18.9787 14.9814 17.7875 16.3362 16.5268C17.6752 15.2808 19.0686 13.9202 19.7824 13.0146C21.6559 10.638 21.3637 7.23801 18.9308 5.24447C16.7076 3.4228 13.9065 3.7364 11.9942 5.38646Z"
                  fill="white"
                ></path>
              </svg>
              <div
                v-if="wishlist > 0"
                class="absolute inline-flex items-center justify-center w-4 h-4 text-[7px] text-white bg-red-500 border-2 border-white rounded-full -top-1 -right-1 dark:border-gray-900"
              >
                {{ wishlist }}
              </div>
            </router-link>
            <router-link
              to="/carts"
              class="relative text-sm font-medium text-center bg-gray-400 h-9 w-9 flex justify-center items-center rounded-full cursor-pointer"
              ><svg
                width="24"
                height="24"
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
              <div
                v-if="cart > 0"
                class="absolute inline-flex items-center justify-center w-4 h-4 text-[7px] text-white bg-red-500 border-2 border-white rounded-full -top-1 -right-1 dark:border-gray-900"
              >
                {{ cart }}
              </div>
            </router-link>

            <router-link
              v-if="!loggedIn"
              to="/sign-in"
              class="relative text-sm font-medium text-center bg-gray-400 h-9 w-9 flex justify-center items-center rounded-full cursor-pointer"
            >
              <svg
                width="24"
                height="24"
                viewBox="0 0 24 24"
                fill="none"
                xmlns="http://www.w3.org/2000/svg"
              >
                <path
                  fill-rule="evenodd"
                  clip-rule="evenodd"
                  d="M9.14333 14.1109C11.0479 14.1113 12.9525 14.1113 14.857 14.1109C15.5029 14.1107 15.9431 14.1106 16.3274 14.1784C18.1675 14.5029 19.6081 15.9435 19.9325 17.7835C20.0003 18.1679 20.0002 18.6079 20.0001 19.2539C20 19.3947 20.0044 19.5364 19.9798 19.6757C19.8825 20.2277 19.4502 20.6598 18.8982 20.7572C18.7773 20.7785 18.6497 20.7779 18.5862 20.7775C14.196 20.754 9.80435 20.754 5.41405 20.7775C5.35062 20.7779 5.22311 20.7785 5.10207 20.7572C4.55007 20.6598 4.11788 20.2277 4.02054 19.6757C3.99599 19.5364 4.00031 19.3947 4.00027 19.2539C4.00013 18.6079 4.00003 18.1679 4.06781 17.7835C4.39226 15.9435 5.83288 14.5029 7.6729 14.1784C8.05726 14.1106 8.4974 14.1107 9.14333 14.1109Z"
                  fill="white"
                ></path>
                <path
                  fill-rule="evenodd"
                  clip-rule="evenodd"
                  d="M7.11133 7.88882C7.11133 5.18879 9.30012 3 12.0002 3C14.7001 3 16.889 5.18879 16.889 7.88882C16.889 10.5889 14.7001 12.7776 12.0002 12.7776C9.30012 12.7776 7.11133 10.5889 7.11133 7.88882Z"
                  fill="white"
                ></path>
              </svg>
            </router-link>
            <div :class="loggedIn ? 'block' : 'hidden'">
              <div
                id="dropdownInformationButton"
                data-dropdown-toggle="dropdownInformation"
                class="relative text-sm font-medium text-center bg-gray-400 h-9 w-9 flex justify-center items-center rounded-full cursor-pointer"
              >
                <svg
                  width="24"
                  height="24"
                  viewBox="0 0 24 24"
                  fill="none"
                  xmlns="http://www.w3.org/2000/svg"
                >
                  <path
                    fill-rule="evenodd"
                    clip-rule="evenodd"
                    d="M9.14333 14.1109C11.0479 14.1113 12.9525 14.1113 14.857 14.1109C15.5029 14.1107 15.9431 14.1106 16.3274 14.1784C18.1675 14.5029 19.6081 15.9435 19.9325 17.7835C20.0003 18.1679 20.0002 18.6079 20.0001 19.2539C20 19.3947 20.0044 19.5364 19.9798 19.6757C19.8825 20.2277 19.4502 20.6598 18.8982 20.7572C18.7773 20.7785 18.6497 20.7779 18.5862 20.7775C14.196 20.754 9.80435 20.754 5.41405 20.7775C5.35062 20.7779 5.22311 20.7785 5.10207 20.7572C4.55007 20.6598 4.11788 20.2277 4.02054 19.6757C3.99599 19.5364 4.00031 19.3947 4.00027 19.2539C4.00013 18.6079 4.00003 18.1679 4.06781 17.7835C4.39226 15.9435 5.83288 14.5029 7.6729 14.1784C8.05726 14.1106 8.4974 14.1107 9.14333 14.1109Z"
                    fill="white"
                  ></path>
                  <path
                    fill-rule="evenodd"
                    clip-rule="evenodd"
                    d="M7.11133 7.88882C7.11133 5.18879 9.30012 3 12.0002 3C14.7001 3 16.889 5.18879 16.889 7.88882C16.889 10.5889 14.7001 12.7776 12.0002 12.7776C9.30012 12.7776 7.11133 10.5889 7.11133 7.88882Z"
                    fill="white"
                  ></path>
                </svg>
                <div
                  v-if="noti > 0"
                  class="absolute inline-flex items-center justify-center w-4 h-4 text-[7px] text-white bg-red-500 border-2 border-white rounded-full -top-1 -right-1 dark:border-gray-900"
                >
                  {{ noti }}
                </div>
              </div>
              <div
                id="dropdownInformation"
                class="z-10 hidden bg-white divide-y divide-gray-100 rounded-sm shadow w-44 dark:bg-gray-700 dark:divide-gray-600"
              >
                <div class="px-4 py-3 text-sm text-gray-900 dark:text-white">
                  <div>{{ user.name }}</div>
                  <div class="font-medium truncate">{{ user.email }}</div>
                </div>
                <ul
                  class="py-2 text-sm text-gray-700 dark:text-gray-200"
                  aria-labelledby="dropdownInformationButton"
                >
                  <li>
                    <router-link
                      to="/profiles"
                      class="flex items-center space-x-1.5 px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white"
                      ><svg
                        class="h-5 w-5 text-black"
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
                        <circle cx="12" cy="7" r="4" />
                        <path d="M6 21v-2a4 4 0 0 1 4 -4h4a4 4 0 0 1 4 4v2" />
                      </svg>
                      <span>Profile</span
                      ><span
                        v-if="noti > 0"
                        class="inline-flex items-center justify-center w-4 h-4 ml-2 text-xs font-semibold text-blue-800 bg-blue-200 rounded-full"
                      >
                        {{ noti }}
                      </span>
                    </router-link>
                  </li>
                  <li>
                    <router-link
                      to="/change-password"
                      class="flex items-center space-x-1.5 px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white"
                      ><svg
                        class="h-4 w-4 text-black"
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
                          d="M7 10h3v-3l-3.5 -3.5a6 6 0 0 1 8 8l6 6a2 2 0 0 1 -3 3l-6-6a6 6 0 0 1 -8 -8l3.5 3.5"
                        />
                      </svg>
                      <span>Change password</span>
                    </router-link>
                  </li>
                </ul>
                <div class="py-2">
                  <div
                    @click="logOut"
                    class="cursor-pointer flex items-center space-x-1.5 px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white"
                  >
                    <svg
                      class="h-4 w-4 text-black"
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
                    <span>Sign out</span>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </nav>
    <nav class="bg-white dark:bg-gray-700 p-4 shadow-sm" id="navbar">
      <div class="container mx-auto">
        <div class="max-w-screen-xl">
          <div class="flex items-center">
            <router-link to="/" class="mr-24 hidden" id="logo">
              <img
                src="../assets/image/shop.webp"
                class="h-9 mr-1 sm:h-12"
                alt="Logo"
              />
            </router-link>
            <ul class="flex flex-row mt-0 space-x-3 text-sm font-medium">
              <li v-for="route in routes" :key="route.id">
                <router-link
                  :to="route.slug"
                  class="dark:text-white flex text-base items-center py-2 px-4"
                  :class="[
                    currentRouteName === route.name
                      ? 'bg-sky-500 text-white'
                      : 'text-gray-900',
                  ]"
                  aria-current="page"
                  ><svg
                    class="h-5 w-5 mr-1"
                    fill="none"
                    viewBox="0 0 24 24"
                    stroke="currentColor"
                  >
                    <path
                      stroke-linecap="round"
                      stroke-linejoin="round"
                      stroke-width="2"
                      :d="route.icon"
                    />
                  </svg>
                  <span class="first-letter:uppercase">{{
                    route.name
                  }}</span></router-link
                >
              </li>
            </ul>
          </div>
        </div>
      </div>
    </nav>
  </div>

  <!-- responsive -->
  <div class="bg-white w-full block md:hidden">
    <div class="container mx-auto justify-between flex">
      <div class="header-action header-action-start p-2 text-xs">
        <span class="flex justify-center items-center gap-2 text-gray-700"
          ><svg
            stroke="currentColor"
            fill="currentColor"
            stroke-width="0"
            viewBox="0 0 16 16"
            height="1em"
            width="1em"
            xmlns="http://www.w3.org/2000/svg"
          >
            <path
              d="M3.654 1.328a.678.678 0 0 0-1.015-.063L1.605 2.3c-.483.484-.661 1.169-.45 1.77a17.568 17.568 0 0 0 4.168 6.608 17.569 17.569 0 0 0 6.608 4.168c.601.211 1.286.033 1.77-.45l1.034-1.034a.678.678 0 0 0-.063-1.015l-2.307-1.794a.678.678 0 0 0-.58-.122l-2.19.547a1.745 1.745 0 0 1-1.657-.459L5.482 8.062a1.745 1.745 0 0 1-.46-1.657l.548-2.19a.678.678 0 0 0-.122-.58L3.654 1.328zM1.884.511a1.745 1.745 0 0 1 2.612.163L6.29 2.98c.329.423.445.974.315 1.494l-.547 2.19a.678.678 0 0 0 .178.643l2.457 2.457a.678.678 0 0 0 .644.178l2.189-.547a1.745 1.745 0 0 1 1.494.315l2.306 1.794c.829.645.905 1.87.163 2.611l-1.034 1.034c-.74.74-1.846 1.065-2.877.702a18.634 18.634 0 0 1-7.01-4.42 18.634 18.634 0 0 1-4.42-7.009c-.362-1.03-.037-2.137.703-2.877L1.885.511zm10.762.135a.5.5 0 0 1 .708 0l2.5 2.5a.5.5 0 0 1 0 .708l-2.5 2.5a.5.5 0 0 1-.708-.708L14.293 4H9.5a.5.5 0 0 1 0-1h4.793l-1.647-1.646a.5.5 0 0 1 0-.708z"
            ></path>
          </svg>
          <span class="font-semibold">Call: +855 66 260 605</span></span
        >
      </div>
      <div class="header-action header-action-end"></div>
    </div>
    <div class="flex justify-center container mx-auto p-2">
      <FormSearch class="w-[90%]" />
    </div>
    <nav class="bg-white dark:bg-gray-700 py-3 px-1 shadow-sm">
      <div class="container mx-auto">
        <div class="flex justify-between">
          <div class="flex items-center space-x-1">
            <button
              type="button"
              data-drawer-target="drawer-navigation"
              data-drawer-show="drawer-navigation"
              aria-controls="drawer-navigation"
              class="inline-flex items-center p-2 text-sm text-gray-500 rounded-sm hover:bg-gray-100"
              aria-expanded="false"
            >
              <span class="sr-only">Open main menu</span>
              <svg
                class="w-6 h-6"
                aria-hidden="true"
                fill="currentColor"
                viewBox="0 0 20 20"
                xmlns="http://www.w3.org/2000/svg"
              >
                <path
                  fill-rule="evenodd"
                  d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 15a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z"
                  clip-rule="evenodd"
                ></path>
              </svg>
            </button>
            <router-link to="/">
              <img
                src="../assets/image/shop.webp"
                class="h-9 mr-1 sm:h-12"
                alt="Logo"
              />
            </router-link>
          </div>
          <div class="flex items-center space-x-1.5">
            <router-link
              to="/wishlists"
              class="relative text-sm font-medium text-center bg-red-400 h-9 w-9 flex justify-center items-center rounded-full cursor-pointer"
              ><svg
                width="24"
                height="24"
                viewBox="0 0 24 24"
                fill="none"
                xmlns="http://www.w3.org/2000/svg"
              >
                <path
                  fill-rule="evenodd"
                  clip-rule="evenodd"
                  d="M11.9942 5.38646C10.0797 3.73702 7.24843 3.39949 5.04972 5.25154C2.67144 7.25487 2.32589 10.6288 4.20659 13.0146C4.92048 13.9202 6.31383 15.2808 7.65288 16.5268C9.00761 17.7875 10.3592 18.9787 11.0257 19.5606C11.0299 19.5643 11.0342 19.568 11.0385 19.5718C11.1011 19.6265 11.1792 19.6947 11.2539 19.7502C11.3434 19.8167 11.472 19.8992 11.6436 19.9497C11.8718 20.0168 12.1171 20.0168 12.3454 19.9497C12.517 19.8992 12.6456 19.8167 12.7351 19.7502C12.8099 19.6947 12.8878 19.6265 12.9505 19.5718C12.9549 19.568 12.9591 19.5643 12.9633 19.5606C13.6298 18.9787 14.9814 17.7875 16.3362 16.5268C17.6752 15.2808 19.0686 13.9202 19.7824 13.0146C21.6559 10.638 21.3637 7.23801 18.9308 5.24447C16.7076 3.4228 13.9065 3.7364 11.9942 5.38646Z"
                  fill="white"
                ></path>
              </svg>
              <div
                v-if="wishlist > 0"
                class="absolute inline-flex items-center justify-center w-4 h-4 text-[7px] text-white bg-red-500 border-2 border-white rounded-full -top-1 -right-1 dark:border-gray-900"
              >
                {{ wishlist }}
              </div>
            </router-link>
            <router-link
              to="/carts"
              class="relative text-sm font-medium text-center bg-gray-400 h-9 w-9 flex justify-center items-center rounded-full cursor-pointer"
              ><svg
                width="24"
                height="24"
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
              <div
                v-if="cart > 0"
                class="absolute inline-flex items-center justify-center w-4 h-4 text-[7px] text-white bg-red-500 border-2 border-white rounded-full -top-1 -right-1 dark:border-gray-900"
              >
                {{ cart }}
              </div>
            </router-link>

            <router-link
              v-if="!loggedIn"
              to="/sign-in"
              class="relative text-sm font-medium text-center bg-gray-400 h-9 w-9 flex justify-center items-center rounded-full cursor-pointer"
            >
              <svg
                width="24"
                height="24"
                viewBox="0 0 24 24"
                fill="none"
                xmlns="http://www.w3.org/2000/svg"
              >
                <path
                  fill-rule="evenodd"
                  clip-rule="evenodd"
                  d="M9.14333 14.1109C11.0479 14.1113 12.9525 14.1113 14.857 14.1109C15.5029 14.1107 15.9431 14.1106 16.3274 14.1784C18.1675 14.5029 19.6081 15.9435 19.9325 17.7835C20.0003 18.1679 20.0002 18.6079 20.0001 19.2539C20 19.3947 20.0044 19.5364 19.9798 19.6757C19.8825 20.2277 19.4502 20.6598 18.8982 20.7572C18.7773 20.7785 18.6497 20.7779 18.5862 20.7775C14.196 20.754 9.80435 20.754 5.41405 20.7775C5.35062 20.7779 5.22311 20.7785 5.10207 20.7572C4.55007 20.6598 4.11788 20.2277 4.02054 19.6757C3.99599 19.5364 4.00031 19.3947 4.00027 19.2539C4.00013 18.6079 4.00003 18.1679 4.06781 17.7835C4.39226 15.9435 5.83288 14.5029 7.6729 14.1784C8.05726 14.1106 8.4974 14.1107 9.14333 14.1109Z"
                  fill="white"
                ></path>
                <path
                  fill-rule="evenodd"
                  clip-rule="evenodd"
                  d="M7.11133 7.88882C7.11133 5.18879 9.30012 3 12.0002 3C14.7001 3 16.889 5.18879 16.889 7.88882C16.889 10.5889 14.7001 12.7776 12.0002 12.7776C9.30012 12.7776 7.11133 10.5889 7.11133 7.88882Z"
                  fill="white"
                ></path>
              </svg>
            </router-link>
            <div :class="loggedIn ? 'block' : 'hidden'">
              <div
                id="dropdownButton"
                data-dropdown-toggle="dropdown"
                class="relative text-sm font-medium text-center bg-gray-400 h-9 w-9 flex justify-center items-center rounded-full cursor-pointer"
              >
                <svg
                  width="24"
                  height="24"
                  viewBox="0 0 24 24"
                  fill="none"
                  xmlns="http://www.w3.org/2000/svg"
                >
                  <path
                    fill-rule="evenodd"
                    clip-rule="evenodd"
                    d="M9.14333 14.1109C11.0479 14.1113 12.9525 14.1113 14.857 14.1109C15.5029 14.1107 15.9431 14.1106 16.3274 14.1784C18.1675 14.5029 19.6081 15.9435 19.9325 17.7835C20.0003 18.1679 20.0002 18.6079 20.0001 19.2539C20 19.3947 20.0044 19.5364 19.9798 19.6757C19.8825 20.2277 19.4502 20.6598 18.8982 20.7572C18.7773 20.7785 18.6497 20.7779 18.5862 20.7775C14.196 20.754 9.80435 20.754 5.41405 20.7775C5.35062 20.7779 5.22311 20.7785 5.10207 20.7572C4.55007 20.6598 4.11788 20.2277 4.02054 19.6757C3.99599 19.5364 4.00031 19.3947 4.00027 19.2539C4.00013 18.6079 4.00003 18.1679 4.06781 17.7835C4.39226 15.9435 5.83288 14.5029 7.6729 14.1784C8.05726 14.1106 8.4974 14.1107 9.14333 14.1109Z"
                    fill="white"
                  ></path>
                  <path
                    fill-rule="evenodd"
                    clip-rule="evenodd"
                    d="M7.11133 7.88882C7.11133 5.18879 9.30012 3 12.0002 3C14.7001 3 16.889 5.18879 16.889 7.88882C16.889 10.5889 14.7001 12.7776 12.0002 12.7776C9.30012 12.7776 7.11133 10.5889 7.11133 7.88882Z"
                    fill="white"
                  ></path>
                </svg>
                <div
                  v-if="noti > 0"
                  class="absolute inline-flex items-center justify-center w-4 h-4 text-[7px] text-white bg-red-500 border-2 border-white rounded-full -top-1 -right-1 dark:border-gray-900"
                >
                  {{ noti }}
                </div>
              </div>
              <div
                id="dropdown"
                class="z-10 hidden bg-white divide-y divide-gray-100 rounded-sm shadow w-44 dark:bg-gray-700 dark:divide-gray-600"
              >
                <div class="px-4 py-3 text-sm text-gray-900 dark:text-white">
                  <div>{{ user.name }}</div>
                  <div class="font-medium truncate">{{ user.email }}</div>
                </div>
                <ul
                  class="py-2 text-sm text-gray-700 dark:text-gray-200"
                  aria-labelledby="dropdownButton"
                >
                  <li>
                    <router-link
                      to="/profiles"
                      class="flex items-center space-x-1.5 px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white"
                      ><svg
                        class="h-5 w-5 text-black"
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
                        <circle cx="12" cy="7" r="4" />
                        <path d="M6 21v-2a4 4 0 0 1 4 -4h4a4 4 0 0 1 4 4v2" />
                      </svg>
                      <span>Profile</span>
                    </router-link>
                  </li>
                  <li>
                    <router-link
                      to="/change-password"
                      class="flex items-center space-x-1.5 px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white"
                      ><svg
                        class="h-4 w-4 text-black"
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
                          d="M7 10h3v-3l-3.5 -3.5a6 6 0 0 1 8 8l6 6a2 2 0 0 1 -3 3l-6-6a6 6 0 0 1 -8 -8l3.5 3.5"
                        />
                      </svg>
                      <span>Change password</span>
                    </router-link>
                  </li>
                </ul>
                <div class="py-2">
                  <div
                    @click="logOut"
                    class="cursor-pointer flex items-center space-x-1.5 px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white"
                  >
                    <svg
                      class="h-4 w-4 text-black"
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
                    <span>Sign out</span>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </nav>
  </div>
  <div
    v-if="visible"
    @click="scrollToTop"
    class="group fixed bottom-[20px] right-[20px] md:bottom-[80px] md:right-[80px] bg-red-500 border border-red-500 text-white w-10 h-10 cursor-pointer rounded-full text-center hover:bg-red-500 z-[10]"
  >
    <div class="flex items-center justify-center mt-2">
      <svg
        stroke="currentColor"
        fill="currentColor"
        stroke-width="0"
        viewBox="0 0 16 16"
        class="h-5 w-5 flex text-white-500 group-hover:text-white"
        height="1em"
        width="1em"
        xmlns="http://www.w3.org/2000/svg"
      >
        <path
          fill-rule="evenodd"
          d="M7.646 4.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1-.708.708L8 5.707l-5.646 5.647a.5.5 0 0 1-.708-.708l6-6z"
        ></path>
      </svg>
    </div>
  </div>

  <!-- drawer component -->
  <div
    id="drawer-navigation"
    class="fixed top-0 left-0 z-40 h-screen p-4 overflow-y-auto transition-transform -translate-x-full bg-white w-80 dark:bg-gray-800"
    tabindex="-1"
    aria-labelledby="drawer-navigation-label"
  >
    <button
      type="button"
      data-drawer-hide="drawer-navigation"
      aria-controls="drawer-navigation"
      class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-sm text-sm p-1.5 absolute top-2.5 right-2.5 inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white"
    >
      <svg
        aria-hidden="true"
        class="w-5 h-5"
        fill="currentColor"
        viewBox="0 0 20 20"
        xmlns="http://www.w3.org/2000/svg"
      >
        <path
          fill-rule="evenodd"
          d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
          clip-rule="evenodd"
        ></path>
      </svg>
      <span class="sr-only">Close menu</span>
    </button>
    <div class="flex justify-center py-8">
      <div class="w-[50%]">
        <router-link
          to="/"
          type="button"
          data-drawer-hide="drawer-navigation"
          aria-controls="drawer-navigation"
        >
          <img src="../assets/image/shop.webp" class="w-full" alt="Logo" />
        </router-link>
      </div>
    </div>
    <div class="">
      <h5
        class="text-base font-semibold text-gray-500 uppercase dark:text-gray-400"
      >
        Menu
      </h5>
      <div class="py-4 overflow-y-auto">
        <ul class="space-y-2">
          <li v-for="route in routes" :key="route.id">
            <router-link
              type="button"
              data-drawer-hide="drawer-navigation"
              aria-controls="drawer-navigation"
              :to="route.slug"
              class="dark:text-white flex text-base items-center py-2 px-4"
              :class="[
                currentRouteName === route.name
                  ? 'bg-sky-500 text-white'
                  : 'text-gray-900',
              ]"
              aria-current="page"
              ><svg
                class="h-5 w-5 mr-1"
                fill="none"
                viewBox="0 0 24 24"
                stroke="currentColor"
              >
                <path
                  stroke-linecap="round"
                  stroke-linejoin="round"
                  stroke-width="2"
                  :d="route.icon"
                />
              </svg>
              <span class="first-letter:uppercase">{{
                route.name
              }}</span></router-link
            >
          </li>
        </ul>
      </div>
    </div>
  </div>
</template>

<script>
import FormSearch from "../components/FormSearch.vue";
import { initDropdowns } from "flowbite";
const routes = [
  {
    id: 1,
    name: "home",
    slug: "/",
    icon: "M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6",
  },
  {
    id: 2,
    name: "product",
    slug: "/products",
    icon: "M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2zM14 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z",
  },
  {
    id: 3,
    name: "contact",
    slug: "/contacts",
    icon: "M5 4h4l2 5l-2.5 1.5a11 11 0 0 0 5 5l1.5 -2.5l5 2v4a2 2 0 0 1 -2 2a16 16 0 0 1 -15 -15a2 2 0 0 1 2 -2",
  },
];

export default {
  components: {
    FormSearch,
  },
  data() {
    return {
      routes,
      visible: false,
    };
  },
  computed: {
    currentRouteName() {
      return this.$route.name;
    },
    user() {
      return this.$store.state.user;
    },
    noti() {
      return this.$store.state.noti;
    },
    loggedIn() {
      return this.$store.state.status.loggedIn;
    },
    cart() {
      return this.$store.state?.cart?.reduce((a, b) => {
        return a + b.qty;
      }, 0);
    },
    wishlist() {
      return this.$store.state.wishlist.length;
    },
  },

  methods: {
    scrollToTop: function () {
      window.scrollTo({
        top: 0,
        behavior: "smooth",
      });
    },
    logOut() {
      this.$store.dispatch("logout");
      this.$router.push("/login");
    },
  },

  mounted() {
    window.onscroll = function () {
      myFunction();
    };

    var navbar = document.getElementById("navbar");
    var logo = document.getElementById("logo");
    var sticky = navbar.offsetTop;

    function myFunction() {
      if (window.pageYOffset >= sticky) {
        navbar.classList.add("sticky");
        logo.classList.remove("hidden");
      } else {
        logo.classList.add("hidden");
        navbar.classList.remove("sticky");
      }
    }

    window.addEventListener("scroll", () => {
      const scrolled = document.documentElement.scrollTop;
      if (scrolled > 300) {
        this.visible = true;
      } else if (scrolled <= 300) {
        this.visible = false;
      }
    });
    return initDropdowns();
  },
};
</script>

<style>
#navbar {
  z-index: 9;
}

.sticky {
  position: fixed !important;
  top: 0 !important;
  width: 100% !important;
}

.sticky + .content {
  padding-top: 60px;
}
</style>
