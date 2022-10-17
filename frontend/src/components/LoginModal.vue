<script>
import BaseModal from './BaseModal.vue';
import Auth from "@/services/Auth";

export default {
    components: { BaseModal },
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
                console.log(err)
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
        <div class="modal_message" v-if="status === 'done' || status === 'error'"
            :class="{'modal_message-error': status === 'error', 'modal_message-success': status === 'done'}">
            <p v-if="status === 'error'"> {{errorMessage}}</p>
            <p v-if="status === 'done'">Successfully logged in!</p>
        </div>
        <div class="modal_content">
            <form class="modal_form">
                <input v-model='credentials.email' placeholder="E-mail" type="email" class="modal_input" />
                <input v-model='credentials.password' type="password" placeholder="Password" class="modal_input" />
                <input @click.prevent="login" type="submit" class="modal_submit" value="Login" />
            </form>
        </div>
        <div class="modal_footer">
            <a class="modal_link">Don't have an account
                yet? Sign up</a>
        </div>
    </BaseModal>
</template>