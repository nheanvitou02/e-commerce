<template>
  <div class="container mx-auto">
    <Carousel :settings="settings" :breakpoints="breakpoints">
      <Slide v-for="item in data" :key="item.id">
        <router-link :to="'/products?brand=' + item.id">
          <div
            class="rounded-sm flex items-center justify-center bg-white dark:bg-slate-300 shadow-sm mr-2"
          >
            <img
              :alt="item.name"
              :src="item.image"
              class="h-20 object-contain w-full mix-blend-multiply"
            />
          </div>
        </router-link>
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
  props: {
    data: Array,
  },
  components: {
    Carousel,
    Slide,
    Navigation,
  },
  data() {
    return {
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
    };
  },
});
</script>
<style>
.carousel__slide {
  display: block;
}

.carousel__prev,
.carousel__next {
  background-color: #ccc !important;
  border-radius: 50%;
}

.VueCarousel-slide {
  margin: 0 0.5%;
}
</style>
