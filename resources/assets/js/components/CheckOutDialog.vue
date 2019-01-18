<template>

  <v-dialog
    width="600"
    :value="value"
    :fullscreen="isTiny"
    :transition="dialogTransition"
    @input="valueChanged($event)"
  >
    <v-alert
            v-model="alert"
            dismissible
            type="warning"
    >
      {{this.message}}
    </v-alert>
    <v-card>
      <form>
        <v-card-title class="primary">
          <span class="white--text title">
            Check Out
          </span>
        </v-card-title>

        <v-stepper v-model="step" vertical non-linear>
          <v-stepper-step editable step="1" :complete="step > 1">
            Dados de Contato
          </v-stepper-step>
          <v-stepper-content step="1">

            <v-text-field
              v-model="form.nome"
              name="nome"
              label="Nome"
              hint="Digite seu nome"
              required
              :error-messages="getErrors('nome')"
            ></v-text-field>

            <v-layout row wrap>
              <v-flex xs12 sm6>
                <v-text-field
                  v-model="form.email"
                  name="email"
                  label="Email"
                  :error-messages="getErrors('email')"
                  hint="Informe um e-mail válido"
                  required
                ></v-text-field>
              </v-flex>
              <v-flex xs12 sm6>
                <v-text-field
                  v-model="form.telefone"
                  name="telefone"
                  label="Telefone"
                  :error-messages="getErrors('telefone')"
                  hint="Informe um número de telefone"
                ></v-text-field>
              </v-flex>
            </v-layout>

            <v-btn primary @click.native="step = 2">
              Continue
            </v-btn>
          </v-stepper-content>

          <v-stepper-step editable step="2" :complete="step > 3">
            Endereço de Entrega
          </v-stepper-step>
          <v-stepper-content step="2">

            <v-text-field
              v-model="form.endereco.endereco"
              name="endereco"
              label="Endereço"
              :error-messages="getErrors('endereco.endereco')"
            ></v-text-field>

            <v-layout row wrap>
              <v-flex xs12 sm6>
                <v-text-field
                        v-model="form.endereco.numero"
                        name="numero"
                        label="Número"
                        :error-messages="getErrors('endereco.numero')"
                ></v-text-field>
              </v-flex>
              <v-flex xs12 sm3>
                <v-text-field
                        v-model="form.endereco.complemento"
                        name="complemento"
                        label="Complemento"
                        :error-messages="getErrors('endereco.complemento')"
                ></v-text-field>
              </v-flex>
              <v-flex xs12 sm3>
                <v-text-field
                        v-model="form.endereco.bairro"
                        name="bairro"
                        label="Bairro"
                        :error-messages="getErrors('endereco.bairro')"
                ></v-text-field>
              </v-flex>
            </v-layout>

            <v-layout row wrap>
              <v-flex xs12 sm6>
                <v-text-field
                  v-model="form.endereco.cidade"
                  name="cidade"
                  label="Cidade"
                  :error-messages="getErrors('endereco.cidade')"
                ></v-text-field>
              </v-flex>
              <v-flex xs12 sm3>
                <v-text-field
                  v-model="form.endereco.estado"
                  name="estado"
                  label="Estado"
                  :error-messages="getErrors('endereco.estado')"
                ></v-text-field>
              </v-flex>
              <v-flex xs12 sm3>
                <v-text-field
                  v-model="form.endereco.cep"
                  name="cep"
                  label="CEP"
                  :error-messages="getErrors('endereco.cep')"
                ></v-text-field>
              </v-flex>
            </v-layout>
          </v-stepper-content>
        </v-stepper>


        <v-card-actions>
          <v-spacer></v-spacer>
          <v-btn primary
             class="green--text darken-1"
            @click.native.prevent="clickPurchaseButton"
          >
            Finalizar
          </v-btn>
          <v-btn
            class="green--text darken-1"
            @click.native="valueChanged(false)"
            flat="flat"
          >
            Cancelar
          </v-btn>
        </v-card-actions>
      </form>
    </v-card>
  </v-dialog>

</template>


<script>
import InputValidation from '../mixins/InputValidation';

export default {

  mixins: [ InputValidation ],

  props: {
    value: false,
  },

  data() {
    return {
      alert: false,
      message: '',
      step: 1,
      form: {
        nome: '',
        email: '',
        telefone: '',
        endereco: {
          endereco: '',
          numero: '',
          complemento: '',
          bairro: '',
          cidade: '',
          estado: '',
          cep: ''
        },
      },
      rules: {
        'nome': 'required|min:3',
        'email': 'required|email',
        'telefone': 'required',
        'endereco.endereco': 'required|min:6',
        'endereco.numero': 'required',
        'endereco.bairro': 'required',
        'endereco.cidade': 'required',
        'endereco.estado': 'required',
        'endereco.cep': 'required',
      }
    };
  },

  computed: {
    items() { return this.$store.getters.cartItemList },
    grand_total() { return this.$store.getters.cartGrandTotal },

    isTiny() {
      return window.innerWidth < 600;
    },
    dialogTransition() {
      return (this.isTiny)
        ? 'v-dialog-bottom-transition'
        : 'v-dialog-transition';
    },
  },

  methods: {
    valueChanged(val) {
      this.value = val
      this.$emit("input", val)
    },

    removeItem(item) {
        this.$store.dispatch('removeAllItemFromCart',item);
    },

    clickPurchaseButton() {

      axios.post('/api/pedido', Object.assign({
        itens: this.items,
        total: this.grand_total,
      }, this.form))
      .then((response) => {
          alert('Pedido realizado com sucesso.');
          this.value = false;
          removeItem(this.items);
      })
      .catch((error) => {
          if (error.response) {
              let retorno = '';
              for (var data in error.response.data) {
                  retorno+= data+' , ';
              }
              this.alert = true;
              this.message = 'Preencha os seguintes campos: '+retorno;
          }
      })
    },
  },

  watch: {
    value() {
      this.step = 1;
      this.value;
    },
  }


}
</script>

