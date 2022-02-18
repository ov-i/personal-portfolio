/**
 * mutates posts state
 *
 * @param state
 * @param { array } posts
 * @constructor
 */
export const FETCH_POSTS = (state, posts) => state.posts = posts

export const CREATE_POST = (state, post) => {
    const { posts } = state.posts

    posts.push({ id: posts.length + 1, ...post })
    console.log(post)
}

export const PUBLISH_POST = (state, post) => {
    post.published = true
}

export const UNPUBLISH_POST = (state, post) => {
    post.published = false
}
