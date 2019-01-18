import Vue from 'vue'
import Vuex from 'vuex'
import VueResource from 'vue-resource'
// import Loading from './bootstrap/ui/Loading'

Vue.use(Vuex);
Vue.use(VueResource);

Vue.http.interceptor.before = function () {
    // window.Loading = Loading;
    // Loading.on();
};

Vue.http.interceptors.push(function(request) {
   return function (response) {
       // Loading.off();
       // if (response.status === 419 || response.status === 401) {
       //     window.location.href = '/admin/login'
       // }
   }
});

// Vue.prototype['_user'] = window['_user'];

export default Vue;
