<script>
import Article from '@/services/Article.js'
import ActionSlider from '@/components/general/ActionSlider.vue'
import ArticleForm from '@/components/article/ArticleForm.vue'

export default {
  components: { ActionSlider, ArticleForm },
  data() {
    return {
      article: {},
      articleData: {
        title: '',
        slug: '',
        content: ''
      }
    }
  },
  methods: {
    async editArticle() {
      const response = await Article.edit(this.article.slug, this.articleData)
      this.$router.push({ name: 'Profile' })
      this.$notify({
        type: 'success',
        text: `Changes to ${this.articleData.title} saved!`
      })
    }
  },
  async created() {
    this.article = await Article.byArticleSlug(this.$route.params.slug)
    this.articleData.title = this.article.title
    this.articleData.slug = this.article.slug
    this.articleData.content = this.article.content
  }
}
</script>
<template>
  <ActionSlider
    :title="article.title"
    :showImage="false"
    :link="{
      text: 'Back to profile',
      destination: { name: 'Profile' }
    }"
  />
  <div class="profile_articles">
    <h1 class="profile_title profile_title--center">Edit content</h1>
    <ArticleForm
      :submitAction="editArticle"
      submitText="Update"
      :articleData="articleData"
    />
  </div>
</template>
