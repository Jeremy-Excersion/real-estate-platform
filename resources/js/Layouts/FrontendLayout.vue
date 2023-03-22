<script setup>
import FrontendNavigation from '@/Layouts/Partials/FrontendNavigation.vue'

</script>

<template>
  <div class="isolate bg-white dark:bg-slate-900 text-black dark:text-gray-200">
    <FrontendNavigation></FrontendNavigation>
    <slot />
  </div>
</template>