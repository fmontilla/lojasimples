import Vue from 'vue';
import Vuex from 'vuex'
import * as actions from './shop/actions'
import * as getters from './shop/getters'
import products from './shop/products'
import shoppingCart from './shop/shopping-cart'

import endereco from './modules/endereco'
import pedido from './modules/pedido'
import produto from './modules/produto'
import usuario from './modules/usuario'

Vue.use(Vuex);
const debug = process.env.NODE_ENV !== 'production'
/*
 * If not building with SSR mode, you can
 * directly export the Store instantiation
 */

const store = new Vuex.Store({
    strict: debug,

    actions,
    getters,
    modules: {
        endereco,
        pedido,
        products,
        produto,
        shoppingCart,
        usuario
    }
});

export default store
