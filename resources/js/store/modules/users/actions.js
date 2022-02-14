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
        commit('FETCH_USERS', users.data.users)
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
        const user = await axios.get(endpoint)
        commit('FETCH_USER', user.data);
    } catch (error) {
        dispatch('notFoundException', `Brak użytkownika o id: ${id}`)
    }
}

export const deleteUser = async({ commit, dispatch, getters }, {id, user_id}) => {
    const endpoint = `${getters.getRequestUrl}/users/${user_id}`

    try {
        await axios.delete(endpoint)
        commit('DELETE_USER', id)
    } catch (error) {
        dispatch('notFoundException', `Brak użytkownika o id: ${id}`)
    }
}
