<script>
import Modal from './Modal.vue';
export default {
    components: {
        Modal
    },
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
                        <RouterLink class="header__nav-item-link" to="/about">About</RouterLink>
                    </li>
                    <li class="header__nav-item">
                        <RouterLink class="header__nav-item-link" to="/articles">Articles</RouterLink>
                    </li>
                    <li class="header__nav-item" @click="$emit('collapse-modal')">
                        <a class="header__nav-item-link">Login</a>
                    </li>
                </ul>
            </nav>
        </div>
    </header>
</template>