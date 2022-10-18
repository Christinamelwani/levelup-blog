<script>
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
            <a class="modal_link">Already have an
                account? Log In</a>
        </div>
    </BaseModal>
</template>