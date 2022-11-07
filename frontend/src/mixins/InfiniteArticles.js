import Article from '@/services/Article'
import InfiniteLoading from 'v3-infinite-loading'
import 'v3-infinite-loading/lib/style.css'

export default {
  components: {
    InfiniteLoading
  },
  computed: {
    featuredArticle() {
      if (this.articles.length) {
        return this.articles[0]
      } else {
        return {}
      }
    },
    isLastPage() {
      return this.current_page === this.last_page
    }
  },
  methods: {
    async loadArticles() {
      if (this.isLoading || this.isLastPage) {
        return
      }

      this.isLoading = true

      let category = ''
      if (this.$route.params.id) {
        category = this.$route.params.id
      }

      let response = ''
      if (this.userData) {
        response = await Article.byUserSlug(
          8,
          this.current_page + 1,
          this.userData.slug
        )
      } else {
        response = await Article.all(8, this.current_page + 1, category)
      }

      if (this.articles.length) {
        this.articles = this.articles.concat(response.data)
      } else {
        this.articles = response.data
      }

      this.current_page = response.current_page
      this.last_page = response.last_page

      this.isLoading = false
    }
  }
}
