import axios from 'axios'

/**
 * Fetches users from laravel API
 * @param state
 * @param commit
 * @param dispatch
 * @returns {Promise<void>}
 */
export const fetchUsers = async ({ getters, commit, dispatch }) => {
    const endpoint = `${getters.getRequestUrl}/categories`

    try {
        const categories = await axios.get(endpoint);
        commit('FETCH_USERS', categories.data)
    } catch (error) {
        dispatch('notFoundException', 'Problem z przetworzeniem danych');
    }
}
