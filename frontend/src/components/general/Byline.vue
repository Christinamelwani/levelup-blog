<script>
export default {
  props: {
    withImage: {
      type: Boolean,
      required: false,
      default: false
    },
    withSocialMedia: {
      type: Boolean,
      required: false,
      default: false
    },
    author: {
      type: Object,
      required: true
    }
  }
}
</script>

<template>
  <div class="byline">
    <div class="byline__inner">
      <img class="byline__img" src="@/assets/images/Ellipse4.png" />
      <div class="byline__wrapper">
        <h3 class="byline__header">By {{ author.name }}</h3>
        <h4 class="byline__subheader">Thinker and designer</h4>
      </div>
    </div>
    <div v-if="withSocialMedia">
      <img v-for="index in 4" src="@/assets/images/socialMediaIcon.svg" />
    </div>
  </div>
</template>
