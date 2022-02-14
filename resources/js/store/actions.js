/**
 * Sets fetch error message
 * @param commit
 * @param error
 */
export const handleFetchError = ({ commit }, error) => {
    commit('HANDLE_FETCH_ERROR', error)
}

/**
 * Sets request url state
 * @param commit
 * @param requestUrl
 */
export const setRequestUrl = ({ commit }, requestUrl) => {
    commit('SET_REQUEST_URl', requestUrl)
}
