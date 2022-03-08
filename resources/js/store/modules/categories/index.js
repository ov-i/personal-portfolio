import * as mutations from './mutations'
import * as actions from './actions'
import * as getters from './getters'

export const categories = {
    namespaced: false,
    state: () => ({
        categories: [],
    }),
    mutations,
    actions,
    getters,
}
