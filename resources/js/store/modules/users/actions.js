import axios from 'axios'

export const fetchUsers = async ({ state, commit }) => {
    const users = await axios.get('http://localhost:8000/api/users');
    const { data } = users

    if (data.length === 0) {
        return state.fetchErrors.push({
            error: true,
            message: 'Brak danych'
        })
    }

    if (users.status === 500) {
        return state.fetchErrors.push({
            error: true,
            message: `Błąd serwera: ${JSON.stringify(data.message)}`
        })
    }
}
