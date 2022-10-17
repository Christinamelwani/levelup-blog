<script>
export default {
    props: {
        title: {
            type: String,
            required: true
        }
    },
    methods: {
        closeModal() {
            $emit('collapse-modal')
        }
    },
}
</script>

<template>
    <div class="modal">
        <div class="modal_inner">
            <div class="modal_header">
                <h1 class="modal_title">{{title}}</h1>
                <img class="modal_icon" src="@/assets/images/closeModal.svg" @click="closeModal" />
            </div>
            <slot></slot>
        </div>
    </div>
</template>