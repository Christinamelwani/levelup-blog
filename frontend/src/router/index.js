import { createRouter, createWebHistory } from 'vue-router'
import { useModalStore } from '@/stores/Modal.js'
import { useAuthStore } from '@/stores/Auth.js'
import Auth from '@/services/Auth.js'
import HomeView from '../views/HomeView.vue'

const router = createRouter({
  history: createWebHistory(import.meta.env.BASE_URL),
  routes: [
    {
      path: '/',
      name: 'Home',
      component: HomeView
    },
    {
      path: '/article/:slug',
      name: 'Article',
      component: () => import('../views/ArticleView.vue')
    },
    {
      path: '/my-profile',
      name: 'Profile',
      component: () => import('../views/ProfileView.vue'),
      meta: {
        requiresAuth: true
      }
    },
    {
      path: '/edit-profile',
      name: 'Edit Profile',
      component: () => import('../views/EditProfileView.vue'),
      meta: {
        requiresAuth: true
      }
    }
  ]
})

router.beforeEach(async (to) => {
  window.scrollTo(0, 0)
  const authStore = useAuthStore()
  const modalStore = useModalStore()

  if (localStorage.getItem('access_token') !== null && authStore.isGuest) {
    try {
      authStore.setUser(await Auth.me())
    } catch {
      authStore.logout()
    }
  }

  if (to.meta.requiresAuth && authStore.isGuest) {
    modalStore.openModal('Log In')
    return {
      name: 'Home'
    }
  }
})

export default router
