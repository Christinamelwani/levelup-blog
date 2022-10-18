<script>
import CategoryCard from './CategoryCard.vue';
import ArticleCardMixin from "../mixins/ArticleCardMixin";
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
    <section class="slider">
        <div class="slider__inner">
            <CategoryCard :class="`categoryCard-${$route.name}`" />
            <div class="slider__header">
                {{article.title}}
            </div>
            <div class="slider__text">
                <div v-if="$route.name === 'home'" class=" slider__subtext">
                    {{createdDate}}
                </div>
                <svg v-if="$route.name === 'home'" class=" slider__line" width="30" height="1" viewBox="0 0 30 1"
                    fill="none" xmlns="http://www.w3.org/2000/svg">
                    <line x1="1.7418e-10" y1="0.5" x2="30" y2="0.5" stroke="#E5E5E5" />
                </svg>
                <div class="slider__subtext">
                    {{truncatedContent}}
                </div>
            </div>
            <div v-if="$route.name === 'home'" class="slider__pagination">
                <svg width="8" height="8" viewBox="0 0 8 8" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <circle cx="4" cy="4" r="4" fill="white" />
                </svg>
                <svg width="8" height="8" viewBox="0 0 8 8" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <circle cx="4" cy="4" r="4" fill="white" fill-opacity="0.2" />
                </svg>
                <svg width="8" height="8" viewBox="0 0 8 8" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <circle cx="4" cy="4" r="4" fill="white" fill-opacity="0.2" />
                </svg>
            </div>
            <div v-if="$route.name === 'article'" class="slider__byline">
                By Jennifer Lawrence
            </div>
        </div>
    </section>
</template>