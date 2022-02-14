/**
 * Mutates fetch errors state
 * @param state
 * @param error
 * @constructor
 */
import {useException} from "../views/hooks/useException";

export const HANDLE_FETCH_ERROR = (state, error) => {
    state.fetchErrors = error
}

/**
 * Creates new not found exception
 * @returns {any}
 * @constructor
 */
export const NOT_FOUND_EXCEPTION = (state, message = 'Not found') => {
    const [notfound] = useException({
        error: true,
        message: message,
        status: 404
    })

    state.fetchErrors = notfound
}


export const SERVER_ERROR_EXCEPTION = (state, message = 'Internal server error') => {
    const [serverError] = useException({
        error: true,
        message: message,
        status: 500
    })

    state.fetchErrors = serverError
}
