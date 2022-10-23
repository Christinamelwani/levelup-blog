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
  <div class="profile_header">
    <img v-if="showImage" src="@/assets/images/Ellipse4.png" />
    <h1 class="profile_name">{{ title }}</h1>
    <p class="profile_email">
      {{ subtitle }}
    </p>
    <img src="@/assets/images/goldDivider.svg" />
    <div class="profile_link_container">
      <RouterLink :to="link.destination" class="profile_link">{{
        link.text
      }}</RouterLink>
    </div>
  </div>
</template>
