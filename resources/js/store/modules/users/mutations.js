export const FETCH_USERS = (state, users) => {
    state.users = users
}

export const FETCH_USER = (state, user) => {
    state.user = user
}

export const DELETE_USER = (state, id) => {
    state.users.splice(id, 1)
}
