<template>
<v-app id="store-front">

  <s-toolbar></s-toolbar>
  <main style="margin-top: 70px;">
    <v-container fluid>

      <v-layout row wrap>
        <v-flex xs12 sm8 md9 lg10 order-xs2 order-sm1 style="flex:1">
          <s-product-list></s-product-list>
        </v-flex>
        <v-flex xs12 sm4 md3 lg2 order-xs1 order-sm2 style="flex:1;min-width:360px">
          <s-shopping-cart></s-shopping-cart>
        </v-flex>
      </v-layout>

    </v-container>
  </main>
  <v-footer></v-footer>

</v-app>
</template>

<script>
export default {

    created() {
        this.$store.dispatch('loadProducts',null);
    },

}
</script>
