<script>
import { mapState, mapActions } from 'pinia'
import { useAuthStore } from '@/stores/Auth.js'

import User from '@/services/User.js'
import Auth from '@/services/Auth.js'
import Form from '@/components/general/Form.vue'
import Input from '@/components/general/Input.vue'
import Btn from '@/components/general/Btn.vue'
import myUpload from 'vue-image-crop-upload'

export default {
  components: { Input, Btn, Form, myUpload },
  data() {
    return {
      showAvatarUpload: false
    }
  },
  props: {
    submitAction: {
      type: Function,
      required: true
    },
    submitText: {
      type: String,
      required: true
    },
    userData: {
      type: Object,
      required: true
    }
  },
  computed: {},
  methods: {
    ...mapActions(useAuthStore, ['setUser']),
    async cropSuccess(imgDataUrl, field) {
      this.userData.avatar = this.dataUrlToFile(imgDataUrl, field)
      const response = await User.editWithAvatar(
        this.userData.slug,
        this.userData
      )
      this.userData.avatar_path = (await Auth.me()).avatar_path
      this.userData.avatar = null
      this.$notify({ type: 'success', text: 'Profile successfully updated' })
    },
    dataUrlToFile(dataurl, filename) {
      let arr = dataurl.split(','),
        mime = arr[0].match(/:(.*?);/)[1],
        bstr = atob(arr[1]),
        n = bstr.length,
        u8arr = new Uint8Array(n)
      while (n--) {
        u8arr[n] = bstr.charCodeAt(n)
      }
      return new File([u8arr], filename, { type: mime })
    }
  }
}
</script>

<template>
  <Form v-slot="slotProps" :submitAction="submitAction" :data="userData">
    <div class="actionHeader__image--box">
      <img
        @click="showAvatarUpload = !showAvatarUpload"
        class="actionHeader__image"
        :src="userData.avatar_path"
        alt=""
      />
    </div>
    <my-upload
      field="img"
      @crop-success="cropSuccess"
      v-model="showAvatarUpload"
      :width="300"
      :height="300"
      img-format="png"
      langType="en"
    />
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
    <Btn type="submit" :isLoading="slotProps.isLoading">{{ submitText }}</Btn>
  </Form>
</template>
