/**
 *
 * @param state
 * @param comments {array<{
     * author: string,
     * post_id: number,
     * comment: string,
     * published: boolean,
     * created_at: Date
 * }>}
 * @constructor
 */
export const FETCH_COMMENTS = (state, comments) => state.comments = comments
