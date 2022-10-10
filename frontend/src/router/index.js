import { createRouter, createWebHistory } from 'vue-router'
import HomeView from '../views/HomeView.vue'

const router = createRouter({
  history: createWebHistory(import.meta.env.BASE_URL),
  routes: [
    {
      path: '/',
      name: 'home',
      component: HomeView
    },
    {
      path: '/article/:id',
      name: 'article',
      component: () => import("../views/ArticleView.vue")
    },
    {
      path: '/myProfile',
      name: 'profile',
      component: () =>  import("../views/ProfileView.vue")
    }
  ]
})

export default router
