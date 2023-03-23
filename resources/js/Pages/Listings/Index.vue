<script setup>
import FrontendLayout from '@/Layouts/FrontendLayout.vue';
import Listings from '@/Components/Listings.vue';

const props = defineProps({
  listings: Object
});
</script>

<template>
  <FrontendLayout>
    <div class="mx-auto max-w-7xl">
      <Listings :listings="props.listings"/>
    </div>
  </FrontendLayout>
</template>