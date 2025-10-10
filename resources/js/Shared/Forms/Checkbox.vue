<script setup>
import { computed } from 'vue';

const props = defineProps({
  modelValue: {
    type: [Boolean, Array],
    default: false,
  },
  value: {
    type: [String, Number, Boolean],
    default: true,
  },
  extraClass: {
    type: [String, Array, Object],
    default: '',
  },
});

const emit = defineEmits(['update:modelValue']);

const proxyChecked = computed({
  get() {
    return props.modelValue;
  },
  set(val) {
    emit('update:modelValue', val);
  },
});
</script>

<template>
  <input type="checkbox" :value="value" v-model="proxyChecked" :class="['', extraClass]" />
</template>