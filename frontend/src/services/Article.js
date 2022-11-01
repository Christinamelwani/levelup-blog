import Http from '@/services/Http'

export default {
  async all(orderBy = 'created_at', sortedBy = 'desc', perPage = 10, page = 1) {
    const response = await Http.get(
      `/articles?direction=${sortedBy}&ordering=${orderBy}&per_page=${perPage}&page=${page}`
    )
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
    const response = await Http.post(`/articles`, articleData)
    return response.data.article
  },
  async edit(slug, articleData) {
    const response = await Http.put(`/articles/${slug}`, articleData)
    return response.data.article
  }
}
