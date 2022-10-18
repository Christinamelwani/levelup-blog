<script >
import Slider from "@/components/article/Slider.vue";
import HighlightedArticleCard from "@/components/article/HighlightedArticleCard.vue";
import Article from "@/services/Article";
import CategorySelector from '@/components/article/CategorySelector.vue';
import ArticleCard from "@/components/article/ArticleCard.vue";

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
      this.articles = await Article.all();
    }
    catch (err) {
      console.log(err);
    }
  },
}
</script>
<template>
  <main>
    <Slider v-if="articles" class="slider-home" :article="articles[0]" />
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
