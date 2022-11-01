export default {
  computed: {
    truncatedContent() {
      const truncatedArticleContent = this.article.content.slice(0, 200)
      if (truncatedArticleContent !== this.article.content) {
        return `${this.article.content.slice(0, 200)}...`
      }
      return truncatedArticleContent.replace(/(<([^>]+)>)/gi, '')
    },
    truncatedTitle() {
      const truncatedArticleTitle = this.article?.title.slice(0, 40)
      if (truncatedArticleTitle !== this.article.title) {
        return `${this.article.title.slice(0, 40)}...`
      }
      return truncatedArticleTitle
    },
    dateCreated() {
      return new Date(this.article.created_at).toLocaleDateString('de-DE')
    },
    articlePath() {
      return {
        name: 'Article',
        params: { slug: this.article.slug }
      }
    }
  }
}
