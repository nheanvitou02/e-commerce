import { createApp } from 'vue'
import { createPinia } from 'pinia'

import App from './App.vue'
import router from './router'
import store from './stores'
import './assets/main.css'
import VueNumberFormat from 'vue-number-format'

const app = createApp(App)
app.use(VueNumberFormat, {prefix: 'US$ ', decimal: ',', thousand: '.'})
app.use(createPinia())
app.use(router)
app.use(store);
app.mount('#app')
