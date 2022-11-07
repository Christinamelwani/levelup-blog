<script>
import Byline from '@/components/general/Byline.vue'
import Slider from '@/components/article/Slider.vue'
import HighlightedArticleCard from '@/components/article/HighlightedArticleCard.vue'
import ArticleComments from '@/components/article/ArticleComments.vue'
import Article from '@/services/Article'
import ArticleCardMixin from '@/mixins/ArticleCardMixin'
import handleError from '@/helpers/handleError.js'

export default {
  components: {
    Slider,
    HighlightedArticleCard,
    ArticleComments,
    Byline
  },
  data() {
    return {
      articles: [],
      article: {},
      reloadArticle: false
    }
  },
  mixins: [ArticleCardMixin],
  computed: {
    articleSlug() {
      return this.$route.params.slug
    },
    doneLoading() {
      return this.article.title && this.articles.length
    }
  },
  watch: {
    // For when a highlighted article is clicked
    async articleSlug(newValue) {
      this.article = await Article.byArticleSlug(newValue)
    },
    async reloadArticle() {
      this.article = await Article.byArticleSlug(this.$route.params.slug)
      this.reloadArticle = false
    }
  },
  async created() {
    try {
      const response = await Article.all(3)
      this.articles = response.data
      this.article = await Article.byArticleSlug(this.articleSlug)
    } catch (err) {
      handleError(err)
    }
  }
}
</script>

<template>
  <main v-if="doneLoading">
    <Slider
      class="slider-article"
      :article="article"
      :extendedContent="false"
      alignContent="center"
    />
    <section class="article">
      <div class="article__body">
        <div class="article__aside">
          <div class="aside__wrapper">
            <p class="article__date">
              {{ dateCreated }}
            </p>
            <img src="@/assets/images/smallDividerBlack.svg" />
            <div class="article__date">4 minutes</div>
          </div>
        </div>
        <div class="article__wrapper">
          <div class="article__text" v-html="article.content"></div>
          <div class="article__categories">
            <router-link
              v-for="category in article.categories"
              class="article__category"
              :to="{ name: 'categoryArticles', params: { id: category.id } }"
            >
              {{ category.name }}
            </router-link>
          </div>
          <Byline
            :article="article"
            :author="article.user"
            :withSocialMedia="true"
          />
          <ArticleComments @reload="reloadArticle = true" :article="article" />
        </div>
      </div>
    </section>
    <section class="editorsPick">
      <h1 class="relatedPosts__header">Related Posts</h1>
      <div class="editorsPick__content">
        <HighlightedArticleCard
          v-for="article in articles"
          :key="article.id"
          :article="article"
        />
      </div>
    </section>
  </main>
</template>
