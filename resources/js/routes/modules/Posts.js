import Posts from "../../views/modules/Posts/Posts";
import PostsCreate from "../../views/modules/Posts/PostsCreate";
import PostEdit from "../../views/modules/Posts/PostEdit";
import PostShow from "../../views/modules/Posts/PostShow";
import PostPreview from "../../views/modules/Posts/PostPreview";

export default [
    {
        path: '/admin/posts',
        name: 'Posts',
        component: Posts
    },
    {
        path: '/admin/posts/create',
        name: 'PostCreate',
        component: PostsCreate
    },
    {
        path: '/admin/posts/:slug/show',
        name: 'PostShow',
        component: PostShow
    },
    {
        path: '/admin/posts/:id/preview',
        name: 'PostPreview',
        component: PostPreview
    },
    {
        path: '/admin/posts/:slug/edit',
        name: 'PostEdit',
        component: PostEdit
    }
]
