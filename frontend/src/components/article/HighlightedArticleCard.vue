<script>
import CategoryCard from '@/components/article/CategoryCard.vue'
import ArticleCardMixin from '@/mixins/ArticleCardMixin'
export default {
  components: { CategoryCard },
  mixins: [ArticleCardMixin],
  props: {
    article: {
      type: Object,
      required: true
    },
    showEdit: {
      type: Boolean,
      required: false,
      default: false
    }
  }
}
</script>

<template>
  <div class="highlightedArticle">
    <img class="highlightedArticle__img" src="@/assets/images/BlogImage2.png" />
    <div class="highlightedArticle__wrapper">
      <div class="highlightedArticle__top">
        <RouterLink
          v-if="showEdit"
          :to="{
            name: 'Edit Article',
            params: { slug: article.slug }
          }"
        >
          <img
            class="highlightedArticle__edit"
            src="@/assets/images/editIcon.svg"
          />
        </RouterLink>
        <CategoryCard class="categoryCard--highlighted" />
      </div>
      <RouterLink :to="articlePath" class="article__link">
        <div class="highlightedArticle__inner">
          <p class="highlightedArticle__date">
            {{ dateCreated }}
          </p>
          <h3 class="highlightedArticle__title">
            {{ truncatedTitle }}
          </h3>
          <p class="highlightedArticle__text">
            {{ truncatedContent }}
          </p>
        </div>
      </RouterLink>
    </div>
  </div>
</template>
