/**
 * mutates posts state
 *
 * @param state
 * @param { array } posts
 * @constructor
 */
export const FETCH_POSTS = (state, posts) => state.posts = posts

export const FETCH_POST = (state, post) => state.post = post

export const CREATE_POST = (state, post) => {
    const { posts } = state

    posts.push({ id: posts.length + 1, ...post })
    state.created = true;
}

export const PUBLISH_POST = (state, post) => {
    post.published = true
}

export const UNPUBLISH_POST = (state, post) => {
    post.published = false
}

export const DELETE_POST = (state, id) => {
    const { posts } = state

    posts.splice(id, 1);
}
