<script>
import { mapActions } from 'pinia'
import { useAuthStore } from '@/stores/Auth.js'

import Form from '@/components/general/Form.vue'
import Input from '@/components/general/Input.vue'
import Btn from '@/components/general/Btn.vue'
import myUpload from 'vue-image-crop-upload'
import dataUrlToFile from '@/helpers/dataUrlToFile'

export default {
  components: { Input, Btn, Form, myUpload },
  data() {
    return {
      showAvatarUpload: false,
      uploadedAvatar: ''
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
  computed: {
    imagePreview() {
      return (
        this.uploadedAvatar ||
        this.userData.avatar_path ||
        'https://www.gravatar.com/avatar/?s=60&d=mm'
      )
    }
  },
  methods: {
    ...mapActions(useAuthStore, ['setUser']),
    async cropSuccess(imgDataUrl, field) {
      this.uploadedAvatar = imgDataUrl
      this.userData.avatar = dataUrlToFile(imgDataUrl, field)
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
        :src="imagePreview"
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
