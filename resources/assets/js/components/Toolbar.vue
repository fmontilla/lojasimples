<template>
  <v-toolbar class="indigo darken1" fixed>
    <v-toolbar-title>
      <span class="white--text">
        <a :href="`/`" style="color: inherit;">Loja Simples</a>
      </span>
    </v-toolbar-title>
    <v-spacer></v-spacer>
    <div class="pr-2">
      <span class="white--text">
        <a :href="`/pedidos`" style="color: inherit;">
          Meus Pedidos
        </a>
      </span>
    </div>
  </v-toolbar>
</template>


<script>
export default {

  computed: {

  },
}
</script>
