import resource from '../../resources/endereco'
import _ from "lodash";

export const SEARCH_SUCCESS = 'ENDERECO_SEARCH_SUCCESS'
export const ERROR = 'ENDERECO_ERROR'

export const initialValue = {
    endereco: null,
    numero: null,
    complemento: null,
    bairro: null,
    cidade: null,
    estado: null,
    cep: null
};

const endereco = {
    namespaced: true,
    state: {
        search: null,
        endereco: _.clone(initialValue),
        enderecos: [],
        errors: null,
        selected: []
    },
    mutations: {
        [SEARCH_SUCCESS] (state, payload) {
            state.enderecos = payload
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

export default endereco;
