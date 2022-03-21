import { createApp } from 'vue'
import '@iconify/iconify'

const app = createApp({
    data: () => ({
       passwordShown: false
    }),
    methods: {
        togglePasswordShown() {
            this.passwordShown = !this.passwordShown
        }
    }
})

app.mount('#app')
