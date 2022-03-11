/**
 * gets posts from state
 * @param state
 * @returns array
 */
export const posts = (state) => state.posts

export const post = (state) => state.post

/**
 * gets created state variable
 * @param state
 * @returns {boolean}
 */
export const created = (state) => state.created

/**
 * return posts length
 * @param state
 * @returns {number}
 */
export const postsLength = (state) => {
    const { posts } = state.posts
    return posts.length
}

/**
 * gets api key for mce
 * @param state
 * @returns {string}
 */
export const mce_apikey = (state) => state.mce_api_key
