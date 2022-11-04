<script>
import Reaction from '@/services/Reaction.js'
import { mapState } from 'pinia'
import { useAuthStore } from '@/stores/Auth.js'

export default {
  data() {
    return {
      reactions: []
    }
  },
  props: {
    article: {
      type: Object,
      required: true
    }
  },
  computed: {
    ...mapState(useAuthStore, ['userData'])
  },
  methods: {
    countReactions() {
      this.article.reactions.forEach((articleReaction) => {
        const index = this.reactions.findIndex(
          (reaction) => reaction.id === articleReaction.reaction_id
        )
        if (articleReaction.user_id === this.userData.id) {
          this.reactions[index].currentUserHasReacted = true
        }
        if (!this.reactions[index].count) {
          this.reactions[index].count = 1
          return
        }
        this.reactions[index].count++
      })
    }
  },
  async created() {
    this.reactions = await Reaction.all()
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
        class="reaction__image"
        height="35"
        width="35"
        :src="reaction.img_url"
      />
    </div>
  </div>
</template>
