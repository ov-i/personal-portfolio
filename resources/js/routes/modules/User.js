import Users from "../../views/modules/Users/Users";
import UserEdit from "../../views/modules/Users/UserEdit";
import UserShow from "../../views/modules/UserShow";

export default [
    {
        path: '/admin/users',
        name: 'Users',
        component: Users
    },
    {
        path: '/admin/users/:id/edit',
        name: 'UserEdit',
        component: UserEdit
    },
    {
        path: '/admin/users/:id/show',
        name: 'UserShow',
        component: UserShow
    },
]
