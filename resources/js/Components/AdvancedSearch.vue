<template>
  <div>
    <button @click="customSearch" class="w-full rounded-md border border-transparent bg-indigo-600 py-3 px-4 
                text-base font-medium text-white shadow-sm hover:bg-indigo-700 focus:outline-none 
                focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 focus:ring-offset-gray-50">Custom Search
    </button>

    <Modal :show="advancedSearchModal" @close="closeModal">
      <div class="p-6">
        <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
          Custom search
        </h2>

        <form v-if="filters" class="mt-6 flex space-x-4 mx-auto w-full text" action="#">
          <div class="min-w-0 flex-1">
            <label for="search" class="sr-only">Search</label>
            <div class="relative rounded-md shadow-sm">
              <div class="price-groups flex flex-wrap gap-4">
                <div class="relative">
                  <div class="pointer-events-none absolute inset-y-0 left-0 flex items-center pl-3">
                    <CurrencyDollarIcon class="h-5 w-5 text-gray-700 dark:text-gray-200 text-md" aria-hidden="true" />
                  </div>
                  <input ref="params.min_listing_price" autocomplete="off" type="number"
                    v-model="params.min_listing_price" name="min_listing_price" id="min_listing_price"
                    class="flex w-50 rounded-md border-gray-700 bg-gray-100 dark:bg-gray-700 text-gray-700 dark:text-gray-200 pl-10 hover:border-indigo-500 focus:ring-indigo-500 sm:text-md"
                    placeholder="Min price" />
                </div>

                <div class="relative">
                  <div class="pointer-events-none absolute inset-y-0 left-0 flex items-center pl-3">
                    <CurrencyDollarIcon class="h-5 w-5 text-gray-700 dark:text-gray-200 text-md" aria-hidden="true" />
                  </div>
                  <input ref="params.max_listing_price" autocomplete="off" type="number"
                    v-model="params.max_listing_price" name="max_listing_price" id="max_listing_price"
                    class="flex w-50 rounded-md border-gray-700 bg-gray-100 dark:bg-gray-700 text-gray-700 dark:text-gray-200 pl-10 hover:border-indigo-500 focus:ring-indigo-500 sm:text-md"
                    placeholder="Max price" />
                </div>

                <div class="relative">
                  <div class="pointer-events-none absolute inset-y-0 left-0 flex items-center pl-3">
                    <span class="material-icons text-gray-700 dark:text-gray-200">square_foot</span>
                  </div>
                  <input ref="params.min_square_footage" autocomplete="off" type="number"
                    v-model="params.min_square_footage" name="min_square_footage" id="min_square_footage"
                    class="flex w-50 rounded-md border-gray-700 bg-gray-100 dark:bg-gray-700 text-gray-700 dark:text-gray-200 pl-10 hover:border-indigo-500 focus:ring-indigo-500 sm:text-md"
                    placeholder="Min sqft" />
                </div>

                <div class="relative">
                  <div class="pointer-events-none absolute inset-y-0 left-0 flex items-center pl-3">
                    <span class="material-icons text-gray-700 dark:text-gray-200">square_foot</span>
                  </div>
                  <input ref="params.max_square_footage" autocomplete="off" type="number"
                    v-model="params.max_square_footage" name="max_square_footage" id="max_square_footage"
                    class="flex w-50 rounded-md border-gray-700 bg-gray-100 dark:bg-gray-700 text-gray-700 dark:text-gray-200 pl-10 hover:border-indigo-500 focus:ring-indigo-500 sm:text-md"
                    placeholder="Max sqft" />
                </div>

                <div class="relative">
                  <div class="pointer-events-none absolute inset-y-0 left-0 flex items-center pl-3">
                    <span class="material-icons text-gray-700 dark:text-gray-200">bed</span>
                  </div>
                  <input ref="params.min_bedrooms" autocomplete="off" type="number" v-model="params.min_bedrooms"
                    name="min_bedrooms" id="min_bedrooms"
                    class="flex w-50 rounded-md border-gray-700 bg-gray-100 dark:bg-gray-700 text-gray-700 dark:text-gray-200 pl-10 hover:border-indigo-500 focus:ring-indigo-500 sm:text-md"
                    placeholder="Min beds" />
                </div>

                <!-- max beds -->
                <div class="relative">
                  <div class="pointer-events-none absolute inset-y-0 left-0 flex items-center pl-3">
                    <span class="material-icons text-gray-700 dark:text-gray-200">bed</span>
                  </div>
                  <input ref="params.max_bedrooms" autocomplete="off" type="number" v-model="params.max_bedrooms"
                    name="max_bedrooms" id="max_bedrooms"
                    class="flex w-50 rounded-md border-gray-700 bg-gray-100 dark:bg-gray-700 text-gray-700 dark:text-gray-200 pl-10 hover:border-indigo-500 focus:ring-indigo-500 sm:text-md"
                    placeholder="Max beds" />
                </div>

                <div class="relative">
                  <div class="pointer-events-none absolute inset-y-0 left-0 flex items-center pl-3">
                    <span class="material-icons text-gray-700 dark:text-gray-200">shower</span>
                  </div>
                  <input ref="params.min_bathrooms" autocomplete="off" type="number" v-model="params.min_bathrooms"
                    name="min_bathrooms" id="min_bathrooms"
                    class="flex w-50 rounded-md border-gray-700 bg-gray-100 dark:bg-gray-700 text-gray-700 dark:text-gray-200 pl-10 hover:border-indigo-500 focus:ring-indigo-500 sm:text-md"
                    placeholder="Min baths" />
                </div>

                <!-- max baths -->
                <div class="relative">
                  <div class="pointer-events-none absolute inset-y-0 left-0 flex items-center pl-3">
                    <span class="material-icons text-gray-700 dark:text-gray-200">shower</span>
                  </div>
                  <input ref="params.max_bathrooms" autocomplete="off" type="number" v-model="params.max_bathrooms"
                    name="max_bathrooms" id="max_bathrooms"
                    class="flex w-50 rounded-md border-gray-700 bg-gray-100 dark:bg-gray-700 text-gray-700 dark:text-gray-200 pl-10 hover:border-indigo-500 focus:ring-indigo-500 sm:text-md"
                    placeholder="Max baths" />
                </div>

                <!-- min year built -->
                <div class="relative">
                  <div class="pointer-events-none absolute inset-y-0 left-0 flex items-center pl-3">
                    <span class="material-icons text-gray-700 dark:text-gray-200">date_range</span>
                  </div>
                  <input ref="params.min_year_built" autocomplete="off" type="number" v-model="params.min_year_built"
                    name="min_year_built" id="min_year_built"
                    class="flex w-50 rounded-md border-gray-700 bg-gray-100 dark:bg-gray-700 text-gray-700 dark:text-gray-200 pl-10 hover:border-indigo-500 focus:ring-indigo-500 sm:text-md"
                    placeholder="Min year built" />
                </div>
                <!-- max year built -->
                <div class="relative">
                  <div class="pointer-events-none absolute inset-y-0 left-0 flex items-center pl-3">
                    <span class="material-icons text-gray-700 dark:text-gray-200">date_range</span>
                  </div>
                  <input ref="params.max_year_built" autocomplete="off" type="number" v-model="params.max_year_built"
                    name="max_year_built" id="max_year_built"
                    class="flex w-50 rounded-md border-gray-700 bg-gray-100 dark:bg-gray-700 text-gray-700 dark:text-gray-200 pl-10 hover:border-indigo-500 focus:ring-indigo-500 sm:text-md"
                    placeholder="Max year built" />
                </div>
              </div>
            </div>
          </div>
        </form>

        <!-- total listing count -->
        <p class="mt-6 text-sm text-gray-500 dark:text-gray-400">
          <span class="font-medium text-gray-900 dark:text-gray-100">{{ listings.total }}</span>
          results
        </p>

        <div class="mt-6 flex justify-end">
          <SecondaryButton @click="closeModal"> Cancel </SecondaryButton>

          <button class="ml-3 rounded-md border border-transparent bg-indigo-600 py-3 px-4 
                      text-base font-medium text-white shadow-sm hover:bg-indigo-700 focus:outline-none 
                      focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 focus:ring-offset-gray-50"
            @click="confirmSearch">
            View Listings
          </button>
        </div>
      </div>
    </Modal>
  </div>
</template>

<script setup>
import { CurrencyDollarIcon } from '@heroicons/vue/20/solid'
import Modal from '@/Components/Modal.vue';
import SecondaryButton from '@/Components/SecondaryButton.vue';
import { ref } from 'vue';

const props = defineProps({
  filters: Object,
  params: Object,
  listings: Object
});

const advancedSearchModal = ref(false);

const customSearch = () => {
  advancedSearchModal.value = true;
};

const confirmSearch = () => {
  advancedSearchModal.value = false;
};

const closeModal = () => {
  advancedSearchModal.value = false;
};

</script>