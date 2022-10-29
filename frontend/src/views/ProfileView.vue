<script>
import { mapState } from 'pinia'
import { useAuthStore } from '@/stores/Auth.js'

import Article from '@/services/Article.js'
import handleError from '@/helpers/handleError.js'
import HighlightedArticleCard from '@/components/article/HighlightedArticleCard.vue'
import ActionSlider from '@/components/general/ActionSlider.vue'
import NewArticleCard from '@/components/article/NewArticleCard.vue'

export default {
  components: { HighlightedArticleCard, ActionSlider, NewArticleCard },
  data() {
    return {
      articles: []
    }
  },
  computed: {
    ...mapState(useAuthStore, ['userData'])
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
  <ActionSlider
    :title="userData.name"
    :subtitle="userData.email"
    :showImage="true"
    :link="{
      text: 'Edit Profile',
      destination: { name: 'Edit Profile' }
    }"
  />
  <div class="profile_articles">
    <h1 class="profile_title">My articles</h1>
    <div class="userArticles_wrapper">
      <NewArticleCard />
      <HighlightedArticleCard
        v-for="article in articles"
        :article="article"
        :showEdit="true"
      />
    </div>
  </div>
</template>
