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
        },
        extendedContent: {
            type: Boolean,
            required: true,
            default: false,
        },
        alignContent: {
            type: String,
            required: true
        }
    }
}
</script>

<template>
    <section class="slider">
        <div class="slider__inner">
            <CategoryCard :class="`categoryCard--${alignContent}`" />
            <div class="slider__header">
                {{article.title}}
            </div>
            <div class="slider__text">
                <div v-if="extendedContent" class="slider__text">
                    <div class="slider__subtext">
                        {{dateCreated}}
                    </div>
                    <img src="@/assets/images/smallDivider.svg" />
                </div>
                <div class="slider__subtext">
                    {{truncatedContent}}
                </div>
            </div>
            <div v-if="extendedContent" class="slider__pagination">
                <img src="@/assets/images/paginationIcon.svg" class="pagination__active" />
                <img src="@/assets/images/paginationIcon.svg" class="pagination__inactive" />
                <img src="@/assets/images/paginationIcon.svg" class="pagination__inactive" />
            </div>
            <div v-if="!extendedContent" class="slider__byline">
                By Jennifer Lawrence
            </div>
        </div>
    </section>
</template>