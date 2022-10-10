<script>
import Byline from './Byline.vue';
export default {
    props: ["article"],
    components: { Byline },
    created() {
        console.log(this.article)
    }
}
</script>

<template>
    <div class="articleCard">
        <img class="articleCard__img" src="../assets/images/BlogImage.png" />
        <div class="articleCard__wrapper">
            <p class="articleCard__date">{{article? new Date(article.created_at).toLocaleDateString('de-DE') :
            "08.08.2021"}}</p>
            <h3 class="articleCard__header">{{article? article.title : `Dream destinations to visit this year in
            Paris`}}</h3>
            <p class="articleCard__text">{{article? article.content : `Progressively incentivize cooperative systems
            through technically
            sound functionalities. The credibly productivate seamless data.`}}</p>
            <svg width="270" height="1" viewBox="0 0 270 1" fill="none" xmlns="http://www.w3.org/2000/svg">
                <line x1="-0.000178" y1="0.75" x2="269.996" y2="0.557762" stroke="#E5E5E5" stroke-width="0.5" />
            </svg>
            <Byline v-if="!article" />
        </div>
    </div>
</template>