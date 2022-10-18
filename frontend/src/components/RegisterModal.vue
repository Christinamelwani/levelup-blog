<script>
import { mapWritableState, mapActions } from 'pinia'
import { useModalStore } from '@/stores/Modal.js'
import BaseModal from './BaseModal.vue';
import Auth from "@/services/Auth.js"
import customInput from "@/components/Input.vue"
import customButton from '@/components/Btn.vue'

export default {
    components: { BaseModal, customInput, customButton },
    data() {
        return {
            userData: {
                email: "",
                password: "",
                name: "",
                slug: "",
            },
            status: "",
            errorMessage: ""
        };
    },
    computed: {
        ...mapWritableState(useModalStore, ["activeModal"]),
    },
    methods: {
        ...mapActions(useModalStore, ["openModal", "closeModal"]),

        async register() {
            this.status = "Loading"
            try {
                const response = await Auth.register(this.userData);
                localStorage.setItem("access_token", response.token);
                this.$router.push({ name: "Profile" });
                this.closeModal()
                this.status = "Success";
            }
            catch (err) {
                this.status = "Error";
                this.errorMessage = "Something went wrong!";
            }
        }
    },
}
</script>

<template>
    <BaseModal title="Register">
        <div class="modal_content" @submit.prevent="register">
            <form class="modal_form">
                <customInput v-model="userData.name" name="name" label="Name" type="text" placeholder="Example Smith"
                    :required="true" />
                <customInput v-model="userData.slug" name="Nickname" label="Nickname" type="text" placeholder="Exys"
                    :required="true" />
                <customInput v-model="userData.email" name="email" label="Email" type="email"
                    placeholder="example@mail.com" :required="true" />
                <customInput v-model="userData.password" name="password" label="Password" type="password"
                    placeholder="We8@0123ndj" :required="true" />
                <customButton type="submit" :isLoading="status === 'Loading'">Register</customButton>
            </form>
        </div>
        <div class="modal_footer">
            <a @click="openModal('Log In')" class="modal_link">Already have an
                account? Log In</a>
        </div>
    </BaseModal>
</template>