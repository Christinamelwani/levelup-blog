import { defineStore } from 'pinia'
import router from '@/router'

export const useAuthStore = defineStore('auth', {
  state: () => {
    return {
      userData: {}
    }
  },
  getters: {
    isLoggedIn() {
      return Object.keys(this.userData).length > 0
    },
    isGuest() {
      return !this.isLoggedIn
    }
  },
  actions: {
    setUser(user) {
      this.userData = user
    },
    logout() {
      router.replace({ name: 'Home' })
      this.userData = {}
      localStorage.removeItem('access_token')
    }
  }
})
