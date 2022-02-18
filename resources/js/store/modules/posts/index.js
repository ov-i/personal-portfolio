import * as mutations from './mutations'
import * as actions from './actions'
import * as getters from './getters'

export const posts = {
    namespaced: false,
    state: () => ({
        posts: []
    }),
    mutations,
    actions,
    getters,
}
