import { createApp } from 'vue'
import { createPinia } from 'pinia'
import 'normalize.css'

import App from './App.vue'
import router from './router'
import Notifications from '@kyvg/vue3-notification'
import VueSweetalert2 from 'vue-sweetalert2'
import 'sweetalert2/dist/sweetalert2.min.css'

const app = createApp(App)

app.use(createPinia())
app.use(router)
app.use(Notifications)
app.use(VueSweetalert2)

app.mount('#app')
