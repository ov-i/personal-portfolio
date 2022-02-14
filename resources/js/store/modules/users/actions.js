import axios from 'axios'

export const fetchUsers = async ({ state, commit, dispatch, getters }) => {
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
