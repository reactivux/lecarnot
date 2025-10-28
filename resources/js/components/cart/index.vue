<template>

    <section class="tf__signin page-cart pt_100 xs_pt_70 pb_100 xs_pb_70">
        <div class="container">
            <div class="row justify-content-center wow fadeInUp  ">
                <div class="col-xl-5 col-sm-10 col-md-8 col-lg-6 section-carts">

                    <div id="sticky_sidebar" class="cart-list top-20 sticky-top cart">
                        <div v-if="cartStore?.products?.length" class="cart-content item-bg-color">
                            <h6 class="cart-title title title-h6">Votre panier</h6>
                            <div class="productsOnCart mt-3">
                                <div class="item mb_20" v-for="(product, productIndex) in cartStore?.products"
                                    :key="productIndex">
                                    <div class="d-flex justify-content-between">
                                        <div class="productName d-flex justify-content-start">
                                            <div class="quantity d-flex justify-content-start">
                                                <div @click="PlusMinusQteProduct('minus', product, productIndex)"
                                                    class="decrease cursor-pointer">
                                                    -
                                                </div>
                                                <span class="text-color">{{ product.quantity }}</span>
                                                <div @click="PlusMinusQteProduct('plus', product, productIndex)"
                                                    class="increase cursor-pointer">
                                                    +
                                                </div>
                                            </div>
                                            <div>
                                                <p class="m_0 p_0 text-color">
                                                    {{ product?.category_name }} -
                                                    {{ $ProductUtils.productName(product) }}
                                                </p>
                                                <p class="m_0 p_0 text-color">
                                                    {{ product?.promotion?.text }}
                                                </p>
                                            </div>
                                        </div>
                                        <div class="productPrice text-end">
                                            <div>
                                                <span class="text-color">
                                                    €
                                                    {{
                                                        (
                                                            $ProductUtils.productPrice(product) *
                                                            product.quantity
                                                        ).toFixed(2)
                                                    }}
                                                </span>
                                                <div>
                                                    <span class="cursor-pointer text-color"
                                                        @click="PreparerYourProduct(product, productIndex)">Modifier
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- <div class="group mb_10 pl_20 pr_20" v-for="group in product.groups.filter(
                            (group) =>
                                group.max == null &&
                                group.button_type == 'CheckboxButton' &&
                                group.sub_products.find((subProduct) => !subProduct.checked)
                        )" :key="groupIndex">
                            <div class="title title-h5 d-flex justify-content-start">
                                <div>
                                    <p class="m_0 p_0">{{ group.title }}</p>
                                </div>
                            </div>
                            <div class="subProductName d-flex justify-content-between" v-for="subProduct in group.sub_products.filter(
                                (subProduct) => !subProduct.checked
                            )" :key="subProductIndex">
                                <div class="text-decoration-line-through">
                                    <span>
                                        {{
                                            subProduct?.ingredient?.name ||
                                            subProduct?.supplement?.name ||
                                            subProduct.name
                                        }}</span>
                                </div>
                            </div>
                        </div> -->
                                    <div class="group mb_10 pl_20 pr_20" v-for="group in product.groups.filter(
                                        (group) =>
                                            group.max == null &&
                                            group.button_type == 'CheckboxButton' &&
                                            group.sub_products.find((subProduct) => subProduct.checked)
                                    )" :key="groupIndex">
                                        <div class="title title-h5 d-flex justify-content-start">
                                            <div>
                                                <p class="m_0 p_0 text-color">{{ group.title }} </p>
                                            </div>
                                        </div>
                                        <div class="subProductName d-flex justify-content-between" v-for="subProduct in group.sub_products.filter(
                                            (subProduct) => subProduct.checked
                                        )" :key="subProductIndex">
                                            <div class=" ">
                                                <span class="text-color">
                                                    {{
                                                        subProduct?.ingredient?.name ||
                                                        subProduct?.supplement?.name ||
                                                        subProduct.name
                                                    }}</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="group mb_10 pl_20 pr_20" v-for="group in product.groups.filter(
                                        (group) =>
                                            group.max != null &&
                                            group.button_type == 'CheckboxButton' &&
                                            group.sub_products.find((subProduct) => subProduct.checked)
                                    )" :key="groupIndex">
                                        <div class="title title-h5 d-flex justify-content-start">
                                            <div>
                                                <p class="m_0 p_0 text-color">{{ group.title }}</p>
                                            </div>
                                        </div>
                                        <div class="subProductName d-flex justify-content-between" v-for="subProduct in group.sub_products.filter(
                                            (subProduct) => subProduct.checked
                                        )" :key="subProductIndex">
                                            <div class=" ">
                                                <span class="text-color">
                                                    {{
                                                        subProduct?.ingredient?.name ||
                                                        subProduct?.supplement?.name ||
                                                        subProduct.name
                                                    }}</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="group mb_10 pl_20 pr_20" v-for="group in product.groups.filter(
                                        (group) =>
                                            (group.button_type == 'RadioButton' &&
                                                group.type != 'size') ||
                                            group.button_type == 'PlusMinusButton'
                                    )" :key="groupIndex">
                                        <div v-if="group.used">
                                            <div class="title title-h5 d-flex justify-content-start">
                                                <div>
                                                    <p class="m_0 p_0 text-color">{{ group.title }}</p>
                                                </div>
                                            </div>
                                            <div class="subProductName d-flex justify-content-between" v-for="subProduct in group?.sub_products.filter(
                                                (subProduct) => subProduct.quantity || subProduct.checked
                                            )" :key="groupIndex">
                                                <div style="width: 100%;">
                                                    <span class="text-color">
                                                        {{ subProduct.quantity || 1 }} x
                                                        {{
                                                            subProduct?.ingredient?.name ||
                                                            subProduct?.supplement?.name ||
                                                            subProduct.name
                                                        }}
                                                    </span>
                                                    <span class="float-end text-color">€
                                                        {{ (product.quantity * subProduct.price).toFixed(2) }}
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <hr />
                            <p class="text-color">
                                Sous total:
                                <span class="text-end">€ {{ cartStore?.subTotal.toFixed(2) }} </span>
                            </p>
                            <p class="text-color" v-if="cartStore?.deliveryMode == 'liv'">
                                {{ $t("components.pages.store.cart.fees") }}:
                                <span class="text-end">€ {{ cartStore?.deliveryTotal.toFixed(2) }}
                                </span>
                            </p>
                            <p class="text-color" v-if="cartStore?.discountCouponcode > 0">
                                Code promo :
                                {{ storeData?.couponCode?.data?.code_number }},
                                {{ storeData?.couponCode?.data?.percentage }} %
                                <span class="text-end">
                                    € -{{ (cartStore?.discountCouponcode).toFixed(2) }}
                                </span>
                            </p>
                            <p class="text-color" v-if="
                                cartStore.discountFidelite > 0 && storeData?.data?.config_loyalty
                            ">
                                Réduction carte fidélité
                                {{ storeData?.data?.config_loyalty[0]?.percentage }} % :
                                <span class="text-end">€ -{{ cartStore.discountFidelite.toFixed(2) }}
                                </span>
                            </p>
                            <p class="text-color" v-if="cartStore.discountPromotions > 0">
                                Promo actuelle :
                                <span class="text-end">€ -{{ cartStore.discountPromotions.toFixed(2) }}
                                </span>
                            </p>
                            <p class="total text-color" v-if="cartStore?.discountTotal > 0">
                                <span>Total réductions :</span>
                                <span class="text-end">€ - {{ (cartStore?.discountTotal).toFixed(2) }}</span>
                            </p>
                            <p class="total text-color">
                                <span> Total:</span>
                                <span class="text-end">€
                                    {{ (cartStore?.totalFinal).toFixed(2) }}
                                </span>
                            </p>
                            <a href="javascript:void(0)" class="buttons buttons-theme buttons-md w-100"
                                @click="checkout">
                                Commander maintenant
                            </a>
                        </div>

                        <div v-else class="cart-content item-bg-color">
                            <notfound-component title=""
                                description="Panier vide. Vous pouvez commencer à ajouter des produits." img="" />
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Modal edit product from cart -->
    <custom-modal-add-to-cart v-if="isModalAddToCartOpen" v-model="isModalAddToCartOpen"
        :product="productsStore?.currentProduct" :action="'edit'" :indexProduct="indexProduct"
        @toggleAddToCart="handleToggleAddToCart" :isModalAddToCartOpen="isModalAddToCartOpen" />
    <!-- Modal choose table when delivery mode is at_place -->
    <modal-tables-component v-if="isModalTableOpen"
        @toggleSelectTable="handleToggleSelectTable"></modal-tables-component>
    <dialog-confirmation ref="dialogConfirmation" />
</template>

<script lang="ts">
import { mapActions, mapState, mapMutations, Store, mapGetters } from "vuex";

export default {
    data() {
        return {
            currentProduct: null,
            isModalAddToCartOpen: false,
            indexProduct: 0,
            isModalTableOpen: false,
            openCartMobile: false,
        };
    },
    components: {},
    mounted() { },
    methods: {
        ...mapActions(["getLocalPanier", "addToCart", "checkTableIsExist"]),
        PreparerYourProduct(product, indexP) {
            this.productsStore.currentProduct = product;
            this.isModalAddToCartOpen = true;
            this.indexProduct = indexP;
        },
        PlusMinusQteProduct(sign, product, indexProduct) {
            let title = "";
            if (sign == "plus") {
                product.quantity++;
            } else if (sign == "minus") {
                if (product.quantity == 1) {
                    let option = {
                        showToast: true,
                        type: "success",
                        toastMessage: this.$t("notification.product.delete"),
                        duration: 3200,
                    };
                    product.quantity--;
                    this.$store.commit("showCustomNotification", option);
                    this.cartStore?.products.splice(indexProduct, 1);
                } else {
                    product.quantity--;
                }
            }
            product.total = this.$ProductUtils.totalProduct(product);
            this.cartStore.subTotal = this.cartStore?.products.reduce(
                (sum, productObj) => sum + productObj.total,
                0
            );
            /**Check if products has promo */
            this.$DiscountUtils.isProductOnPromotion();
            /**Re-calculate total for all discounts */
            this.$DiscountUtils.ReCalculateAllDiscounts();
            if (this.cartStore?.products.length) {
                localStorage?.setItem("cart", JSON.stringify(this.cartStore));
            } else {
                localStorage?.removeItem("cart");
            }
        },
        handleToggleAddToCart(payload) {
            this.isModalAddToCartOpen = payload;
        },
        handleToggleSelectTable(payload) {
            this.isModalTableOpen = payload;
        },
        async checkout() {
            let isCustomerCanOrder = this.$CheckoutUtils.checkIsAllGoodToOrder(
                "order"
            );
            if (isCustomerCanOrder) {
                if (this.cartStore?.deliveryMode == "at_place") {
                    const urlParams = new URLSearchParams(window.location.search);
                    await this.checkTableIsExist({
                        tableID: urlParams.get("table_id"),
                    });
                    if (!this.cartStore?.table?.id) {
                        this.cartStore.table = {};
                        let sweetOption = {
                            title: "Table n'existe pas ou déja reserver",
                            text: "Scanner d'autre table",
                            icon: "icon",
                            alertButtons: [
                                {
                                    text: "Ok",
                                    action: "cancel",
                                    color: "cancleColor",
                                },
                            ],
                        };
                        const selectedAction = await this.$refs.dialogConfirmation.open(
                            sweetOption
                        );
                        return false;
                    }
                }
                // if (this.cartStore?.products?.length > 0) {
                //     window.location.href = "/checkout";
                // }
                if (this.userStore?.isLoggedIn) {
                    if (this.cartStore?.products?.length > 0) {
                        window.location.href = "/checkout";
                    }
                } else {
                    window.location.href = "/signin/?to=checkout";
                }
            }
        },
        showCartMobile() {
            this.openCartMobile = !this.openCartMobile;
        },
    },
    computed: {
        ...mapGetters(["getCartStore"]),
        ...mapState(["cartStore", "productsStore", "storeData", "userStore"]),
    },
};
</script>
