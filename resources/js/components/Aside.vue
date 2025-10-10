<script setup>
import { usePage } from '@inertiajs/vue3';
import { route } from 'ziggy-js';
import { computed } from 'vue';
import LinkNavigate from '@/Shared/Buttons/LinkNavigate.vue';
import LibFeatherIcon from '@/Shared/Icons/LibFeatherIcon.vue';

const page = usePage();
const currentUri = computed(() => page.url.replace(/^\/+/, ''))

const isActive = (uris) => {
  const uriArray = Array.isArray(uris) ? uris : [uris];
  // console.log('Current URI:', currentUri.value);
  // console.log('Checking against:', uriArray);
  const result = uriArray.some(uri => currentUri.value === uri || currentUri.value.startsWith(uri + '/'));
  // console.log('Result:', result);
  return result;
}
</script>

<template>
  <aside class="navbar navbar-vertical navbar-expand-lg">
    <div class="collapse navbar-collapse" id="navbarVerticalCollapse">
      <div class="navbar-vertical-content">
        <ul class="navbar-nav flex-column h-100" id="navbarVerticalNav">
          <li class="nav-item">
            <div class="nav-item-wrapper mb-3">
              <a class="nav-link dropdown-indicator label-1" href="#nv-home" role="button" data-bs-toggle="collapse" aria-expanded="true" aria-controls="nv-home">
                <div class="d-flex align-items-center">
                  <div class="dropdown-indicator-icon-wrapper">
                    <svg class="svg-inline--fa fa-caret-right dropdown-indicator-icon" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="caret-right" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 256 512" data-fa-i2svg="">
                      <path fill="currentColor" d="M246.6 278.6c12.5-12.5 12.5-32.8 0-45.3l-128-128c-9.2-9.2-22.9-11.9-34.9-6.9s-19.8 16.6-19.8 29.6l0 256c0 12.9 7.8 24.6 19.8 29.6s25.7 2.2 34.9-6.9l128-128z"> </path>
                    </svg>
                  </div>
                  <LibFeatherIcon name="pie-chart" :size="18" />
                  <span class="nav-link-text ps-0">Panel</span>
                </div>
              </a>
              <div class="parent-wrapper label-1 mt-2">
                <ul :class="['nav parent collapse', { 'show': isActive(['wrc/dashboard', 'wrc/analytics']) }]" data-bs-parent="#navbarVerticalCollapse" id="nv-home">
                  <li class="nav-item d-flex flex-column gap-1">
                    <LinkNavigate :class="['nav-link', { 'active': isActive(['wrc/dashboard']) }]" :href="route('panel.dashboard')">
                      <div class="d-flex align-items-center">
                        <span class="nav-link-text">Dashboard</span>
                      </div>
                    </LinkNavigate>
                    <LinkNavigate :class="['nav-link', { 'active': isActive(['wrc/analytics']) }]" :href="route('panel.analytics')">
                      <div class="d-flex align-items-center">
                        <span class="nav-link-text">Analytics</span>
                      </div>
                    </LinkNavigate>
                  </li>
                </ul>
              </div>
            </div>
          </li>

          <li class="nav-item">
            <div class="nav-item-wrapper">
              <a class="nav-link dropdown-indicator label-1" href="#nv-wallets" role="button" data-bs-toggle="collapse" aria-expanded="true" aria-controls="nv-wallets">
                <div class="d-flex align-items-center">
                  <div class="dropdown-indicator-icon-wrapper">
                    <svg class="svg-inline--fa fa-caret-right dropdown-indicator-icon" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="caret-right" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 256 512" data-fa-i2svg="">
                      <path fill="currentColor" d="M246.6 278.6c12.5-12.5 12.5-32.8 0-45.3l-128-128c-9.2-9.2-22.9-11.9-34.9-6.9s-19.8 16.6-19.8 29.6l0 256c0 12.9 7.8 24.6 19.8 29.6s25.7 2.2 34.9-6.9l128-128z"> </path>
                    </svg>
                  </div>
                  <span class="nav-link-icon">
                    <LibFeatherIcon name="credit-card" :size="18" />
                  </span>
                  <span class="nav-link-text ps-0">Wallets</span>
                </div>
              </a>
              <div class="parent-wrapper label-1 mt-2">
                <ul :class="['nav parent collapse', { 'show': isActive(['wrc/wallet']) }]" data-bs-parent="#navbarVerticalCollapse2" id="nv-wallets">
                  <li class="collapsed-nav-item-title d-none">Wallets</li>
                  <li class="nav-item">
                    <LinkNavigate :class="['nav-link', { 'active': isActive(['wrc/wallet/details']) }]" :href="route('wallet.details')">
                      <div class="d-flex align-items-center">
                        <span class="nav-link-text">Mi billetera</span>
                      </div>
                    </LinkNavigate>
                  </li>
                </ul>
              </div>
            </div>
          </li>

          <li class="nav-item mt-auto">
            <p class="navbar-vertical-label">Settings</p>
            <hr class="navbar-vertical-line">

            <div class="nav-item-wrapper">
              <LinkNavigate class="nav-link label-1" href="asd" :disabled="true">
                <LibFeatherIcon name="message-square" :size="18">System</LibFeatherIcon>
              </LinkNavigate>
            </div>
          </li>
        </ul>
      </div>
    </div>
    <div class="navbar-vertical-footer">
      <button class="btn navbar-vertical-toggle border-0 fw-semibold w-100 white-space-nowrap d-flex align-items-center">
        <span class="uil uil-left-arrow-to-left fs-8"></span>
        <span class="uil uil-arrow-from-right fs-8"></span>
        <span class="navbar-vertical-footer-text ms-2">Collapsed View</span>
      </button>
    </div>
  </aside>
</template>