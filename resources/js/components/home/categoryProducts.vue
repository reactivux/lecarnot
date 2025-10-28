<template>
    <section class="section section-products df__pt  " v-for="(category, indexCat) in categories"
        :key="`${indexCat}-${category}-categorie`" :class="{ 'secondary-bg df__pt  ': indexCat % 2 !== 0 }">

        <div class="container">
            <div :id="category?.name" v-if="category?.products?.length > 0" class="row">
                <div class="col-12">
                    <div class="tf__section_heading mb_25">
                        <h2 class="title title-h2-left">{{ category?.name }} </h2>
                    </div>
                </div>
            </div>
            <div class="category" v-if="category?.products?.length > 0">
                <div class="row  list-products">
                    <div class="col-item col-item-4" v-for="(product, indexProd) in category?.products"
                        :key="`${product.id}-${indexProd}-produit`">
                        <!--  :class="[indexCat % 2 !== 0 ? 'product-item-bg-primary' : 'product-item-bg-secondary']" -->
                        <div class="product-item item-bg-color" @click="redirectToSinglePage(product)">
                            <div class="on-hover-product">
                                <div class="wrappimage-mask"></div>
                                <!-- <div class="view-product">
                                    <div class="view d-flex justify-content-center align-items-center">
                                        <span class="icon icon-contact icon-eye"></span>
                                    </div>
                                </div> -->
                                <div class="add-to-cart">
                                    <button class="buttons   w-100">
                                        Préparer votre commande
                                    </button>
                                </div>
                            </div>
                            <div class="product-head">
                                <div class="product-img"><img width="110" height="110" fetchpriority="high"
                                        v-lazy="this.$global.getImageUrl(product, 'product')"
                                        :alt="`${category?.name} - ${product.name}`"></div>
                                <div class="product-name">
                                    <p class="price">€{{
                                        this.$ProductUtils.productPrice(product).toFixed(2) }} </p>
                                    <h3 class="title title-h3"> {{ product.name }}</h3>
                                    <div class="product-description">
                                        <p v-if="concatenateNamesOfIngredients(product)" class="text">
                                            {{ concatenateNamesOfIngredients(product) }} </p>
                                        <p v-else class="text">
                                            {{ product?.description }}
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- <div class="row">
                <div class="col-12 text-center">
                    <a @click="redirectToCategory(category?.name)"
                        class="buttons buttons-themex buttons-themex-border buttons-md"> Commander maintenant</a>
                </div>
            </div> -->
        </div>
    </section>
</template>

<script lang="ts">

import { mapActions, mapState, mapMutations, Store, mapGetters } from "vuex";

export default {
    props: ['categories'],
    async created() {
       
    },
    methods: {
        concatenateNamesOfIngredients(product) {
            return this.$ProductUtils.concatenateNamesIngredients(product, false);
        },
        redirectToSinglePage(product) {
          
            window.location.href = "/single-product/" + product?.slug
        },
        redirectToCategory(category) {

            window.location.href = "/produits#" + encodeURIComponent(category)
        }
    }
};
</script>