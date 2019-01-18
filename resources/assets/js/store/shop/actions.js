export const loadProducts = ({ commit }) => {
  axios.get('/api/produto')
    .then((response) => {
      commit('LOAD_PRODUCTS', response.data);
    })
    .catch((error) => {
      console.log('Error loading products');
      console.log(error);
      console.log(error.response);
    })
}

export const productData = ({ commit }, item) => {
  commit('PRODUCT_DATA', item);
}

export const addItemToCart = ({ commit }, item) => {
  commit('ADD_TO_CART', item.id);
}

export const removeItemFromCart = ({ commit }, item) => {
  commit('REMOVE_FROM_CART', item);
}

export const removeAllItemFromCart = ({ commit }, item) => {
    commit('REMOVE_ALL_FROM_CART', item);
}

