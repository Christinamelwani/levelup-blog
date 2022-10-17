<script>
import axios from 'axios'
import ArticleCard from '../components/ArticleCard.vue'
export default {
    components: { ArticleCard },
    data() {
        return {
            userData: {},
            articles: []
        };
    },
    async created() {
        try {
            const token = localStorage.getItem("access_token");
            const config = {
                headers: { Authorization: `Bearer ${token}` }
            };
            const response = await axios.get("http://localhost:8000/api/user", config);
            this.userData = response.data;
            const articlesResponse = await axios.get(`http://localhost:8000/api/users/${this.userData.slug}/articles`, config);
            this.articles = articlesResponse.data;
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