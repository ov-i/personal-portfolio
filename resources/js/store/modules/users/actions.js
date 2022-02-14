import axios from 'axios'

/**
 * Fetches users from laravel API
 * @param state
 * @param commit
 * @param dispatch
 * @returns {Promise<void>}
 */
export const fetchUsers = async ({ commit, dispatch }) => {
    const users = await axios.get('http://localhost:8000/api/users');
    const { data } = users

    if (data.length === 0) {
        dispatch('handleFetchError', { error: true, messae: 'Błąd serwera' })
    }

    if (users.status === 500) {
        dispatch('handleFetchError', { error: true, message: 'Błą∂ serwera' })
    }

    commit('FETCH_USERS', users.data)
}
