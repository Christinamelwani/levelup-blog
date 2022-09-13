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
        <h2 class="mainArticle__heading">Lorem ipsum dolor.</h2>
        <p class="mainArticle__content">
          <time class="mainArticle__content-time">10:00</time>
          <span class="mainArticle__content-divider"></span>
          <span class="mainArticle__content-text">Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam, quae.</span>
        </p>
      </div>
    </article>
  </main>
</template>
