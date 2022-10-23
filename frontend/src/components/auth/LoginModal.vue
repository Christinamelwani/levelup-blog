<script>
import { mapActions } from 'pinia'
import { useModalStore } from '@/stores/Modal.js'
import Auth from '@/services/Auth.js'
import Modal from '@/components/general/Modal.vue'
import Input from '@/components/general/Input.vue'
import Btn from '@/components/general/Btn.vue'
import Form from '@/components/general/Form.vue'

export default {
  components: { Modal, Input, Btn, Form },
  data() {
    return {
      credentials: {
        email: '',
        password: ''
      }
    }
  },
  methods: {
    ...mapActions(useModalStore, ['openModal', 'closeModal']),

    async login() {
      const accessToken = await Auth.login(this.credentials)
      localStorage.setItem('access_token', accessToken)
      this.$router.push({ name: 'Profile' })
      this.closeModal()
    }
  }
}
</script>

<template>
  <Modal title="Log In">
    <div class="modal_content">
      <Form :submitAction="login" :data="credentials" v-slot="slotProps">
        <Input
          v-model="credentials.email"
          name="email"
          label="Email"
          type="email"
          placeholder="example@mail.com"
          :required="true"
        />
        <Input
          v-model="credentials.password"
          name="password"
          label="Password"
          type="password"
          placeholder="Cartoon-Duck-14-Coffee-Glvs"
          :required="true"
        />
        <Btn type="submit" :isLoading="slotProps.isLoading">Login</Btn>
      </Form>
    </div>
    <div class="modal_footer">
      <a class="modal_link" @click="openModal('Register')"
        >Don't have an account yet? Sign up</a
      >
    </div>
  </Modal>
</template>
