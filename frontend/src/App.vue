<script setup>
import { RouterLink, RouterView } from 'vue-router'
<<<<<<< HEAD
import Header from './components/Header.vue';
import Footer from './components/Footer.vue';
</script>

<template>
  <Header> </Header>
  <RouterView />
  <Footer> </Footer>
=======
</script>

<template>
  <main>
    <header class="header">
      <div class="header__inner">
        <h1 class="header__title">
          <RouterLink to="/" class="header__title-link"
            >LevelUp Blog</RouterLink
          >
        </h1>
        <nav class="header__nav">
          <ul class="header__nav-list">
            <li class="header__nav-item">
              <RouterLink to="/" class="header__nav-item-link">Home</RouterLink>
            </li>
            <li class="header__nav-item">
              <RouterLink to="/about" class="header__nav-item-link"
                >About</RouterLink
              >
            </li>
          </ul>
        </nav>
      </div>
    </header>
    <RouterView />

    <footer class="footer">
      <div class="footer__upper">
        <div class="footer__inner footer__inner--grid">
          <div class="footer__section">
            <h4 class="footer__section-title">Contact the Publisher</h4>
            <ul class="footer__section-list">
              <li class="footer__section-item">
                <RouterLink to="/" class="footer__section-link"
                  >Link</RouterLink
                >
              </li>
              <li class="footer__section-item">
                <RouterLink to="/" class="footer__section-link"
                  >Link</RouterLink
                >
              </li>
              <li class="footer__section-item">
                <RouterLink to="/" class="footer__section-link"
                  >Link</RouterLink
                >
              </li>
              <li class="footer__section-item">
                <RouterLink to="/" class="footer__section-link"
                  >Link</RouterLink
                >
              </li>
            </ul>
          </div>
          <div class="footer__section">
            <h4 class="footer__section-title">Explorate</h4>
            <ul class="footer__section-list">
              <li class="footer__section-item">
                <RouterLink to="/" class="footer__section-link"
                  >Link</RouterLink
                >
              </li>
              <li class="footer__section-item">
                <RouterLink to="/" class="footer__section-link"
                  >Link</RouterLink
                >
              </li>
              <li class="footer__section-item">
                <RouterLink to="/" class="footer__section-link"
                  >Link</RouterLink
                >
              </li>
              <li class="footer__section-item">
                <RouterLink to="/" class="footer__section-link"
                  >Link</RouterLink
                >
              </li>
            </ul>
          </div>
          <div class="footer__section">
            <h4 class="footer__section-title">Headquarter</h4>
            <ul class="footer__section-list">
              <li class="footer__section-item">
                <RouterLink to="/" class="footer__section-link"
                  >Link</RouterLink
                >
              </li>
              <li class="footer__section-item">
                <RouterLink to="/" class="footer__section-link"
                  >Link</RouterLink
                >
              </li>
              <li class="footer__section-item">
                <RouterLink to="/" class="footer__section-link"
                  >Link</RouterLink
                >
              </li>
              <li class="footer__section-item">
                <RouterLink to="/" class="footer__section-link"
                  >Link</RouterLink
                >
              </li>
            </ul>
          </div>
          <div class="footer__section">
            <h4 class="footer__section-title">Headquarter</h4>
            <ul class="footer__section-list">
              <li class="footer__section-item">
                <RouterLink to="/" class="footer__section-link"
                  >Link</RouterLink
                >
              </li>
              <li class="footer__section-item">
                <RouterLink to="/" class="footer__section-link"
                  >Link</RouterLink
                >
              </li>
              <li class="footer__section-item">
                <RouterLink to="/" class="footer__section-link"
                  >Link</RouterLink
                >
              </li>
              <li class="footer__section-item">
                <RouterLink to="/" class="footer__section-link"
                  >Link</RouterLink
                >
              </li>
            </ul>
          </div>
        </div>
      </div>
      <div class="footer__bottom">
        <div class="footer__inner footer__inner--bottom">
          <p class="footer__bottom-text footer__bottom-text--copyright">
            2021 | RUNO Publisher Studio
          </p>
          <p class="footer__bottom-text footer__bottom-text--subscribe">
            Subscribe
          </p>
        </div>
      </div>
    </footer>
  </main>
>>>>>>> e8d1606 (Static website tweaks)
</template>

<style lang="scss">
@import 'assets/scss/style';
</style>
