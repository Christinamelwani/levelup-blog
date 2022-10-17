<script >
import Slider from '@/components/Slider.vue';
import CategorySelector from '@/components/CategorySelector.vue';
import ArticleCard from '@/components/ArticleCard.vue';
import HighlightedArticleCard from "@/components/HighlightedArticleCard.vue"
import axios from "axios";
export default {
  components: {
    Slider,
    CategorySelector,
    ArticleCard,
    HighlightedArticleCard
  },
  data() {
    return {
      articles: []
    };
  },
  async created() {
    try {
      const response = await axios.get(`http://localhost:8000/api/articles`);
      this.articles = response.data;
    }
    catch (err) {
      console.log(err);
    }
  },
}
</script>
<template>
  <main>
    <Slider class="slider-home" />
    <section class="blogCards">
      <div class="blogCards__header">
        Popular topics
      </div>
      <CategorySelector />
      <div class="blogCards__content">
        <ArticleCard v-for="article in articles.slice(0,8)" :key="article.id" :article="article" />
      </div>
    </section>
    <section class="editorsPick">
      <h1 class="editorsPick__header">
        Editor's Pick
      </h1>
      <div class="editorsPick__content">
        <HighlightedArticleCard v-for="article in articles.slice(0,3)" :key="article.id" :article="article" />
      </div>
    </section>
  </main>
</template>
