<script>
import Reaction from '@/services/Reaction.js'
import Article from '@/services/Article'
import { mapState } from 'pinia'
import { useAuthStore } from '@/stores/Auth.js'

export default {
  data() {
    return {
      article: {},
      loading: false
    }
  },
  props: {},
  computed: {
    ...mapState(useAuthStore, ['userData']),
    reactions() {
      return this.article.reaction_types?.map(this.countReactions)
    }
  },
  methods: {
    countReactions(reactionType) {
      reactionType.instances = this.article.grouped_reactions[reactionType.type]

      if (!reactionType.instances) {
        reactionType.count = 0
        return reactionType
      }

      reactionType.count = reactionType.instances.length
      reactionType.userReacted = reactionType.instances.find(
        (reaction) => reaction.user_id === this.userData.id
      )

      return reactionType
    },
    async react(reaction) {
      if (this.loading) {
        return
      }
      if (!this.userData.email) {
        this.$notify({
          type: 'error',
          text: `You must log in to react to this article`
        })
        return
      }
      this.loading = true
      if (!reaction.userReacted) {
        await Reaction.add(this.article.slug, reaction.id)
      } else {
        await Reaction.delete(this.article.slug, reaction.id)
      }
      this.article = await Article.byArticleSlug(this.$route.params.slug)
      this.loading = false
    }
  },
  async created() {
    this.loading = true
    this.article = await Article.byArticleSlug(this.$route.params.slug)
    this.loading = false
  }
}
</script>
<template>
  <div class="reaction__container">
    <div class="reaction__inner" v-for="reaction in reactions">
      <h3
        class="reaction__count"
        :class="{ 'has-reacted': reaction.userReacted }"
      >
        {{ reaction.count }}
      </h3>
      <img
        @click="react(reaction)"
        class="reaction__image"
        height="35"
        width="35"
        :src="reaction.img_url"
      />
    </div>
  </div>
</template>
