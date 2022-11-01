import Http from '@/services/Http'
export default {
  async edit(slug, userData) {
    const response = await Http.put(`/users/${slug}`, userData)
    return response.data
  },
  async editWithAvatar(slug, userData) {
    const formData = new FormData()
    Object.keys(userData).forEach((key) => {
      formData.append(key, userData[key])
    })
    formData.append('_method', 'PATCH')

    return await Http.post(`/users/${slug}`, formData, {
      headers: {
        'Content-Type': 'multipart/form-data'
      }
    })
  }
}
