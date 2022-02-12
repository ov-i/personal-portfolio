import Home from "../views/Home";
import Users from "../views/Users";
import PostModule from "./modules/Posts";

export const routes = [
    {
        path: '/admin/',
        name: 'Home',
        component: Home
    },
    {
        path: '/admin/users',
        name: 'Users',
        component: Users
    },
    {
        path: '/admin/categories',
        name: 'Categories',
        component: Users
    },
    {
        path: '/admin/tags',
        name: 'Tags',
        component: Users
    },
    {
        path: '/admin/roles',
        name: 'Roles',
        component: Users
    },
    {
        path: '/admin/comments',
        name: 'Comments',
        component: Users
    },
    {
        path: '/admin/attachments',
        name: 'Attachments',
        component: Users
    },

    ...PostModule
];
