import Vue from '../vue'

const UsuarioResource = Vue.resource('/api/usuario{/id}');

export default UsuarioResource
