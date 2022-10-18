import { defineStore } from 'pinia'
import { useRouter } from 'vue-router'

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
      const router = useRouter()
      this.userData = {}
      localStorage.removeItem('access_token')
      router.push({ name: 'Home' })
    }
  }
})
