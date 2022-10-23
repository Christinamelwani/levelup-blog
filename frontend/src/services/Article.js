import Http from '@/services/Http'
import { useAuthStore } from '@/stores/Auth.js'

export default {
  async all() {
    const response = await Http.get('/articles')
    return response.data.data
  },
  async byUserSlug(slug) {
    const response = await Http.get(`/users/${slug}/articles`)
    return response.data.data
  },
  async byArticleSlug(slug) {
    const response = await Http.get(`/articles/${slug}`)
    return response.data
  },
  async addNew(articleData) {
    const authStore = useAuthStore()
    articleData.user_id = authStore.userData.id
    const response = await Http.post(`/articles`, articleData)
    return response.data
  }
}
