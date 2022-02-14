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
export const fetchUserData = async ({ commit, dispatch, getters }, id) => {
    const endpoint = `${getters.getRequestUrl}/users/${id}`

    try {
        const user = await axios.get(endpoint, {
            params: {
                'user': id
            }
        })
        commit('FETCH_USER', user.data);
        console.log(user.data)
    } catch (error) {
        dispatch('notFoundException', `Brak użytkownika o id: ${id}`)
    }
}
