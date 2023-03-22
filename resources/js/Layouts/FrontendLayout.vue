<script setup>
import FrontendNavigation from '@/Layouts/Partials/FrontendNavigation.vue'

</script>

<template>
  <FrontendNavigation></FrontendNavigation>
  <div class="container mx-auto max-w-7xl px-4 sm:px-6 lg:px-8 pt-2 sm:pt-4 lg:pt-6">
    <slot />
  </div>
</template>