<script setup>
import { ref } from 'vue';
import { useAttrs } from 'vue';

const button = ref(null);
const attrs = useAttrs();
</script>

<template>
  <button ref="button" type="button" class="btn" :class="{ 'disabled opacity-50': attrs.disabled }" v-bind="attrs">
    <slot />
  </button>
</template>