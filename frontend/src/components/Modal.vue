<script>
export default {
    data() {
        return {
            mode: "Log in"
        }
    }
}
</script>

<template>
    <div class="modal">
        <div class="modal_inner">
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
                    <input placeholder="E-mail" type="text" class="modal_input" />
                    <input type="text" placeholder="Password" class="modal_input" />
                    <a class="modal_link">Forgot your password?</a>
                    <input type="submit" class="modal_submit" value="Login" />
                </form>
            </div>
            <div class="modal_footer">
                <a class="modal_link">Don't have an account yet? Sign up</a>
            </div>
        </div>
    </div>
</template>