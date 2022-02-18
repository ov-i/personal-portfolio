import * as mutations from './mutations'
import * as actions from './actions'
import * as getters from './getters'
import {mce_api_key} from "./config";

export const posts = {
    namespaced: false,
    state: () => ({
        posts: [{}],
        mce_api_key,
    }),
    mutations,
    actions,
    getters,
}
