import axios from 'axios'
import {router} from "../../../routes";

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
 *
 * @param commit
 * @param getters
 * @param dispatch
 * @param post
 * @return {Promise<void>}
 */
export const fetchPost = async({ commit, getters, dispatch }, post) => {
    const { getRequestUrl } = getters

    /**
     * api endpoint
     * @type {string}
     */
    const endpoint = `${getRequestUrl}/posts/${post.id}`

    try {
        const { data } = await axios.get(endpoint)
        commit('FETCH_POST', data);
    } catch (error) {
        dispatch('notFoundException', 'Problem z przetworzeniem danych')
    }
}

/**
 * Creates new post
 *
 * @param commit
 * @param dispatch
 * @param getters
 * @param new_post {
     * {
     * thumbnail_url: string,
     * category_id: number,
     * title: string,
     * slug: string,
     * description: string,
     * content: string
     * }
 * }
 * @param tags {array<{id: number}>}
 * @param attachments {array<{id: number}>}
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

/**
 * Publishes post
 * @param commit
 * @param dispatch
 * @param getters
 * @param post
 * @returns {Promise<void>}
 */
export const publishPost = async ({ commit, dispatch, getters }, post) => {
    /**
     * api endpoint
     * @type {string}
     */
    const endpoint = `${getters.getRequestUrl}/post/${post.id}/publish`

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

/**
 * UnPublishes post
 * @param commit
 * @param dispatch
 * @param getters
 * @param post
 * @returns {Promise<void>}
 */
export const unPublishPost = async ({ commit, dispatch, getters }, post) => {
    /**
     * api endpoint
     * @type {string}
     */
    const endpoint = `${getters.getRequestUrl}/post/${post.id}/unPublish`

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

/**
 * Deletes post with passed post{id}
 * @param commit
 * @param dispatch
 * @param getters
 * @param id { number }
 * @param post { object }
 * @returns {Promise<void>}
 */
export const deletePost = async ({ commit, dispatch, getters }, {id, post}) => {
    /**
     * api endpoint
     * @type {string}
     */
    const endpoint = `${getters.getRequestUrl}/posts/${post.id}`

    try {
        await axios.delete(endpoint, {
            headers: {
                'Content-Type': 'application/json'
            }
        })

        commit('DELETE_POST', id)
    } catch (error) {
        dispatch('notFoundException', 'Problem z przetworzeniem danych')
    }
}
