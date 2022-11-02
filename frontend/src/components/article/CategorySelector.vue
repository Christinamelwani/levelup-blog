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
      <li class="categorySelector__item-active categorySelector__item">All</li>
      <li class="categorySelector__item" v-for="category in categories">
        <router-link
          class="blank__slate"
          :to="{ name: 'categoryArticles', params: { id: category.id } }"
        >
          {{ category.name }}
        </router-link>
      </li>
    </ul>
    <h3 class="categorySelector__item categorySelector__item-viewAll">
      View All
    </h3>
  </div>
</template>
