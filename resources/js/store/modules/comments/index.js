import * as mutations from './mutations'
import * as actions from './actions'
import * as getters from './getters'

export const comments = {
    namespaced: false,
    state: () => ({
        comments: [],
    }),
    mutations,
    actions,
    getters,
}
