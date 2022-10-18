<script>
import Header from '@/components/Header.vue';
import Footer from '@/components/Footer.vue';
import ModalView from './components/ModalView.vue';

export default {
  components: { Header, Footer, ModalView },
}

</script>

<template>
  <Header> </Header>
  <ModalView />
  <RouterView />
  <Footer> </Footer>
</template>

<style lang="scss">
@import 'assets/scss/style';
</style>
