<template>

    <section v-if="alertStore?.titre" class="  df__pt ">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div :class="`mb_0 alert-store alert alert-${alertStore?.type}`">
                        <strong v-if="alertStore?.titre">{{ alertStore?.titre }} : </strong>
                        <p v-if="alertStore?.content">{{ alertStore?.content }}</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section v-if="storeData?.data" class=" df__pt ">
        <div class="container">
            <div class="row">
                <div class="col-xl-8 col-lg-8 col-md-7 col-sm-12 col-12">
                    <div v-if="cartStore?.deliveryMode" class="  tf__menu_search_area search">

                        <div class="tf__menu_search">
                            <input type="text" :placeholder="$t('components.pages.store.searchBar.input.placeholder')"
                                v-model="searchQuery" @input="handleSearch" />
                        </div>


                        <!-- <div class="" :class="{
                        'col-md-12 col-lg-12 ': queryAtPlaceExists,
                        'col-lg-12 col-md-12 ': !queryAtPlaceExists,
                    }">
                        <div class="tf__menu_search">
                            <input type="text" :placeholder="$t('components.pages.store.searchBar.input.placeholder')"
                                v-model="searchQuery" @input="handleSearch" />
                        </div>
                    </div> -->
                        <!-- <div class="deliveryMode" :class="{
                        'fixedTop ': (deliveryModeFixedTop && checkUrl('/produits')),
                        'col-md-0 d-none ': queryAtPlaceExists,
                        'col-md-6 ': !queryAtPlaceExists,
                    }">
                        <div class="float-end">
                            <div class="type" :class="{ active: cartStore?.deliveryMode == 'liv' }"
                                @click="filterByDeliveryMode('liv')">
                                <div class="deliveryIcon">
                                    <span class="box1"><i aria-hidden="true" class="icon-food_icon_delivery fs1"></i></span>
                                </div>
                                <div class="titre first-letter-maj">{{
                                    $t('components.pages.store.searchBar.deliverymode.liv') }}</div>
                            </div>
                            <div class="type" :class="{ active: cartStore?.deliveryMode == 'cac' }"
                                @click="filterByDeliveryMode('cac')">
                                <div class="deliveryIcon">
                                    <span class="box1"><i aria-hidden="true" class="icon-food_icon_shop fs1"></i></span>
                                </div>
                                <div class="titre first-letter-maj">{{
                                    $t('components.pages.store.searchBar.deliverymode.cac') }}</div>
                            </div>
                        </div>
                    </div> -->
                    </div>
                    <div v-if="categoriesData.length > 0" class="row">
                        <div class="mb-4 mt-4 col-md-12">
                            <CategoriesSwiper :categories="categoriesData" />
                        </div>
                    </div>
                    <div v-if="filteredCategories.length" class="section section-products">
                        <!-- <div v-for="(category, indexCat) in filterListCategoriess" :key="`${indexCat}-${category}-categorie`"
                        class="liv-categories-products mb_30 mt_30">
                        <div class="row" :id="category.name" v-if="category.products.length > 0">
                            <div class="col-md-12">
                                <div class="category">
                                    <div class="liv_category_name">
                                        <h3 class="mb-3 first-letter-maj">{{ category.name }}</h3>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row products-lists  " v-if="category.products.length > 0">
                            <div class=" product" v-for="(product, indexProd) in filterListProducts(category?.products)"
                                :key="`${product.id}-${indexProd}-produit`"
                                @click="PreparerYourProduct(product, category?.logo)">

                                <div class="product-block">
                                    <div class="product-transition">
                                        <div class="product-image image-main">

                                            <img width="110" height="110" fetchpriority="high"
                                                v-lazy="this.$global.getImageUrl(product, 'product')"
                                                :alt="`${category?.name} - ${product.name}`">
                                            <span class="text-center"> <b>€{{
                                                this.$ProductUtils.productPrice(product).toFixed(2) }} </b> </span>
                                        </div>
                                    </div>
                                    <div class="product-caption text-center">
                                        <h3 class="woocommerce-loop-product__title text-center"><a>
                                                {{ product.name }}</a></h3>


                                        <p v-if="concatenateNamesOfIngredients(product)" class="short-description">
                                            {{ concatenateNamesOfIngredients(product) }} </p>
                                        <p v-else class="short-description">
                                            {{ product?.description }}
                                        </p> 
                                    </div>
                                </div> 
                            </div>
                        </div>
                    </div> -->

                        <div class="category mt_30" v-for="(category, indexCat) in filterListCategoriess"
                            :key="`${indexCat}-${category}-categorie`">
                            <div class="row" :id="category.name" v-if="category.products.length > 0">
                                <div class="col-md-12">
                                    <div class="category">
                                        <div class="liv_category_name">
                                            <h3
                                                class="mb_20 mt_20 first-letter-maj title title-h2-left text-porte-leriad">
                                                {{
                                                    category.name }}
                                            </h3>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row  list-products" v-if="category.products.length > 0">
                                <div class="col-item  col-item-3"
                                    v-for="(product, indexProd) in filterListProducts(category?.products)"
                                    :key="`${product.id}-${indexProd}-produit`">
                                    <div class="product-item item-bg-color"
                                        @click="PreparerYourProduct(product, category?.logo)">
                                        <div class="product-head">
                                            <div class="product-img"><img width="110" height="110" fetchpriority="high"
                                                    v-lazy="this.$global.getImageUrl(product, 'product')"
                                                    :alt="`${category?.name} - ${product.name}`">
                                            </div>
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

                    </div>
                    <notfound-component v-else title="Aucun résultat"
                        description="Désolé, le produit que vous cherchez est indisponible ." img="" />
                </div>
                <cart-component />
            </div>
        </div>
    </section>
    <custom-modal-add-to-cart v-if="isModalAddToCartOpen" v-model="isModalAddToCartOpen"
        :product="productsStore.currentProduct" :action="'add'" :indexProduct="0"
        @toggleAddToCart="handleToggleAddToCart" :isModalAddToCartOpen="isModalAddToCartOpen" />
    <dialog-confirmation ref="dialogConfirmations" />
</template>

<script lang="ts">
import { mapActions, mapState, mapMutations, Store, mapGetters } from "vuex";
import CategoriesSwiper from "./CategoriesSwiper.vue"

export default {
    props: ['categories'],
    data() {
        return {
            deliveryModeFixedTop: false,
            isModalAddToCartOpen: false,
            searchQuery: "",
            filteredCategories: [],
            queryAtPlaceExists: false
        }
    },
    /** Components */
    components: {
        CategoriesSwiper
    },
    async created() {
        window.addEventListener("scroll", this.handleScroll);
        await this.getLocalPanier();
        const urlParams = new URLSearchParams(window.location.search);
        const isParamAtPlace = urlParams.get('type');
        this.cartStore.deliveryMode = urlParams.get('type') == 'at_place' ? 'at_place' : this.cartStore.deliveryMode == 'cac' ? 'cac' : 'liv'

        /** For version mobile */
        this.deliveryModeFixedTop = window.location.hash ? true : false
        /*** Save prop categoires on state */
        this.$store.commit('SET_CATAGORIES', this.categories)
        if (isParamAtPlace == 'at_place') {
            this.queryAtPlaceExists = true
            await this.checkTableIsExist({ tableID: urlParams.get('table_id') })
            // if (result) {
            //     this.cartStore.table = { id: urlParams.get('table_id'), table_number: urlParams.get('table_number') }
            //     /** First get products by delivery mode found */
            //     this.filterByDeliveryMode('at_place')
            // } else
            if (!this.cartStore?.table?.id) {
                this.cartStore.table = {}
                let sweetOption = {
                    title: "Table n'existe pas ou déja reserver",
                    text: "Scanner d'autre table",
                    icon: 'icon',
                    alertButtons: [
                        { text: "Ok", action: 'cancel', color: "cancleColor" },
                    ],
                }
                const selectedAction = await this.$refs.dialogConfirmations.open(sweetOption);
                /** First get products by delivery mode found */
                this.filterByDeliveryMode('at_place')
            } else {
                // this.cartStore.table = { id: urlParams.get('table_id'), table_number: urlParams.get('table_number') }
                /** First get products by delivery mode found */
                this.filterByDeliveryMode('at_place')
            }
        } else {
            this.cartStore.deliveryMode = this.cartStore?.table?.id && this.cartStore?.deliveryMode === 'at_place' ? 'at_place' : this.cartStore?.deliveryMode
            /** First get products by delivery mode found */
            this.filterByDeliveryMode(this.cartStore.deliveryMode)
        }
        await this.getAlertStore()

    },
    beforeDestroy() {
        window.removeEventListener("scroll", this.handleScroll);
    },
    methods: {
        ...mapActions(['getLocalPanier', 'checkTableIsExist', 'getAlertStore']),
        handleScroll() {
            const scrollPosition = window.pageYOffset || document.documentElement.scrollTop;
            const scrollThreshold = 79;
            this.deliveryModeFixedTop = scrollPosition > scrollThreshold;
        },
        PreparerYourProduct(product, categoryImage) {
            let isCustomerCanOrder = this.$CheckoutUtils.checkIsAllGoodToOrder("prepareProduct");
            if (!this.isModalAddToCartOpen && isCustomerCanOrder?.status) {
                if (this.storeData.isOpenToOrder?.status) {
                    this.productsStore.currentProduct = this.$ProductUtils.prepareMyProduct(product, categoryImage);
                    this.isModalAddToCartOpen = true;
                } else {
                    let option = {
                        showToast: true,
                        type: 'error',
                        toastMessage: this.storeData.isOpenToOrder?.message,
                        duration: 3200
                    }
                    this.$store.commit('showCustomNotification', option);
                }
            }
        },
        handleToggleAddToCart(payload) {
            this.isModalAddToCartOpen = payload;
        },
        concatenateNamesOfIngredients(product) {
            return this.$ProductUtils.concatenateNamesIngredients(product, false);
        },
        /**
         * 
         */

        async filterByDeliveryMode(mode) {
            let switchToDeliveryMode = true
            /** First check if cart has products not avaliable on the mode selected */
            let productsToDelete = this.$ProductUtils.CheckingAvailabilityProducts(
                this.cartStore?.products,
                mode
            );
            /**If array productsToDelete has products delete them first before switch to delivery mode selected */
            if (productsToDelete?.length > 0) {
                let sweetOption = {
                    title: "Êtes-vous sûr ?", // this.$t("alerts.productsToDelete.title"),
                    text: "En basculant vers un autre mode de livraison vous risquez de supprimer certains produits", // this.$t("alerts.productsToDelete.text"),
                    icon: 'icon',
                    // alertButtons: [
                    //     { text: this.$t("button.yes"), action: 'confirm', color: "confirmColor" },
                    //     { text: this.$t("button.no"), action: 'cancel', color: "cancleColor" },
                    // ],
                    alertButtons: [
                        { text: "Oui", action: 'confirm', color: "confirmColor" },
                        { text: "Non", action: 'cancel', color: "cancleColor" },
                    ],
                }
                const selectedAction = await this.$refs.dialogConfirmations.open(sweetOption);
                if (selectedAction == "confirm") {
                    this.cartStore.products = this.cartStore?.products.filter(product => !productsToDelete.includes(product));
                    // re-calculate total
                    this.cartStore.subTotal = this.cartStore?.products.reduce(
                        (sum, product) => sum + product.total,
                        0
                    );
                    switchToDeliveryMode = true
                    let option = {
                        showToast: true,
                        type: 'success',
                        toastMessage: this.$t("notification.product.remove"),
                        duration: 3200
                    }
                    this.$store.commit('showCustomNotification', option);
                } else {
                    switchToDeliveryMode = false
                    let fees = this.storeData?.data?.feeses[0]?.price || 0;
                    this.cartStore.deliveryMode = mode == "liv" ? 'cac' : 'liv';
                    let deliveryTotal = this.cartStore.deliveryMode == "liv" ? fees : 0;
                    this.cartStore.deliveryTotal = deliveryTotal;
                    this.cartStore.table = this.cartStore.deliveryMode == "at_place" ? this.cartStore.table : {};
                }
            }
            /* if switchToDeliveryMode = false, we don't neeed to swtich the delivery mode */
            if (switchToDeliveryMode) {
                let fees = this.storeData?.data?.feeses[0]?.price || 0;
                let deliveryTotal = mode == "liv" ? fees : 0;
                this.cartStore.deliveryMode = mode;
                this.cartStore.deliveryTotal = deliveryTotal;
                this.cartStore.table = mode == "at_place" ? this.cartStore.table : {};
            }
            /** Filter list products by mode selected */
            this.filteredCategories = this.filterListCategoriess.map(category => ({
                ...category,
                products: category.products.filter(product => product[this.cartStore.deliveryMode.toUpperCase()] === 1),
            }));
            /** Check if customer can make an order**/
            let title = ''
            let status = this.$StoreUtils.isCustomerCanPlaceOrder()
            if (status == 'closed') {
                title = this.$t("alerts.beforeOrder.closed")
            } else if (status == 'not-available') {
                title = this.$t(`alerts.beforeOrder.deliveryMode.${this.cartStore.deliveryMode}.isOrder`);
            }
            this.$store.state.storeData['isOpenToOrder'] = { status: status, message: title };
            /**Check if products has promo */
            this.$DiscountUtils.isProductOnPromotion()
            /**Re-calculate total for all discounts */
            this.$DiscountUtils.ReCalculateAllDiscounts();
            /** After changing delivery mode, change it on localstorage with fees  */
            localStorage?.setItem("cart", JSON.stringify(this.cartStore));
        },
        handleSearch() {
            this.filteredCategories = this.filterListCategoriess;
        },
        checkUrl(page) {
            const url = window.location.href;
            return url.includes(page);
        }
    },
    computed: {
        ...mapGetters(['getCartStore']),
        ...mapState(['cartStore', 'productsStore', 'storeData', 'categoriesData', 'alertStore']),
        filterListProducts: function () {
            return (products) =>
                products.filter(
                    (product) =>
                        product.name.toLowerCase().includes(this.searchQuery.toLowerCase()) ||
                        product.category_name.toLowerCase().includes(this.searchQuery.toLowerCase())
                );
        },
        filterListCategoriess() {
            return this.categoriesData.filter(
                (categorie) =>
                    categorie.name.toLowerCase().includes(this.searchQuery.toLowerCase()) ||
                    categorie.products.some((product) =>
                        product.name.toLowerCase().includes(this.searchQuery.toLowerCase())
                    )
            );
        },
    }
};
</script>