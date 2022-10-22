<script>
import { mapActions } from 'pinia'
import { useModalStore } from '@/stores/Modal.js'
import Auth from "@/services/Auth.js"
import Modal from '@/components/general/Modal.vue'
import Input from "@/components/general/Input.vue"
import Btn from '@/components/general/Btn.vue'

export default {
    components: { Modal, Input, Btn },
    data() {
        return {
            credentials: {
                email: "",
                password: ""
            },
            isLoading: false,
            invalidCredentials: false
        };
    },
    methods: {
        ...mapActions(useModalStore, ["openModal", "closeModal"]),

        async login() {
            this.isLoading = true
            try {
                const accessToken = await Auth.login(this.credentials);
                localStorage.setItem("access_token", accessToken);
                this.$router.push({ name: "Profile" });
                this.closeModal()
            }
            catch (err) {
                this.error = true
                if (err.response?.status === 403) {
                    this.invalidCredentials = true;
                }
            }
            this.isLoading = false
        },
    },
}
</script>

<template>
    <Modal title="Log In">
        <div v-if="invalidCredentials" class="modal_message modal_message-error">
            Invalid Credentials!
        </div>
        <div class="modal_content">
            <form class="modal_form" @submit.prevent="login">
                <Input v-model="credentials.email" name="email" label="Email" type="email"
                    placeholder="example@mail.com" :required="true" />
                <Input v-model="credentials.password" name="password" label="Password" type="password"
                    placeholder="Cartoon-Duck-14-Coffee-Glvs" :required="true" />
                <Btn type="submit" :isLoading="isLoading">Login</Btn>
            </form>
        </div>
        <div class="modal_footer">
            <a class="modal_link" @click="openModal('Register')">Don't have an account
                yet? Sign up</a>
        </div>
    </Modal>
</template>