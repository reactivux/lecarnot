<template>
 


      <swiper :navigation="true" :slides-per-view="swiperOptions.slidesPerView"
        :space-between="swiperOptions.spaceBetween" :modules="modules" class="custom-swiper-categories">
        <swiper-slide v-for="(category, index) in filteredCategories" :key="`category-${index}`"
            class="categories-style-1" :title="category?.name">
            <div class="category-item d-flex justify-content-start align-items-center" :id="`scroll-id-${category?.id}`" @click="scrollToElement(category?.name)">
                <div class="category-thumbnail">
                    <img width="110" height="110" fetchpriority="high"
                        v-lazy="this.$global.getImageUrl(category, 'category')" :alt="`${category?.name}`">
                </div>
                <div class="category-details">
                    <h3 class="category-title ">
                        {{ category?.name }}
                    </h3>
                </div>
            </div>
        </swiper-slide>
        <div class="shadow-prev"></div>
        <div class="shadow-next"></div>
    </swiper>  
</template>
<script lang="ts">
// Import Swiper Vue.js components
import { Swiper, SwiperSlide } from 'swiper/vue';

// Import Swiper styles
import 'swiper/css';

import 'swiper/css/navigation';


// import required modules
import { Navigation } from 'swiper/modules';

export default {
    components: {
        Swiper,
        SwiperSlide,
    },
    setup() {
        return {
            modules: [Navigation],
        };
    },
    props: ['categories'],
    data() {
        return {
            currentIndex: 0, // Track the current category index
            swiperOptions: {
                slidesPerView: 0,
                spaceBetween: 0
            }
        };
    },
    methods: {
        scrollToElement(id) {
            // Get the element by ID
            const element = document.getElementById(id);
            if (element) {
                // Scroll to the element
                element.scrollIntoView({ behavior: 'smooth' });
            }
        },
        updateSlidesPerView() {
           
            if (window.innerWidth >= 992) {
                this.swiperOptions.slidesPerView = 4
                this.swiperOptions.spaceBetween = 5
            } else if (window.innerWidth <= 991 && window.innerWidth >= 576) {
                this.swiperOptions.slidesPerView = 2
                this.swiperOptions.spaceBetween = 5
            } else if (window.innerWidth <= 575 && window.innerWidth >= 300) {
                this.swiperOptions.slidesPerView = 2
                this.swiperOptions.spaceBetween = 5
            } else {
                this.swiperOptions.slidesPerView = 2
                this.swiperOptions.spaceBetween = 5
            }
          
        },
    },
    created: function () { },
    mounted() { 

        this.updateSlidesPerView()
        window.addEventListener('resize', this.updateSlidesPerView)

    },
    beforeDestroy() {
        window.removeEventListener('resize', this.updateSlidesPerView)
    },
    computed: {

        // Computed property that filters categories to remove those without products
        filteredCategories() {
            return this.categories.filter(category => category.products.length > 0);
        },
    },
};
</script>