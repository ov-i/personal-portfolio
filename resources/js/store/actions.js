/**
 * Sets fetch error message
 * @param commit
 * @param error
 */
export const handleFetchError = ({ commit }, error) => {
    commit('HANDLE_FETCH_ERROR', error)
}
