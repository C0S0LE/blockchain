<script setup>
/**
 * @typedef {Object} ButtonProps
 * @property {'button'|'submit'|'reset'} [type=button] - Tipo de botón HTML
 * @property {boolean} [disabled=false] - Si el botón está deshabilitado
 * @property {boolean} [loading=false] - Muestra un spinner de carga
 * @property {string} [loadingText='Sending'] - Texto durante el estado de carga
 */

/** @type {ButtonProps} */
const props = defineProps({
  type: { type: String, default: 'button' },
  disabled: { type: Boolean, default: false },
  loading: { type: Boolean, default: false },
  loadingText: { type: String, default: 'Sending' },
});
</script>

<template>
  <button
    :type="type"
    :class="{ 'disabled': disabled || loading }"
    :disabled="disabled || loading"
    class="btn btn-warning"
  >
    <span v-if="loading" class="d-flex align-items-center">
      <span class="spinner-border spinner-border-sm me-2" role="status" aria-hidden="true"></span>
      <span class="loading-text">{{ loadingText }}<span class="dots">...</span></span>
    </span>
    <span v-else>
      <slot />
    </span>
  </button>
</template>

<style scoped>
  .dots {
    display: inline-block;
    width: 1.2em;
    text-align: left;
    animation: blink-dots 1s steps(3, end) infinite;
  }

  @keyframes blink-dots {
    0%, 20% { content: ''; }
    40% { content: '.'; }
    60% { content: '..'; }
    80%, 100% { content: '...'; }
  }
</style>
