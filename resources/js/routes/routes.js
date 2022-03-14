import Home from "../views/Home";
import Users from "../views/modules/Users/Users";
import PostModule from "./modules/Posts";
import UserModule from "./modules/User";

export const routes = [
    {
        path: '/admin/',
        name: 'Home',
        component: Home
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
        path: '/admin/comments',
        name: 'Comments',
        component: Users
    },
    {
        path: '/admin/attachments',
        name: 'Attachments',
        component: Users
    },

    ...UserModule,
    ...PostModule,
    ...RoleModule,
];
