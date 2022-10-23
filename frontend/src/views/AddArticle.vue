<script>
import { mapState, mapActions } from 'pinia'
import { useAuthStore } from '@/stores/Auth.js'

import Article from '@/services/Article.js'
import ActionSlider from '@/components/general/ActionSlider.vue'
import ArticleForm from '@/components/article/ArticleForm.vue'

export default {
  components: { ActionSlider, ArticleForm },
  data() {
    return {
      articleData: {
        title: '',
        slug: '',
        content: ''
      }
    }
  },
  computed: {
    ...mapState(useAuthStore, ['userData'])
  },
  methods: {
    ...mapActions(useAuthStore, ['setUser']),

    async addArticle() {
      const response = await Article.addNew(this.articleData)
      console.log(response)
      this.$router.push({ name: 'Profile' })
    }
  }
}
</script>
<template>
  <ActionSlider
    title="Article editor"
    :showImage="false"
    :link="{
      text: 'Back to profile',
      destination: { name: 'Profile' }
    }"
  />
  <div class="profile_articles">
    <h1 class="profile_title profile_title--center">Add content</h1>
    <ArticleForm
      :submitAction="addArticle"
      submitText="Add new"
      :articleData="articleData"
    />
  </div>
</template>
