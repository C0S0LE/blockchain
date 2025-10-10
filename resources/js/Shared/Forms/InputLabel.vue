<script setup>
  const props = defineProps({
    value: {
      type: String,
    },
    extraClass: {
      type: [String, Array, Object],
      default: ''
    }
  });
</script>

<template>
  <label :class="['form-label', props.extraClass]">
    <span v-if="value">{{ value }}</span>
    <span v-else> <slot/> </span>
  </label>
</template>