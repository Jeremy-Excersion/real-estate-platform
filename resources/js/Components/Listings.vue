<template>
  <div
    class="mx-auto mt-16 grid max-w-2xl grid-cols-1 gap-y-20 gap-x-8 lg:mx-0 lg:max-w-none lg:grid-cols-3"
  >
    <article v-for="listing in listings.data" :key="listing.id"
      class="flex flex-col items-start justify-between px-4 sm:px-2 lg:px-0 hover:scale-105 transition-all duration-300 cursor-pointer"
      @click="showListing(listing.id)">
      <div class="relative w-full">
        <img :src="listing.photos[0].photo_url" alt=""
          class="aspect-[16/9] w-full rounded-2xl bg-gray-100 object-cover sm:aspect-[2/1] lg:aspect-[3/2]" />
        <div class="absolute inset-0 rounded-2xl ring-1 ring-inset ring-gray-900/10" />
      </div>
      <div class="mt-4 flex items-center gap-x-4 text-xs">
        <span class="relative z-10 rounded-full bg-gray-50 py-1.5 px-3 font-medium text-gray-600 hover:bg-gray-100">
          {{ listing.property_subtype }}
        </span>
        <div class="flex items-center gap-x-4 justify-between">
          <div class="inline-flex items-center">
            <span class="material-icons">bed</span>
            <span class="text-gray-900 dark:text-gray-200"> {{ listing.bedrooms }} bd</span>
          </div>
          <div class="inline-flex items-center">
            <span class="material-icons">shower</span>
            <span class="text-gray-900 dark:text-gray-200"> {{ listing.bathrooms }} ba</span>
          </div>
          <div class="inline-flex items-center">
            <span class="material-icons">square_foot</span>
            <span class="text-gray-900 dark:text-gray-200"> {{ numberWithCommas(listing.square_footage) }} sqft</span>
          </div>
        </div>
      </div>
      <div class="max-w-xl">
        <div class="group relative">
          <h3
            class="mt-3 text-lg font-semibold leading-6 text-gray-900 dark:text-gray-200 group-hover:text-gray-600 dark:group-hover:text-gray-300">
            <span class="absolute inset-0" />
            {{ listing.address }}
          </h3>
          <p class="mt-1 text-sm text-gray-500 dark:text-gray-300">${{ numberWithCommas(listing.listing_price) }}</p>
          <p class="mt-5 text-sm leading-6 text-gray-700 dark:text-gray-300 line-clamp-3">{{ listing.description }}</p>
        </div>
        <div class="relative mt-4 flex items-center gap-x-4">
          <div class="text-sm leading-6">
            <p class="text-gray-600">Listed by {{ listing.listing_office_name }}<br>
            Updated at: <time :datetime="listing.updated_at" class="text-gray-500">{{ formatDate(listing.updated_at) }}</time></p>
          </div>
        </div>
      </div>
    </article>
  </div>
</template>

<script setup>
import { ref, onMounted } from 'vue'
import { debounce } from "lodash";

const props = defineProps({
  listings: Object,
});

// make listings reactive
const listings = ref(props.listings);

// mounted watch window scroll events
onMounted(() => {
  window.addEventListener('scroll', handleDebouncedScroll);
});

// debounce scroll event
const handleDebouncedScroll = debounce(handleScroll, 100);

// when 200px from bottom of page, load next page with debounce
function handleScroll(event) {
  let pixelsFromBottom = document.body.offsetHeight - (window.innerHeight + window.pageYOffset);
  if (pixelsFromBottom < 200) {
    axios.get(listings.value.next_page_url).then(response => {
      listings.value = {
        ...response.data,
        data: [...listings.value.data, ...response.data.data]
      }
    })
  }
}

function showListing(id) {
  window.location.href = '/listings/' + id;
}

// format datetime at readable date
function formatDate(date) {
  const options = { year: 'numeric', month: 'long', day: 'numeric' };
  return new Date(date).toLocaleDateString(undefined, options);
}

// method to make numbers readable with commas
function numberWithCommas(x) {
  return x.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
}

</script>