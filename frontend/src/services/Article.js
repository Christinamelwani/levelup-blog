import Http from '@/services/Http'

export default {
  async all() {
    const response = await Http.get('/articles')
    return response.data
  },
  async bySlug(slug) {
    const response = await Http.get(`/users/${slug}/articles`)
    return response.data
  }
}
