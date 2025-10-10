<script setup>
import GuestLayout from '@/Layouts/GuestLayout.vue';
import { Link } from '@inertiajs/vue3';
</script>

<template>
  <GuestLayout title="Cookies is required">
    <h2>DEBE ACEPTAR LAS COOKIES</h2>
    <Link :href="route('login')">Volver</Link>
  </GuestLayout>
</template>