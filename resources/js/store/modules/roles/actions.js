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
