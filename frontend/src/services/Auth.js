import Http from '@/services/Http'

export default {
  async login(credentials) {
    const response = await Http.post('/authenticate', credentials)
    return response.data
  },
  async register(userData) {
    const response = await Http.post('/users', userData)
    return response.data
  },
  async me() {
    const response = await Http.get('/user')
    return response.data
  }
}
