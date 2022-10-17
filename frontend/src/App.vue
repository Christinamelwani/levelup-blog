<script>
import Header from '@/components/Header.vue';
import Footer from '@/components/Footer.vue';
import LoginModal from '@/components/LoginModal.vue';
import RegisterModal from '@/components/RegisterModal.vue';

export default {
  data() {
    return {
      modalType: "",
      loggedIn: false,
    }
  },
  methods: {
    collapseModal(type) {
      this.modalType = type;
    },
    login() {
      this.loggedIn = true
      console.log(this.loggedIn)
      this.collapseModal = false;
    },
    logout() {
      this.loggedIn = false;
      this.$router.push('/')
    }
  },
  components: { Header, Footer, LoginModal, RegisterModal }
}

</script>

<template>
  <Header @logged-out="logout" @collapse-login="collapseModal('Log In')" @collapse-register="collapseModal('Register')"
    :parentLoggedIn="loggedIn"> </Header>
  <LoginModal @logged-in="login" @collapse-modal="toggleCollapseModal" v-if="modalType === 'Log In'" />
  <RegisterModal @logged-in="login" @collapse-modal="toggleCollapseModal" v-if="modalType === 'Register'" />
  <RouterView />
  <Footer> </Footer>
</template>

<style lang="scss">
@import 'assets/scss/style';
</style>
