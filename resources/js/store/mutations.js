/**
 * Mutates fetch errors state
 * @param state
 * @param error
 * @constructor
 */
export const HANDLE_FETCH_ERROR = (state, error) => {
    state.fetchErrors.push(error);
}

/**
 * Sets request url object state
 * @param state
 * @param requestUrl
 * @constructor
 */
export const SET_REQUEST_URl = (state, requestUrl) => {
    state.requestUrl = requestUrl
}
