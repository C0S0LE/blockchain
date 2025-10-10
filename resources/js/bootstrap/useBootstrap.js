import { onMounted, onUnmounted } from 'vue'
import { Modal, Offcanvas } from 'bootstrap'

export function useBootstrap() {
  let modals = []
  let offcanvases = []

  const initModals = () => {
    document.querySelectorAll('[data-bs-toggle="modal"]').forEach(trigger => {
      const target = trigger.dataset.bsTarget
      const modalElement = document.querySelector(target)
      if (modalElement && !modalElement._modal) {
        const modal = new Modal(modalElement)
        modalElement._modal = modal
        modals.push(modal)
      }
    })
  }

  const initOffcanvases = () => {
    document.querySelectorAll('[data-bs-toggle="offcanvas"]').forEach(trigger => {
      const target = trigger.dataset.bsTarget
      const offcanvasElement = document.querySelector(target)
      if (offcanvasElement && !offcanvasElement._offcanvas) {
        const offcanvas = new Offcanvas(offcanvasElement)
        offcanvasElement._offcanvas = offcanvas
        offcanvases.push(offcanvas)
      }
    })
  }

  const initAll = () => {
    initModals()
    initOffcanvases()
  }

  const disposeAll = () => {
    modals.forEach(modal => modal.dispose())
    offcanvases.forEach(offcanvas => offcanvas.dispose())
    modals = []
    offcanvases = []
  }

  onMounted(() => {
    initAll()

    const observer = new MutationObserver(initAll)
    observer.observe(document.body, {
      childList: true,
      subtree: true
    })
  })

  onUnmounted(() => {
    disposeAll()
  })

  return {
    initModals,
    initOffcanvases,
    initAll,
    disposeAll
  }
}