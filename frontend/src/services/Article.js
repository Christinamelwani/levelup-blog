import Http from '@/services/Http'

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
  }
}
