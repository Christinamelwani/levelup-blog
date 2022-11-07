<script>
import HighlightedArticleCard from '@/components/article/HighlightedArticleCard.vue'
import ArticleCard from '@/components/article/ArticleCard.vue'
import CategorySelector from '@/components/article/CategorySelector.vue'
import Slider from '@/components/article/Slider.vue'

import InfiniteArticles from '@/mixins/InfiniteArticles'

export default {
  components: {
    ArticleCard,
    CategorySelector,
    Slider,
    HighlightedArticleCard
  },
  data() {
    return {
      articles: [],
      current_page: 0,
      last_page: 9999,
      isLoading: false
    }
  },
  mixins: [InfiniteArticles],
  async created() {
    this.loadArticles()
  }
}
</script>

<template>
  <div class="page--home">
    <Slider
      class="slider-home"
      :article="featuredArticle"
      :extendedContent="true"
      :clickable="true"
      alignContent="left"
    />
    <section class="blogCards">
      <div class="blogCards__header">Browse all Articles</div>
      <CategorySelector />
      <div class="blogCards__content">
        <ArticleCard
          v-for="article in articles"
          :key="article.id"
          :article="article"
        />
      </div>
      <InfiniteLoading
        v-if="this.isLastPage === false"
        @infinite="loadArticles"
      />
    </section>
  </div>
</template>
