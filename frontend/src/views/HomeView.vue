<script setup></script>

<template>
  <main>
    <section class="blogSlider">
      <div class="blogSlider__inner">
        <div class="blogSlider__category">
          Adventure
        </div>
        <div class="blogSlider__header">
          Richird Norton photorealistic rendering as real photos
        </div>
        <div class="blogSlider__text">
          <div class="blogSlider__text-subtext">
            08.08.2021
          </div>
          <svg class="blogSlider__text-line" width="60" height="1" viewBox="0 0 30 1" fill="none"
            xmlns="http://www.w3.org/2000/svg">
            <line x1="1.7418e-10" y1="0.5" x2="30" y2="0.5" stroke="#E5E5E5" />
          </svg>
          <div class="blogSlider__text-subtext">
            Progressively incentivize cooperative systems through technically sound functionalities. The credibly
            productivate seamless data.
          </div>
        </div>
      </div>
      <div class="blogSlider__pagination">
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
    </section>
    <section class="blogCards">
      <div class="blogCards__header">
        Popular topics
      </div>
      <div class="blogCards__filter">
        <ul class="blogCards__filter__list">
          <li class="blogCards__filter__list-item-active">
            All
          </li>
          <li class="blogCards__filter__list-item">
            Adventure
          </li>
          <li class="blogCards__filter__list-item">
            Travel
          </li>
          <li class="blogCards__filter__list-item">
            Fashion
          </li>
          <li class="blogCards__filter__list-item">
            Technology
          </li>
          <li class="blogCards__filter__list-item">
            Branding
          </li>
        </ul>
        <h3 class="blogCards__filter__viewAll">
          View All
        </h3>
      </div>
      <div @click="$router.push('/article/1')" class="blogCards__content">
        <div class="blogCards__content__card" v-for="index in 8">
          <img class="blogCards__content__card__img" src="../assets/images/BlogImage.png" />
          <div class="blogCards__content__card__wrapper">
            <date class="blogCards__content__card__date">08.08.2021</date>
            <h3 class="blogCards__content__card__header">Dream destinations to visit this year in Paris</h3>
            <p class="blogCards__content__card__text">Progressively incentivize cooperative systems through technically
              sound functionalities. The credibly productivate seamless data.</p>
            <svg width="270" height="1" viewBox="0 0 270 1" fill="none" xmlns="http://www.w3.org/2000/svg">
              <line x1="-0.000178" y1="0.75" x2="269.996" y2="0.557762" stroke="#E5E5E5" stroke-width="0.5" />
            </svg>
            <div class="blogCards__content__card__profile">
              <img class="blogCards__content__card__profiles-img" src="../assets/images/Ellipse4.png" />
              <div class="blogCards__content__card__profile-text">
                <h3 class="blogCards__content__card__profile-header">
                  By Jennifer Lawrence
                </h3>
                <h4 class="blogCards__content__card__profile-subheader">
                  Thinker and designer
                </h4>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <section class="editorsPick">
      <h1 class="editorsPick__header">
        Editor's Pick
      </h1>
      <div class="editorsPick__content">
        <div class="editorsPick__content__card" v-for="index in 3">
          <img class="editorsPick__content__card-img" src="../assets/images/BlogImage2.png" />
          <div class="editorsPick__content__card__category">
            <p class="editorsPick__content__card__category-text">
              Fashion
            </p>
          </div>
          <div class="editorsPick__content__card__container">
            <div class="editorsPick__content__card__container-wrapper">
              <date class="editorsPick__content__card__container-date">
                08.08.2021
              </date>
              <h3 class="editorsPick__content__card__container-title">
                Richird Norton photorealistic rendering as real photos
              </h3>
              <p class="editorsPick__content__card__container-text">
                Progressively incentivize cooperative systems through technically sound functionalities. The credibly
                productivate seamless data.
              </p>
            </div>
          </div>
        </div>
      </div>
    </section>
  </main>
</template>

<style lang="scss">
@import '../assets/scss/main';
</style>