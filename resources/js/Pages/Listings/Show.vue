<script setup>
import FrontendLayout from '@/Layouts/FrontendLayout.vue';

const props = defineProps({
  listing: Object
});

</script>

<template>
  <FrontendLayout>
    <div class="mx-auto max-w-7xl">
      <p>House Details {{ props.listing }}</p>

      <!-- button back to listings -->
      <div class="flex pt-4">
        <a href="/listings"
          class="bg-indigo-400 bg-opacity-40 border border-indigo-400 px-5 py-3 text-3xl leading-7 text-white drop-shadow hover:bg-indigo-400 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-400 hover:scale-110 transition-all duration-300 cursor-pointer hover:text-indigo-100">
          Back to Listings
        </a>

      </div>
    </div>
  </FrontendLayout>
</template>