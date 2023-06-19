import { createApp } from 'vue'
import { store } from './store/store'
import App from './App.vue'
import router from './router'
import axios from 'axios'
import VueAxios from 'vue-axios'
import Toast from "vue-toastification"

import "vue-toastification/dist/index.css";

const app = createApp(App)

app.use(router).use(VueAxios, axios).use(store)
    .use(Toast,{
        timeout: 3000
    })

router.isReady().then(() => {
    app.mount('#app')
})
