export const HANDLE_FETCH_ERROR = (state, error) => {
    state.fetchErrors.push(error);
}
