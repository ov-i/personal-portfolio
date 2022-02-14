import * as mutations from './mutations'
import * as actions from './actions'
import * as getters from './getters'

export const users = {
    state: () => ({
        users: [],
        roles: []
    }),
    mutations,
    actions,
    getters,
}
