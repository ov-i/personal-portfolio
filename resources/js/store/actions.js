/**
 * Sets fetch error message
 * @param commit
 * @param error
 */
export const handleFetchError = ({ commit }, error) => {
    commit('HANDLE_FETCH_ERROR', error)
}

/**
 * Raise new not found exception
 * @see /store/mutations.js
 * @param commit
 * @param message
 */
export const notFoundException = async ({ commit }, message) => {
    await commit('NOT_FOUND_EXCEPTION', message)
}

/**
 * Raise new Internal Server Error Exception
 * @see /store/mutations.js
 * @param commit
 * @param message
 */
export const serverErrorException = async ({ commit }, message) => {
    await commit('SERVER_ERROR_EXCEPTION', message)
}

