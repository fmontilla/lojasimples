<template>
    <v-app id="store-front">

        <s-toolbar></s-toolbar>
        <main style="margin-top: 70px;">
            <v-data-table
                    :headers="headers"
                    :items="pedidos"
                    class="elevation-1"
            >
                <template slot="items" slot-scope="props">
                    <td>{{ props.item.id }}</td>
                    <td class="text-xs-left">{{ usuarios[props.item.usuario_id].nome }}</td>
                    <td class="text-xs-left">{{ props.item.itens }}</td>
                    <td class="text-xs-left">{{ props.item.total }}</td>
                    <td class="text-xs-left">{{ enderecos[props.item.endereco_id].endereco }}</td>
                    <td class="text-xs-left">{{ props.item.created_at }}</td>
                </template>
            </v-data-table>
        </main>
        <v-footer></v-footer>

    </v-app>
</template>

<script>
    import { mapState, mapActions } from 'vuex'

    export default {
        data () {
            return {
                headers: [
                    {
                        text: 'Número Pedido',
                        align: 'left',
                        sortable: false,
                        value: 'id'
                    },
                    { text: 'Cliente', value: 'usuario_id' },
                    { text: 'Produtos', value: 'itens' },
                    { text: 'Total', value: 'total' },
                    { text: 'Endereço', value: 'endereco_id' },
                    { text: 'Data do Pedido', value: 'created_at' }
                ]
            }
        },

        computed: mapState({
            enderecos: state => state.endereco.enderecos,
            pedidos: state => state.pedido.pedidos,
            produtos: state => state.produto.produtos,
            usuarios: state => state.usuario.usuarios
        }),
        mounted () {
            this.search();
            this.search_endereco();
            this.search_produto();
            this.search_usuario();
        },
        methods: {
            ...mapActions('endereco', {'search_endereco':'search'}),
            ...mapActions('pedido', ['search']),
            ...mapActions('produto', {'search_produto':'search'}),
            ...mapActions('usuario', {'search_usuario':'search'})
        }
    }
</script>

<style scoped>

</style>
