<script>
import Slider from "@/components/Slider.vue";
import HighlightedArticleCard from "@/components/HighlightedArticleCard.vue";
import Byline from "@/components/Byline.vue";
import Article from "@/services/Article";
import ArticleCardMixin from "../mixins/ArticleCardMixin";

export default {
    components: { Slider, HighlightedArticleCard, Byline },
    data() {
        return {
            articles: [],
            article: {}
        };
    },
    mixins: [ArticleCardMixin],
    computed: {
        articleSlug() {
            return this.$route.params.slug
        }
    },
    watch: {
        // For when a highlighted article is clicked
        async articleSlug(newValue) {
            this.article = await Article.byArticleSlug(newValue)
        }
    },
    async created() {
        try {
            this.articles = await Article.all();
            this.article = await Article.byArticleSlug(this.articleSlug)
        }
        catch (err) {
            console.log(err);
        }
    },
}
</script>

<template>
    <main>
        <Slider class="slider-article" :article="article" />
        <section class="article">
            <div class="article__body">
                <div class="article__aside">
                    <div class="aside__wrapper">
                        <p class="article__date">
                            {{dateCreated}}
                        </p>
                        <svg class="article__line" width="35" height="1" viewBox="0 0 35 1" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <line y1="0.5" x2="35" y2="0.5" stroke="#C4C4C4" />
                        </svg>
                        <div class="article__date">
                            4 minutes
                        </div>
                    </div>
                </div>
                <div class="article__wrapper">
                    <p class="article__text">
                        {{article.content}}
                    </p>
                    <h2 class="article__quote">
                        “ Monotonectally seize superior mindshare rather than efficient technology. ”
                    </h2>
                    <div class="article__categories">
                        <div class="article__category">
                            Adventure
                        </div>
                        <div class="article__category">
                            Photo
                        </div>
                        <div class="article__category">
                            Design
                        </div>
                    </div>
                    <Byline />
                </div>
            </div>
        </section>
        <section class="editorsPick">
            <h1 class="relatedPosts__header">
                Related Posts
            </h1>
            <div class="editorsPick__content">
                <HighlightedArticleCard v-for="article in articles.slice(0,3)" :key="article.id" :article="article" />
            </div>
        </section>
    </main>
</template>
