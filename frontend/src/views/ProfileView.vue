<script>
import { mapState } from 'pinia'
import { useAuthStore } from '@/stores/Auth.js'

import Article from '@/services/Article.js'
import handleError from '@/helpers/handleError.js'
import HighlightedArticleCard from '../components/article/HighlightedArticleCard.vue'

export default {
  components: { HighlightedArticleCard },
  data() {
    return {
      articles: []
    }
  },
  computed: {
    ...mapState(useAuthStore, ['userData']),
    noArticlesForThisUser() {
      return this.articles.length === 0
    }
  },
  async created() {
    try {
      this.articles = await Article.byUserSlug(this.userData.slug)
    } catch (err) {
      handleError(err)
    }
  }
}
</script>
<template>
  <div class="profile_header">
    <img src="@/assets/images/Ellipse4.png" />
    <h1 class="profile_name">{{ userData.name }}</h1>
    <p class="profile_email">
      {{ userData.email }}
    </p>
    <img src="@/assets/images/goldDivider.svg" />
    <div class="profile_link_container">
      <RouterLink to="/" class="profile_link">Edit profile</RouterLink>
    </div>
  </div>
  <div class="profile_articles">
    <h1 class="profile_title">My articles</h1>
    <div class="userArticles_wrapper">
      <div class="newArticle_card">
        <div class="newArticle_wrapper">
          <img src="@/assets/images/plusSign.svg" />
          <p>Add new article</p>
        </div>
      </div>
      <HighlightedArticleCard v-for="article in articles" :article="article" />
    </div>
  </div>
</template>
