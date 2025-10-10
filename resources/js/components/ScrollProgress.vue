<script setup>
import { onMounted, onUnmounted } from 'vue'

function updateScrollProgress() {
  const scrollTop = window.pageYOffset
  const docHeight = document.body.scrollHeight - window.innerHeight
  const scrollPercent = (scrollTop / docHeight) * 100
  const bar = document.getElementById('scrollProgress')
  if (bar) {
    bar.style.width = scrollPercent + '%'
  }
}

onMounted(() => {
  window.addEventListener('scroll', updateScrollProgress)
})

onUnmounted(() => {
  window.removeEventListener('scroll', updateScrollProgress)
})
</script>

<template>
  <div class="scroll-progress-container">
    <div id="scrollProgress" class="scroll-progress-bar"></div>
  </div>
  <slot />
</template>

<style scoped>
.scroll-progress-container {
  position: fixed;
  top: 0;
  left: 0;
  width: 100%;
  height: 1px;
  background: transparent;
  z-index: 9999;
}

.scroll-progress-bar {
  height: 100%;
  width: 0;
  background: #f1d600;
  transition: width 0.2s linear;
}
</style>