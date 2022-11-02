<script>
import Category from '@/services/Category.js'
export default {
  data() {
    return {
      categories: []
    }
  },
  async created() {
    this.categories = await Category.all()
  }
}
</script>

<template>
  <div class="categorySelector">
    <ul class="categorySelector__list">
      <li class="categorySelector__item">
        <router-link class="categorySelector__item-link" :to="{ name: 'Home' }">
          All
        </router-link>
      </li>
      <li class="categorySelector__item" v-for="category in categories">
        <router-link
          class="categorySelector__item-link"
          :to="{ name: 'categoryArticles', params: { id: category.id } }"
        >
          {{ category.name }}
        </router-link>
      </li>
    </ul>
    <h3 class="categorySelector__item categorySelector__item-viewAll">
      <router-link
        class="categorySelector__item-link"
        :to="{ name: 'Articles' }"
      >
        View All
      </router-link>
    </h3>
  </div>
</template>
