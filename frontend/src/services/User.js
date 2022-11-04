import Http from '@/services/Http'
import dataToFormData from '@/helpers/dataToFormData'
export default {
  async edit(slug, userData) {
    const response = await Http.put(`/users/${slug}`, userData)
    return response.data
  },
  async editWithAvatar(slug, userData) {
    const formData = dataToFormData(userData)
    formData.append('_method', 'PATCH')

    return await Http.post(`/users/${slug}`, formData, {
      headers: {
        'Content-Type': 'multipart/form-data'
      }
    })
  }
}
