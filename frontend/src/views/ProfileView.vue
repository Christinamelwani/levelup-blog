<script>
import ArticleCard from '@/components/article/ArticleCard.vue'
import { mapState } from 'pinia'
import { useAuthStore } from '@/stores/Auth.js'
import Article from "@/services/Article.js"

export default {
    components: { ArticleCard },
    data() {
        return {
            articles: []
        };
    },
    computed: {
        ...mapState(useAuthStore, ["userData"]),
    },
    async created() {
        try {
            this.articles = await Article.byUserSlug(this.userData.slug)
        }
        catch (err) {
            console.log(err);
        }
    },
}
</script>
<template>
    <div class="profile_header">
        <h1 class="profile_name">
            Hello {{userData.name}}!
        </h1>
        <h3 class="profile_nickname">
            AKA {{userData.slug}}
        </h3>
        <p class="profile_email">
            {{userData.email}}
        </p>
    </div>
    <div class="profile_articles">
        <h1>Your articles:</h1>
        <div v-if="articles.length === 0">
            <h2>No articles yet!</h2>
        </div>
        <div v-else class="blogCards__content">
            <ArticleCard v-for="article in articles" :article="article" />
        </div>
    </div>

</template>