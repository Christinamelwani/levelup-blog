import { useErrorStore } from '@/stores/Errors'

import { notify } from '@kyvg/vue3-notification'

export default (errorResponse) => {
  const errorStore = useErrorStore()
  if (errorResponse.response?.status == 401) {
    return notify({
      title: 'Incorrect credentials',
      type: 'error',
      text: errorResponse.response.data.message
    })
  }

  if (errorResponse.response?.status == 422) {
    errorStore.setErrors(errorResponse.response.data.errors)
    return notify({
      title: 'Invalid input',
      type: 'error',
      text: 'Please fix all validation errors!'
    })
  }

  return notify({
    type: 'error',
    text: 'An unexpected error occured. Please try again later'
  })
}
