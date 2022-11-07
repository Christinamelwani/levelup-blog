<script>
import HighlightedArticleCard from '@/components/article/HighlightedArticleCard.vue'
import Article from '@/services/Article'
import ArticleCard from '@/components/article/ArticleCard.vue'
import CategorySelector from '@/components/article/CategorySelector.vue'
import handleError from '@/helpers/handleError'
import InfiniteLoading from 'v3-infinite-loading'
import Slider from '@/components/article/Slider.vue'
import 'v3-infinite-loading/lib/style.css' //required if you're not going to override default slots

export default {
  components: {
    ArticleCard,
    CategorySelector,
    InfiniteLoading,
    Slider,
    HighlightedArticleCard
  },
  data() {
    return {
      articles: {},
      current_page: 0,
      last_page: 0,
      isLoading: false
    }
  },
  computed: {
    featuredArticle() {
      if (this.articles.length) {
        return this.articles[0]
      } else {
        return {}
      }
    },
    isLastPage() {
      return this.current_page === this.last_page
    }
  },
  methods: {
    async loadArticles() {
      this.isLoading = true

      if (this.isLastPage) {
        return
      }

      this.current_page++

      try {
        const response = await Article.all(
          'created_at',
          'desc',
          8,
          this.current_page
        )
        this.articles = this.articles.concat(response.data)
        this.current_page = response.current_page
        this.last_page = response.last_page
      } catch (error) {
        handleError(error)
      }

      this.isLoading = false
    }
  },
  async created() {
    this.isLoading = true

    try {
      const response = await Article.all(
        'created_at',
        'desc',
        8,
        this.current_page
      )
      this.articles = response.data
      this.current_page = response.current_page
      this.last_page = response.last_page
    } catch (error) {
      handleError(error)
    }

    this.isLoading = false
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
