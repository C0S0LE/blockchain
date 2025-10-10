<script setup>
  defineProps({
    message: String,
  });
</script>

<template>
  <div v-show="message">
    <p class="text-sm text-danger"> {{ message }} </p>
  </div>
</template>

<style lang="scss" scoped>
  p {font-size: 12px;}
</style>