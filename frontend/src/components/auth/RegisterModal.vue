<script>
import { mapActions } from 'pinia'
import { useModalStore } from '@/stores/Modal.js'
import Auth from '@/services/Auth.js'
import Modal from '@/components/general/Modal.vue'
import UserForm from '@/components/auth/UserForm.vue'

export default {
  components: { Modal, UserForm },
  data() {
    return {
      userData: {
        email: '',
        password: '',
        name: '',
        slug: ''
      }
    }
  },
  methods: {
    ...mapActions(useModalStore, ['closeModal']),

    async register() {
      const response = await Auth.register(this.userData)
      localStorage.setItem('access_token', response.token)
      this.$router.push({ name: 'Profile' })
      this.closeModal()
    }
  }
}
</script>

<template>
  <Modal title="Register">
    <div class="modal_content">
      <UserForm
        :submitAction="register"
        submitText="Register"
        :userData="userData"
      />
    </div>
    <div class="modal_footer"></div>
  </Modal>
</template>
