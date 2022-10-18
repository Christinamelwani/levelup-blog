import { defineStore } from 'pinia'

export const useModalStore = defineStore('modal', {
  state: () => {
    return {
      activeModal: null
    }
  },
  actions: {
    openModal(modal) {
      this.activeModal = modal
      window.scrollTo(0, 0)
    },
    closeModal() {
      this.activeModal = null
      window.scrollTo(0, 0)
    }
  }
})
