<script setup>
import { onMounted, ref } from 'vue';

const particleContainer = ref(null);

const initParticles = () => {
  const container = particleContainer.value;
  if (!container) return

  const particleCount = 20;

  for (let i = 0; i < particleCount; i++) {
    const particle = document.createElement('div');
    particle.className = 'particle';
    particle.style.left = Math.random() * 100 + '%';
    particle.style.top = Math.random() * 100 + '%';
    particle.style.animationDelay = Math.random() * 6 + 's';
    particle.style.animationDuration = (Math.random() * 3 + 3) + 's';
    container.appendChild(particle);
  }
}

onMounted(() => {
  initParticles();
})

</script>

<template>
  <div class="particle-container" ref="particleContainer" id="particleContainer"></div>
</template>