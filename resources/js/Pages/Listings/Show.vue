<script setup>
import FrontendLayout from '@/Layouts/FrontendLayout.vue';
import Swiper from '@/Components/Swiper.vue';

const props = defineProps({
  listing: Object
});

</script>

<template>
  <FrontendLayout>
    <div class="mx-auto max-w-7xl">
      <Swiper :photos="listing.photos"></Swiper>
      <h1 class="text-2xl font-bold">{{ listing.street_address }}<br><span class="font-medium text-base">{{ listing.city }}, {{ listing.state }} {{ listing.zip_code }}</span></h1>

      <!-- add heading that says "About this property" with an hr below -->
      <div class="flex justify-between">
        <div class="flex">
          <p class="text-lg font-medium">${{ listing.listing_price }}</p>
        </div>
        <div class="flex">
          <p class="text-lg font-medium pl-2">{{ listing.bedrooms }} Beds</p>
        </div>
        <div class="flex">
          <p class="text-lg font-medium pl-2">{{ listing.bathrooms }} Baths</p>
        </div>
        <div class="flex">
          <p class="text-lg font-medium pl-2">{{ listing.square_footage }} Sq Ft</p>
        </div>
      </div>
      <hr class="border-gray-300 my-4">
      <h2 class="text-xl font-bold pt-4">About this property</h2>
      <p class="text-base font-medium">{{ listing.description }}</p>
      <!-- button back to listings -->
      <div class="flex pt-4">
        <a href="/listings"
          class="bg-indigo-400 bg-opacity-40 border border-indigo-400 px-5 py-3 text-xl leading-7 text-white drop-shadow hover:bg-indigo-400 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-400 hover:scale-110 transition-all duration-300 cursor-pointer hover:text-indigo-100">
          Back to Listings
        </a>

      </div>
    </div>
  </FrontendLayout>
</template>