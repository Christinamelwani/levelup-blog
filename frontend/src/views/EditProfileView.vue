<script>
import { mapState, mapActions } from 'pinia'
import { useAuthStore } from '@/stores/Auth.js'

import Auth from '@/services/Auth.js'
import ActionSlider from '@/components/general/ActionSlider.vue'
import UserForm from '@/components/auth/UserForm.vue'

export default {
  components: { ActionSlider, UserForm },
  data() {
    return {
      editedUserData: {
        email: '',
        password: '',
        name: '',
        slug: ''
      }
    }
  },
  computed: {
    ...mapState(useAuthStore, ['userData'])
  },
  methods: {
    ...mapActions(useAuthStore, ['setUser']),

    async editUserData() {
      const response = await Auth.editSelfData(
        this.userData.slug,
        this.editedUserData
      )
      this.setUser(await Auth.me())
      this.$router.push({ name: 'Profile' })
      this.$notify({
        type: 'success',
        text: `Changes to your profile saved!`
      })
    }
  },
  created() {
    Object.keys(this.editedUserData).forEach((field) => {
      if (field !== 'password') {
        this.editedUserData[field] = this.userData[field]
      }
    })
  }
}
</script>
<template>
  <ActionSlider
    :title="userData.name"
    :subtitle="userData.email"
    :showImage="true"
    :link="{
      text: 'Back to profile',
      destination: { name: 'Profile' }
    }"
  />
  <div class="profile_articles">
    <h1 class="profile_title profile_title--center">Edit Profile</h1>
    <UserForm
      :submitAction="editUserData"
      submitText="Update"
      :userData="editedUserData"
    />
  </div>
</template>
