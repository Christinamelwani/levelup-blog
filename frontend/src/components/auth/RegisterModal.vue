<script>
import { mapActions } from 'pinia'
import { useModalStore } from '@/stores/Modal.js'
import { useErrorStore } from '@/stores/Errors.js'
import Auth from "@/services/Auth.js"
import BaseModal from '@/components/general/BaseModal.vue'
import customInput from "@/components/general/Input.vue"
import customButton from '@/components/general/Btn.vue'

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
        userDataComputed() {
            return Object.assign({}, this.userData);
        },
    },
    watch: {
        userDataComputed: {
            handler(newValue, oldValue) {
                if (!oldValue) {
                    return;
                }

                Object.keys(newValue).forEach(key => {
                    if (newValue[key] !== oldValue[key]) {
                        this.deleteError(key)
                    }
                })
            },
            deep: true,
        }
    },
    methods: {
        ...mapActions(useErrorStore, ["setErrors", "deleteError", "clearErrors"]),
        ...mapActions(useModalStore, ["openModal", "closeModal"]),

        async register() {
            this.clearErrors()
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
                if (err.response?.status == 422) {
                    this.setErrors(err.response.data.errors)
                }
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
                    :required="false" />
                <customInput v-model="userData.slug" name="slug" label="Nickname" type="text" placeholder="Exys"
                    :required="false" />
                <customInput v-model="userData.email" name="email" label="Email" type="email"
                    placeholder="example@mail.com" :required="false" />
                <customInput v-model="userData.password" name="password" label="Password" type="password"
                    placeholder="We8@0123ndj" :required="false" />
                <customButton type="submit" :isLoading="status === 'Loading'">Register</customButton>
            </form>
        </div>
        <div class="modal_footer">
            <a @click="openModal('Log In')" class="modal_link">Already have an
                account? Log In</a>
        </div>
    </BaseModal>
</template>