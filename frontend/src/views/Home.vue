<script>
import Slider from '@/components/article/Slider.vue'
import HighlightedArticleCard from '@/components/article/HighlightedArticleCard.vue'
import Article from '@/services/Article'
import CategorySelector from '@/components/article/CategorySelector.vue'
import ArticleCard from '@/components/article/ArticleCard.vue'
import handleError from '@/helpers/handleError.js'

export default {
  components: {
    Slider,
    CategorySelector,
    ArticleCard,
    HighlightedArticleCard
  },
  data() {
    return {
      articles: [],
      editorsPickArticles: []
    }
  },
  computed: {
    doneLoading() {
      return this.articles.length
    }
  },
  async created() {
    try {
      const response = await Article.all('created_at', 'desc', 8)
      this.articles = response.data
      this.editorsPickArticles = response.data.slice(0, 3)
    } catch (err) {
      handleError(err)
    }
  }
}
</script>
<template>
  <main v-if="doneLoading">
    <Slider
      class="slider-home"
      :article="articles[0]"
      :extendedContent="true"
      alignContent="left"
    />
    <section class="blogCards">
      <div class="blogCards__header">Popular topics</div>
      <CategorySelector />
      <div class="blogCards__content">
        <ArticleCard
          v-for="article in articles"
          :key="article.id"
          :article="article"
        />
      </div>
    </section>
    <section class="editorsPick">
      <h1 class="editorsPick__header">Editor's Pick</h1>
      <div class="editorsPick__content">
        <HighlightedArticleCard
          v-for="article in editorsPickArticles"
          :key="article.id"
          :article="article"
        />
      </div>
    </section>
  </main>
</template>
