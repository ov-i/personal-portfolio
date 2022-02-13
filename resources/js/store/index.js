import { createLogger, createStore } from "vuex";
import { users } from './modules/users'

const { NODE_ENV } = process.env

export const store = createStore({
    modules: {
        users,
    },
    plugins: NODE_ENV !== 'production' ? [createLogger()] : []
})
