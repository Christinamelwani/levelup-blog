<script setup>
import { RouterLink, RouterView } from 'vue-router'
import Header from './components/Header.vue';
import Footer from './components/Footer.vue';
</script>

<template>
<<<<<<< HEAD
  <Header> </Header>
  <RouterView />
  <Footer> </Footer>
=======
  <header class="header">
    <div class="header__inner">
      <h1 class="header__title">
        <RouterLink to="/" class="header__title-link">LevelUp Blog</RouterLink>
      </h1>
      <nav class="header__nav">
        <ul class="header__nav-list">
          <li class="header__nav-item">
            <RouterLink class="header__nav-item-link" to="/">Home</RouterLink>
          </li>
          <li class="header__nav-item">
            <RouterLink class="header__nav-item-link" to="/about">About</RouterLink>
          </li>
          <li class="header__nav-item">
            <RouterLink class="header__nav-item-link" to="/articles">Articles</RouterLink>
          </li>
        </ul>
      </nav>
    </div>
  </header>
  <RouterView />
  <footer class="footer">
    <section class="footer__main">
      <div class="footer__col">
        <div class="footer__list">
          <h3 class="footer__list__header">Contact the Publisher</h3>
          <p class="footer__list__text">mike@runo.com</p>
          <p class="footer__list__text">+944 450 904 505</p>
        </div>
        <div class="footer__list">
          <h3 class="footer__list__header">Explore</h3>
          <p class="footer__list__text">About</p>
          <p class="footer__list__text">Partners</p>
          <p class="footer__list__text">Job Opportunities</p>
          <p class="footer__list__text">Advertise</p>
          <p class="footer__list__text">Membership</p>
        </div>
      </div>
      <div class="footer__col">
        <div class="footer__list">
          <h3 class="footer__list__header">Headquarters</h3>
          <p class="footer__list__text">191 Middleville Road,
            NY 1001, Sydney
            Australia</p>
        </div>
        <div class="footer__list">
          <h3 class="footer__list__header">Headquarters</h3>
          <p class="footer__list__text">191 Middleville Road,
            NY 1001, Sydney
            Australia</p>
        </div>
      </div>
    </section>
    <section class="footer__bottom">
      <h3 class="footer__bottom-text">
        2021 | RUNO Publisher Studio
      </h3>
      <h3 class="footer__bottom-text">
        Subscribe now
      </h3>
    </section>
  </footer>
>>>>>>> 75217c4 (Footer done)
</template>

<style lang="scss">
<<<<<<< HEAD
@import 'assets/scss/style';
=======
<<<<<<< HEAD
@import 'assets/scss/main.scss';
=======
@import 'assets/scss/style';
>>>>>>> 29ceee2 (Made header and slider responsive, still figuring out the rest)
>>>>>>> e4b09d5 (Made header and slider responsive, still figuring out the rest)
</style>
