<script setup>
import Subscribe from '@/Components/Subscribe.vue';
import Listings from '@/Components/Listings.vue';
import FrontendLayout from '@/Layouts/FrontendLayout.vue';
import { Head, Link } from '@inertiajs/vue3';

const props = defineProps({
  listings: Object
});
</script>

<template>
  <Head title="Welcome" />
  <FrontendLayout>
    <div class="scroll-smooth pointer-events-none">
      <div class="absolute transform-gpu h-screen w-full -top-24 -z-50">
        <img class="h-screen w-full -z-50" src="https://unsplash.it/2400/1600?image=249">
      </div>
      <main class="relative -top-24">
        <div class="h-screen flex">
          <div class="mx-auto max-w-7xl lg:px-8 m-auto">
            <div class="mx-auto max-w-3xl text-center m-auto select-none drop-shadow-4xl">
              <h2 class="mt-10 text-3xl leading-8 text-white bg-clip-text">
                Search for your dream home today!
              </h2>
              <div class="mt-10 flex items-center justify-center gap-x-6 pointer-events-auto">
                <a href="/download"
                  class="bg-indigo-400 bg-opacity-40 border border-indigo-400 px-5 py-3 text-3xl leading-7 text-white drop-shadow hover:bg-indigo-400 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-400 hover:scale-110 transition-all duration-300 cursor-pointer hover:text-indigo-100">
                  Search Now
                </a>
                <a href="#more"
                  class="bg-indigo-400 bg-opacity-40 border border-indigo-400 px-5 py-3 text-3xl leading-7 text-white drop-shadow hover:bg-indigo-400 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-400 hover:scale-110 transition-all duration-300 cursor-pointer hover:text-indigo-100">
                  What's My Home Worth?
                </a>
              </div>
            </div>
          </div>
        </div>
        <div class="-top-20 relative bg-white dark:bg-slate-900 mt-10 pointer-events-auto">
          <div class="relative mx-auto max-w-7xl">
            <div class="text-center">
              <h2 class="text-3xl tracking-tight text-gray-800 dark:text-white sm:text-4xl">Newly Listed Homes</h2>
            </div>
            <Listings :listings="props.listings"/>
          </div>
          <div class="pt-12">
            <Subscribe />
          </div>
        </div>
      </main>
    </div>
  </FrontendLayout>
</template>

