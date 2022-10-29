<script>
import Form from '@/components/general/Form.vue'
import Input from '@/components/general/Input.vue'
import Btn from '@/components/general/Btn.vue'

export default {
  components: { Input, Btn, Form },
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
  }
}
</script>

<template>
  <Form v-slot="slotProps" :submitAction="submitAction" :data="userData">
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
