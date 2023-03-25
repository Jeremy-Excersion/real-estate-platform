<template>
  <form v-if="filters" class="mt-6 flex space-x-4 px-2 mx-auto w-full" action="#">
    <div class="min-w-0 flex-1">
      <label for="search" class="sr-only">Search</label>
      <div class="relative rounded-md shadow-sm">
        <div class="price-groups flex flex-wrap gap-4">
          <div class="relative">
            <div class="pointer-events-none absolute inset-y-0 left-0 flex items-center pl-3">
              <CurrencyDollarIcon class="h-5 w-5 text-gray-200 text-md" aria-hidden="true" />
            </div>
            <input ref="params.min_listing_price" autocomplete="off" type="number" v-model="params.min_listing_price"
              name="min_listing_price" id="min_listing_price"
              class="flex w-50 rounded-md border-gray-700 bg-gray-600 text-gray-200 pl-10 hover:border-indigo-500 focus:ring-indigo-500 sm:text-md"
              placeholder="Enter min price" />
          </div>

          <div class="relative">
            <div class="pointer-events-none absolute inset-y-0 left-0 flex items-center pl-3">
              <CurrencyDollarIcon class="h-5 w-5 text-gray-200 text-md" aria-hidden="true" />
            </div>
            <input ref="params.max_listing_price" autocomplete="off" type="number" v-model="params.max_listing_price"
              name="max_listing_price" id="max_listing_price"
              class="flex w-50 rounded-md border-gray-700 bg-gray-600 text-gray-200 pl-10 hover:border-indigo-500 focus:ring-indigo-500 sm:text-md"
              placeholder="Enter max price" />
          </div>

          <div class="relative">
            <div class="pointer-events-none absolute inset-y-0 left-0 flex items-center pl-3">
              <span class="material-icons">square_foot</span>
            </div>
            <input ref="params.min_square_footage" autocomplete="off" type="number" v-model="params.min_square_footage"
              name="min_square_footage" id="min_square_footage"
              class="flex w-50 rounded-md border-gray-700 bg-gray-600 text-gray-200 pl-10 hover:border-indigo-500 focus:ring-indigo-500 sm:text-md"
              placeholder="Enter min sqft" />
          </div>

          <div class="relative">
            <div class="pointer-events-none absolute inset-y-0 left-0 flex items-center pl-3">
              <span class="material-icons">square_foot</span>
            </div>
            <input ref="params.max_square_footage" autocomplete="off" type="number" v-model="params.max_square_footage"
              name="max_square_footage" id="max_square_footage"
              class="flex w-50 rounded-md border-gray-700 bg-gray-600 text-gray-200 pl-10 hover:border-indigo-500 focus:ring-indigo-500 sm:text-md"
              placeholder="Enter max sqft" />
          </div>

          <div class="relative">
            <div class="pointer-events-none absolute inset-y-0 left-0 flex items-center pl-3">
              <span class="material-icons">bed</span>
            </div>
            <input ref="params.min_bedrooms" autocomplete="off" type="number" v-model="params.min_bedrooms"
              name="min_bedrooms" id="min_bedrooms"
              class="flex w-50 rounded-md border-gray-700 bg-gray-600 text-gray-200 pl-10 hover:border-indigo-500 focus:ring-indigo-500 sm:text-md"
              placeholder="Beds" />
          </div>

          <div class="relative">
            <div class="pointer-events-none absolute inset-y-0 left-0 flex items-center pl-3">
              <span class="material-icons">shower</span>
            </div>
            <input ref="params.min_bathrooms" autocomplete="off" type="number" v-model="params.min_bathrooms"
              name="min_bathrooms" id="min_bathrooms"
              class="flex w-50 rounded-md border-gray-700 bg-gray-600 text-gray-200 pl-10 hover:border-indigo-500 focus:ring-indigo-500 sm:text-md"
              placeholder="Baths" />
          </div>
        </div>
      </div>
    </div>
  </form>
  <div class="mt-4 space-x-4 px-2 mx-auto w-full inline-flex justify-between align-middle">
    <AdvancedSearch :filters="filters" :params="params" :listings="listings" />
    <p v-if="listings.data.length === 0" class="text-center text-gray-500">No listings found.</p>
    <p v-else class="text-center text-gray-500">Found {{ listings.total }} listings.</p>
  </div>
  <div class="mx-auto mt-16 grid max-w-2xl grid-cols-1 gap-y-20 gap-x-8 lg:mx-0 lg:max-w-none lg:grid-cols-3">
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
              Updated at: <time :datetime="listing.updated_at" class="text-gray-500">{{ formatDate(listing.updated_at)
              }}</time></p>
          </div>
        </div>
      </div>
    </article>
  </div>
</template>

<script setup>

import { CurrencyDollarIcon } from '@heroicons/vue/20/solid'
import { reactive, ref, onMounted, watch } from 'vue'
import { debounce } from "lodash";
import AdvancedSearch from './AdvancedSearch.vue';

const props = defineProps({
  listings: Object,
  filters: Object,
});

// make listings reactive
const listings = ref(props.listings);

const params = reactive({
  min_listing_price: props.filters ? props.filters.min_listing_price : null,
  max_listing_price: props.filters ? props.filters.max_listing_price : null,
  min_bedrooms: props.filters ? props.filters.min_bedrooms : null,
  min_bathrooms: props.filters ? props.filters.min_bathrooms : null,
  min_square_footage: props.filters ? props.filters.min_square_footage : null,
  max_square_footage: props.filters ? props.filters.max_square_footage : null,
});

// watch for max price filters changes
watch(params, (newValue, oldValue) => {
  axios.get('/listings', { params: params }).then(response => {
    listings.value = response.data;
  })
});

// mounted watch window scroll events
onMounted(() => {
  window.addEventListener('scroll', handleDebouncedScroll);
});

// debounce scroll event
const handleDebouncedScroll = debounce(handleScroll, 100);

// when 200px from bottom of page, load next page with debounce
function handleScroll(event) {
  if (listings.value.per_page <= 3) {
    return;
  }
  let pixelsFromBottom = document.body.offsetHeight - (window.innerHeight + window.pageYOffset);
  if (pixelsFromBottom < 200) {
    if (listings.value.next_page_url == null) {
      return;
    }
    axios.get(listings.value.next_page_url, { params: params }).then(response => {
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
