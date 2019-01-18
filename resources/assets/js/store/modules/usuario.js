import resource from '../../resources/usuario'
import _ from "lodash";

export const SEARCH_SUCCESS = 'USUARIO_SEARCH_SUCCESS'
export const ERROR = 'USUARIO_ERROR'

export const initialValue = {
    nome: null,
    email: null,
    telefone: null
};

const usuario = {
    namespaced: true,
    state: {
        search: null,
        usuario: _.clone(initialValue),
        usuarios: [],
        errors: null,
        selected: []
    },
    mutations: {
        [SEARCH_SUCCESS] (state, payload) {
            state.usuarios = payload
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

export default usuario;
