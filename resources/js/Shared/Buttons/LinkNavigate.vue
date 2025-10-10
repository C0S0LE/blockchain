<script setup>
import { router } from '@inertiajs/vue3'

const props = defineProps({
  href: { type: String, required: false },
  active: { type: Boolean, default: false },
  disabled: { type: Boolean, default: false },
  loading: { type: Boolean, default: false },
  extraClass: { type: [String, Array, Object], default: '' }
});

const handleClick = () => {
  if (props.disabled || props.loading || props.active) return;
  if (!props.href || props.href.startsWith('javascript:') || props.href === '#') return;
  if (window.location.pathname === new URL(props.href, window.location.origin).pathname) return;

  router.visit(props.href);
};

</script>

<template>
  <div
    type="button"
    :disabled="disabled || loading"
    :class="['nav-link', { active, disabled: disabled || loading }, extraClass]"
    @click="handleClick">

    <span v-if="loading" class="d-flex align-items-center">
      <span class="spinner-border spinner-border-sm me-2" role="status" aria-hidden="true"></span>
    </span>

    <span class="d-flex align-items-center" v-else>
      <slot />
    </span>
  </div>
</template>

<style lang="scss" scoped>
button.disabled {
  cursor: no-drop;
}

.spinner-border-sm {
  width: 15px !important;
  height: 15px !important;
}

.dots::after {
  content: '';
  animation: blink-dots 1s steps(3, end) infinite;
}

@keyframes blink-dots {
  0%, 20% { content: ''; }
  40% { content: '.'; }
  60% { content: '..'; }
  80%, 100% { content: '...'; }
}
</style>