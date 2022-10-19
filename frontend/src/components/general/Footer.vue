<script>
import { mapActions, mapState, mapWritableState } from 'pinia'
import { useModalStore } from '@/stores/Modal.js'
import { useAuthStore } from '@/stores/Auth.js'

export default {
    computed: {
        ...mapState(useAuthStore, ["isGuest"])
    },
    methods: {
        ...mapActions(useModalStore, ["openModal"])
    }
}
</script>

<template>
    <footer class="footer">
        <section class="footer__main">
            <div class="footer__col">
                <div class="footer__list">
                    <h3 class="footer__list__header">Contact the Publisher</h3>
                    <p class="footer__list__text">mike@runo.com</p>
                    <p class="footer__list__text">+944 450 904 505</p>
                </div>
                <div class="footer__list">
                    <h3 class="footer__list__header">Explore</h3>
                    <p class="footer__list__text" v-if="isGuest" @click="openModal('Log In')">Login</p>
                    <p class="footer__list__text" v-if="isGuest" @click="openModal('Register')">Register</p>
                    <p class="footer__list__text">About</p>
                    <p class="footer__list__text">Partners</p>
                    <p class="footer__list__text">Job Opportunities</p>
                    <p class="footer__list__text">Advertise</p>
                </div>
            </div>
            <div class="footer__col">
                <div class="footer__list">
                    <h3 class="footer__list__header">Headquarters</h3>
                    <p class="footer__list__text">191 Middleville Road,
                        NY 1001, Sydney
                        Australia</p>
                </div>
                <div class="footer__list">
                    <h3 class="footer__list__header">Headquarters</h3>
                    <p class="footer__list__text">191 Middleville Road,
                        NY 1001, Sydney
                        Australia</p>
                </div>
            </div>
        </section>
        <section class="footer__bottom">
            <h3 class="footer__bottom-text">
                2021 | RUNO Publisher Studio
            </h3>
            <h3 class="footer__bottom-text">
                Subscribe now
            </h3>
        </section>
    </footer>
</template>