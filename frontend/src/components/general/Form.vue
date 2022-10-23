<script>
import { mapActions } from 'pinia'
import { useErrorStore } from '@/stores/Errors.js'
import handleError from '@/helpers/handleError.js'
export default {
  data() {
    return {
      isLoading: false
    }
  },
  props: {
    submitAction: {
      type: Function,
      required: true
    },
    data: {
      type: Object,
      required: true
    }
  },
  computed: {
    dataComputed() {
      return Object.assign({}, this.data)
    }
  },
  watch: {
    dataComputed: {
      handler(newValue, oldValue) {
        if (!oldValue) {
          return
        }

        Object.keys(newValue).forEach((key) => {
          if (newValue[key] !== oldValue[key]) {
            this.deleteError(key)
          }
        })
      },
      deep: true
    }
  },
  methods: {
    ...mapActions(useErrorStore, ['setErrors', 'deleteError', 'clearErrors']),
    async handleSubmit() {
      this.clearErrors()
      this.isLoading = true
      try {
        await this.submitAction()
      } catch (err) {
        handleError(err)
      }
      this.isLoading = false
    }
  }
}
</script>
<template>
  <form class="modal_form" @submit.prevent="handleSubmit">
    <slot :isLoading="isLoading"></slot>
  </form>
</template>
