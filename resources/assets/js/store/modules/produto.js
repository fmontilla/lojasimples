import resource from '../../resources/endereco'
import _ from "lodash";

export const SEARCH_SUCCESS = 'PRODUTO_SEARCH_SUCCESS'
export const ERROR = 'PRODUTO_ERROR'

export const initialValue = {
    nome: null,
    descricao: null,
    imagem_principal: null,
    imagens: [],
    preco: null,
    caracteristicas: null
};

const produto = {
    namespaced: true,
    state: {
        search: null,
        produto: _.clone(initialValue),
        produtos: [],
        errors: null,
        selected: []
    },
    mutations: {
        [SEARCH_SUCCESS] (state, payload) {
            state.produtos = payload
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

export default produto;
