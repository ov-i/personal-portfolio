import * as mutations from './mutations'
import * as actions from './actions'
import * as getters from './getters'

export const users = {
    namespaced: false,
    state: () => ({
        users: [],
        user: [],
    }),
    mutations,
    actions,
    getters,
}
