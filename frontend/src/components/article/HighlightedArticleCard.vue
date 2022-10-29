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
    }
  }
}
</script>

<template>
  <div class="highlightedArticle">
    <img class="highlightedArticle__img" src="@/assets/images/BlogImage2.png" />
    <div class="highlightedArticle__wrapper">
      <div class="highlightedArticle__top">
        <img
          @click="
            $router.push({
              name: 'Edit Article',
              params: { slug: article.slug }
            })
          "
          class="highlightedArticle__edit"
          src="@/assets/images/editIcon.svg"
        />
        <CategoryCard class="categoryCard--highlighted" />
      </div>
      <div class="highlightedArticle__inner">
        <p class="highlightedArticle__date">
          {{ dateCreated }}
        </p>
        <h3 @click="goToArticle" class="highlightedArticle__title">
          {{ truncatedTitle }}
        </h3>
        <p class="highlightedArticle__text">
          {{ truncatedContent }}
        </p>
      </div>
    </div>
  </div>
</template>
