<script setup>
import LinkNavigate from '@/Shared/Buttons/LinkNavigate.vue';
import { Link, usePage } from '@inertiajs/vue3';
import icon from '@template/assets/img/icons/icon-wrc.png';
import { onMounted, onUnmounted, ref } from 'vue';

const isScrolled = ref(false);
const page = usePage();
const user = page.props.auth?.user;

const updateNavbar = () => {
  isScrolled.value = window.pageYOffset > 50;
};

const updateActiveNavigation = () => {
  const sections = document.querySelectorAll('section[id]');
  const navLinks = document.querySelectorAll('.wrc-nav-link');

  let current = '';
  sections.forEach(section => {
    const sectionTop = section.offsetTop;
    const sectionHeight = section.clientHeight;

    if (window.scrollY >= sectionTop - sectionHeight / 3) {
      current = section.getAttribute('id');
    }
  });

  navLinks.forEach(link => {
    link.classList.remove('active');
    if (link.getAttribute('href') === '#' + current) {
      link.classList.add('active');
    }
  });
};

onMounted(() => {
  updateNavbar();
  updateActiveNavigation();

  window.addEventListener('scroll', updateNavbar);
  window.addEventListener('scroll', updateActiveNavigation);
});

onUnmounted(() => {
  window.removeEventListener('scroll', updateNavbar);
  window.removeEventListener('scroll', updateActiveNavigation);
});
</script>

<template>
  <nav class="wrc-navbar" :class="{ scrolled: isScrolled }" id="navbar">
    <div class="wrc-container">
      <div class="d-flex justify-content-between align-items-center">
        <div class="d-flex align-items-center gap-3">
          <img :src="icon" alt="World Recycling Coin Logo" class="wrc-logo" />
          <span class="fw-bold fs-5 d-none d-md-block">
            <Link :href="route('welcome')" style="color: var(--wrc-gold-primary);">WRC</Link>
          </span>
        </div>

        <!-- Links -->
        <div class="d-none d-lg-flex gap-2">
          <a href="#inicio" class="wrc-nav-link active">Inicio</a>
          <a href="#caracteristicas" class="wrc-nav-link">Características</a>
          <a href="#gea-wrc" class="wrc-nav-link">GEA-WRC</a>
          <a href="#tokenomics" class="wrc-nav-link">Tokenomics</a>
        </div>

        <!-- Botones -->
        <div class="d-flex gap-3">
          <!-- <a href="#whitepaper" class="wrc-btn wrc-btn--secondary d-none d-md-inline-flex">
            <i class="fas fa-file-alt"></i>Documento técnico
          </a> -->
          <a v-if="user?.hashid" :href="route('panel.dashboard')" class="wrc-btn wrc-btn--primary">
            <i class="fas fa-rocket"></i> Dashboard
          </a>
          <Link v-else :href="route('sign-up')" class="wrc-btn wrc-btn--primary">
            <i class="fas fa-rocket"></i> Únete Ahora
          </Link>
        </div>
      </div>
    </div>
  </nav>
</template>