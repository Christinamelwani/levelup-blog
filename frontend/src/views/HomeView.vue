<script setup>
import Slider from '../components/Slider.vue';
import CategorySelector from '../components/CategorySelector.vue';
import ArticleCard from '../components/ArticleCard.vue';
import HighlightedArticleCard from "../components/HighlightedArticleCard.vue"
</script>
<template>
<<<<<<< HEAD
  <main>
    <Slider class="slider-home" />
    <section class=" blogCards">
      <div class="blogCards__header">
        Popular topics
      </div>
      <CategorySelector />
      <div class="blogCards__content">
        <ArticleCard v-for="index in 8" @click="$router.push(`/article/${index}`)" />
      </div>
    </section>
    <section class="editorsPick">
      <h1 class="editorsPick__header">
        Editor's Pick
      </h1>
      <div class="editorsPick__content">
        <HighlightedArticleCard v-for="index in 3" />
      </div>
    </section>
  </main>
=======
  <div class="page--home">
    <article class="mainArticle">
      <div class="mainArticle__inner">
        <ul class="mainArticle__categories">
          <li class="mainArticle__category">
            <a href="#" class="article__category-link">Category</a>
          </li>
        </ul>
        <h2 class="mainArticle__heading">
          <a href="" class="mainArticle__heading-link"
            >Richird Norton photorealistic rendering as real photos</a
          >
        </h2>
        <p class="mainArticle__content">
          <time class="mainArticle__content-time">10:00</time>
          <span class="mainArticle__content-text"
            >Progressively incentivize cooperative systems through technically
            sound functionalities. The credibly productivate seamless
            data.</span
          >
        </p>
      </div>
    </article>
    <div class="section">
      <div class="section__inner">
        <h2 class="section__heading">Popular topics</h2>
        <div class="section__categories">
          <ul class="section__categories-list">
            <li class="section__categories-item">
              <RouterLink
                to="/"
                class="section__categories-link section__categories-link--active"
                >All
              </RouterLink>
            </li>
            <li class="section__categories-item">
              <RouterLink to="/" class="section__categories-link"
                >Adventure</RouterLink
              >
            </li>
            <li class="section__categories-item">
              <RouterLink to="/" class="section__categories-link"
                >Travel</RouterLink
              >
            </li>
            <li class="section__categories-item">
              <RouterLink to="/" class="section__categories-link"
                >Fashion</RouterLink
              >
            </li>
            <li class="section__categories-item">
              <RouterLink to="/" class="section__categories-link"
                >Technology</RouterLink
              >
            </li>
            <li class="section__categories-item">
              <RouterLink to="/" class="section__categories-link"
                >Branding</RouterLink
              >
            </li>
            <li class="section__categories-item section__categories-item--last">
              <RouterLink to="/" class="section__categories-link"
                >View all</RouterLink
              >
            </li>
          </ul>
        </div>
        <div class="section__articles">
          <article class="article">
            <div class="article__imagebox">
              <RouterLink to="" class="article__imagebox-link">
                <img
                  src="https://loremflickr.com/420/350"
                  alt="alt for image"
                  class="article__image"
                />
              </RouterLink>
              <ul class="article__categories">
                <li class="article__category">
                  <a href="#" class="article__category-link">Category</a>
                </li>
              </ul>
            </div>
            <div class="article__content">
              <div class="article__content-text">
                <time class="article__content-time">08.08.2022.</time>
                <h3 class="article__content-title">
                  <a href="" class="article__content-title-link"
                    >Article title</a
                  >
                </h3>
                <p class="article__content-desc">
                  Lorem ipsum, dolor sit amet consectetur adipisicing elit.
                  Nobis, labore assumenda! Quaerat voluptates ullam culpa eos
                  neque doloremque sint sapiente?
                </p>
              </div>
              <div class="articleAuthor article__content-author">
                <a href="" class="articleAuthor__image-box">
                  <img
                    class="articleAuthor__image"
                    src="https://loremflickr.com/50/50"
                    alt=""
                  />
                </a>
                <div class="articleAuthor__text">
                  <p class="articleAuthor__name">
                    <a href="" class="articleAuthor__name-link">Name Surname</a>
                  </p>
                  <p class="articleAuthor__position">Company position</p>
                </div>
              </div>
            </div>
          </article>
          <article class="article">
            <div class="article__imagebox">
              <RouterLink to="" class="article__imagebox-link">
                <img
                  src="https://loremflickr.com/420/350"
                  alt="alt for image"
                  class="article__image"
                />
              </RouterLink>
              <ul class="article__categories">
                <li class="article__category">
                  <a href="#" class="article__category-link">Category</a>
                </li>
              </ul>
            </div>
            <div class="article__content">
              <div class="article__content-text">
                <time class="article__content-time">08.08.2022.</time>
                <h3 class="article__content-title">
                  <a href="" class="article__content-title-link"
                    >Article title</a
                  >
                </h3>
                <p class="article__content-desc">
                  Lorem ipsum, dolor sit amet consectetur adipisicing elit.
                  Nobis, labore assumenda! Quaerat voluptates ullam culpa eos
                  neque doloremque sint sapiente?
                </p>
              </div>
              <div class="articleAuthor article__content-author">
                <a href="" class="articleAuthor__image-box">
                  <img
                    class="articleAuthor__image"
                    src="https://loremflickr.com/50/50"
                    alt=""
                  />
                </a>
                <div class="articleAuthor__text">
                  <p class="articleAuthor__name">
                    <a href="" class="articleAuthor__name-link">Name Surname</a>
                  </p>
                  <p class="articleAuthor__position">Company position</p>
                </div>
              </div>
            </div>
          </article>
          <article class="article">
            <div class="article__imagebox">
              <RouterLink to="" class="article__imagebox-link">
                <img
                  src="https://loremflickr.com/420/350"
                  alt="alt for image"
                  class="article__image"
                />
              </RouterLink>
              <ul class="article__categories">
                <li class="article__category">
                  <a href="#" class="article__category-link">Category</a>
                </li>
              </ul>
            </div>
            <div class="article__content">
              <div class="article__content-text">
                <time class="article__content-time">08.08.2022.</time>
                <h3 class="article__content-title">
                  <a href="" class="article__content-title-link"
                    >Article title</a
                  >
                </h3>
                <p class="article__content-desc">
                  Lorem ipsum, dolor sit amet consectetur adipisicing elit.
                  Nobis, labore assumenda! Quaerat voluptates ullam culpa eos
                  neque doloremque sint sapiente?
                </p>
              </div>
              <div class="articleAuthor article__content-author">
                <a href="" class="articleAuthor__image-box">
                  <img
                    class="articleAuthor__image"
                    src="https://loremflickr.com/50/50"
                    alt=""
                  />
                </a>
                <div class="articleAuthor__text">
                  <p class="articleAuthor__name">
                    <a href="" class="articleAuthor__name-link">Name Surname</a>
                  </p>
                  <p class="articleAuthor__position">Company position</p>
                </div>
              </div>
            </div>
          </article>
          <article class="article">
            <div class="article__imagebox">
              <RouterLink to="" class="article__imagebox-link">
                <img
                  src="https://loremflickr.com/420/350"
                  alt="alt for image"
                  class="article__image"
                />
              </RouterLink>
              <ul class="article__categories">
                <li class="article__category">
                  <a href="#" class="article__category-link">Category</a>
                </li>
              </ul>
            </div>
            <div class="article__content">
              <div class="article__content-text">
                <time class="article__content-time">08.08.2022.</time>
                <h3 class="article__content-title">
                  <a href="" class="article__content-title-link"
                    >Article title</a
                  >
                </h3>
                <p class="article__content-desc">
                  Lorem ipsum, dolor sit amet consectetur adipisicing elit.
                  Nobis, labore assumenda! Quaerat voluptates ullam culpa eos
                  neque doloremque sint sapiente?
                </p>
              </div>
              <div class="articleAuthor article__content-author">
                <a href="" class="articleAuthor__image-box">
                  <img
                    class="articleAuthor__image"
                    src="https://loremflickr.com/50/50"
                    alt=""
                  />
                </a>
                <div class="articleAuthor__text">
                  <p class="articleAuthor__name">
                    <a href="" class="articleAuthor__name-link">Name Surname</a>
                  </p>
                  <p class="articleAuthor__position">Company position</p>
                </div>
              </div>
            </div>
          </article>
          <article class="article">
            <div class="article__imagebox">
              <RouterLink to="" class="article__imagebox-link">
                <img
                  src="https://loremflickr.com/420/350"
                  alt="alt for image"
                  class="article__image"
                />
              </RouterLink>
              <ul class="article__categories">
                <li class="article__category">
                  <a href="#" class="article__category-link">Category</a>
                </li>
              </ul>
            </div>
            <div class="article__content">
              <div class="article__content-text">
                <time class="article__content-time">08.08.2022.</time>
                <h3 class="article__content-title">
                  <a href="" class="article__content-title-link"
                    >Article title</a
                  >
                </h3>
                <p class="article__content-desc">
                  Lorem ipsum, dolor sit amet consectetur adipisicing elit.
                  Nobis, labore assumenda! Quaerat voluptates ullam culpa eos
                  neque doloremque sint sapiente?
                </p>
              </div>
              <div class="articleAuthor article__content-author">
                <a href="" class="articleAuthor__image-box">
                  <img
                    class="articleAuthor__image"
                    src="https://loremflickr.com/50/50"
                    alt=""
                  />
                </a>
                <div class="articleAuthor__text">
                  <p class="articleAuthor__name">
                    <a href="" class="articleAuthor__name-link">Name Surname</a>
                  </p>
                  <p class="articleAuthor__position">Company position</p>
                </div>
              </div>
            </div>
          </article>
          <article class="article">
            <div class="article__imagebox">
              <RouterLink to="" class="article__imagebox-link">
                <img
                  src="https://loremflickr.com/420/350"
                  alt="alt for image"
                  class="article__image"
                />
              </RouterLink>
              <ul class="article__categories">
                <li class="article__category">
                  <a href="#" class="article__category-link">Category</a>
                </li>
              </ul>
            </div>
            <div class="article__content">
              <div class="article__content-text">
                <time class="article__content-time">08.08.2022.</time>
                <h3 class="article__content-title">
                  <a href="" class="article__content-title-link"
                    >Article title</a
                  >
                </h3>
                <p class="article__content-desc">
                  Lorem ipsum, dolor sit amet consectetur adipisicing elit.
                  Nobis, labore assumenda! Quaerat voluptates ullam culpa eos
                  neque doloremque sint sapiente?
                </p>
              </div>
              <div class="articleAuthor article__content-author">
                <a href="" class="articleAuthor__image-box">
                  <img
                    class="articleAuthor__image"
                    src="https://loremflickr.com/50/50"
                    alt=""
                  />
                </a>
                <div class="articleAuthor__text">
                  <p class="articleAuthor__name">
                    <a href="" class="articleAuthor__name-link">Name Surname</a>
                  </p>
                  <p class="articleAuthor__position">Company position</p>
                </div>
              </div>
            </div>
          </article>
          <article class="article">
            <div class="article__imagebox">
              <RouterLink to="" class="article__imagebox-link">
                <img
                  src="https://loremflickr.com/420/350"
                  alt="alt for image"
                  class="article__image"
                />
              </RouterLink>
              <ul class="article__categories">
                <li class="article__category">
                  <a href="#" class="article__category-link">Category</a>
                </li>
              </ul>
            </div>
            <div class="article__content">
              <div class="article__content-text">
                <time class="article__content-time">08.08.2022.</time>
                <h3 class="article__content-title">
                  <a href="" class="article__content-title-link"
                    >Article title</a
                  >
                </h3>
                <p class="article__content-desc">
                  Lorem ipsum, dolor sit amet consectetur adipisicing elit.
                  Nobis, labore assumenda! Quaerat voluptates ullam culpa eos
                  neque doloremque sint sapiente?
                </p>
              </div>
              <div class="articleAuthor article__content-author">
                <a href="" class="articleAuthor__image-box">
                  <img
                    class="articleAuthor__image"
                    src="https://loremflickr.com/50/50"
                    alt=""
                  />
                </a>
                <div class="articleAuthor__text">
                  <p class="articleAuthor__name">
                    <a href="" class="articleAuthor__name-link">Name Surname</a>
                  </p>
                  <p class="articleAuthor__position">Company position</p>
                </div>
              </div>
            </div>
          </article>
          <article class="article">
            <div class="article__imagebox">
              <RouterLink to="" class="article__imagebox-link">
                <img
                  src="https://loremflickr.com/420/350"
                  alt="alt for image"
                  class="article__image"
                />
              </RouterLink>
              <ul class="article__categories">
                <li class="article__category">
                  <a href="#" class="article__category-link">Category</a>
                </li>
              </ul>
            </div>
            <div class="article__content">
              <div class="article__content-text">
                <time class="article__content-time">08.08.2022.</time>
                <h3 class="article__content-title">
                  <a href="" class="article__content-title-link"
                    >Article title</a
                  >
                </h3>
                <p class="article__content-desc">
                  Lorem ipsum, dolor sit amet consectetur adipisicing elit.
                  Nobis, labore assumenda! Quaerat voluptates ullam culpa eos
                  neque doloremque sint sapiente?
                </p>
              </div>
              <div class="articleAuthor article__content-author">
                <a href="" class="articleAuthor__image-box">
                  <img
                    class="articleAuthor__image"
                    src="https://loremflickr.com/50/50"
                    alt=""
                  />
                </a>
                <div class="articleAuthor__text">
                  <p class="articleAuthor__name">
                    <a href="" class="articleAuthor__name-link">Name Surname</a>
                  </p>
                  <p class="articleAuthor__position">Company position</p>
                </div>
              </div>
            </div>
          </article>
        </div>
      </div>
    </div>
    <section class="relatedList relatedList--home">
      <div class="relatedList__inner">
        <h2 class="relatedList__heading">
          <h3 class="relatedList__heading">Editor’s Pick</h3>
        </h2>
        <div class="relatedList__articles">
          <article class="article">
            <div class="article__imagebox">
              <RouterLink to="" class="article__imagebox-link">
                <img
                  src="https://loremflickr.com/420/350"
                  alt="alt for image"
                  class="article__image"
                />
              </RouterLink>
              <ul class="article__categories">
                <li class="article__category">
                  <a href="#" class="article__category-link">Category</a>
                </li>
              </ul>

              <div class="article__content-text article__content-text--related">
                <time class="article__content-time">08.08.2022.</time>
                <h3 class="article__content-title">
                  <a
                    href=""
                    class="article__content-title-link article__content-title-link--related"
                    >Article title</a
                  >
                </h3>
                <p class="article__content-desc">
                  Lorem ipsum, dolor sit amet consectetur adipisicing elit.
                  Nobis, labore assumenda! Quaerat voluptates ullam culpa eos
                  neque doloremque sint sapiente?
                </p>
              </div>
            </div>
          </article>

          <article class="article">
            <div class="article__imagebox">
              <RouterLink to="" class="article__imagebox-link">
                <img
                  src="https://loremflickr.com/420/350"
                  alt="alt for image"
                  class="article__image"
                />
              </RouterLink>
              <ul class="article__categories">
                <li class="article__category">
                  <a href="#" class="article__category-link">Category</a>
                </li>
              </ul>

              <div class="article__content-text article__content-text--related">
                <time class="article__content-time">08.08.2022.</time>
                <h3 class="article__content-title">
                  <a
                    href=""
                    class="article__content-title-link article__content-title-link--related"
                    >Article title</a
                  >
                </h3>
                <p class="article__content-desc">
                  Lorem ipsum, dolor sit amet consectetur adipisicing elit.
                  Nobis, labore assumenda! Quaerat voluptates ullam culpa eos
                  neque doloremque sint sapiente?
                </p>
              </div>
            </div>
          </article>

          <article class="article">
            <div class="article__imagebox">
              <RouterLink to="" class="article__imagebox-link">
                <img
                  src="https://loremflickr.com/420/350"
                  alt="alt for image"
                  class="article__image"
                />
              </RouterLink>
              <ul class="article__categories">
                <li class="article__category">
                  <a href="#" class="article__category-link">Category</a>
                </li>
              </ul>

              <div class="article__content-text article__content-text--related">
                <time class="article__content-time">08.08.2022.</time>
                <h3 class="article__content-title">
                  <a
                    href=""
                    class="article__content-title-link article__content-title-link--related"
                    >Article title</a
                  >
                </h3>
                <p class="article__content-desc">
                  Lorem ipsum, dolor sit amet consectetur adipisicing elit.
                  Nobis, labore assumenda! Quaerat voluptates ullam culpa eos
                  neque doloremque sint sapiente?
                </p>
              </div>
            </div>
          </article>
        </div>
      </div>
    </section>
  </div>
>>>>>>> e8d1606 (Static website tweaks)
</template>
