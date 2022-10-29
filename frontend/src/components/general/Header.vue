<script>
import { mapState, mapActions } from 'pinia'
import { useModalStore } from '@/stores/Modal.js'
import { useAuthStore } from '@/stores/Auth.js'

export default {
  computed: {
    ...mapState(useModalStore, ['activeModal']),
    ...mapState(useAuthStore, ['isLoggedIn', 'isGuest'])
  },
  methods: {
    ...mapActions(useModalStore, ['openModal']),
    ...mapActions(useAuthStore, ['logout'])
  }
}
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
            <a class="header__nav-item-link">About</a>
          </li>
          <li class="header__nav-item">
            <a class="header__nav-item-link">Articles</a>
          </li>
          <li>
            <ul class="header__nav-group" v-if="isGuest">
              <li class="header__nav-item" @click="openModal('Log In')">
                <a
                  class="header__nav-item-link"
                  :class="{
                    'header__nav-item-link--active': activeModal === 'Log In'
                  }"
                  >Login</a
                >
              </li>
              <li class="header__nav-item" @click="openModal('Register')">
                <a
                  class="header__nav-item-link"
                  :class="{
                    'header__nav-item-link--active': activeModal === 'Register'
                  }"
                  >Register</a
                >
              </li>
            </ul>
            <ul class="header__nav-group" v-if="isLoggedIn">
              <li class="header__nav-item">
                <RouterLink
                  class="header__nav-item-link"
                  :to="{ name: 'Profile' }"
                  >Profile</RouterLink
                >
              </li>
              <li class="header__nav-item" @click="logout">
                <a class="header__nav-item-link">Logout</a>
              </li>
            </ul>
          </li>
        </ul>
      </nav>
    </div>
  </header>
</template>
