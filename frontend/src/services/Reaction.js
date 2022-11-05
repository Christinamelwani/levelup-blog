import Http from '@/services/Http'

export default {
  async all() {
    const response = await Http.get(`/reactions`)
    return response.data.reactions
  },
  async add(articleSlug, reaction_id) {
    const response = await Http.post(`/articles/${articleSlug}/reactions`, {
      reaction_id
    })
  },
  async delete(articleSlug, reactionId) {
    const response = await Http.delete(
      `/articles/${articleSlug}/reactions/${reactionId}`
    )
  }
}
