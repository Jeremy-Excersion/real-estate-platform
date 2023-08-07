<template>
    <swiper 
      :navigation="true" 
      :modules="modules" 
      :slides-per-view="1.1"
      :centeredSlides="true"
      :centeredSlidesBounds="true"
      :rewind="true"
      class="listingSlider"
      >
      <swiper-slide v-for="photo in photos" :key="photo.id">
        <img
            class="object-fill w-full h-96"
            :src="photo.photo_url"
            alt="image slide 1"
        />
      </swiper-slide>
    </swiper>
</template>
<script>
// Import Swiper Vue.js components
import { Swiper, SwiperSlide } from "swiper/vue";

// Import Swiper styles
import "swiper/css";

import "swiper/css/navigation";

// import required modules
import { Navigation } from "swiper/modules";

export default {
    props: {
      photos: Object
    },
    components: {
        Swiper,
        SwiperSlide,
    },
    setup() {
        return {
            modules: [Navigation],
        };
    },
};
</script>