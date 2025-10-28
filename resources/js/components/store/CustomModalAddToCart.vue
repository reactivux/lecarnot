<template>
    <CustomModal v-if="isModalAddToCartOpen" @close="closeModal"
        :modalsize="product?.ui?.groups ? 'modal-lg' : 'modal-sm'">
        <template v-slot:header> </template>
        <template v-slot:content>
            <form class="">
                <div class="row">
                    <div :class="product?.ui?.columns?.col_1" class="sub-products sub-products-scroll"
                        v-if="product?.ui?.groups">
                        <div v-for="(group, indexg) in product?.groups" :key="indexg" class="w-100">
                            <div class="row mb_25" v-if="group?.sub_products?.length > 0">
                                <div class="col-md-12">
                                    <div class="groupContent">
                                        <h5 class="title title-h5 text-break">
                                            {{ group.title }}
                                            
                                            <span v-if="group.required" class="groupRequired">
                                                Obligatoire
                                            </span>
                                        </h5>
                                    </div>
                                    <div v-if="
                                            group.button_type == 'RadioButton'
                                        " class="elementRadio radio-color">
                                        <label v-for="(
                                                subProduct, indexSub
                                            ) in group.sub_products" :key="indexSub" class="radio red">
                                            
                                            <RadioButton :product="product" :group="group" :subProduct="subProduct" />
                                        </label>
                                    </div>
                                    <div v-else-if="
                                            group.button_type ==
                                            'CheckboxButton'
                                        " class="elementCheckbox checkbox-color">
                                        <label v-for="(
                                                subProduct, indexSub
                                            ) in group.sub_products" :key="indexSub" class="checkbox red">
                                            
                                            <CheckboxButton :product="product" :group="group"
                                                :subProduct="subProduct" />
                                        </label>
                                    </div>
                                    <div v-else>
                                        <div v-for="(
                                                subProduct, indexSub
                                            ) in group.sub_products" :key="indexSub">
                                            <PlusMinusButton :product="product" :group="group"
                                                :subProduct="subProduct" />
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div :class="product?.ui?.columns?.col_2" class="producInfo position-relative">
                        <figure :class="[
                                product?.promos[0] !== undefined ? 'pt-4' : '',
                            ]" class="text-center h-100 position-relative">
                            <promos-component v-if="product.promos.length > 0" :promos="product.promos"
                                :product-name="product?.name" className="promo-product" />
                            <div class="row content mb_25">
                                <div class="col-12">
                                    <div class="mt-2 mb-2">
                                        <img width="75" height="75" fetchpriority="high" class="zoom ing-fluid w-100"
                                            :alt="`${product?.category_name} - ${product?.name}`"
                                            v-lazy="product?.path_image" :class="[
                                                product?.ui?.groups
                                                    ? 'width-70-per'
                                                    : 'width-70-px',
                                            ]" />
                                        <h6 class="mt-2 mb-2 title title-h6 text-break">
                                            <strong>{{
                                                product?.category_name
                                                }}</strong>
                                        </h6>
                                        <h5 class="mb-2 title title-h5 text-break">
                                            {{ product?.name }}
                                        </h5>
                                        <p v-if="product?.ingredient_names" class="text-color text-break">
                                            {{ product?.ingredient_names }}
                                        </p>
                                        <p v-else class="text-color text-break">
                                            {{ product?.description }}
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="blocAddToCart" :class="[
                                    product?.ui?.groups
                                        ? 'position-absolute'
                                        : 'position-relative',
                                ]">
                                <div class="col-12">
                                    <div class="dis-block" :class="[
                                            product?.ui?.groups
                                                ? 'pos-absolute'
                                                : '',
                                        ]">
                                        <div class="btnPlusMines text-color mb_25">
                                            <span class="btnQte" :class="{
                                                    'btnDisabled cursorNoDrop ':
                                                        product?.quantity == 1,
                                                }" @click="
                                                    AddRemoveQteProduct('minus')
                                                ">
                                                -
                                            </span>
                                            <span class="QteProduct">
                                                <span v-if="product?.quantity">
                                                    {{ product?.quantity }}
                                                </span>
                                            </span>
                                            <span class="btnQte" @click="
                                                    AddRemoveQteProduct('plus')
                                                ">
                                                +
                                            </span>
                                        </div>
                                        <button v-if="action == 'add'" type="button" :class="{
                                                'btn-cart-disabled cursorNoDrop':
                                                    product?.enabled_to_order,
                                            }" @click="AddProductToCart()"
                                            class="btnAddToCart buttons buttons-themex buttons-md w-100 mb_5">
                                            <label class="d-block labelAddToCart">
                                                Ajouter
                                                {{ product?.quantity }} pour
                                            </label>
                                            {{
                                            parseFloat(
                                            product?.total
                                            ).toFixed(2)
                                            }}
                                            €
                                        </button>
                                        <button v-else type="button" :class="{
                                                'btn-cart-disabled cursorNoDrop':
                                                    product?.enabled_to_order,
                                            }" @click="UpdateProductInCart()"
                                            class="btnAddToCart buttons buttons-themex buttons-md w-100 mb_5">
                                            <label class="d-block labelAddToCart">
                                                Modifier
                                                {{ product?.quantity }} pour
                                            </label>
                                            {{
                                            parseFloat(
                                            product?.total
                                            ).toFixed(2)
                                            }}
                                            €
                                        </button>
                                        <div>
                                            <small class="promo-msg text-color" v-if="product.promos.length > 0">* la
                                                promo s'applique sur
                                                l’écran suivant</small>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </figure>
                    </div>
                </div>
            </form>
        </template>
    </CustomModal>
</template>

<script lang="ts">
import { mapActions, mapState, mapMutations, Store, mapGetters } from "vuex";

/** import components */
import RadioButton from "./inputs/RadioButton.vue";
import CheckboxButton from "./inputs/CheckboxButton.vue";
import PlusMinusButton from "./inputs/PlusMinusButton.vue";

export default {
    props: ["product", "action", "indexProduct"],
    components: {
        RadioButton,
        CheckboxButton,
        PlusMinusButton,
    },
    data() {
        return {
            isModalAddToCartOpen: false,
        };
    },
    setup() {},
    created() {
        this.isModalAddToCartOpen = true;
    },

    methods: {
        ...mapActions(["getLocalPanier", "addToCart"]),
        concatenateNamesOfIngredients(product) {
            return this.$ProductUtils.concatenateNamesIngredients(this.product);
        },
        AddProductToCart() {
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
                let option = {
                    showToast: true,
                    type: "success",
                    toastMessage: this.$t("notification.product.add"),
                    duration: 3200,
                };
                this.$store.commit("showCustomNotification", option);
                this.closeModal();
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
        UpdateProductInCart() {
            if (!this.product?.enabled_to_order) {
                let cart = localStorage.getItem("cart");
                cart = JSON.parse(cart);
                this.cartStore.products = cart?.products || [];
                this.cartStore.products[this.indexProduct] = this.product;
                this.cartStore.subTotal = this.cartStore?.products.reduce(
                    (sum, product) => sum + product.total,
                    0
                );
                /**Check if product has promo */
                this.$DiscountUtils.isProductOnPromotion();
                /**Re-calculate total for all discounts */
                this.$DiscountUtils.ReCalculateAllDiscounts();
                localStorage?.setItem("cart", JSON.stringify(this.cartStore));
                this.closeModal();
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
        closeModal() {
            this.isOpen = false;
            this.isModalAddToCartOpen = false;
            this.$emit("toggleAddToCart", false);
            document.body.classList.remove("modal-open");
        },
    },

    computed: {
        ...mapGetters(["getCartStore"]),
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

<style scoped></style>
