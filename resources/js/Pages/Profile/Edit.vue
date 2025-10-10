<script setup>
import AppLayout from '@/Layouts/AppLayout.vue';
import { usePage } from '@inertiajs/vue3';

const page = usePage();
const user = page.props.auth?.user ?? null;
</script>

<template>
  <AppLayout title="May activos">
    <h2>{{ user.name }}</h2>
  </AppLayout>
</template>

<style scoped lang="scss">

</style>