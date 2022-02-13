import { createLogger, createStore } from "vuex";
import { users } from './modules/users'
import * as getters from './getters'

const { NODE_ENV } = process.env

export const store = createStore({
    state: {
        fetchErrors: [
            {
                error: '',
                message: ''
            }
        ]
    },
    getters,
    modules: {
        users,
    },
    plugins: NODE_ENV !== 'production' ? [createLogger()] : []
})

