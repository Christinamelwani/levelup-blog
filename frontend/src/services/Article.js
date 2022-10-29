import Http from '@/services/Http'
import { useAuthStore } from '@/stores/Auth.js'

export default {
  async all() {
    const response = await Http.get('/articles')
    return response.data.articles.data
  },
  async byUserSlug(slug) {
    const response = await Http.get(`/users/${slug}/articles`)
    return response.data.articles.data
  },
  async byArticleSlug(slug) {
    const response = await Http.get(`/articles/${slug}`)
    return response.data.article
  },
  async addNew(articleData) {
    const authStore = useAuthStore()
    const response = await Http.post(`/articles`, articleData)
    return response.data.article
  },
  async edit(slug, articleData) {
    const authStore = useAuthStore()
    const response = await Http.put(`/articles/${slug}`, articleData)
    return response.data.article
  }
}
