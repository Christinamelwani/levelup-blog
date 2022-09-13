<script setup></script>

<template>
  <main>
    <article class="mainArticle">
      <div class="mainArticle__inner">
        <ul class="mainArticle__categories">
          <li class="mainArticle__category">
            <RouterLink to="/" class="mainArticle__category-link">Category</RouterLink>
          </li>
        </ul>
        <h2 class="mainArticle__heading">Richird Norton photorealistic rendering as real photos</h2>
        <p class="mainArticle__content">
          <time class="mainArticle__content-time">10:00</time>
          <span class="mainArticle__content-divider"></span>
          <span class="mainArticle__content-text">Progressively incentivize cooperative systems through technically sound functionalities. The credibly productivate seamless data.</span>
        </p>
      </div>
    </article>

    <section class="section">
      <div class="section__inner">
        <h2 class="section__heading">Popular topics</h2>
        <div class="section__categories">
          <ul class="section__categories-list">
            <li class="section__categories-item">
              <RouterLink to="/" class="section__categories-link">All</RouterLink>
            </li>
            <li class="section__categories-item">
              <RouterLink to="/" class="section__categories-link">Adventure</RouterLink>
            </li>
            <li class="section__categories-item">
              <RouterLink to="/" class="section__categories-link">Travel</RouterLink>
            </li>
            <li class="section__categories-item">
              <RouterLink to="/" class="section__categories-link">Tech</RouterLink>
            </li>
            <li class="section__categories-item--last">
              <RouterLink to="/" class="section__categories-link section__categories-link">View all</RouterLink>
            </li>
          </ul>
        </div>
        <div class="section__articles">
          <article class="article">
            <RouterLink to="/" class="article__link">
              <ul class="article__categories">
                <li class="article__category">
                  <RouterLink to="/" class="article__category-link">Category</RouterLink>
                </li>
              </ul>
              <img src="https://loremflickr.com/420/350" alt="Title" class="article__image">
              <div class="article__content">
                <time class="article__time">10:00</time>
                <h3 class="article__heading">Richird Norton photorealistic rendering as real photos</h3>
                <p class="article__text">
                  Progressively incentivize cooperative systems through technically sound
                  functionalities. The credibly productivate seamless data.
                </p>
              </div>
            </RouterLink>
          </article>
          <article class="article">
            <RouterLink to="/" class="article__link">
              <ul class="article__categories">
                <li class="article__category">
                  <RouterLink to="/" class="article__category-link">Category</RouterLink>
                </li>
              </ul>
              <img src="https://loremflickr.com/420/350" alt="Title" class="article__image">
              <div class="article__content">
                <time class="article__time">10:00</time>
                <h3 class="article__heading">Richird Norton photorealistic rendering as real photos</h3>
                <p class="article__text">
                  Progressively incentivize cooperative systems through technically sound
                  functionalities. The credibly productivate seamless data.
                </p>
              </div>
            </RouterLink>
          </article>
          <article class="article">
            <RouterLink to="/" class="article__link">
              <ul class="article__categories">
                <li class="article__category">
                  <RouterLink to="/" class="article__category-link">Category</RouterLink>
                </li>
              </ul>
              <img src="https://loremflickr.com/420/350" alt="Title" class="article__image">
              <div class="article__content">
                <time class="article__time">10:00</time>
                <h3 class="article__heading">Richird Norton photorealistic rendering as real photos</h3>
                <p class="article__text">
                  Progressively incentivize cooperative systems through technically sound
                  functionalities. The credibly productivate seamless data.
                </p>
              </div>
            </RouterLink>
          </article>
        </div>
      </div>
    </section>
  </main>
</template>
