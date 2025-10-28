<template>
    <section v-if="product" class="single-product df__pt df__pb singleProduct">
        <div class="container">
            <div class="row">
                <div
                    class="col-lg-5 col-sm-10 col-md-9 wow fadeInUp sticky-top mb_20"
                    data-wow-duration="1s"
                    style="
                        visibility: visible;
                        animation-duration: 1s;
                        animation-name: fadeInUp;
                    "
                >
                    <div id="sticky_sidebar" class="cart-list t-20 sticky-top">
                        <div class="cart-content item-bg-color">
                            <div class="wow fadeInUp text-center mt_30 mb_30">
                                <div class="exzoom_img_ul_outer">
                                    <ul class="exzoom_img_ul">
                                        <li>
                                            <img
                                                width="175"
                                                height="175"
                                                fetchpriority="high"
                                                class="zoom ing-fluid w-100"
                                                :alt="`${product?.category?.name} - ${product.name}`"
                                                :src="product?.path_image"
                                                :class="[
                                                    product?.groups.length > 0
                                                        ? 'width-70-per'
                                                        : 'width-70-px',
                                                ]"
                                            />
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div
                    class="col-lg-7 wow fadeInUp"
                    data-wow-duration="1s"
                    style="
                        visibility: visible;
                        animation-duration: 1s;
                        animation-name: fadeInUp;
                    "
                >
                    <promos-component
                        v-if="product.promos.length > 0"
                        :promos="product.promos"
                        className="promo-"
                    />
                    <div class="single-product-content">
                        <div class="row mb-4">
                            <div class="col-md-10">
                                <h2 class="title title-h2">
                                    {{ product?.name }}
                                </h2>
                            </div>
                            <div class="col-md-2">
                                <h3 class="price title title-h3">
                                    {{
                                        parseFloat(product?.total).toFixed(2)
                                    }}
                                    €
                                </h3>
                            </div>
                        </div>

                        <p
                            v-if="product?.ingredient_names"
                            class="description mb-4 text"
                        >
                            {{ product?.ingredient_names }}
                        </p>
                        <p v-else class="description mb-4 text">
                            {{ product?.description }}
                        </p>

                        <form>
                            <div class="row mb-4">
                                <div
                                    class="sub-products"
                                    v-if="product?.groups.length > 0"
                                >
                                    <div
                                        v-for="(
                                            group, indexg
                                        ) in product?.groups"
                                        :key="indexg"
                                        class="row mb_25"
                                    >
                                        <div class="col-md-12">
                                            <div class="groupContent">
                                                <h5 class="title title-h5">
                                                    {{ group.title }}
                                                    <span
                                                        v-if="group.required"
                                                        class="groupRequired"
                                                    >
                                                        {{
                                                            $t(
                                                                "components.pages.store.content.category.product.modal_add_to_cart.required"
                                                            )
                                                        }}
                                                    </span>
                                                </h5>
                                            </div>
                                            <div
                                                v-if="
                                                    group.button_type ==
                                                    'RadioButton'
                                                "
                                                class="elementRadio radio-color"
                                            >
                                                <label
                                                    v-for="(
                                                        subProduct, indexSub
                                                    ) in group.sub_products"
                                                    :key="indexSub"
                                                    class="radio red"
                                                >
                                                    <RadioButton
                                                        :product="product"
                                                        :group="group"
                                                        :subProduct="subProduct"
                                                    />
                                                </label>
                                            </div>
                                            <div
                                                v-else-if="
                                                    group.button_type ==
                                                    'CheckboxButton'
                                                "
                                                class="elementCheckbox checkbox-color"
                                            >
                                                <label
                                                    v-for="(
                                                        subProduct, indexSub
                                                    ) in group.sub_products"
                                                    :key="indexSub"
                                                    class="checkbox red"
                                                >
                                                    <CheckboxButton
                                                        :product="product"
                                                        :group="group"
                                                        :subProduct="subProduct"
                                                    />
                                                </label>
                                            </div>
                                            <div v-else>
                                                <div
                                                    v-for="(
                                                        subProduct, indexSub
                                                    ) in group.sub_products"
                                                    :key="indexSub"
                                                >
                                                    <PlusMinusButton
                                                        :product="product"
                                                        :group="group"
                                                        :subProduct="subProduct"
                                                    />
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="producInfo position-relative">
                                    <figure
                                        :class="[
                                            product?.promos[0] !== undefined
                                                ? 'pt-4'
                                                : '',
                                        ]"
                                        class="text-center h-100 position-relative"
                                    >
                                        <div class="blocAddToCarts">
                                            <div class="col-12">
                                                <div class="dis-block">
                                                    <div
                                                        class="btnPlusMines text-color mb_25"
                                                    >
                                                        <span
                                                            class="btnQte"
                                                            :class="{
                                                                'btnDisabled cursorNoDrop ':
                                                                    product?.quantity ==
                                                                    1,
                                                            }"
                                                            @click="
                                                                AddRemoveQteProduct(
                                                                    'minus'
                                                                )
                                                            "
                                                        >
                                                            -
                                                        </span>
                                                        <span
                                                            class="QteProduct"
                                                        >
                                                            <span
                                                                v-if="
                                                                    product?.quantity
                                                                "
                                                            >
                                                                {{
                                                                    product?.quantity
                                                                }}
                                                            </span>
                                                        </span>
                                                        <span
                                                            class="btnQte"
                                                            @click="
                                                                AddRemoveQteProduct(
                                                                    'plus'
                                                                )
                                                            "
                                                        >
                                                            +
                                                        </span>
                                                    </div>
                                                    <button
                                                        type="button"
                                                        :class="{
                                                            'btn-cart-disabled cursorNoDrop':
                                                                product?.enabled_to_order,
                                                        }"
                                                        @click="
                                                            AddProductToCart()
                                                        "
                                                        class="btnAddToCart buttons buttons-themex buttons-md w-100"
                                                    >
                                                        <label
                                                            class="d-block labelAddToCart"
                                                            >{{
                                                                $t(
                                                                    "components.pages.store.content.category.product.modal_add_to_cart.button.add_to_cart",
                                                                    {
                                                                        qte_product:
                                                                            product?.quantity,
                                                                    }
                                                                )
                                                            }}</label
                                                        >
                                                        {{
                                                            parseFloat(
                                                                product?.total
                                                            ).toFixed(2)
                                                        }}
                                                        €
                                                    </button>
                                                    <div>
                                                        <small
                                                            class="promo-msg text-color"
                                                            v-if="
                                                                product.promos
                                                                    .length > 0
                                                            "
                                                            >* la promo
                                                            s'applique sur
                                                            l’écran
                                                            suivant</small
                                                        >
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </figure>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <dialog-confirmation ref="productAddedDialog" />
</template>

<script lang="ts">
import { mapActions, mapState, mapMutations, Store, mapGetters } from "vuex";

/** import components */
import RadioButton from "./inputs/RadioButton.vue";
import CheckboxButton from "./inputs/CheckboxButton.vue";
import PlusMinusButton from "./inputs/PlusMinusButton.vue";
import { GroupOrder } from "../../interfaces/cart/GroupOrder";

export default {
    props: ["singleProduct", "store"],
    components: {
        RadioButton,
        CheckboxButton,
        PlusMinusButton,
    },
    data() {
        return {
            product: {},
        };
    },
    async mounted() {
        await this.getLoyaltyCard();
    },
    async created() {
        if (this.product) {
            this.productsStore.currentProduct =
                this.$ProductUtils.prepareMyProduct(
                    this.singleProduct,
                    this.singleProduct?.category?.logo
                );
            this.product = this.productsStore.currentProduct;
        } else {
            window.location.href = "/produits";
        }
    },
    methods: {
        ...mapActions(["getLoyaltyCard"]),
        async AddProductToCart() {
            if (!this.product?.enabled_to_order) {
                let cart = localStorage.getItem("cart");
                cart = JSON.parse(cart);
                this.cartStore.products = cart?.products || [];
                this.cartStore.products.push(
                    this.$ProductUtils.checkGroupIsUsed(this.product)
                );
                this.cartStore.subTotal = this.cartStore?.products.reduce(
                    (sum, product) => sum + product.total,
                    0
                );
                /**Check if product has promo */
                this.$DiscountUtils.isProductOnPromotion();
                /**Re-calculate total for all discounts */
                this.$DiscountUtils.ReCalculateAllDiscounts();
                localStorage?.setItem("cart", JSON.stringify(this.cartStore));

                let sweetOption = {
                    title: "Produit ajouté au panier",
                    text: "Vous voulez continuer vos achats ou passer au paiement",
                    icon: "valide",
                    alertButtons: [
                        {
                            text: "Passer au paiement",
                            action: "checkout",
                            color: "confirmColor",
                        },
                        {
                            text: "Continuer mes achats",
                            action: "cancel",
                            color: "cancleColor",
                        },
                    ],
                };
                const selectedAction = await this.$refs.productAddedDialog.open(
                    sweetOption
                );

                if (selectedAction == "checkout") {
                   // window.location.href = "/checkout";
                    if (this.userStore?.isLoggedIn) {
                        window.location.href = "/checkout";
                    } else {
                        window.location.href = "/signin/?to=checkout";
                    }
                } else {
                    this.productsStore.currentProduct =
                        this.$ProductUtils.prepareMyProduct(
                            this.singleProduct,
                            this.singleProduct?.category?.logo
                        );
                    this.product = this.productsStore.currentProduct;
                    window.scrollTo({
                        top: 0,
                        behavior: "smooth",
                    });
                }
            } else {
                let error = this.$t("button.required_group");
                let option = {
                    showToast: true,
                    type: "error",
                    toastMessage: error,
                    duration: 3200,
                };
                this.$store.commit("showCustomNotification", option);
            }
        },
        AddRemoveQteProduct(sign: string) {
            if (sign == "plus") this.product.quantity++;
            else if (sign == "minus")
                this.product.quantity =
                    this.product.quantity - 1 <= 0
                        ? 1
                        : this.product.quantity - 1;
            this.product.total = this.$ProductUtils.totalProduct(this.product);
        },
    },
    computed: {
        ...mapState([
            "cartStore",
            "productsStore",
            "restaurantStore",
            "userStore",
        ]),
        checkQteMaxGroup() {
            let minCondition = 0;
            this.product?.groups.map((group: GroupOrder, index: number) => {
                if (group.totalQteSubProduct < group.min) {
                    minCondition++;
                }
            });
            return minCondition > 0 ? false : true;
        },
        checkQteMinGroup() {
            let maxCondition = 0;
            this.product?.groups.map((group: GroupOrder, index: number) => {
                if (group.totalQteSubProduct > group.max && group.max != null) {
                    maxCondition++;
                }
            });
            return maxCondition > 0 ? false : true;
        },
        isDisabled() {
            return !this.checkQteMaxGroup || !this.checkQteMinGroup;
        },
    },
};
</script>
