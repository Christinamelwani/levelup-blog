import Http from '@/services/Http'
import dataToFormData from '@/helpers/dataToFormData'

export default {
  async login(credentials) {
    const response = await Http.post('/authenticate', credentials)
    return response.data.token
  },
  async register(userData) {
    const formData = dataToFormData(userData)
    const registerResponse = await Http.post(`/users`, formData, {
      headers: {
        'Content-Type': 'multipart/form-data'
      }
    })
    const loginResponse = await Http.post('/authenticate', userData)
    const token = loginResponse.data.token
    return { ...registerResponse.data, token }
  },
  async me() {
    const response = await Http.get('/user')
    return response.data
  }
}
