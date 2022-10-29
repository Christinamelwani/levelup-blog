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
    articleData: {
      type: Object,
      required: true
    }
  }
}
</script>

<template>
  <Form v-slot="slotProps" :submitAction="submitAction" :data="articleData">
    <Input
      v-model="articleData.title"
      name="title"
      label="Title"
      type="text"
      placeholder="Set title"
      :required="false"
    />
    <Input
      v-model="articleData.content"
      name="content"
      label="Content"
      type="text"
      :textarea="true"
      placeholder="Add content"
      :required="false"
    />
    <Btn type="submit" :isLoading="slotProps.isLoading">{{ submitText }}</Btn>
  </Form>
</template>
