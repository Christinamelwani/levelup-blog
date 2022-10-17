<script>
import Byline from '@/components/Byline.vue';
export default {
    props: {
        article: {
            type: Object,
            required: true
        }
    },
    components: { Byline },
    computed: {
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
            <h3 class="articleCard__header">{{article.title}}</h3>
            <p class="articleCard__text">{{article.content}}</p>
            <img src="@/assets/images/divider.svg" />
            <Byline />
        </div>
    </div>
</template>