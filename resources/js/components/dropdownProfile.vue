<script setup>
import { computed } from 'vue'
import { route } from 'ziggy-js';
import { Link, useForm, usePage } from '@inertiajs/vue3'

import LibFeatherIcon from '@/Shared/Icons/LibFeatherIcon.vue'
import PrimaryButton from '@/Shared/Buttons/PrimaryButton.vue';
import LinkNavigate from '@/Shared/Buttons/LinkNavigate.vue';

// Acceso directo a props globales de Inertia
const page = usePage();
const user = page.props.auth?.user ?? null;
// console.log(user.avatar_url);

// Nombre completo
const fullName = computed(() => `${user?.name ?? ''} ${user?.lastName ?? ''}`.trim())

// URL del avatar - Ruta directa en public
// const avatarURL = computed(() => {
//   if (!user?.avatar) return null
//   return `/assets/img/pic/${user.avatar}`
// })

const currentUri = computed(() => page.url.replace(/^\/+/, ''))
const isActive = (uris) => {
  const uriArray = Array.isArray(uris) ? uris : [uris];
  return uriArray.some(uri => {
    if (uri.includes('/') === false) {
      return currentUri.value.includes(uri);
    }
    return currentUri.value === uri || currentUri.value.startsWith(uri + '/');
  });
}

// Formulario para logout
const form = useForm({})
const logout = () => {
  form.post(route('logout'), {
    // onFinish: () => console.log('Sesión cerrada'),
    // onSuccess: () => console.log('Logout exitoso'),
    onError: (e) => console.error(e)
  })
}
</script>

<template>
  <a class="nav-link lh-1 pe-0" id="navbarDropdownUser" href="javascript:void(0)" role="button" data-bs-toggle="dropdown" data-bs-auto-close="outside" aria-haspopup="true" aria-expanded="false">
    <div class="avatar avatar-l">
      <img class="rounded-circle" :src="user.avatar_url" />
    </div>
  </a>

  <div class="dropdown-menu dropdown-menu-end navbar-dropdown-caret py-0 dropdown-profile shadow border" aria-labelledby="navbarDropdownUser">
    <div class="card position-relative border-0">
      <div class="card-body p-0">
        <div class="d-flex align-items-center gap-3 pt-3 px-3 pb-4">
          <div class="avatar avatar-xl">
            <img class="rounded-circle" :src="user.avatar_url" />
          </div>
          <div class="box-info d-flex flex-column">
            <h6 class="mt-2 text-body-emphasis">{{ fullName }}</h6>
            <h6 class="mt-2 text-body-emphasis">{{ user.email }}</h6>
          </div>
        </div>
        <div class="mb-3 mx-3">
          <input class="form-control form-control-sm" id="statusUpdateInput" type="text" placeholder="Update your status" />
        </div>
      </div>
      <div class="overflow-auto scrollbar" style="height: 10rem;">
        <ul class="nav d-flex flex-column mb-2 pb-1 gap-1">
          <li class="nav-item">
            <LinkNavigate
              v-if="user?.hashid"
              :href="route('profile.show')"
              :class="['nav-link px-3 d-flex', { 'active': isActive(['wrc/profile/me']) }]">
              <LibFeatherIcon name="user" :size="18" />
              <span class="mt-1">Profile</span>
            </LinkNavigate>
          </li>
          <li class="nav-item" v-if="!route().current('panel.dashboard')">
            <LinkNavigate :href="route('panel.dashboard')" class="nav-link px-3 d-flex">
              <LibFeatherIcon name="pie-chart" :size="18" />
              <span class="mt-1">Dashboard</span>
            </LinkNavigate>
          </li>
          <li class="nav-item">
            <LinkNavigate class="nav-link px-3 d-flex" href="#!">
              <LibFeatherIcon name="lock" :size="18" />
              <span class="mt-1">Posts &amp; Activity</span>
            </LinkNavigate>
          </li>
          <li class="nav-item">
            <LinkNavigate class="nav-link px-3 d-flex" href="#!">
              <LibFeatherIcon name="settings" :size="18" />
              <span class="mt-1">Settings &amp; Privacy</span>
            </LinkNavigate>
          </li>
          <li class="nav-item">
            <LinkNavigate class="nav-link px-3 d-flex" href="#!">
              <LibFeatherIcon name="help-circle" :size="18" />
              <span class="mt-1">Help Center</span>
            </LinkNavigate>
          </li>
          <li class="nav-item">
            <LinkNavigate class="nav-link px-3 d-flex" href="#!">
              <LibFeatherIcon name="globe" :size="18" />
              <span class="mt-1">Language</span>
            </LinkNavigate>
          </li>
        </ul>
      </div>
      <div class="card-footer p-0 border-top border-translucent">
        <div class="px-3 mt-2">
          <PrimaryButton @click="logout" class="wbtn btn-phoenix-secondary d-flex flex-center w-100">
            <LibFeatherIcon name="log-out" :size="17" />
            Sign out
          </PrimaryButton>
        </div>
        <div class="my-2 text-center fw-bold fs-10 text-body-quaternary">
          <Link :href="route('legal.policy')" class="text-body-quaternary me-1">Privacy policy</Link> &bull;
          <Link :href="route('legal.terms')" class="text-body-quaternary mx-1">Terms</Link> &bull;
          <Link :href="route('legal.terms-of-use')" class="text-body-quaternary mx-1">Terms of use</Link> &bull;
          <Link :href="route('legal.cookies')" class="text-body-quaternary ms-1">Cookies</Link>
        </div>
      </div>
    </div>
  </div>
</template>