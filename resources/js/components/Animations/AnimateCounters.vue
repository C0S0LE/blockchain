<script setup>
import { onMounted, onUnmounted } from 'vue'

let observer = null

const animateCounter = (el) => {
  const target = parseInt(el.getAttribute('data-count'))
  const duration = 2000
  const step = target / (duration / 16)
  let current = 0

  const timer = setInterval(() => {
    current += step
    if (current >= target) {
      current = target
      clearInterval(timer)
    }

    if (target >= 1000000) {
      el.textContent = (current / 1000000).toFixed(1) + 'M'
    } else if (target >= 1000) {
      el.textContent = (current / 1000).toFixed(1) + 'K'
    } else {
      el.textContent = Math.floor(current)
    }
  }, 16)
}

const initIntersectionObserver = () => {
  observer = new IntersectionObserver((entries) => {
    entries.forEach(entry => {
      if (entry.isIntersecting) {
        entry.target.style.opacity = '1'
        entry.target.style.transform = 'translateY(0)'

        const counter = entry.target.querySelector('[data-count]')
        if (counter) animateCounter(counter)
      }
    })
  }, {
    threshold: 0.1,
    rootMargin: '0px 0px -50px 0px'
  })

  document.querySelectorAll('.wrc-card, .wrc-feature, .wrc-stat').forEach(el => {
    el.style.opacity = '0'
    el.style.transform = 'translateY(30px)'
    el.style.transition = 'all 0.6s cubic-bezier(0.4, 0, 0.2, 1)'
    observer.observe(el)
  })
}

onMounted(() => {
  initIntersectionObserver()
})

onUnmounted(() => {
  if (observer) observer.disconnect()
})
</script>

<template>
  <div class="wrc-stats">
    <div class="wrc-stat">
      <span class="wrc-stat-number" data-count="1000000">0</span>
      <span class="wrc-stat-label">Tokens Minados</span>
    </div>
    <div class="wrc-stat">
      <span class="wrc-stat-number" data-count="2500000">0</span>
      <span class="wrc-stat-label">Kg Reciclados</span>
    </div>
    <div class="wrc-stat">
      <span class="wrc-stat-number" data-count="2500">0</span>
      <span class="wrc-stat-label">Usuarios Activos</span>
    </div>
  </div>
</template>