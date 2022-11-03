import Http from '@/services/Http'

export default {
  async all(
    orderBy = 'created_at',
    sortedBy = 'desc',
    perPage = 10,
    page = 1,
    category = ''
  ) {
    const response = await Http.get(
      `/articles?direction=${sortedBy}&ordering=${orderBy}&per_page=${perPage}&page=${page}&category=${category}`
    )
    return response.data.articles
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
  async addNewComment(newComment) {
    const response = await Http.post(`/comments`, newComment)
    return response.data.comment
  },
  async edit(slug, articleData) {
    const response = await Http.put(`/articles/${slug}`, articleData)
    return response.data.article
  }
}
