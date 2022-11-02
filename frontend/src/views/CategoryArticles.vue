<script>
import Slider from '@/components/article/Slider.vue'
import HighlightedArticleCard from '@/components/article/HighlightedArticleCard.vue'
import Article from '@/services/Article'
import ArticleCard from '@/components/article/ArticleCard.vue'
import CategorySelector from '@/components/article/CategorySelector.vue'
import handleError from '@/helpers/handleError'
import InfiniteLoading from 'v3-infinite-loading'
import 'v3-infinite-loading/lib/style.css' //required if you're not going to override default slots

export default {
  components: {
    Slider,
    ArticleCard,
    CategorySelector,
    InfiniteLoading,
    HighlightedArticleCard
  },
  data() {
    return {
      articles: {},
      current_page: 1,
      last_page: 1,
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
        this.isLoading = false
        return
      }

      try {
        const response = await Article.all(
          'created_at',
          'desc',
          8,
          this.current_page,
          this.$route.params.id
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
        this.current_page,
        this.$route.params.id
      )
      this.articles = response.data
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
      v-if="featuredArticle.content"
      class="slider-home"
      :article="featuredArticle"
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
      <InfiniteLoading
        v-if="this.isLastPage === false"
        @infinite="loadArticles"
      />
    </section>
  </div>
</template>
