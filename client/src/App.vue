<script setup>
import { RouterView } from "vue-router";
import HeaderLayout from "./layouts/HeaderLayout.vue";
import FooterFooter from "./layouts/FooterLayout.vue";
</script>

<template>
  <HeaderLayout></HeaderLayout>
  <div class="bg-gray-100">
    <RouterView />
  </div>
  <FooterFooter></FooterFooter>
</template>
