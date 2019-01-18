
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

import Vuex from 'vuex'
Vue.use(Vuex);

require('vuetify');

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

Vue.component('VCardRow', {
    template: '<div><slot></slot></div>',
})

Vue.component('SStoreFront', require('./components/StoreFront.vue'));
Vue.component('SToolbar', require('./components/Toolbar.vue'));
Vue.component('SProductList', require('./components/ProductList.vue'));
Vue.component('SProductCard', require('./components/ProductCard.vue'));
Vue.component('SProductData', require('./components/ProductData.vue'));
Vue.component('SShoppingCart', require('./components/ShoppingCart.vue'));
Vue.component('SShoppingCartTotals', require('./components/ShoppingCartTotals.vue'));
Vue.component('SCheckoutDialog', require('./components/CheckOutDialog.vue'));
Vue.component('SOrder', require('./components/Order.vue'));

Vue.filter('money', (value) => {
   return 'R$' + Number(value).toFixed(2);
})



import store from './store';

const app = new Vue({
    el: '#content',
    store,
});
