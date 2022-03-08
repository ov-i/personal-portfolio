import axios from 'axios'

/**
 * Fetches posts from laravel API
 * @param commit
 * @param getters
 * @param dispatch
 * @returns {Promise<void>}
 */
export const fetchPosts = async ({ commit, getters, dispatch }) => {
    /**
     * api endpoint
     * @type {string}
     */
    const endpoint = `${getters.getRequestUrl}/posts`

    try {
        const posts = await axios.get(endpoint)
        commit('FETCH_POSTS', posts.data.posts);
    } catch (error) {
        dispatch('notFoundException', 'Problem z przetworzeniem danych')
    }
}

/**
 * Creates new post
 * @param commit
 * @param dispatch
 * @param getters
 * @param new_post
 * @param tags
 * @param attachments
 * @returns {Promise<void>}
 */
export const createPost = async ({ commit, dispatch, getters }, { new_post, tags, attachments }) => {
    /**
     * api endpoint
     * @type {string}
     */
    const endpoint = `${getters.getRequestUrl}/posts`

    try {
        const { post } = await axios.post(endpoint, {
            thumbnail_url: new_post.thumbnail_url,
            user_id: 1,
            category_id: new_post.category_id,
            title: new_post.title,
            slug: new_post.slug,
            description: new_post.description,
            content: new_post.content,
            published: false,
            tags: [...tags],
            attachments: [...attachments]
        },{
            headers: {
                'Content-Type': 'application/json'
            }
        })
        commit('CREATE_POST', post);
    } catch (error) {
        dispatch('notFoundException', 'Problem z przetworzeniem danych')
    }

}

export const publishPost = async ({ commit, dispatch, getters }, post) => {
    /**
     * api endpoint
     * @type {string}
     */
    const endpoint = `${getters.getRequestUrl}/posts/${post.id}`

    try {
         await axios.put(endpoint, {}, {
            headers: {
                'Content-Type': 'application/json'
            }
        })
        commit('PUBLISH_POST', post)
    } catch (error) {
        dispatch('notFoundException', 'Problem z przetworzeniem danych')
    }
}

export const unPublishPost = async ({ commit, dispatch, getters }, post) => {
    /**
     * api endpoint
     * @type {string}
     */
    const endpoint = `${getters.getRequestUrl}/posts/${post.id}`

    try {
        await axios.put(endpoint, {}, {
            headers: {
                'Content-Type': 'application/json'
            }
        })
        commit('UNPUBLISH_POST', post)
    } catch (error) {
        dispatch('notFoundException', 'Problem z przetworzeniem danych')
    }
}
