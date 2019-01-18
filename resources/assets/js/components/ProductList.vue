<template>

  <div>
    <v-layout row wrap>
      <v-flex>
        <div class="display-1">Produtos</div>
      </v-flex>
      <v-flex>
        <v-text-field
          id="product-search"
          append-icon="search"
          label="Search"
          single-line
          hide-details
          v-model="filter"
        ></v-text-field>
      </v-flex>
    </v-layout>

    <v-layout row wrap>
      <v-flex xs12 sm6 md4 lg3 xl2
              v-for="item in filteredProducts"
              :key="item.id">

        <s-product-card
                :product="item"
                @click.native.stop="productData(item)"
        >
        </s-product-card>

      </v-flex>
    </v-layout>
    <s-product-data v-model="productDataDialog">
    </s-product-data>
  </div>

</template>


<script>

export default {

  data() {
    return {
      filter: '',
      productDataDialog: false,
      item: null
    };
  },

  computed: {
    products() { return this.$store.getters.products },

    filteredProducts() {
      return this.products.filter((product) => {
        return (! this.filter.length )
          || product.nome.toLowerCase()
              .includes(this.filter.toLowerCase())
          || product.descricao.toLowerCase()
              .includes(this.filter.toLowerCase());
      })
    }
  },
  methods: {
      productData(item) {
          this.$store.dispatch('productData',item);
          this.productDataDialog = true;
          this.item = item;
      }
  }
}
</script>
