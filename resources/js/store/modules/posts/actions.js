import axios from 'axios'

/**
 * Fetches posts from laravel API
 * @param commit
 * @param getters
 * @param dispatch
 * @returns {Promise<void>}
 */
export const fetchPosts = async ({ commit, getters, dispatch }) => {
    const endpoint = `${getters.getRequestUrl}/posts`

    try {
        const posts = await axios.get(endpoint)
        commit('FETCH_POSTS', posts.data);
    } catch (error) {
        dispatch('notFoundException', 'Problem z przetworzeniem danych')
    }
}

/**
 * returns new date from string
 * @param post
 * @returns {string}
 */
export const createdAtToLocaleString = ({}, post) => {
    return new Date(post.created_at).toLocaleString()
}
