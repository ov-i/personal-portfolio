import axios from 'axios'

/**
 * Fetches categories from laravel API
 * @param state
 * @param commit
 * @param dispatch
 * @returns {Promise<void>}
 */
export const fetchCategories = async ({ getters, commit, dispatch }) => {
    const endpoint = `${getters.getRequestUrl}/categories`

    try {
        const categories = await axios.get(endpoint);
        commit('FETCH_CATEGORIES', categories.data.categories)
    } catch (error) {
        dispatch('notFoundException', 'Problem z przetworzeniem danych');
    }
}
