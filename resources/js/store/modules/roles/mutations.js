/**
 * saves roles to store roles variable
 *
 * @param state
 * @param role {{id: number, name: string}}
 * @constructor
 */
export const FETCH_ROLES = (state, role) => state.roles = role

/**
 * pushes to roles array new role
 *
 * @param state
 * @param role {{id: number, name: string}}
 * @constructor
 */
export const CREATE_ROLE = (state, role) => {
    const { roles } = state.roles

    roles.push({
        id: roles.length + 1,
        name: role.name
    })
}
