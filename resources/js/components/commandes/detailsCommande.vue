<template>
    <section class=" df__pt df__pb invoice">
        <div v-if="detailsOrder.elements_order" class="container margin-main-content   ">
            <div class="row">
                <div class="col-md-12">
                    <div class="row justify-content-center  ">
                        <div class="col-12">
                            <a class="m_0 buttons buttons-theme buttons-md cursor-pointer"
                                @click="refreshData">Actualiser
                            </a>
                        </div>
                    </div>
                    <div class="row justify-content-center mt_50 mb_50">
                        <div class="col-xl-7">
                            <div class="mb-2">
                                <b class="title  ">{{ $t("components.pages.details_order.info_user.title") }}</b>
                            </div>
                            <ul v-if="detailsOrder.deliveryaddress == null" class="list-unstyled">
                                <li class="text-muted">
                                    <span class="text-uppercase text  ">
                                        {{ detailsOrder.customer.firstName }}
                                        {{ detailsOrder.customer.lastName }}
                                    </span>
                                </li>
                                <li v-if="detailsOrder.cacaddress != null" class="text-muted">
                                    <span class="text-uppercase text  ">
                                        {{ detailsOrder.cacaddress.address }}
                                    </span>
                                </li>
                                <li class="text-muted">
                                    <span class="text-uppercase text  ">
                                        {{ detailsOrder.customer.phone }}
                                    </span>
                                </li>
                                <li v-if="detailsOrder.customer.email != null" class="text-muted">
                                    <span class="text-uppercase text  ">
                                        {{ detailsOrder.customer.email }}
                                    </span>
                                </li>
                            </ul>
                            <ul v-if="detailsOrder.deliveryaddress != null" class="list-unstyled">
                                <li class="text-muted">
                                    <span class="text-uppercase text  ">
                                        {{ detailsOrder.deliveryaddress.firstName }}
                                        {{ detailsOrder.deliveryaddress.lastName }}
                                    </span>
                                </li>
                                <li class="text-muted">
                                    <span class="text-uppercase text  ">
                                        {{ detailsOrder.deliveryaddress.address }}
                                    </span>
                                </li>
                                <li class="text-muted">
                                    <span class="text-uppercase text  ">
                                        {{ detailsOrder.deliveryaddress.phone }}
                                    </span>
                                </li>
                                <li v-if="detailsOrder.customer.email != null" class="text-muted">
                                    <span class="text-uppercase text  ">
                                        {{ detailsOrder.customer.email }}
                                    </span>
                                </li>
                            </ul>
                        </div>
                        <div class="col-xl-5 text-end">
                            <ul class="list-unstyled">
                                <li class="text-muted">
                                    <span class="fw-bolds title  ">{{
                                        $t("components.pages.details_order.details.storename") }} :
                                    </span>
                                    <span class="text">{{ detailsOrder.store_name }}</span>
                                </li>
                                <li class="text-muted">
                                    <span class="fw-bolds title ">{{ $t("components.pages.details_order.details.date")
                                        }} :
                                    </span>
                                    <span class="text">{{ createdAt }}</span>
                                </li>
                                <li v-if="detailsOrder.planified" class="text-muted">
                                    <span class="fw-bolds title ">Planifiée pour  : </span>
                                    <span class="text">{{ planifiedAt }}</span>
                                </li>
                                <li class="text-muted">
                                    <span class="me-1 fw-bolds  title">{{
                                        $t("components.pages.details_order.details.delivery_type") }}
                                        :
                                    </span>
                                    <span class="text">
                                        {{ type_livraison[0][this.detailsOrder.type] }}
                                    </span>
                                </li>
                                <li v-if="detailsOrder.type == 'at_place'" class="text-muted">
                                    <span v-if="detailsOrder.table != null">
                                        <span class="me-1 fw-bolds title  "> N° Table : </span>
                                        <span class="text">
                                            {{ detailsOrder.table.table_number }}
                                        </span>
                                    </span>
                                </li>
                                <li class="text-muted">
                                    <p>
                                        <span class="me-1 fw-bolds title ">{{
                                            $t("components.pages.details_order.details.payement.title") }} :
                                        </span>
                                        <span class="text">
                                            {{ $t(`components.pages.details_order.details.payement.type.${isPaid}`) }}
                                        </span>
                                    </p>
                                </li>
                                <li class="text-muted order-status">
                                    <p>
                                        <i class="fas fa-circle" style="color: #84b0ca"></i>
                                        <span class="me-1 fw-bolds  title">{{
                                            $t("components.pages.details_order.details.status")
                                        }} :
                                        </span><span class="badge text"
                                            :class="`status-indicator--${detailsOrder.status}`">
                                            {{ etat_arr[0][this.detailsOrder.status] }}
                                        </span>
                                    </p>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div v-if="detailsOrder.status == 'canceled'"
                        class="order-canceled row my-2 mx-1 justify-content-center">
                        <div class="col-md-12">
                            <p class="black-color"> Votre commande a été annulée sur <b>{{ detailsOrder.store_name
                                    }}</b>.
                            </p>
                            <p class="black-color"> Si votre commande a été prépayée, le remboursement de montant <b> {{
                                detailsOrder.total_amount.toFixed(2) }} €</b> sera crédité sur votre compte
                                entre 7 et 10 jours
                            </p>
                            <p class="black-color"> Nous espérons vous revoir bientôt sur Le Carnot.</p>
                        </div>
                    </div>
                    <div class="row mt_40 mb_40">
                        <div class="col-lg-12 wow fadeInUp" data-wow-duration="1s"
                            style="visibility: visible; animation-duration: 1s; animation-name: fadeInUp">
                            <div class="tf_dashboard_order">
                                <div class="table-responsive">
                                    <table>
                                        <tbody>
                                            <tr>
                                                <th class="tf__pro_status"
                                                    :class="$t('components.pages.details_order.table.prodcutname')">
                                                    {{ $t("components.pages.details_order.table.prodcutname") }}
                                                </th>
                                                <th class="tf__pro_status"
                                                    :class="$t('components.pages.details_order.table.UnitePrice')">
                                                    {{ $t("components.pages.details_order.table.UnitePrice") }}
                                                </th>
                                                <th class="tf__pro_status"
                                                    :class="$t('components.pages.details_order.table.total')">
                                                    {{ $t("components.pages.details_order.table.total") }}
                                                </th>
                                            </tr>
                                        </tbody>
                                        <tbody>
                                            <tr v-for="(element, index) in detailsOrder.elements_order">
                                                <td class="tf__pro_status" data-title="Nom du produit">
                                                    <span class="qte-font-weight">{{ element.quantity }}</span>
                                                    x {{ element?.product?.category?.name }} - {{
                                                        this.$ProductUtils.productNameOrdered(element)
                                                    }}
                                                    <div v-for="(sub_element, indexsub) in element.sub_elements_order"
                                                        class="sub_elements_order" style="margin-left: 11px">

                                                        <div v-if="sub_element.type != 'size'">
                                                            <span v-if="sub_element.type == 'sup'" class="subproduct">
                                                                <span class="qte-font-weight subproduct">{{
                                                                    sub_element.quantity  
                                                                }}</span>
                                                                x {{ sub_element.sub_product.name }},
                                                                {{ sub_element.price.toFixed(2) }} €
                                                            </span>
                                                            <span v-else>
                                                                <!-- <span
                                                                    v-if="sub_element?.sub_product?.group?.max != null"
                                                                    class="subproduct">
                                                                    {{ sub_element.sub_product.name }}
                                                                </span>
                                                                <span v-else
                                                                    class="subproduct text-decoration-line-through">
                                                                    {{ sub_element.sub_product.name }}
                                                                </span> -->

                                                                <span class="subproduct">
                                                                    {{ sub_element.sub_product.name }}
                                                                </span>

                                                            </span>
                                                        </div>
                                                    </div>
                                                    <p v-if="element.promo != undefined">
                                                        <span>
                                                            {{ element?.DiscountPromotionProducts?.text }}
                                                        </span>
                                                    </p>
                                                </td>
                                                <td class="tf__pro_status" data-title="Total">
                                                    {{ element?.newPrice }} €
                                                </td>
                                                <td class="tf__pro_status" data-title="Total">
                                                    <p v-if="element.promo"
                                                        class="text-decoration-line-through mt_0 mb_0">
                                                        {{ element?.DiscountPromotionProducts?.totalPriceWithoutDiscount
                                                        }}
                                                        €

                                                    </p>
                                                    <p class="mt_0 mb_0">
                                                        {{ element.total_amount_element_subelements }} €
                                                    </p>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-xl-7">
                            <p v-if="ordersStore?.detailsOrder?.comment" class="  float-start">
                                <b class="title"> {{ $t("components.pages.details_order.comment") }} :</b><br />
                                <span class=" text me-3">
                                    {{ ordersStore?.detailsOrder?.comment }}
                                </span>
                            </p>
                        </div>
                        <div class="col-xl-5 text-end">
                            <p>
                                <b class=" title me-3"> Total de la commande : </b>

                                <span class="text">
                                    {{ parseFloat(totalPriceOrder).toFixed(2) }} €
                                </span>

                            </p>
                            <p v-if="detailsOrder.promocode != null" class=" ">
                                <span class=" title me-3">
                                    {{ $t("components.pages.details_order.amount.promoCode") }}
                                    <b>{{ detailsOrder.promocode.code_number }}, -{{
                                        detailsOrder.promocode.percentage
                                    }}
                                        %</b>
                                    : </span><span>
                                    <b>
                                        -{{ DiscountCodePromo }}€
                                    </b>
                                </span>
                            </p>

                            <p v-if="detailsOrder.loyalty_card != null" class=" ">
                                <b class="title  me-3">
                                    Carte de fidélité {{ detailsOrder.loyalty_card.percentage }}% : </b>
                                <span class="text">
                                    - {{ DiscountLoyaltyCard }} €
                                </span>
                            </p>
                            <p v-if="detailsOrder.type == 'liv' && detailsOrder.fees != null && detailsOrder.fees > 0
                            " class=" ">
                                <b class=" title me-3">
                                    {{ $t("components.pages.details_order.amount.deliveryFees") }} : </b>
                                <span class="text">
                                    {{ parseFloat(detailsOrder.fees).toFixed(2) }} €
                                </span>

                            </p>

                            <p class=" ">
                                <b class=" title me-3">
                                    {{ $t("components.pages.details_order.amount.TotalAmount") }} : </b>
                                <span class="text">
                                    {{ parseFloat(detailsOrder.total_amount).toFixed(2) }} €
                                </span>

                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</template>

<script>
import { mapActions, mapState } from "vuex";
import dayjs from "dayjs";

export default {
    props: ['order_id'],
    data() {
        return {
            createdAt: null,
            planifiedAt: null,
            type_livraison: [
                { cac: "Click & Collect", liv: "Livraison", at_place: "Sur Place" },
            ],
            etat_arr: [
                {
                    pending: "En attente",
                    accepted: "En préparation",
                    delivered: "Livrée",
                    canceled: "Annulé",
                },
            ],
            isPaid: '',
        };
    },
    components: {

    },
    async created() {
        await this.setOrderAsRead({ order_id: this.order_id, isRead: 1 })
        await this.detailOrder()
      
    },
    methods: {
        ...mapActions(['fetchDetailsOrders', 'setOrderAsRead', 'getCountUnreadOrders']),
        calculePromotionPerProduct() {
            this.detailsOrder.elements_order.forEach((element, index) => {
                var DiscountPromotionProducts = 0;
                element.newPrice = this.$ProductUtils.productPriceOrdered(element);
                if (element.promo) {
                    DiscountPromotionProducts = this.$DiscountUtils.calculateDiscountPromotions(
                        element.quantity,
                        element.newPrice,
                        0,
                        element.promo,
                        this.detailsOrder.type,
                        0
                    );
                    element.DiscountPromotionProducts = DiscountPromotionProducts;
                }
            })
        },
        async detailOrder() {
            await this.fetchDetailsOrders(this.order_id);
            this.calculePromotionPerProduct()
            if (this.detailsOrder.is_paid) {
                this.isPaid = "effectue";
            } else if (!this.detailsOrder.is_paid && this.detailsOrder.type == "cac") {
                this.isPaid = "caisse";
            } else if (!this.detailsOrder.is_paid && this.detailsOrder.type == "liv") {
                this.isPaid = "livraison";
            } else if (!this.detailsOrder.is_paid && this.detailsOrder.type == "at_place") {
                this.isPaid = "caisse";
            }

            this.createdAt = dayjs(this.detailsOrder.created_at).format("DD/MM/YYYY HH:mm")
            this.planifiedAt = dayjs(this.detailsOrder.planified_at).format("DD/MM/YYYY HH:mm")
        },
        async refreshData() {
            this.detailOrder()
            let option = {
                showToast: true,
                type: 'success',
                toastMessage: "Votre détails de commande a été mis à jour",
                duration: 3200
            }
            this.$store.commit('showCustomNotification', option)
        },
    },
    computed: {
        ...mapState(['detailsOrder', 'counUnreadOrders']),
        DiscountLoyaltyCard() {
            const discount = this.$OrderUtils.DiscountLoyaltyCard(
                this.totalPriceOrder,
                this.detailsOrder.total_amount,
                this.detailsOrder.fees,
                this.detailsOrder.loyalty_card
            )
            return discount || 0
        },
        totalPriceOrder() {
            const total = this.$ProductUtils.totalPriceOrder(this.detailsOrder);
            return total
        },
        DiscountCodePromo() {
            const discount = this.$OrderUtils.DiscountCodePromo(
                this.totalPriceOrder,
                this.detailsOrder.promocode
            );
            return discount || 0
        }
    }
};
</script>