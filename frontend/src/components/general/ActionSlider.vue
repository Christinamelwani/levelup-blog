<script>
export default {
  props: {
    title: {
      type: String,
      required: true
    },
    subtitle: {
      type: String,
      required: false
    },
    image: {
      type: String,
      required: false,
      default: ''
    },
    link: {
      type: Object,
      required: true
    }
  }
}
</script>

<template>
  <div class="actionHeader">
    <img class="actionHeader__image" v-if="image" :src="image" />
    <h1 class="actionHeader__title">{{ title }}</h1>
    <p v-if="subtitle" class="actionHeader__email">
      {{ subtitle }}
    </p>
    <img src="@/assets/images/goldDivider.svg" />
    <div class="link__container">
      <RouterLink :to="link.destination" class="link">{{
        link.text
      }}</RouterLink>
    </div>
  </div>
</template>
