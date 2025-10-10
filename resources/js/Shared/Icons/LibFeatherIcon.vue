<script setup>
import { computed } from 'vue';
import feather from 'feather-icons';

const props = defineProps({
  name: { type: String, required: true },
  size: { type: Number, default: 19 },
  color: { type: String, default: 'currentColor' },
  extraClass: { type: [String, Array, Object], default: '' }
});

const icon = computed(() => {
  return feather.icons[props.name].toSvg({
    width: props.size,
    height: props.size,
    stroke: props.color,
    class: `me-2 text-body align-bottom ${props.extraClass}`
  });
});
</script>

<template>
  <div class="d-flex align-items-center">
    <span v-html="icon"></span>
    <slot />
  </div>
</template>