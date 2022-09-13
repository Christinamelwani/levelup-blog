<script setup>
import { RouterLink, RouterView } from "vue-router";
</script>

<template>
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
</template>

<style lang="scss">
@import 'assets/scss/main';
</style>