<script setup>
import { Head, Link } from "@inertiajs/vue3";
import { onMounted, ref } from "vue";

import CookieBanner from "@/components/CookieBanner.vue";
import FooterGuest from "@/components/FooterGuest.vue";
import NavbarGuest from "@/components/NavbarGuest.vue";
import ScrollProgress from "@/components/ScrollProgress.vue";

defineProps({
  title: {
    type: String,
    default: "Welcome to App",
    required: true,
  },
});

const network = ref(null)
const createNeuralNetwork = () => {
  if (!network.value) return
  const nodeCount = 50

  for (let i = 0; i < nodeCount; i++) {
    const node = document.createElement('div')
    node.className = 'neural-node'
    node.style.left = Math.random() * 100 + '%'
    node.style.top = Math.random() * 100 + '%'
    node.style.animationDelay = Math.random() * 2 + 's'
    network.value.appendChild(node)

    if (i % 5 === 0) {
      const connection = document.createElement('div')
      connection.className = 'neural-connection'
      connection.style.left = Math.random() * 100 + '%'
      connection.style.top = Math.random() * 100 + '%'
      connection.style.width = Math.random() * 200 + 100 + 'px'
      connection.style.transform = `rotate(${Math.random() * 360}deg)`
      connection.style.animationDelay = Math.random() * 3 + 's'
      network.value.appendChild(connection)
    }
  }
}

onMounted(() => {
  createNeuralNetwork();
})
</script>

<template>
  <Head><title>{{ title }}</title></Head>
  <CookieBanner />

  <div class="quantum-bg"></div>
  <div class="neural-network" id="neuralNetwork"></div>

  <ScrollProgress />
  <NavbarGuest />

  <div class="guest-layout">
    <slot />
  </div>

  <FooterGuest />

</template>

<style lang="scss">
:root {
  --wrc-gold-primary: #FFD700;
  --wrc-gold-light: #FFF4A3;
  --wrc-gold-dark: #B8860B;
  --wrc-gold-glow: rgba(255, 215, 0, 0.4);
  --wrc-dark-primary: #0A0A0A;
  --wrc-dark-secondary: #1A1A1A;
  --wrc-dark-tertiary: #2A2A2A;
  --wrc-white: #FFFFFF;
  --wrc-gray-light: #F8F9FA;
  --wrc-gray-medium: #6C757D;
  --wrc-success: #10B981;
  --wrc-danger: #EF4444;
  --bs-secondary-color: #FFFFFF;

  /* Spacing System - Precisión Milimétrica */
  --space-xs: 0.25rem;
  /* 4px */
  --space-sm: 0.5rem;
  /* 8px */
  --space-md: 0.75rem;
  /* 12px */
  --space-lg: 1rem;
  /* 16px */
  --space-xl: 1.5rem;
  /* 24px */
  --space-2xl: 2rem;
  /* 32px */
  --space-3xl: 3rem;
  /* 48px */
  --space-4xl: 4rem;
  /* 64px */
  --space-5xl: 6rem;
  /* 96px */
  --space-6xl: 8rem;
  /* 128px */

  /* Typography Scale */
  --font-primary: 'Inter', -apple-system, BlinkMacSystemFont, sans-serif;
  --font-display: 'Space Grotesk', -apple-system, BlinkMacSystemFont, sans-serif;

  /* Shadows & Effects */
  --shadow-sm: 0 1px 2px 0 rgba(0, 0, 0, 0.05);
  --shadow-md: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06);
  --shadow-lg: 0 10px 15px -3px rgba(0, 0, 0, 0.1), 0 4px 6px -2px rgba(0, 0, 0, 0.05);
  --shadow-xl: 0 20px 25px -5px rgba(0, 0, 0, 0.1), 0 10px 10px -5px rgba(0, 0, 0, 0.04);
  --shadow-gold: 0 0 30px var(--wrc-gold-glow);

  /* Animations */
  --transition-fast: 0.15s cubic-bezier(0.4, 0, 0.2, 1);
  --transition-normal: 0.3s cubic-bezier(0.4, 0, 0.2, 1);
  --transition-slow: 0.5s cubic-bezier(0.4, 0, 0.2, 1);
}

* {
  margin: 0;
  padding: 0;
  box-sizing: border-box;
}

html {
  font-size: 16px;
  scroll-behavior: smooth;
}

body {
  line-height: 1.6;
  overflow-x: hidden;
  position: relative;
  color: var(--wrc-white);
  font-family: var(--font-primary);
  background: var(--wrc-dark-primary);

  .guest-layout {
    margin-top: 5.5rem;
  }

  @media (max-width: 576px) {
    text-align: center;

    .guest-layout {
      margin-top: 0;
      padding-top: 0;
      text-align: center;

      .wrc-section {
        &.wrc-section--hero {
          padding-top: 2rem;
        }

        &#caracteristicas {

          .wrc-container {
            .wrc-features {
              .wrc-feature {
                display: flex;
                flex-direction: column;
                align-items: center;
                padding: var(--space-lg) !important;
              }
            }
          }
        }

        &#gea-wrc {}

        &#tokenomics {}

        &#wrc-section {}

      }
    }
  }
}

a {
  text-decoration: none;
}

a:hover {
  text-decoration: none !important;
}

/* Semantic Structure */
.wrc-container {
  width: 100%;
  margin: 0 auto;
  max-width: 1600px;
  padding-inline: var(--space-xl);
}

.wrc-section {
  position: relative;
  padding-block: var(--space-5xl);
}

.wrc-section--hero {
  display: flex;
  margin-top: 0rem;
  min-height: 100vh;
  align-items: center;
  // padding-block: var(--space-6xl);
}

/* Revolutionary Background Effects */
.quantum-bg {
  position: fixed;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  z-index: -1;
  background:
    radial-gradient(circle at 20% 80%, rgba(255, 215, 0, 0.1) 0%, transparent 50%),
    radial-gradient(circle at 80% 20%, rgba(255, 215, 0, 0.08) 0%, transparent 50%),
    radial-gradient(circle at 40% 40%, rgba(255, 215, 0, 0.05) 0%, transparent 50%),
    linear-gradient(135deg, var(--wrc-dark-primary) 0%, var(--wrc-dark-secondary) 100%);
}

.neural-network {
  position: absolute;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  opacity: 0.3;
  z-index: -1;
}

.neural-node {
  position: absolute;
  width: 2px;
  height: 2px;
  background: var(--wrc-gold-primary);
  border-radius: 50%;
  animation: pulse 2s infinite ease-in-out;
}

.neural-connection {
  position: absolute;
  height: 1px;
  background: linear-gradient(90deg, transparent, var(--wrc-gold-primary), transparent);
  animation: flow 3s infinite linear;
}

/* Revolutionary Typography */
.wrc-heading-hero {
  font-family: var(--font-display);
  font-size: 5rem;
  font-weight: 800;
  line-height: 0.9;
  letter-spacing: -0.02em;
  background: linear-gradient(135deg, var(--wrc-gold-primary) 0%, var(--wrc-gold-light) 50%, var(--wrc-gold-primary) 100%);
  background-clip: text;
  -webkit-background-clip: text;
  -webkit-text-fill-color: transparent;
  text-shadow: 0 0 30px var(--wrc-gold-glow);
  margin-bottom: var(--space-xl);
  position: relative;
}

.wrc-heading-hero::before {
  content: '';
  position: absolute;
  top: -10px;
  left: -10px;
  right: -10px;
  bottom: -10px;
  background: linear-gradient(45deg, var(--wrc-gold-glow), transparent, var(--wrc-gold-glow));
  z-index: -1;
  filter: blur(50px);
  animation: glow-pulse 2s infinite ease-in-out;
}

.wrc-text-lead {
  font-size: clamp(1.125rem, 2.5vw, 1.5rem);
  font-weight: 400;
  color: rgba(255, 255, 255, 0.9);
  margin-bottom: var(--space-2xl);
  max-width: 600px;
}

/* Revolutionary Buttons */
.wrc-btn {
  display: inline-flex;
  align-items: center;
  justify-content: center;
  gap: var(--space-sm);
  padding: var(--space-sm) var(--space-2xl);
  font-family: var(--font-display);
  font-weight: 600;
  font-size: 1rem;
  text-decoration: none;
  border: none;
  border-radius: 12px;
  cursor: pointer;
  transition: all var(--transition-normal);
  position: relative;
  overflow: hidden;
  text-transform: uppercase;
  letter-spacing: 0.5px;
}

.wrc-btn--primary {
  background: linear-gradient(135deg, var(--wrc-gold-primary) 0%, var(--wrc-gold-dark) 100%);
  color: var(--wrc-dark-primary);
  box-shadow: var(--shadow-gold);
}

.wrc-btn--primary::before {
  content: '';
  position: absolute;
  top: 0;
  left: -100%;
  width: 100%;
  height: 100%;
  background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.3), transparent);
  transition: left var(--transition-slow);
}

.wrc-btn--primary:hover::before {
  left: 100%;
}

.wrc-btn--primary:hover {
  transform: translateY(-2px);
  box-shadow: 0 10px 40px var(--wrc-gold-glow);
}

.wrc-btn--secondary {
  background: rgba(255, 255, 255, 0.1);
  color: var(--wrc-white);
  border: 2px solid rgba(255, 215, 0, 0.3);
  backdrop-filter: blur(10px);
}

.wrc-btn--secondary:hover {
  background: rgba(255, 215, 0, 0.1);
  border-color: var(--wrc-gold-primary);
  transform: translateY(-2px);
}

/* Revolutionary Cards */
.wrc-card {
  background: rgba(255, 255, 255, 0.05);
  border: 1px solid rgba(255, 215, 0, 0.2);
  border-radius: 20px;
  padding: var(--space-2xl);
  backdrop-filter: blur(20px);
  position: relative;
  /* overflow: hidden; */
	display: flex;
	flex-direction: column;
	justify-content: center;
	align-items: center;
  transition: all var(--transition-normal);
}

.wrc-card::before {
  content: '';
  position: absolute;
  top: 0;
  left: 0;
  right: 0;
  height: 1px;
  background: linear-gradient(90deg, transparent, var(--wrc-gold-primary), transparent);
  opacity: 0;
  transition: opacity var(--transition-normal);
}

.wrc-card:hover::before {
  opacity: 1;
}

.wrc-card:hover {
  transform: translateY(-8px);
  border-color: var(--wrc-gold-primary);
  box-shadow: 0 20px 40px rgba(255, 215, 0, 0.2);
}

/* Revolutionary Navigation */
.wrc-navbar {
  position: fixed;
  top: 0;
  left: 0;
  right: 0;
  z-index: 1000;
  background: rgba(10, 10, 10, 0.9);
  backdrop-filter: blur(20px);
  border-bottom: 1px solid rgba(255, 215, 0, 0.1);
  padding-block: var(--space-lg);
  transition: all var(--transition-normal);
}

.wrc-navbar.scrolled {
  background: rgba(10, 10, 10, 0.95);
  border-bottom-color: rgba(255, 215, 0, 0.3);
}

.wrc-logo {
  height: 50px;
  width: auto;
  filter: drop-shadow(0 0 10px var(--wrc-gold-glow));
}

.wrc-nav-link {
  color: rgba(255, 255, 255, 0.8);
  text-decoration: none;
  font-weight: 500;
  padding: var(--space-sm) var(--space-lg);
  border-radius: 8px;
  transition: all var(--transition-fast);
  position: relative;
}

.wrc-nav-link::after {
  content: '';
  position: absolute;
  bottom: 0;
  left: 50%;
  width: 0;
  height: 2px;
  background: var(--wrc-gold-primary);
  transition: all var(--transition-normal);
  transform: translateX(-50%);
}

.wrc-nav-link:hover::after,
.wrc-nav-link.active::after {
  width: 80%;
}

.wrc-nav-link:hover,
.wrc-nav-link.active {
  color: var(--wrc-gold-primary);
}

/* Revolutionary Sections */
.wrc-stats {
  display: grid;
  grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
  gap: var(--space-2xl);
  margin-block: var(--space-4xl);
}

.wrc-stat {
  text-align: center;
  padding: var(--space-xl);
  background: rgba(255, 255, 255, 0.03);
  border-radius: 16px;
  border: 1px solid rgba(255, 215, 0, 0.1);
  transition: all var(--transition-normal);
}

.wrc-stat:hover {
  background: rgba(255, 215, 0, 0.05);
  border-color: rgba(255, 215, 0, 0.3);
  transform: translateY(-4px);
}

.wrc-stat-number {
  font-family: var(--font-display);
  font-size: 3rem;
  font-weight: 800;
  color: var(--wrc-gold-primary);
  display: block;
  margin-bottom: var(--space-sm);
}

.wrc-stat-label {
  font-size: 0.875rem;
  color: rgba(255, 255, 255, 0.7);
  text-transform: uppercase;
  letter-spacing: 1px;
}

/* Revolutionary Features Grid */
.wrc-features {
  display: grid;
  grid-template-columns: repeat(auto-fit, minmax(450px, 1fr));
  gap: var(--space-2xl);
  margin-block: var(--space-4xl);
}

.wrc-feature {
  position: relative;
  padding: var(--space-2xl);
  background: rgba(255, 255, 255, 0.03);
  border: 1px solid rgba(255, 215, 0, 0.1);
  border-radius: 20px;
  overflow: hidden;
  transition: all var(--transition-normal);
}

.wrc-feature::before {
  content: '';
  position: absolute;
  top: -50%;
  left: -50%;
  width: 200%;
  height: 200%;
  background: conic-gradient(from 0deg, transparent, rgba(255, 215, 0, 0.1), transparent);
  animation: rotate 10s linear infinite;
  opacity: 0;
  transition: opacity var(--transition-normal);
}

.wrc-feature:hover::before {
  opacity: 1;
}

.wrc-feature:hover {
  transform: translateY(-8px);
  border-color: rgba(255, 215, 0, 0.3);
}

.wrc-feature-icon {
  width: 60px;
  height: 60px;
  background: linear-gradient(135deg, var(--wrc-gold-primary), var(--wrc-gold-light));
  border-radius: 16px;
  display: flex;
  align-items: center;
  justify-content: center;
  margin-bottom: var(--space-xl);
  position: relative;
  z-index: 1;
}

.wrc-feature-icon i {
  font-size: 1.5rem;
  color: var(--wrc-dark-primary);
}

.wrc-feature-title {
  font-family: var(--font-display);
  font-size: 1.25rem;
  font-weight: 700;
  color: var(--wrc-white);
  margin-bottom: var(--space-md);
  position: relative;
  z-index: 1;
}

.wrc-feature-description {
  color: rgba(255, 255, 255, 0.8);
  line-height: 1.6;
  position: relative;
  z-index: 1;
}

/* Revolutionary CTA Section */
.wrc-cta {
  background: linear-gradient(135deg, rgba(255, 215, 0, 0.1) 0%, rgba(255, 215, 0, 0.05) 100%);
  border: 2px solid rgba(255, 215, 0, 0.2);
  border-radius: 24px;
  padding: var(--space-4xl);
  text-align: center;
  position: relative;
  overflow: hidden;
}

.wrc-cta::before {
  content: '';
  position: absolute;
  top: -2px;
  left: -2px;
  right: -2px;
  bottom: -2px;
  /* background: linear-gradient(45deg, var(--wrc-gold-primary), transparent, var(--wrc-gold-primary)); */
  background: linear-gradient(45deg, #ffd70057, transparent, #ffd7004f);
  z-index: -1;
  border-radius: 24px;
  animation: border-glow 3s infinite ease-in-out;
}

/* Revolutionary Footer */
.wrc-footer {
  background: var(--wrc-dark-secondary);
  border-top: 1px solid rgba(255, 215, 0, 0.1);
  padding-block: var(--space-4xl);
  padding-bottom: 2rem;
}

.wrc-footer-grid {
  display: grid;
  grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
  gap: var(--space-2xl);
  margin-bottom: var(--space-2xl);
}

.wrc-footer-section h4 {
  font-family: var(--font-display);
  font-weight: 700;
  color: var(--wrc-gold-primary);
  margin-bottom: var(--space-lg);
}

.wrc-footer-link {
  color: rgba(255, 255, 255, 0.7);
  text-decoration: none;
  display: block;
  padding: var(--space-xs) 0;
  transition: color var(--transition-fast);
}

.wrc-footer-link:hover {
  color: var(--wrc-gold-primary);
}

/* Revolutionary Animations */
@keyframes pulse {

  0%,
  100% {
    opacity: 0.3;
    transform: scale(1);
  }

  50% {
    opacity: 1;
    transform: scale(1.2);
  }
}

@keyframes flow {
  0% {
    opacity: 0;
    transform: translateX(-100%);
  }

  50% {
    opacity: 1;
  }

  100% {
    opacity: 0;
    transform: translateX(100%);
  }
}

@keyframes glow-pulse {

  0%,
  100% {
    opacity: 0.5;
  }

  50% {
    opacity: 1;
  }
}

@keyframes rotate {
  from {
    transform: rotate(0deg);
  }

  to {
    transform: rotate(360deg);
  }
}

@keyframes border-glow {

  0%,
  100% {
    opacity: 0.5;
  }

  50% {
    opacity: 1;
  }
}

@keyframes float {

  0%,
  100% {
    transform: translateY(0px);
  }

  50% {
    transform: translateY(-20px);
  }
}

/* Revolutionary Responsive Design */
@media (max-width: 768px) {
  .wrc-heading-hero {
    text-align: center;
    width: 100%;
    font-size: 4rem;
  }

  .wrc-container {
    padding-inline: var(--space-lg);
  }

  .wrc-section {
    padding-block: var(--space-3xl);
  }

  .wrc-section--hero {
    padding-block: var(--space-4xl);
    min-height: 80vh;
    margin-top: 6rem;
  }

  .wrc-features {
    grid-template-columns: 1fr;
    gap: var(--space-xl);
  }

  .wrc-stats {
    grid-template-columns: repeat(2, 1fr);
    gap: var(--space-lg);
  }

  .wrc-cta {
    padding: var(--space-2xl);
  }
}

@media (max-width: 480px) {
  .wrc-heading-hero {
    font-size: 3rem;
  }

  .wrc-stats {
    grid-template-columns: 1fr;
  }

  .wrc-btn {
    width: 100%;
    justify-content: center;
  }
}

/* Revolutionary Scroll Indicator */
.scroll-indicator {
  position: fixed;
  top: 0;
  left: 0;
  width: 100%;
  height: 3px;
  background: rgba(255, 215, 0, 0.2);
  z-index: 9999;
}

.scroll-progress {
  height: 100%;
  background: linear-gradient(90deg, var(--wrc-gold-primary), var(--wrc-gold-light));
  width: 0%;
  transition: width 0.1s ease;
}

/* Revolutionary Particle System */
.particle {
  position: absolute;
  width: 4px;
  height: 4px;
  background: var(--wrc-gold-primary);
  border-radius: 50%;
  pointer-events: none;
  animation: float 6s infinite ease-in-out;
}

.particle:nth-child(odd) {
  animation-delay: -2s;
}

.particle:nth-child(even) {
  animation-delay: -4s;
}
</style>