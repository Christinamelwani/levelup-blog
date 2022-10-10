<script>
import axios from 'axios';
export default {
    data() {
        return {
            mode: "Log in",
            email: "",
            password: "",
            name: "",
            nickname: "",
            status: "",
            errorMessage: ""
        }
    },
    methods: {
        toggleMode() {
            if (this.mode === 'Log in') {
                this.mode = 'Register'
            } else {
                this.mode = 'Log in'
            }
            this.email = ""
            this.password = ""
        },
        loginOrRegister() {
            if (this.mode === 'Register') {
                this.register()
            }
            if (this.mode === 'Log in') {
                this.login()
            }
        },
        async login() {
            try {
                const response = await axios.post('http://localhost:8000/api/authenticate', { email: this.email, password: this.password })
                localStorage.setItem('access_token', response.data);
                this.status = 'done';
                this.$emit("logged-in")
                this.$router.push({ name: 'profile' })
            } catch (err) {
                this.status = 'error'
                this.errorMessage = "Something went wrong!"
                if (err.message === 'Request failed with status code 422') {
                    this.errorMessage = "Please enter a valid email and a password that's at least 8 characters long."
                }
                if (err.message === 'Request failed with status code 403') {
                    this.errorMessage = "Username or password incorrect."
                }
                console.log(err)
            }
        },
        async register() {
            try {
                if (this.password.length < 8) {
                    throw { errorMessage: "Password must at least be 8 characters long." }
                }
                const response = await axios.post('http://localhost:8000/api/users', { email: this.email, password: this.password, name: this.name, slug: this.nickname })
                this.mode = 'Log in'
            } catch (err) {
                this.status = 'error'
                this.errorMessage = "Something went wrong!"
            }
        }
    },
}
</script>

<template>
    <div class="modal">
        <div class="modal_inner">
            <div v-if="status === 'done' || status === 'error'" class="modal_message"
                :class="{'modal_message-error': status === 'error', 'modal_message-success': status === 'done'}">
                <p v-if="status === 'error'"> {{errorMessage}}</p>
                <p v-if="status === 'done'">Successfully logged in!</p>
            </div>
            <div class="modal_header">
                <h1 class="modal_title">{{mode}}</h1>
                <svg @click="$emit('collapse-modal')" class=" modal_icon" xmlns="http://www.w3.org/2000/svg"
                    viewBox="0 0 512 512" width="35px" height="35px">
                    <path fill="#d2cfe0"
                        d="M504.1,256C504.1,119,393,7.9,256,7.9C119,7.9,7.9,119,7.9,256C7.9,393,119,504.1,256,504.1C393,504.1,504.1,393,504.1,256z" />
                    <path fill="#7c748f"
                        d="M285,256l72.5-84.2c7.9-9.2,6.9-23-2.3-31c-9.2-7.9-23-6.9-30.9,2.3L256,222.4l-68.2-79.2c-7.9-9.2-21.8-10.2-31-2.3c-9.2,7.9-10.2,21.8-2.3,31L227,256l-72.5,84.2c-7.9,9.2-6.9,23,2.3,31c4.1,3.6,9.2,5.3,14.3,5.3c6.2,0,12.3-2.6,16.6-7.6l68.2-79.2l68.2,79.2c4.3,5,10.5,7.6,16.6,7.6c5.1,0,10.2-1.7,14.3-5.3c9.2-7.9,10.2-21.8,2.3-31L285,256z" />
                </svg>
            </div>
            <div class="modal_content">
                <form class="modal_form">
                    <input v-if="mode === 'Register'" v-model='name' placeholder="Name" type="text"
                        class="modal_input" />
                    <input v-if="mode === 'Register'" v-model='nickname' type="text" placeholder="Nickname"
                        class="modal_input" />
                    <input v-model='email' placeholder="E-mail" type="email" class="modal_input" />
                    <input v-model='password' type="password" placeholder="Password" class="modal_input" />
                    <input @click.prevent="loginOrRegister" type="submit" class="modal_submit" :value="mode" />
                </form>
            </div>
            <div class="modal_footer">
                <a v-if="mode === 'Log in'" @click.prevent="toggleMode" class="modal_link">Don't have an account
                    yet? Sign up</a>
                <a v-if="mode === 'Register'" @click.prevent="toggleMode" class="modal_link">Already have an
                    account? Log In</a>
            </div>
        </div>
    </div>
</template>