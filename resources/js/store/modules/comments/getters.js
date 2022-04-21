/**
 * gets roles from store state
 *
 * @param state
 * @returns {array<{id: number, name: string, created_at: Date, updated_at: Date, deleted_at: Date | null}>}
 */
export const getComments = (state) => state.comments
