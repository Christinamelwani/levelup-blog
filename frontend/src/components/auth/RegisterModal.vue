<script>
import { mapActions } from 'pinia'
import { useModalStore } from '@/stores/Modal.js'
import { useErrorStore } from '@/stores/Errors.js'
import Auth from '@/services/Auth.js'
import Modal from '@/components/general/Modal.vue'
import Input from '@/components/general/Input.vue'
import Btn from '@/components/general/Btn.vue'
import Form from '@/components/general/Form.vue'

export default {
  components: { Modal, Input, Btn, Form },
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
    ...mapActions(useErrorStore, ['setErrors', 'deleteError', 'clearErrors']),
    ...mapActions(useModalStore, ['openModal', 'closeModal']),

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
    <div class="modal_content" @submit.prevent="register">
      <Form :submitAction="register" :data="userData" v-slot="slotProps">
        <Input
          v-model="userData.name"
          name="name"
          label="Name"
          type="text"
          placeholder="Example Smith"
          :required="false"
        />
        <Input
          v-model="userData.slug"
          name="slug"
          label="Nickname"
          type="text"
          placeholder="Exys"
          :required="false"
        />
        <Input
          v-model="userData.email"
          name="email"
          label="Email"
          type="email"
          placeholder="example@mail.com"
          :required="false"
        />
        <Input
          v-model="userData.password"
          name="password"
          label="Password"
          type="password"
          placeholder="We8@0123ndj"
          :required="false"
        />
        <Btn type="submit" :isLoading="slotProps.isLoading">Register</Btn>
      </Form>
    </div>
    <div class="modal_footer">
      <a @click="openModal('Log In')" class="modal_link"
        >Already have an account? Log In</a
      >
    </div>
  </Modal>
</template>
