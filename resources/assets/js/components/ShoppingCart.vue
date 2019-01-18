<template>
  <div>
    <div class="display-1" style="text-align:center">Carrinho</div>

    <v-card>
    <v-list two-line>
      <template v-for="item in items">
        <v-list-tile avatar :key="item.nome">

          <v-list-tile-avatar>
            <img :src="item.imagem_principal">
          </v-list-tile-avatar>

          <v-list-tile-content>
            <v-list-tile-title v-html="item.nome">
            </v-list-tile-title>
            <v-list-tile-sub-title>
              Quantidade: {{ item.quantity }} &nbsp; - &nbsp;
              R$ {{ item.preco }}
            </v-list-tile-sub-title>
          </v-list-tile-content>

          <v-list-tile-action>
            <v-btn icon ripple
              @click.native="removeItem(item)"
            >
              <v-icon class="grey--text text--lighten-1">
                close
              </v-icon>
            </v-btn>
          </v-list-tile-action>

        </v-list-tile>
      </template>
    </v-list>

    <s-shopping-cart-totals></s-shopping-cart-totals>

    <v-card-actions class="justify-center">
      <v-btn primary
        v-if="item_count > 0"
        @click.native.stop="checkout()"
      >
        Check out
      </v-btn>
    </v-card-actions>

  </v-card>

  <s-checkout-dialog v-model="checkoutDialog">
  </s-checkout-dialog>

  </div>
</template>


<script>
export default {

  data() {
    return {
      checkoutDialog: false,
    }
  },

  computed: {
    items() { return this.$store.getters.cartItems },
    item_count() { return this.$store.getters.cartItemCount },
  },

  methods: {

    removeItem(item) {
      this.$store.dispatch('removeItemFromCart',item);
    },

    checkout() {
      this.checkoutDialog = true;
    }

  },


}
</script>
