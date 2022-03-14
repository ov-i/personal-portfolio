import * as mutations from './mutations'
import * as actions from './actions'
import * as getters from './getters'

export const roles = {
    namespaced: false,
    state: () => ({
        roles: [],
    }),
    mutations,
    actions,
    getters,
}
