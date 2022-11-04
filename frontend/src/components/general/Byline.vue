<script>
import ReactionToolbar from '@/components/general/ReactionToolbar.vue'

export default {
  components: { ReactionToolbar },
  props: {
    article: {
      type: Object,
      required: true
    },
    withImage: {
      type: Boolean,
      required: false,
      default: false
    },
    withSocialMedia: {
      type: Boolean,
      required: false,
      default: false
    },
    author: {
      type: Object,
      required: true
    }
  },
  components: { ReactionToolbar }
}
</script>

<template>
  <div class="byline">
    <div class="byline__inner">
      <img class="byline__img" :src="author.avatar_path" />
      <div class="byline__wrapper">
        <h3 class="byline__header">By {{ author.name }}</h3>
        <h4 class="byline__subheader">Thinker and designer</h4>
      </div>
    </div>
    <ReactionToolbar :article="article" v-if="withSocialMedia" />
  </div>
</template>
