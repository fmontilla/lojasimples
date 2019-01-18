const state = {

  items: [],
  product: {}

}


const mutations = {
  LOAD_PRODUCTS (state, products) {
    state.items = products
  },

  ADD_TO_CART (state, productId) {
    state.items
      .find(product => product.id === productId)
  },

  PRODUCT_DATA (state, product) {
      state.product = product
  },

  REMOVE_FROM_CART (state, removedProduct) {
    state.items
      .find(product => product.id === removedProduct.id)
  },

  REMOVE_ALL_FROM_CART (state) {
      state.items
          .find(product)
  }
}



export default {
  state,
  mutations,
}
