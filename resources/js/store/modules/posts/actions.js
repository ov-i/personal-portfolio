import axios from 'axios'
import { router } from "../../../routes";

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
        commit('FETCH_POSTS', posts.data);
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
            user_id: 3,
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
