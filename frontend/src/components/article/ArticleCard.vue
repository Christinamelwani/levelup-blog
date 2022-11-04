<script>
import Byline from '@/components/general/Byline.vue'
import ArticleCardMixin from '@/mixins/ArticleCardMixin'

export default {
  components: { Byline },
  mixins: [ArticleCardMixin],
  props: {
    article: {
      type: Object,
      required: true
    }
  }
}
</script>

<template>
  <RouterLink :to="articlePath" class="article__link">
    <div class="articleCard">
      <img class="articleCard__img" :src="article.image_path" />
      <div class="articleCard__wrapper">
        <p class="articleCard__date">{{ dateCreated }}</p>
        <h3 class="articleCard__header">{{ truncatedTitle }}</h3>
        <p class="articleCard__text">{{ truncatedContent }}</p>
      </div>
      <div class="articleCard__byline">
        <Byline :article="article" :author="article.user" />
      </div>
    </div>
  </RouterLink>
</template>
