<script>
import { mapState } from 'pinia'
import { useAuthStore } from '@/stores/Auth.js'

import handleError from '@/helpers/handleError.js'
import HighlightedArticleCard from '@/components/article/HighlightedArticleCard.vue'
import ActionSlider from '@/components/general/ActionSlider.vue'
import NewArticleCard from '@/components/article/NewArticleCard.vue'
import InfiniteArticles from '@/mixins/InfiniteArticles'

export default {
  components: { HighlightedArticleCard, ActionSlider, NewArticleCard },
  data() {
    return {
      articles: [],
      current_page: 0,
      last_page: 9999,
      isLoading: false
    }
  },
  mixins: [InfiniteArticles],
  computed: {
    ...mapState(useAuthStore, ['userData'])
  },
  async created() {
    try {
      this.loadArticles()
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
    :image="userData.avatar_path"
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
      <InfiniteLoading
        v-if="this.isLastPage === false"
        @infinite="loadArticles"
      />
    </div>
  </div>
</template>
