import resource from '../../resources/pedido'
import _ from "lodash";

export const SEARCH_SUCCESS = 'PEDIDO_SEARCH_SUCCESS'
export const ERROR = 'PEDIDO_ERROR'

export const initialValue = {
    itens: [],
    usuarios: [],
    total: null,
    enderecos: []
};

const pedido = {
    namespaced: true,
    state: {
        search: null,
        pedido: _.clone(initialValue),
        pedidos: [],
        errors: null,
        selected: []
    },
    mutations: {
        [SEARCH_SUCCESS] (state, payload) {
            state.pedidos = payload
        },
        [ERROR] (state, payload) {
            state.errors = payload
        }
    },
    actions: {
        search ({commit, state}, payload) {
            resource.get(payload).then(response => commit(SEARCH_SUCCESS, response.body), error => commit(ERROR, error.body))
        }
    }
};

export default pedido;
