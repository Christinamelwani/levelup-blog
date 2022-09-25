<script setup>
import Slider from "../components/Slider.vue";
import HighlightedArticleCard from "../components/HighlightedArticleCard.vue";
import Byline from "../components/Byline.vue";</script>

<template>
    <main>
        <Slider />
        <section class="articleBody">
            <div class="articleBody__content">
                <div class="articleBody__col1">
                    <div class="articleBody__col1__wrapper">
                        <date class="articleBody__col1-item">
                            08.08.2021
                        </date>
                        <svg width="35" height="1" viewBox="0 0 35 1" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <line y1="0.5" x2="35" y2="0.5" stroke="#C4C4C4" />
                        </svg>
                        <div class="articleBody__col1-item">
                            4 minutes
                        </div>
                    </div>
                </div>
                <div class=" articleBody__col2">
                    <p class="articleBody__col2__text">
                        Seamlessly syndicate cutting-edge architectures rather than collaborative collaboration and
                        idea-sharing. Proactively incubate visionary interfaces whereas premium benefits. Seamlessly
                        negotiate ubiquitous leadership skills rather than parallel ideas. Dramatically visualize
                        superior
                        interfaces for best-of-breed alignments. Synergistically formulate performance based users
                        through
                        customized relationships. Interactively deliver cross-platform ROI via granular systems.
                        Intrinsicly
                        enhance effective initiatives vis-a-vis orthogonal outsourcing. Rapidiously monetize
                        market-driven
                        opportunities with multifunctional users. Collaboratively enhance visionary opportunities
                        through
                        revolutionary schemas. Progressively network just in time customer service without real-time
                        scenarios.
                    </p>
                    <p class="articleBody__col2__text">
                        Synergistically drive e-business leadership with unique synergy. Compellingly seize market
                        positioning ROI and bricks-and-clicks e-markets. Proactively myocardinate timely platforms
                        through
                        distributed ideas. Professionally optimize enabled core competencies for leading-edge sources.
                        Professionally enhance stand-alone leadership with innovative synergy. Rapidiously generate
                        backend
                        experiences vis-a-vis long-term high-impact relationships. Authoritatively supply market-driven
                        mindshare and bricks-and-clicks opportunities. Holisticly create diverse innovation through
                        adaptive
                        communities. Efficiently empower seamless meta-services with impactful opportunities.
                        Distinctively
                        transition virtual outsourcing with focused e-tailers.

                    </p>
                    <h2 class="articleBody__col2__quote">
                        “ Monotonectally seize superior mindshare rather than efficient technology. ”
                    </h2>
                    <p class="articleBody__col2__text">
                        Compellingly enhance seamless resources through competitive content. Continually actualize
                        24/365
                        alignments for resource-leveling platforms. Energistically enhance high standards in models and
                        professional expertise. Intrinsicly iterate extensible metrics for prospective opportunities.
                        Continually develop leading-edge experiences through quality e-services.
                    </p>
                    <div class="articleBody__categories">
                        <div class="articleBody__categories__card">
                            Adventure
                        </div>
                        <div class="articleBody__categories__card">
                            Photo
                        </div>
                        <div class="articleBody__categories__card">
                            Design
                        </div>
                    </div>
                    <svg width="860" height="1" viewBox="0 0 860 1" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <line y1="0.75" x2="860" y2="0.75" stroke="#C4C4C4" stroke-width="0.5" />
                    </svg>
                    <Byline />
                </div>
            </div>
        </section>
        <section class="editorsPick">
            <h1 class="relatedPosts__header">
                Related Posts
            </h1>
            <div class="editorsPick__content">
                <div class="editorsPick__content__card" v-for="index in 3">
                    <HighlightedArticleCard />
                </div>
            </div>
        </section>
    </main>
</template>

<style lang="scss">
@import '../assets/scss/main';
</style>