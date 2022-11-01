import Http from '@/services/Http'

export default {
  async login(credentials) {
    const response = await Http.post('/authenticate', credentials)
    return response.data.token
  },
  async register(userData) {
    const registerResponse = await Http.post('/users', userData)
    const loginResponse = await Http.post('/authenticate', userData)
    const token = loginResponse.data.token
    return { ...registerResponse.data, token }
  },
  async me() {
    const response = await Http.get('/user')
    return response.data
  }
}
