<script>
import CategoryCard from '@/components/article/CategoryCard.vue';
import ArticleCardMixin from "@/mixins/ArticleCardMixin";

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
            <CategoryCard :class="`categoryCard--${$route.name}`" />
            <div class="slider__header">
                {{article.title}}
            </div>
            <div class="slider__text">
                <div v-if="$route.name === 'Home'" class="slider__subtext">
                    {{dateCreated}}
                </div>
                <img v-if="$route.name === 'Home'" src="@/assets/images/smallDivider.svg" />
                <div class="slider__subtext">
                    {{truncatedContent}}
                </div>
            </div>
            <div v-if="$route.name === 'Home'" class="slider__pagination">
                <img src="@/assets/images/paginationActive.svg" />
                <img src="@/assets/images/paginationInactive.svg" />
                <img src="@/assets/images/paginationInactive.svg" />
            </div>
            <div v-if="$route.name === 'article'" class="slider__byline">
                By Jennifer Lawrence
            </div>
        </div>
    </section>
</template>