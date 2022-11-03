<script>
import Article from '@/services/Article.js'
import Category from '@/services/Category.js'
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
        content: '',
        categories: []
      },
      categoryOptions: []
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
    },
    async populateArticleData() {
      this.article = await Article.byArticleSlug(this.$route.params.slug)
      this.categoryOptions = await Category.all()

      Object.keys(this.articleData).forEach((articleField) => {
        this.articleData[articleField] = this.article[articleField]
      })

      // This is because we need to submit categories as an array of ids
      this.articleData.categories = this.articleData.categories.map(
        (category) => category.id
      )
    }
  },
  created() {
    this.populateArticleData()
  }
}
</script>
<template>
  <ActionSlider
    v-if="article.title"
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
      :prefilled="true"
      submitText="Update"
      :categoryOptions="categoryOptions"
      :articleData="articleData"
    />
  </div>
</template>
