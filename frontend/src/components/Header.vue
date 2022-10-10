<script>
import Modal from './Modal.vue';
export default {
    data() {
        return {
            loggedIn: false
        }
    },
    components: {
        Modal
    },
    props: ["parentLoggedIn"],
    methods: {
        logout() {
            localStorage.removeItem("access_token")
            this.loggedIn = false;
            this.$emit("logged-out")
        }
    },
    watch: {
        parentLoggedIn(newValue) {
            console.log(newValue)
            this.loggedIn = newValue;
            console.log(this.loggedIn)
        }
    },
    created() {
        const token = localStorage.getItem("access_token")
        if (token) {
            this.loggedIn = true
        }
    }
}
</script>

<template>
    <header class="header">
        <div class="header__inner">
            <h1 class="header__title">
                <RouterLink to="/" class="header__title-link">LevelUp Blog</RouterLink>
            </h1>
            <nav class="header__nav">
                <ul class="header__nav-list">
                    <li class="header__nav-item">
                        <RouterLink class="header__nav-item-link" to="/">Home</RouterLink>
                    </li>
                    <li class="header__nav-item">
                        <a class="header__nav-item-link">About</a>
                    </li>
                    <li class="header__nav-item">
                        <a class="header__nav-item-link">Articles</a>
                    </li>
                    <li v-if="!loggedIn" class="header__nav-item" @click="$emit('collapse-modal')">
                        <a class="header__nav-item-link">Login</a>
                    </li>
                    <li v-if="loggedIn" class="header__nav-item" @click="logout()">
                        <a class="header__nav-item-link">Logout</a>
                    </li>
                </ul>
            </nav>
        </div>
    </header>
</template>