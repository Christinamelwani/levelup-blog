<script>
import { mapWritableState, mapActions } from 'pinia'
import { useModalStore } from '@/stores/Modal.js'
import Auth from "@/services/Auth.js"
import BaseModal from './BaseModal.vue';
import customInput from "@/components/Input.vue"
import customButton from '@/components/Btn.vue'

export default {
    components: { BaseModal, customInput, customButton },
    data() {
        return {
            credentials: {
                email: "",
                password: ""
            },
            status: "",
            error: ""
        };
    },
    computed: {
        ...mapWritableState(useModalStore, ["activeModal"]),
    },
    methods: {
        ...mapActions(useModalStore, ["openModal", "closeModal"]),

        async login() {
            this.status = "Loading"
            try {
                const accessToken = await Auth.login(this.credentials);
                localStorage.setItem("access_token", accessToken);
                this.$router.push({ name: "Profile" });
                this.closeModal()
                this.status = "Success";
            }
            catch (err) {
                this.status = "Error";
                this.error = "An unknown error occured!"
                if (err.response?.status === 422) {
                    this.error = "Password needs to be at least 8 letters long!"
                }
                if (err.response?.status === 403) {
                    this.error = "Invalid username or password!"
                }
            }
        },
    },
}
</script>

<template>
    <BaseModal title="Log In">
        <div v-if="error" class="modal_message modal_message-error">
            {{error}}
        </div>
        <div class="modal_content">
            <form class="modal_form" @submit.prevent="login">
                <customInput v-model="credentials.email" name="email" label="Email" type="email"
                    placeholder="example@mail.com" :required="true" />
                <customInput v-model="credentials.password" name="password" label="Password" type="password"
                    placeholder="Cartoon-Duck-14-Coffee-Glvs" :required="true" />
                <customButton type="submit" :isLoading="status === 'Loading'">Login</customButton>
            </form>
        </div>
        <div class="modal_footer">
            <a class="modal_link" @click="openModal('Register')">Don't have an account
                yet? Sign up</a>
        </div>
    </BaseModal>
</template>