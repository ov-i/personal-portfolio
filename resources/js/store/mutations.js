/**
 * Mutates fetch errors state
 * @param state
 * @param error
 * @constructor
 */
export const HANDLE_FETCH_ERROR = (state, error) => {
    state.fetchErrors.push(error);
}

