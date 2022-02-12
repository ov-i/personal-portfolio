import { createApp } from 'vue';
import App from "./Application";
import { router } from './routes/index'
import { store } from "./store";

// application init
const app = createApp(App)

// plugins
app.use(router)
app.use(store)

app.mount('#admin')
