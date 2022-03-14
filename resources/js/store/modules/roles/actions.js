import axios from 'axios'

/**
 * fetches roles from laravel/API
 *
 * @param commit
 * @param dispatch
 * @param getters
 */
export const fetchRoles = async ({ commit, dispatch, getters }) => {
    /**
     * selects endpoint for application
     *
     * @type {string}
     */
    const endpoint = `${getters.getRequestUrl}/roles`

    try {
        /**
         * gets axios response for getting roles
         *
         * @type {AxiosResponse<any>}
         */
        const roles = await axios.get(endpoint, {
            headers: {
                'Content-Type': "application/json"
            }
        })

        commit('FETCH_ROLES', roles.data)
    } catch (error) {
        dispatch('notFoundException', 'Problem z przetworzeniem danych')
    }
}

/**
 * creates new role
 *
 * @param commit
 * @param dispatch
 * @param getters
 * @param role {{ id: number, name: string }}
 * @return {Promise<void>}
 */
export const createRole = async ({ commit, dispatch, getters }, role) => {
    /**
     * selects endpoint for application
     *
     * @type {string}
     */
    const endpoint = `${getters.getRequestUrl}/roles`

    try {
        const {data} = await axios.post(endpoint, {
            name: role.name
        }, {
            headers: {
                'Content-Type': 'application/json'
            }
        })
        commit('CREATE_ROLE', role)
    } catch (error) {
        dispatch('notFoundException', 'Problem z przetworzeniem danych')
    }
}
