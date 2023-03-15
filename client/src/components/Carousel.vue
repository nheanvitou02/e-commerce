<template>
  <div class="mb-4">
    <Carousel :autoplay="3000" :wrap-around="true">
      <Slide v-for="item in data" :key="item.id">
        <div
          class="bg-cover bg-center sm:h-[170px] md:h-[270px] lg:h-[370px] xl:h-[470px] w-100 py-24 px-10 object-fill"
          :style="{ 'background-image': 'url(' + item.image + ')' }"
        ></div>
      </Slide>

      <template #addons>
        <Navigation />
      </template>
    </Carousel>
  </div>
</template>

<script>
import { defineComponent } from "vue";
import { Carousel, Navigation, Slide } from "vue3-carousel";

import "vue3-carousel/dist/carousel.css";

export default defineComponent({
  name: "Basic",
  components: {
    Carousel,
    Slide,
    Navigation,
  },
  props: {
    data: Array,
  },
});
</script>
