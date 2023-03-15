<template>
  <div class="grid gap-2 grid-cols-1 md:grid-cols-2 lg:grid-cols-3">
    <div v-for="item in data" :key="item.id" class="relative">
      <router-link :to="{ name: 'detail-order', params: { id: item.invoice } }">
        <div class="w-full shadow-md rounded-sm p-6">
          <div
            v-if="item.substatus == 'receive'"
            class="absolute inline-flex items-center justify-center w-4 h-4 text-[7px] text-white bg-red-500 border-2 border-white rounded-full -top-2 -right-2 dark:border-gray-900"
          ></div>
          <table class="text-left w-full">
            <tbody>
              <tr>
                <td class="w-36 text-xs sm:text-base">No. invoice</td>
                <td>:</td>
                <td class="p-1 text-xs sm:text-base break-all">
                  {{ item.invoice }}
                </td>
              </tr>
              <tr>
                <td class="w-36 text-xs sm:text-base">Name</td>
                <td>:</td>
                <td class="p-1 text-xs sm:text-base break-all">
                  {{ item.name }}
                </td>
              </tr>
              <tr>
                <td class="w-36 text-xs sm:text-base">Phone</td>
                <td>:</td>
                <td class="p-1 text-xs sm:text-base break-all">
                  0{{ item.phone }}
                </td>
              </tr>
              <tr>
                <td class="w-36 text-xs sm:text-base">Service</td>
                <td>:</td>
                <td class="p-1 text-xs sm:text-base break-all">
                  {{ item.service }}
                </td>
              </tr>
              <tr>
                <td class="w-36 text-xs sm:text-base">Grand Total</td>
                <td>:</td>
                <td class="p-1 text-xs sm:text-base break-all text-red-500">
                  {{
                    vueNumberFormat(item.grand_total, {
                      prefix: "$",
                      decimal: ".",
                    })
                  }}
                </td>
              </tr>
              <tr>
                <td class="w-36 text-xs sm:text-base">Status</td>
                <td>:</td>
                <td
                  class="p-1 text-xs sm:text-base break-all"
                  :class="
                    item.status == 'success'
                      ? 'text-blue-800'
                      : 'text-yellow-800'
                  "
                >
                  {{ item.status }}
                </td>
              </tr>
            </tbody>
          </table>
        </div>
      </router-link>
    </div>
  </div>
</template>

<script>

export default {
  props: {
    data: Array,
  },
};
</script>
