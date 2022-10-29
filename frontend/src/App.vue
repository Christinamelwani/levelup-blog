<script>
import Header from '@/components/general/Header.vue'
import Footer from '@/components/general/Footer.vue'
import ModalView from '@/components/general/ModalView.vue'

export default {
  components: { Header, Footer, ModalView }
}
</script>

<template>
  <Header> </Header>
  <ModalView />
  <RouterView />
  <Footer> </Footer>
  <notifications position="bottom right" />
</template>

<style lang="scss">
@import 'assets/scss/style';
</style>
