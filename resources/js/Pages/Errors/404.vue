<script setup>
import GuestLayout from '@/Layouts/GuestLayout.vue';
import { Link } from '@inertiajs/vue3';
import { route } from 'ziggy-js';

import illustrationLight from '@template/assets/img/spot-illustrations/404-illustration.png';
import illustrationDark from '@template/assets/img/spot-illustrations/dark_404-illustration.png';
import img404Light from '@template/assets/img/spot-illustrations/404.png';
import img404Dark from '@template/assets/img/spot-illustrations/dark_404.png';

</script>

<template>
  <!-- <GuestLayout title="404 Not Found"> -->
    <div class="px-3">
      <div class="row min-vh-100 flex-center p-5">
        <div class="col-12 col-xl-10 col-xxl-8">
          <div class="row justify-content-center align-items-center g-5">
            <div class="col-12 col-lg-6 text-center order-lg-1">
              <img class="img-fluid w-lg-100 d-dark-none" :src="illustrationLight" alt="" width="400" />
              <img class="img-fluid w-md-50 w-lg-100 d-light-none" :src="illustrationDark" alt="" width="540" /></div>
            <div class="col-12 col-lg-6 text-center text-lg-start">
              <img class="img-fluid mb-6 w-50 w-lg-75 d-dark-none" :src="img404Light" alt="" />
              <img class="img-fluid mb-6 w-50 w-lg-75 d-light-none" :src="img404Dark" alt="" />
              <h2 class="text-body-secondary fw-bolder mb-3">Page Missing!</h2>
              <p class="text-body mb-5">But no worries! Our ostrich is looking everywhere <br class="d-none d-sm-block" />while you wait safely. </p>
              <Link :href="route('welcome')" class="btn btn-lg btn-primary">Go Home</Link>
            </div>
          </div>
        </div>
      </div>
    </div>
  <!-- </GuestLayout> -->
</template>