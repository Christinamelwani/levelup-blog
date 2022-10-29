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
    showImage: {
      type: Boolean,
      required: false
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
    <img v-if="showImage" src="@/assets/images/Ellipse4.png" />
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
