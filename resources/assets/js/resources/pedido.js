import Vue from '../vue'

const PedidoResource = Vue.resource('/api/pedido{/id}');

export default PedidoResource
