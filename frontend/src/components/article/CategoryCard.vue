<script>
export default {
  props: {
    category: {
      type: Object,
      required: true
    }
  }
}
</script>

<template>
  <div class="categoryCard">
    <router-link
      class="blank__slate"
      :to="{ name: 'categoryArticles', params: { id: category.id } }"
    >
      {{ category.name }}
    </router-link>
  </div>
</template>
