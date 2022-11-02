import Http from '@/services/Http'

export default {
  async all() {
    const response = await Http.get(`/categories`)
    return response.data.categories
  }
}
