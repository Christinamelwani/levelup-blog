<script>
import Reaction from '@/services/Reaction.js'
import Article from '@/services/Article'
import { mapState } from 'pinia'
import { useAuthStore } from '@/stores/Auth.js'

export default {
  data() {
    return {
      reactions: [],
      article: []
    }
  },
  props: {},
  computed: {
    ...mapState(useAuthStore, ['userData'])
  },
  methods: {
    clearReactionCount() {
      this.reactions.forEach((reaction) => {
        reaction.count = 0
        reaction.currentUserHasReacted = false
      })
    },
    countReactions() {
      this.clearReactionCount()
      const reactionsToThisArticle = this.article.reactions
      reactionsToThisArticle.forEach((articleReaction) => {
        const reactionTypeIndex = this.reactions.findIndex(
          (reaction) => reaction.id === articleReaction.reaction_id
        )
        if (articleReaction.user_id === this.userData.id) {
          this.reactions[reactionTypeIndex].currentUserHasReacted = true
        }
        if (!this.reactions[reactionTypeIndex].count) {
          this.reactions[reactionTypeIndex].count = 1
          return
        }
        this.reactions[reactionTypeIndex].count++
      })
    },
    async react(reaction) {
      if (!this.userData.email) {
        this.$notify({
          type: 'error',
          text: `You must log in to react to this article`
        })
        return
      }
      if (!reaction.currentUserHasReacted) {
        await Reaction.add(this.article.slug, reaction.id)
      } else {
        await Reaction.delete(this.article.slug, reaction.id)
      }
      this.article = await Article.byArticleSlug(this.$route.params.slug)
      this.countReactions()
    }
  },
  async created() {
    this.reactions = await Reaction.all()
    this.article = await Article.byArticleSlug(this.$route.params.slug)
    this.countReactions()
  }
}
</script>
<template>
  <div class="reaction__container">
    <div class="reaction__inner" v-for="reaction in reactions">
      <h3
        class="reaction__count"
        :class="{ 'has-reacted': reaction.currentUserHasReacted }"
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
