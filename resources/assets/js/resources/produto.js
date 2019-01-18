import Vue from '../vue'

const ProdutoResource = Vue.resource('/api/produto{/id}');

export default ProdutoResource
