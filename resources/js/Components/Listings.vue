<template>
  <div class="mx-auto mt-16 grid max-w-2xl grid-cols-1 gap-y-20 gap-x-8 lg:mx-0 lg:max-w-none lg:grid-cols-3">
    <article v-for="listing in listings" :key="listing.id"
      class="flex flex-col items-start justify-between px-4 sm:px-2 lg:px-0 cursor-pointer"
      @click="alert('coming soon...')">
      <div class="relative w-full">
        <img :src="listing.imageUrl" alt=""
          class="aspect-[16/9] w-full rounded-2xl bg-gray-100 object-cover sm:aspect-[2/1] lg:aspect-[3/2]" />
        <div class="absolute inset-0 rounded-2xl ring-1 ring-inset ring-gray-900/10" />
      </div>
      <div class="mt-4 flex items-center gap-x-4 text-xs">
        <span class="relative z-10 rounded-full bg-gray-50 py-1.5 px-3 font-medium text-gray-600 hover:bg-gray-100">
          {{ listing.category.name }}
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
            <span class="text-gray-900 dark:text-gray-200"> {{ listing.sqft }} sqft</span>
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
          <p class="mt-1 text-sm text-gray-500 dark:text-gray-300">{{ listing.price }}</p>
          <p class="mt-5 text-sm leading-6 text-gray-700 dark:text-gray-300 line-clamp-3">{{ listing.description }}</p>
        </div>
        <div class="relative mt-4 flex items-center gap-x-4">
          <div class="text-sm leading-6">
            <p class="text-gray-600">Listed by {{ listing.agent.brokerage }} on <time :datetime="listing.datetime"
                class="text-gray-500">{{ listing.date }}</time></p>
          </div>
        </div>
      </div>
    </article>
  </div>
</template>

<script setup>

function alert(message) {
  window.alert(message)
}

const listings = [
  {
    id: 1,
    address: '100 Main St, Boise, ID 83702',
    price: '$1,200,000',
    href: '#',
    description: 'Historic Boise home with modern updates. 3 bedrooms, 2 bathrooms, and a large backyard.',
    bedrooms: 3,
    bathrooms: 2,
    sqft: 2400,
    imageUrl:
      'https://images.unsplash.com/photo-1568605114967-8130f3a36994?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=2070&q=80',
    date: 'Mar 16, 2023',
    datetime: '2023-03-16',
    category: { name: 'Single Family', href: '#' },
    agent: {
      brokerage: 'Simple Real Estate',
    },
  },
  {
    id: 1,
    address: '372 E 100 N, Meridian, ID 83642',
    price: '679,000',
    href: '#',
    description: 'Farmhouse style home with a spectular view. You don\'t want to miss this one!',
    bedrooms: 5,
    bathrooms: 3,
    sqft: 3_200,
    imageUrl: 'https://images.unsplash.com/photo-1570129477492-45c003edd2be?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=2070&q=80',
    date: 'Mar 14, 2023',
    datetime: '2023-03-14',
    category: { name: 'Single Family', href: '#' },
    agent: {
      brokerage: 'Elegant Real Estate',
    },
  },
  {
    id: 1,
    address: '300 Old River Rd, Nampa, ID 83687',
    price: '$469,000',
    href: '#',
    description: 'Beautiful Nampa home with an old world charm. You will love the large backyard and the spacious kitchen.',
    bedrooms: 3,
    bathrooms: 2,
    sqft: 1_800,
    imageUrl:
      'https://images.unsplash.com/photo-1480074568708-e7b720bb3f09?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=2074&q=80',
    date: 'Mar 16, 2023',
    datetime: '2023-03-16',
    category: { name: 'Single Family', href: '#' },
    agent: {
      brokerage: 'Simple Real Estate',
    },
  },
]
</script>