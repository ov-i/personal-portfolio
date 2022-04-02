import axios from 'axios'

/**
 * fetches comments
 *
 * @param commit
 * @param dispatch
 * @param getters
 * @return void
 */
export const fetchComments = async ({ commit, dispatch, getters }) => {
    /**
     * gets endpoint for api
     *
     * @type {string}
     */
    const endpoint = `${getters.getRequestUrl}/comments`

    try {
        const { data } = await axios.get(endpoint, {
            headers: {
                'Content-Type': 'application/json'
            }
        })

        commit('FETCH_COMMENTS', data.comments)
    } catch (error) {
        dispatch('notFoundException', 'Problem z przetworzeniem danych')
    }
}
