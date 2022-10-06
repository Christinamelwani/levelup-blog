<script>
import { RouterLink, RouterView } from 'vue-router'
import Header from './components/Header.vue';
import Footer from './components/Footer.vue';
import Modal from './components/Modal.vue';
export default {
  data() {
    return {
      collapseModal: false
    }
  },
  methods: {
    toggleCollapseModal() {
      this.collapseModal = !this.collapseModal
    }
  },
  components: { Header, Footer, Modal }
}

</script>

<template>
  <Header @collapse-modal="toggleCollapseModal"> </Header>
  <Modal @collapse-modal="toggleCollapseModal" v-if="collapseModal" />
  <RouterView />
  <Footer> </Footer>
</template>

<style lang="scss">
@import 'assets/scss/style';
</style>
