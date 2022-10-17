<script>
import Byline from '@/components/Byline.vue';
export default {
    components: { Byline },
    props: {
        article: {
            type: Object,
            required: true
        }
    },
    computed: {
        truncatedContent() {
            const truncatedArticle = this.article.content.slice(0, 200);
            if (truncatedArticle !== this.article) {
                return `${this.article.content.slice(0, 200)}...`
            }
            console.log(this.article.title)
            return `${this.article.content.slice(0, 200)}`
        },
        truncatedTitle() {
            return `${this.article.title.slice(0, 20)}`
        },
        dateCreated() {
            return new Date(this.article.created_at).toLocaleDateString('de-DE')
        }
    },
}
</script>

<template>
    <div class="articleCard">
        <img class="articleCard__img" src="@/assets/images/BlogImage.png" />
        <div class="articleCard__wrapper">
            <p class="articleCard__date">{{dateCreated}}</p>
            <h3 class="articleCard__header">{{truncatedTitle}}</h3>
            <p class="articleCard__text">{{truncatedContent}}</p>
        </div>
        <div class="articleCard__byline">
            <Byline />
        </div>
    </div>
</template>