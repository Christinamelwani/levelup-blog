<script>
import { mapState } from 'pinia'
import { useAuthStore } from '@/stores/Auth.js'

import Btn from '@/components/general/Btn.vue'
import timeSince from '@/helpers/timeSince.js'
import Article from '@/services/Article.js'

export default {
  components: {
    Btn
  },
  data() {
    return {
      newComment: { content: '', article_id: this.article.id }
    }
  },
  computed: {
    ...mapState(useAuthStore, ['userData', 'isLoggedIn'])
  },
  props: {
    article: {
      type: Object,
      required: true
    }
  },
  methods: {
    formatDate(date) {
      const dateOnly = new Date(date).toLocaleDateString('de-DE')
      const timeSincePosted = timeSince(date)
      return `${dateOnly} - ${timeSincePosted} ago`
    },
    async addComment() {
      const newComment = await Article.addNewComment(this.newComment)
      this.$emit('reload')
      this.newComment.content = ''
    }
  }
}
</script>
<template>
  <div class="comment">
    <h1 class="comment__header">Comments:</h1>
    <div class="comment__box" v-if="isLoggedIn">
      <img class="byline__img" :src="userData.avatar_path" />
      <form class="comment__form" @submit.prevent="addComment">
        <input
          class="comment__input"
          v-model="newComment.content"
          name="content"
          type="text"
          placeholder="Write a comment"
          :required="true"
        />
        <Btn class="btn comment__btn" type="submit">Send</Btn>
      </form>
    </div>
    <div v-for="comment in article.comments" class="comment__box">
      <img class="byline__img" :src="comment.author.avatar_path" />
      <div class="comment__body">
        <h1 class="comment__author">{{ comment.author.name }}</h1>
        <h2 class="comment__date">{{ formatDate(comment.created_at) }}</h2>
        <p class="comment__content">{{ comment.content }}</p>
      </div>
    </div>
  </div>
</template>
