<script setup>
import Slider from '../components/Slider.vue';
import CategorySelector from '../components/CategorySelector.vue';
import ArticleCard from '../components/ArticleCard.vue';
import HighlightedArticleCard from "../components/HighlightedArticleCard.vue"
</script>
<template>
  <main>
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
        <HighlightedArticleCard />
      </div>
    </section>
  </main>
</template>
