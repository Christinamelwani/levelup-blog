<script>
import { mapState } from 'pinia'
import { useModalStore } from '@/stores/Modal.js'
import LoginModal from '@/components/auth/LoginModal.vue';
import RegisterModal from '@/components/auth/RegisterModal.vue';

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