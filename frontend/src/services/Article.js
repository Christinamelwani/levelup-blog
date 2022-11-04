import Http from '@/services/Http'
import dataToFormData from '@/helpers/dataToFormData'

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
    const formData = dataToFormData(articleData)
    const response = await Http.post(`/articles`, formData)
    return response.data.article
  },
  async addNewComment(newComment) {
    const response = await Http.post(`/comments`, newComment)
    return response.data.comment
  },
  async edit(slug, articleData) {
    const formData = dataToFormData(articleData)
    formData.append('_method', 'PATCH')
    const response = await Http.post(`/articles/${slug}`, formData, {
      headers: {
        'Content-Type': 'multipart/form-data'
      }
    })
    return response.data.article
  }
}
