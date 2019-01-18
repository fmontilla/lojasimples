import Vue from '../vue'

const EnderecoResource = Vue.resource('/api/endereco{/id}');

export default EnderecoResource
