import axios from 'axios'

/**
 * Fetches users from laravel API
 * @param state
 * @param commit
 * @param dispatch
 * @returns {Promise<void>}
 */
export const fetchUsers = async ({ getters, commit, dispatch }) => {
    const endpoint = `${getters.getRequestUrl}/users`

    try {
        const users = await axios.get(endpoint);
        commit('FETCH_USERS', users.data)
    } catch (error) {
        dispatch('notFoundException', 'Problem z przetworzeniem danych');
    }
}

/**
 * Fetches single user
 * @param commit
 * @param dispatch
 * @param getters
 * @param user
 * @param id
 * @returns {Promise<void>}
 */
export const fetchUserData = async ({ commit, dispatch, getters }, user) => {
    const endpoint = `${getters.getRequestUrl}/users/${user.id}`

    try {
        const { data } = await axios.get(endpoint, {
            params: {
                'user': user.id
            }
        })
        commit('FETCH_USER', data);
    } catch (error) {
        dispatch('notFoundException', `Brak użytkownika o id: ${user.id}`)
    }
}
