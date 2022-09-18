<script setup>
import Slider from '../components/Slider.vue';
import CategorySelector from '../components/CategorySelector.vue';
import ArticleCard from '../components/ArticleCard.vue';
import HighlightedArticleCard from "../components/HighlightedArticleCard.vue"
</script>
<template>
  <main>
<<<<<<< HEAD
    <Slider class="slider-home" />
    <section class=" blogCards">
      <div class="blogCards__header">
        Popular topics
      </div>
      <CategorySelector />
      <div class="blogCards__content">
        <ArticleCard v-for="index in 8" @click="$router.push(`/article/${index}`)" />
      </div>
    </section>
    <section class="editorsPick">
      <h1 class="editorsPick__header">
        Editor's Pick
      </h1>
      <div class="editorsPick__content">
        <HighlightedArticleCard v-for="index in 3" />
=======
    <section class="blogSlider">
      <div class="blogSlider__inner">
        <div class="blogSlider__category">
          Adventure
        </div>
        <div class="blogSlider__header">
          Richird Norton photorealistic rendering as real photos
        </div>
        <div class="blogSlider__text">
          <div class="blogSlider__text-subtext">
            08.08.2021
          </div>
          <svg class="blogSlider__text-line" width="60" height="1" viewBox="0 0 30 1" fill="none"
            xmlns="http://www.w3.org/2000/svg">
            <line x1="1.7418e-10" y1="0.5" x2="30" y2="0.5" stroke="#E5E5E5" />
          </svg>
          <div class="blogSlider__text-subtext">
            Progressively incentivize cooperative systems through technically sound functionalities. The credibly
            productivate seamless data.
          </div>
        </div>
      </div>
      <div class="blogSlider__pagination">
        <svg width="8" height="8" viewBox="0 0 8 8" fill="none" xmlns="http://www.w3.org/2000/svg">
          <circle cx="4" cy="4" r="4" fill="white" />
        </svg>
        <svg width="8" height="8" viewBox="0 0 8 8" fill="none" xmlns="http://www.w3.org/2000/svg">
<circle cx="4" cy="4" r="4" fill="white" fill-opacity="0.2"/>
</svg>

<svg width="8" height="8" viewBox="0 0 8 8" fill="none" xmlns="http://www.w3.org/2000/svg">
<circle cx="4" cy="4" r="4" fill="white" fill-opacity="0.2"/>
</svg>

>>>>>>> 7fb9da1 (Blog Slider and header done)
      </div>
    </section>
  </main>
</template>

<style lang="scss">
  @import '../assets/scss/main';
</style>