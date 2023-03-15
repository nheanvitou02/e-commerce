<template>
  <div class="flex justify-center">
    <div class="text-center my-24 leading-8">
      <div class="flex justify-center items-center">
        <img src="../assets/image/empty_product.svg" alt="cart" class="w-32" />
      </div>
      <span
        class="text-gray-400 text-md flex items-center justify-center lg:text-2xl line-clamp-1"
      >
       {{ title }}</span
      >
    </div>
  </div>
</template>

<script>
export default {
  props: {
    title: String,
  },
};
</script>
