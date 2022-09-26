<script setup>
import CategoryCard from './CategoryCard.vue';

</script>

<template>
    <section class="slider">
        <div class="slider__inner">
<<<<<<< HEAD
            <CategoryCard :class="`categoryCard-${$route.name}`" />
=======
            <CategoryCard class="categoryCard-slider" />
>>>>>>> e4b09d5 (Made header and slider responsive, still figuring out the rest)
            <div class="slider__header">
                Richird Norton photorealistic rendering as real photos
            </div>
            <div class="slider__text">
<<<<<<< HEAD
                <div v-if="$route.name === 'home'" class=" slider__subtext">
                    08.08.2021
                </div>
                <svg v-if="$route.name === 'home'" class=" slider__line" width="30" height="1" viewBox="0 0 30 1"
                    fill="none" xmlns="http://www.w3.org/2000/svg">
=======
                <div class="slider__subtext">
                    08.08.2021
                </div>
                <svg class="slider__line" width="30" height="1" viewBox="0 0 30 1" fill="none"
                    xmlns="http://www.w3.org/2000/svg">
>>>>>>> e4b09d5 (Made header and slider responsive, still figuring out the rest)
                    <line x1="1.7418e-10" y1="0.5" x2="30" y2="0.5" stroke="#E5E5E5" />
                </svg>
                <div class="slider__subtext">
                    Progressively incentivize cooperative systems through technically sound functionalities. The
                    credibly
                    productivate seamless data.
                </div>
            </div>
<<<<<<< HEAD
            <div v-if="$route.name === 'home'" class="slider__pagination">
=======
            <div class="slider__pagination">
>>>>>>> e4b09d5 (Made header and slider responsive, still figuring out the rest)
                <svg width="8" height="8" viewBox="0 0 8 8" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <circle cx="4" cy="4" r="4" fill="white" />
                </svg>
                <svg width="8" height="8" viewBox="0 0 8 8" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <circle cx="4" cy="4" r="4" fill="white" fill-opacity="0.2" />
                </svg>
                <svg width="8" height="8" viewBox="0 0 8 8" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <circle cx="4" cy="4" r="4" fill="white" fill-opacity="0.2" />
                </svg>
<<<<<<< HEAD
            </div>
            <div v-if="$route.name === 'article'" class="slider__byline">
                By Jennifer Lawrence
=======
>>>>>>> e4b09d5 (Made header and slider responsive, still figuring out the rest)
            </div>
            <!-- <div class="slider__byline">
                By Jennifer Lawrence
            </div> -->
        </div>
    </section>
</template>