import Home from "../../views/Home";
import Users from "../../views/Users";

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
];
