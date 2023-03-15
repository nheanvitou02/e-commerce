<template>
  <div  class="container mx-auto">
    <div
      class="grid grid-cols-2 gap-2 sm:grid-cols-3 md:grid-cols-5 lg:grid-cols-6 xl:grid-col-6"
    >
      <div v-for="item in data" :key="item.id">
        <router-link :to="'/products?brand=' + item.id">
          <div
            class="rounded-sm flex items-center justify-center bg-white dark:bg-slate-300 shadow-sm"
          >
            <img
              :alt="item.name"
              :src="item.image"
              class="h-20 object-contain w-full mix-blend-multiply"
            />
          </div>
        </router-link>
      </div>
    </div>
  </div>
</template>

<script>
import { defineComponent } from "vue";

export default defineComponent({
  props: {
    data: Array,
  },
});
</script>
