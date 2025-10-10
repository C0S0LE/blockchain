<script setup>
import { Head, usePage } from '@inertiajs/vue3';
import { useRTL } from '@/plugins/RTLPlugin';
import { onMounted, ref, watch } from 'vue';

import Aside from '@/components/Aside.vue';
import Navbar from '@/components/Navbar.vue';
import LoaderSystem from '@/components/Animations/LoaderSystem.vue';
import Footer from '@/components/Footer.vue';
import { route } from 'ziggy-js';

const { handleRTL } = useRTL();

const loading = ref(true);

const page = usePage();
const user = page.props.auth?.user;
// console.log("USER LAYOUT: ", user);
const showModal = ref(page.props.showWelcomeModal)

watch(
  () => page.props.showWelcomeModal,
  (val) => { showModal.value = val }
)

defineProps({
  title: {
    type: String,
    default: "Welcome to App",
    required: true,
  },
  breadcrumbs: {
    type: Array,
    default: () => [],
  },
});

onMounted(() => handleRTL());

const closeModal = () => {
  router.post(route('user.disableWelcome'))
  showModal.value = false
}
</script>

<template>
  <Head><title>{{ title }}</title></Head>

  <LoaderSystem v-if="loading" @loaded="loading = false" />

  <div v-if="showModal" class="fixed inset-0 bg-black bg-opacity-70 flex items-center justify-center z-50">
    <div class="bg-white p-6 rounded">
      <h2>🎉 Bienvenido {{ user.name }}!</h2>
      <p>¡Gracias por unirte! 🚀</p>
      <button @click="closeModal">Cerrar</button>
    </div>
  </div>

  <main class="main" id="top">
    <Aside />
    <Navbar />

    <div class="content">
      <div class="row g-4">
        <slot />
      </div>

      <Footer />
    </div>
  </main>
</template>