<script>
import BaseModal from './BaseModal.vue';
import Auth from "@/services/Auth.js";
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
            errorMessage: ""
        };
    },
    methods: {
        async login() {
            try {
                const accessToken = await Auth.login(this.credentials)
                localStorage.setItem("access_token", accessToken);
                this.status = "done";
                this.$emit("logged-in");
                this.$router.push({ name: "profile" });
            }
            catch (err) {
                this.status = "error";
                this.errorMessage = "Something went wrong!";
                if (err.message === "Request failed with status code 422") {
                    this.errorMessage = "Please enter a valid email and a password that's at least 8 characters long.";
                }
                if (err.message === "Request failed with status code 403") {
                    this.errorMessage = "Username or password incorrect.";
                }
            }
        },
    },
}
</script>

<template>
    <BaseModal title="Log In">
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
            <a class="modal_link">Don't have an account
                yet? Sign up</a>
        </div>
    </BaseModal>
</template>