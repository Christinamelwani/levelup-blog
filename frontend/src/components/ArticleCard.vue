<script>
import Byline from '@/components/Byline.vue';
import ArticleCardMixin from '../mixins/ArticleCardMixin';
export default {
    components: { Byline },
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
    <div @click="goToArticle" class="articleCard">
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