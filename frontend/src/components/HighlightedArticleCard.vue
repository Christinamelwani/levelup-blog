<script>
import CategoryCard from './CategoryCard.vue';
export default {
    components: { CategoryCard },
    props: {
        article: {
            type: Object,
            required: true
        }
    },
    computed: {
        truncatedContent() {
            const truncatedArticleContent = this.article.content.slice(0, 200);
            if (truncatedArticleContent !== this.article.content) {
                return `${this.article.content.slice(0, 200)}...`
            }
            return truncatedArticleContent
        },
        truncatedTitle() {
            const truncatedArticleTitle = this.article.title.slice(0, 40);
            if (truncatedArticleTitle !== this.article.title) {
                return `${this.article.title.slice(0, 40)}...`
            }
            return truncatedArticleTitle
        },
        dateCreated() {
            return new Date(this.article.created_at).toLocaleDateString('de-DE')
        }
    },
    methods: {
        goToArticle() {
            this.$router.push({ name: 'article', params: { id: this.article.id } })
        }
    }
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