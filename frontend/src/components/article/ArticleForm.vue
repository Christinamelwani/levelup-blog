<script>
import Form from '@/components/general/Form.vue'
import Input from '@/components/general/Input.vue'
import Btn from '@/components/general/Btn.vue'
import Multiselect from '@vueform/multiselect'

export default {
  components: { Input, Btn, Form, Multiselect },
  computed: {
    ready() {
      if (!this.prefilled) {
        return true
      }
      if (this.articleData.title) {
        return true
      }
      return false
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
    articleData: {
      type: Object,
      required: true
    },
    categoryOptions: {
      type: Array,
      required: true
    },
    prefilled: {
      type: Boolean,
      required: true,
      default: false
    }
  }
}
</script>

<template>
  <Form v-slot="slotProps" :submitAction="submitAction" :data="articleData">
    <div class="multicolumn__wrapper">
      <div class="form__column">
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
          :richTextSupport="true"
          :prefilled="prefilled"
          name="content"
          label="Content"
          type="text"
          placeholder="Add content"
          :required="false"
        />
      </div>
      <div class="form__column input__selector__column">
        <h2 class="inputLabel">Tags</h2>
        <Multiselect
          v-if="ready"
          v-model="articleData.categories"
          valueProp="id"
          mode="tags"
          label="name"
          :options="categoryOptions"
        />
      </div>
    </div>
    <Btn type="submit" :isLoading="slotProps.isLoading">{{ submitText }}</Btn>
  </Form>
</template>

<style src="@vueform/multiselect/themes/default.css"></style>
