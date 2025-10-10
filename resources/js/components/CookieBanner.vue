<script>
import PrimaryButton from '@/Shared/Buttons/PrimaryButton.vue';

export default {
  data() {
    return {
      cookiesAccepted: false,
      processing: false,
    };
  },
  components: {
    PrimaryButton
  },
  mounted() {
    // this.cookiesAccepted = this.$cookies.has('cookies_accepted');
  },
  // methods: {
  //   acceptCookies() {
  //     this.processing = true;
  //     this.$cookies.set('cookies_accepted', 'true', { expires: 365 });
  //     this.cookiesAccepted = true;
  //     this.processing = false;
  //   },
  // },
};
</script>

<template>
  <!-- <div>
    <slot />
    <div v-if="!cookiesAccepted" class="cookie-banner">
      <p>Usamos cookies estrictamente necesarias para que funcione este sistema.</p>
      <PrimaryButton @click="acceptCookies" :disabled="processing" :class="{ 'opacity-25': processing }">Aceptar</PrimaryButton>
    </div>
  </div> -->
</template>

<style>
.cookie-banner {
  position: fixed;
  bottom: 0;
  left: 0;
  right: 0;
  background: #000;
  color: #fff;
  padding: 1rem;
  display: flex;
  justify-content: space-between;
  align-items: center;
  z-index: 9999;
}

.cookie-banner button {
  background: #ffd700;
  border: none;
  padding: 0.5rem 1rem;
  cursor: pointer;
}

@media (max-width: 640px) {
  .cookie-banner {
    flex-direction: column;
    text-align: center;
    gap: 0.5rem;
  }
}
</style>