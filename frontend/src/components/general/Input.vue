<script>
import { mapState } from 'pinia'
import { useErrorStore } from '@/stores/Errors.js'

export default {
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
    }
  }
}
</script>
<template>
  <div class="inputWrapper">
    <label class="inputLabel" :for="name">{{ label }}</label>
    <div class="inputInner">
      <input
        class="input"
        v-model="inputValue"
        :type="type"
        :id="name"
        :placeholder="placeholder"
        :name="name"
        :class="{ 'input--hasError': errors[name] }"
        :required="required"
      />
      <p class="input-message input-error" v-if="errors[name]">
        {{ errors[name][0] }}
      </p>
    </div>
  </div>
</template>
