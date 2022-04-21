import axios from 'axios'

/**
 * fetches comments
 *
 * @param commit
 * @param dispatch
 * @param getters
 * @return void
 */
export const fetchComments = async ({ commit, getters, dispatch }) => {
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
 * @param dispatch,
 * @param getters
 * @param comment {string}
 * @return {Promise<void>}
 */
export const createComment = async ({ commit,getters, dispatch }, comment) => {
    /**
     * gets endpoint for api
     *
     * @type {string}
     */
    const endpoint = `${getters.getRequestUrl}/comments`

    try {
        const newComment = await axios.post(endpoint, {
            author: 'bergstrom.braulio',
            post_id: 1,
            comment,
        } ,{
            headers: {
                'Content-Type': 'application/json'
            }
        })

        commit('CREATE_COMMENT', newComment)
    } catch (error) {
        dispatch('notFoundException', 'Problem z przetworzeniem danych')
    }
}
