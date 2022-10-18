<script>
import { mapState } from 'pinia'
import { useModalStore } from '@/stores/Modal.js'
import LoginModal from './LoginModal.vue';
import RegisterModal from './RegisterModal.vue';

export default {
    components: { LoginModal, RegisterModal },
    computed: {
        ...mapState(useModalStore, ["activeModal"])
    },
}
</script>

<template>
    <LoginModal v-if="activeModal === 'Log In'" />
    <RegisterModal v-if="activeModal === 'Register'" />
</template>