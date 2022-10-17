<script>
import BaseModal from './BaseModal.vue';
import Auth from "@/services/Auth.js"
export default {
    components: { BaseModal },
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
    methods: {
        async register() {
            try {
                if (this.userData.password.length < 8) {
                    throw { errorMessage: "Password must at least be 8 characters long." };
                }
                const response = await Auth.register(this.userData);
            }
            catch (err) {
                this.status = "error";
                this.errorMessage = "Something went wrong!";
            }
        }
    },
}
</script>

<template>
    <BaseModal title="Register">
        <div v-if="status === 'done' || status === 'error'" class="modal_message"
            :class="{'modal_message-error': status === 'error', 'modal_message-success': status === 'done'}">
            <p v-if="status === 'error'"> {{errorMessage}}</p>
            <p v-if="status === 'done'">Successfully logged in!</p>
        </div>
        <div class="modal_content">
            <form class="modal_form">
                <input v-model='userData.name' placeholder="Name" type="text" class="modal_input" />
                <input v-model='userData.slug' type="text" placeholder="Nickname" class="modal_input" />
                <input v-model='userData.email' placeholder="E-mail" type="email" class="modal_input" />
                <input v-model='userData.password' type="password" placeholder="Password" class="modal_input" />
                <input @click.prevent="register" type="submit" class="modal_submit" value="Register" />
            </form>
        </div>
        <div class="modal_footer">
            <a class="modal_link">Already have an
                account? Log In</a>
        </div>
    </BaseModal>
</template>