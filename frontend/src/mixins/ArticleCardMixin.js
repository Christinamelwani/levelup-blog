export default {
  computed: {
    truncatedContent() {
      if (!this.article) {
        return
      }
      const truncatedArticleContent = this.article.content.slice(0, 200)
      if (truncatedArticleContent !== this.article.content) {
        return `${this.article.content.slice(0, 200)}...`
      }
      return truncatedArticleContent
    },
    truncatedTitle() {
      if (!this.article) {
        return
      }
      const truncatedArticleTitle = this.article?.title.slice(0, 40)
      if (truncatedArticleTitle !== this.article.title) {
        return `${this.article.title.slice(0, 40)}...`
      }
      return truncatedArticleTitle
    },
    dateCreated() {
      if (!this.article) {
        return
      }
      return new Date(this.article.created_at).toLocaleDateString('de-DE')
    }
  },
  methods: {
    goToArticle() {
      this.$router.push({
        name: 'Article',
        params: { slug: this.article.slug }
      })
    }
  }
}
