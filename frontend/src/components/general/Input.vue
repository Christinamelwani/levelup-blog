<script>
import { mapState } from 'pinia'
import { useErrorStore } from '@/stores/Errors.js'
import { QuillEditor } from '@vueup/vue-quill'
import '@vueup/vue-quill/dist/vue-quill.snow.css'

export default {
  components: {
    QuillEditor
  },
  props: {
    modelValue: {
      type: String,
      required: true
    },
    name: {
      type: String,
      required: true
    },
    label: {
      type: String,
      required: true
    },
    type: {
      type: String,
      default: 'text'
    },
    placeholder: {
      type: String,
      default: ''
    },
    richTextSupport: {
      type: Boolean,
      default: false
    },
    prefilled: {
      type: Boolean,
      default: false
    },
    required: {
      type: Boolean,
      default: false
    }
  },
  computed: {
    ...mapState(useErrorStore, ['errors']),
    inputValue: {
      get() {
        return this.modelValue
      },
      set(value) {
        this.$emit('update:modelValue', value)
      }
    },
    ready() {
      if (!this.prefilled) {
        return true
      }
      if (this.inputValue) {
        return true
      }
      return false
    }
  }
}
</script>
<template>
  <div class="inputWrapper">
    <label class="inputLabel" :for="name">{{ label }}</label>
    <div v-if="ready" class="inputInner">
      <div
        v-if="richTextSupport"
        class="editor__wrapper"
        :class="{ 'input--hasError': errors[name] }"
      >
        <QuillEditor
          v-model:content="inputValue"
          :id="name"
          contentType="html"
          theme="snow"
        />
      </div>
      <input
        v-else
        class="input"
        :class="{ 'input--hasError': errors[name] }"
        v-model="inputValue"
        :type="type"
        :id="name"
        :placeholder="placeholder"
        :name="name"
        :required="required"
      />
      <p class="input-message input-error" v-if="errors[name]">
        {{ errors[name][0] }}
      </p>
    </div>
  </div>
</template>
