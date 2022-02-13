import * as mutations from './mutations'
import * as actions from './actions'
import * as getters from './getters'

export const users = {
    state: () => ({
        users: [
            {
                nick: '',
                email: '',
                firstname: '',
                lastname: '',
                banned: false,
                toggle_nick_display: false
            }
        ]
    }),
    mutations,
    actions,
    getters,
}
