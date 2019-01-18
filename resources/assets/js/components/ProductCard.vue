<template>

  <v-card raised hover class="my-2" height="400px" style="min-width:200; max-width:300px">
    <v-img
      class="white--text"
      height="200px"
      :src="product.imagem_principal"
    >
      <v-container fill-height fluid>
        <v-layout fill-height>
          <v-flex xs12 align-end flexbox>
            <span class="headline shadow-text">
              {{ product.nome }}
            </span>
          </v-flex>
        </v-layout>
      </v-container>
    </v-img>
    <v-card-text class="pb-0 fade-out product-card-description">
        {{product.descricao}}
    </v-card-text>
    <v-card-text class="pb-0 center-text">
        R$ {{ product.preco }}
    </v-card-text>
    <v-card-actions class="justify-center">
      <v-btn primary
        @click.prevent="addToCart($event,product)"
      >
        Adicionar ao Carrinho
      </v-btn>
    </v-card-actions>
  </v-card>

</template>

<script>
export default {
  props: {
    product: {
      title: '',
      image: '',
      description: '',
      price: '',
      quantity: '',
    }
  },
  methods: {
    addToCart(event,item) {
        event.cancelBubble = true;
      this.$store.dispatch('addItemToCart',item);
    }
  },

}

</script>
