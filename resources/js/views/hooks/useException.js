/**
 * Creates exception
 * @param {string | {error: boolean, message: string, status: number}} value
 * @returns {array}
 */
export const useException = (value) => {
    /**
     * Sets exception value
     * @returns {string|Object}
     * @param {string | {error: boolean, message: string, status: number}} newValue
     */
    function setException(newValue) {
        value = newValue

        return value
    }

    return [value, setException]
}
