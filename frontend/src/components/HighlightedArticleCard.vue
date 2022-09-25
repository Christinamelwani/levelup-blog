<script setup>
import CategoryCard from './CategoryCard.vue';

</script>

<template>
    <div class="editorsPick__content__card" v-for="index in 3">
        <img class="editorsPick__content__card-img" src="../assets/images/BlogImage2.png" />
        <CategoryCard />
        <div class="editorsPick__content__card__container">
            <div class="editorsPick__content__card__container-wrapper">
                <date class="editorsPick__content__card__container-date">
                    08.08.2021
                </date>
                <h3 class="editorsPick__content__card__container-title">
                    Richird Norton photorealistic rendering as real photos
                </h3>
                <p class="editorsPick__content__card__container-text">
                    Progressively incentivize cooperative systems through technically sound functionalities. The
                    credibly
                    productivate seamless data.
                </p>
            </div>
        </div>
    </div>
</template>