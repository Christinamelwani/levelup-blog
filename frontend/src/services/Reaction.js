import Http from '@/services/Http'

export default {
  async all() {
    const response = await Http.get(`/reactions`)
    return response.data.reactions
  }
}
