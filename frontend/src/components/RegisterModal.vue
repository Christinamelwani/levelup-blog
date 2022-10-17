<script>
import axios from 'axios';
import BaseModal from './BaseModal.vue';
export default {
    components: { BaseModal },
    data() {
        return {
            email: "",
            password: "",
            name: "",
            nickname: "",
            status: "",
            errorMessage: ""
        };
    },
    methods: {
        async register() {
            try {
                if (this.password.length < 8) {
                    throw { errorMessage: "Password must at least be 8 characters long." };
                }
                const response = await axios.post("http://localhost:8000/api/users", { email: this.email, password: this.password, name: this.name, slug: this.nickname });
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
                <input v-model='name' placeholder="Name" type="text" class="modal_input" />
                <input v-model='nickname' type="text" placeholder="Nickname" class="modal_input" />
                <input v-model='email' placeholder="E-mail" type="email" class="modal_input" />
                <input v-model='password' type="password" placeholder="Password" class="modal_input" />
                <input @click.prevent="loginOrRegister" type="submit" class="modal_submit" :value="mode" />
            </form>
        </div>
        <div class="modal_footer">
            <a class="modal_link">Already have an
                account? Log In</a>
        </div>
    </BaseModal>
</template>