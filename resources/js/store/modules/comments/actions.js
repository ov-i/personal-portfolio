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

/**
 * creates new comment
 *
 * @param commit
 * @param comment {
     * {
         * author: string,
         * post_id: number,
         * comment: string,
         * published: boolean
     * }
 * }
 * @return {Promise<void>}
 */
export const createComment = async ({ commit }, comment) => {}
