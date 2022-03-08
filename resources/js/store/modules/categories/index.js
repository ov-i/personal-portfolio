import * as mutations from './mutations'
import * as actions from './actions'
import * as getters from './getters'

export const users = {
    namespaced: false,
    state: () => ({
        categories: [],
    }),
    mutations,
    actions,
    getters,
}
