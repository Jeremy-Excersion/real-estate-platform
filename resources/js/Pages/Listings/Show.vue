<script setup>
import FrontendLayout from '@/Layouts/FrontendLayout.vue';

const props = defineProps({
  listing: Object
});

</script>

<template>
  <FrontendLayout>
    <div class="mx-auto max-w-7xl">
      House Details {{ props.listing }}
    </div>
  </FrontendLayout>
</template>