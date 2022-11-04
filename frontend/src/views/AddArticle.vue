<script>
import Article from '@/services/Article.js'
import Category from '@/services/Category.js'
import ActionSlider from '@/components/general/ActionSlider.vue'
import ArticleForm from '@/components/article/ArticleForm.vue'

export default {
  components: { ActionSlider, ArticleForm },
  data() {
    return {
      articleData: {
        title: '',
        slug: '',
        content: '',
        categories: [],
        image: null,
        image_path: ''
      },
      categoryOptions: []
    }
  },

  methods: {
    async addArticle() {
      if (!this.articleData.image) {
        delete this.articleData.image
      }
      const response = await Article.addNew(this.articleData)
      this.$router.push({ name: 'Profile' })
      this.$notify({
        type: 'success',
        text: `${this.articleData.title} successfully added!`
      })
    }
  },
  async created() {
    this.categoryOptions = await Category.all()
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
      :prefilled="false"
      :categoryOptions="categoryOptions"
      submitText="Add new"
      :articleData="articleData"
    />
  </div>
</template>
