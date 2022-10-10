<script>
import { RouterLink, RouterView } from 'vue-router'
import Header from './components/Header.vue';
import Footer from './components/Footer.vue';
import Modal from './components/Modal.vue';
export default {
  data() {
    return {
      collapseModal: false,
      loggedIn: false,
    }
  },
  methods: {
    toggleCollapseModal() {
      this.collapseModal = !this.collapseModal
    },
    login() {
      this.loggedIn = true
      this.collapseModal = false;
    },
    logout() {
      this.loggedIn = false;
      this.$router.push('/')
    }
  },
  components: { Header, Footer, Modal }
}

</script>

<template>
  <Header @logged-out="logout" @collapse-modal="toggleCollapseModal" :loggedIn="loggedIn"> </Header>
  <Modal @logged-in="login" @collapse-modal="toggleCollapseModal" v-if="collapseModal" />
  <RouterView />
  <Footer> </Footer>
</template>

<style lang="scss">
@import 'assets/scss/style';
</style>
