<template>

  <div class="table__overflow">
    <table class="datatable table">
      <tbody>
        <tr>
          <td>Subtotal ({{ item_count }} items):</td>
          <td class="text-xs-right">{{ subtotal | money }}</td>
        </tr>
        <tr>
          <td>Taxas:</td>
          <td class="text-xs-right">{{ taxes | money }}</td>
        </tr>
        <tr>
          <td><strong>Valor Total:</strong></td>
          <td class="text-xs-right"><strong>{{ grand_total | money }}</strong></td>
        </tr>

      </tbody>
    </table>
  </div><!-- .table__overflow -->

</template>


<script>
export default {

  computed: {
    items() { return this.$store.getters.cartItems },
    item_count() { return this.$store.getters.cartItemCount },
    subtotal() { return this.$store.getters.cartSubtotal },
    taxes() { return this.$store.getters.cartTaxes },
    grand_total() { return this.$store.getters.cartGrandTotal },
  },

}
</script>
