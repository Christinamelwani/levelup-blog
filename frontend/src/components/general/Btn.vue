  
<script>
export default {
    props: {
        type: {
            type: String,
            default: 'button'
        },
        isLoading: {
            type: Boolean,
            default: false
        }
    }
}
</script>
<template>
    <button class="btn" :type="type" :disabled="isLoading" :class="{'btn--loading': isLoading}">
        <div v-if="isLoading">
            Loading...
        </div>
        <slot v-else></slot>
    </button>
</template>