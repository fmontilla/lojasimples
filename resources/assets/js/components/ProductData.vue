<template>
    <v-dialog
            :value="value"
            :transition="dialogTransition"
            @input="valueChanged($event)"
    >
        <v-card>
            <v-card-title>
                {{product.nome}}
            </v-card-title>
            <v-carousel
                    v-if="product && product.imagens"
                    delimiter-icon="stop"
                    prev-icon="mdi-arrow-left"
                    next-icon="mdi-arrow-right"
            >
                <v-carousel-item
                        v-for="(item,i) in product.imagens"
                        :key="i"
                        :src="item.imagem"
                ></v-carousel-item>
            </v-carousel>
            <v-card-text>
                {{product.descricao}}
            </v-card-text>
            <v-container fluid v-if="product && product.caracteristicas">
                <v-layout row>
                    <v-flex grow>
                        <v-card dark color="primary">
                            <v-card-text>Características</v-card-text>
                        </v-card>
                    </v-flex>
                </v-layout>
                <v-layout row>
                    <v-flex d-flex xs12 sm3>
                        <v-card dark color="white darken-1">
                            <v-card-text style="color:black">Cor</v-card-text>
                        </v-card>
                    </v-flex>
                    <v-flex d-flex xs12 sm9>
                        <v-card dark color="white lighten-1">
                            <v-card-text style="color:black">{{product.caracteristicas.cor}}</v-card-text>
                        </v-card>
                    </v-flex>
                </v-layout>
                <v-layout row>
                    <v-flex d-flex xs12 sm3>
                        <v-card dark color="white darken-1">
                            <v-card-text style="color:black">Instruções de cuidados</v-card-text>
                        </v-card>
                    </v-flex>
                    <v-flex d-flex xs12 sm9>
                        <v-card dark color="white lighten-1">
                            <v-card-text style="color:black">{{product.caracteristicas.instrucoes_cuidados}}</v-card-text>
                        </v-card>
                    </v-flex>
                </v-layout>
                <v-layout row>
                    <v-flex d-flex xs12 sm3>
                        <v-card dark color="white darken-1">
                            <v-card-text style="color:black">Modelo</v-card-text>
                        </v-card>
                    </v-flex>
                    <v-flex d-flex xs12 sm9>
                        <v-card dark color="white lighten-1">
                            <v-card-text style="color:black">{{product.caracteristicas.modelo}}</v-card-text>
                        </v-card>
                    </v-flex>
                </v-layout>
                <v-layout row>
                    <v-flex d-flex xs12 sm3>
                        <v-card dark color="white darken-1">
                            <v-card-text style="color:black">Material</v-card-text>
                        </v-card>
                    </v-flex>
                    <v-flex d-flex xs12 sm9>
                        <v-card dark color="white lighten-1">
                            <v-card-text style="color:black">{{product.caracteristicas.material}}</v-card-text>
                        </v-card>
                    </v-flex>
                </v-layout>
            </v-container>
            <v-card-actions>
                <v-spacer></v-spacer>
                <v-btn
                        class="green--text darken-1"
                        @click.native="valueChanged(false)"
                        flat="flat"
                >
                    Cancelar
                </v-btn>
            </v-card-actions>
        </v-card>
    </v-dialog>
</template>

<script>
    export default {
        data () {
            return {
                items: [{"cor": "LightYellow", "modelo": "Maida", "material": "Glenda", "instrucoes_cuidados": "Rem dolor eaque enim illo cum. Repellendus inventore minima laudantium. Beatae aut sunt voluptatem nisi et. Et et nisi optio doloremque perspiciatis ea."}]
            }
        },
        props: {
            value: {
                accept: Boolean,
                default: false,
            },
        },
        computed: {
            product() { return this.$store.state.products.product },
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
                // this.value = val
                this.$emit("input", val)
            }
        },
        watch: {
            value() {
                this.step = 1;
                this.value;
            },
        }
    }
</script>

<style scoped>

</style>
