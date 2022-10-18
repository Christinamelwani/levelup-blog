<script>
import CategoryCard from '@/components/article/CategoryCard.vue';
import ArticleCardMixin from '@/mixins/ArticleCardMixin';
export default {
    components: { CategoryCard },
    mixins: [ArticleCardMixin],
    props: {
        article: {
            type: Object,
            required: true
        }
    },
}
</script>

<template>
    <div @click="goToArticle" class="highlightedArticle">
        <img class="highlightedArticle__img" src="@/assets/images/BlogImage2.png" />
        <div class="highlightedArticle__wrapper">
            <CategoryCard class="categoryCard-highlightedArticle" />
            <div class="highlightedArticle__inner">
                <p class="highlightedArticle__date">
                    {{dateCreated}}
                </p>
                <h3 class="highlightedArticle__title">
                    {{truncatedTitle}}
                </h3>
                <p class="highlightedArticle__text">
                    {{truncatedContent}}
                </p>
            </div>
        </div>
    </div>
</template>