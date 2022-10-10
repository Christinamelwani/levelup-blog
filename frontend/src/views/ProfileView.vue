<script>
import axios from 'axios'
export default {
    data() {
        return {
            userData: {}
        }
    },
    async created() {
        try {
            const token = localStorage.getItem("access_token")
            const config = {
                headers: { Authorization: `Bearer ${token}` }
            }
            const response = await axios.get('http://localhost:8000/api/user', config)
            this.userData = response.data;
        } catch (err) {
            console.log(err)
        }
    }
}
</script>
<template>
    <div class="profile_header">
        <h1 class="profile_name">
            Hello {{userData.name}}!
        </h1>
        <h3 class="profile_nickname">
            AKA {{userData.slug}}
        </h3>
        <p class="profile_email">
            {{userData.email}}
        </p>
    </div>

</template>