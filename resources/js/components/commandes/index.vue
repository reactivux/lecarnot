<template>
    <section class=" df__pt df__pb">
        <div class="container">
            <div class="row justify-content-center  mb_50">
                <div class="col-12">
                    <a class="buttons buttons-theme buttons-md cursor-pointer" @click="refreshData">Actualiser
                    </a>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12 wow fadeInUp">
                    <div class="tf_dashboard_order">
                        <div class="table-responsive" v-if="ordersData?.data?.length > 0">
                            <table>
                                <tbody>
                                    <tr>
                                        <th class="tf__pro_status" :class="$t('components.pages.orders.table.number')">
                                            {{ $t("components.pages.orders.table.number") }}
                                        </th>
                                        <th class="tf__pro_status" :class="$t('components.pages.orders.table.date')">
                                            {{ $t("components.pages.orders.table.date") }}
                                        </th>
                                        <th class="tf__pro_status"
                                            :class="$t('components.pages.orders.table.delivery')">
                                            {{ $t("components.pages.orders.table.delivery") }}
                                        </th>
                                        <th class="tf__pro_status" :class="$t('components.pages.orders.table.status')">
                                            {{ $t("components.pages.orders.table.status") }}
                                        </th>
                                        <th class="tf__pro_status" :class="$t('components.pages.orders.table.total')">
                                            {{ $t("components.pages.orders.table.total") }}
                                        </th>
                                        <th class="tf__pro_status"
                                            :class="$t('components.pages.orders.table.payement')">
                                            {{ $t("components.pages.orders.table.payement") }}
                                        </th>
                                        <th class="tf__pro_status" :class="$t('components.pages.orders.table.action')">
                                            {{ $t("components.pages.orders.table.action") }}
                                        </th>
                                    </tr>
                                </tbody>
                                <tbody v-for="(order, indexOrder) in ordersData?.data" :key="`order-${indexOrder}`">
                                    <tr :class="{ unread: !order.isRead }" @click="voirDetailsCommande(order.id)">
                                        <td class="tf__pro_status" data-title="Commande">n°{{ order.id }}</td>
                                        <td class="tf__pro_status" data-title="Date">
                                            {{ formatDate(order.created_at) }}
                                        </td>
                                        <td class="tf__pro_status" data-title="Livraison">
                                            {{ type_livraison[0][order.type] }}
                                        </td>
                                        <td class="tf__pro_status" data-title="État">
                                            <span class="status" :class="`${order.status}`">
                                                {{ etat_arr[0][order.status] }}
                                            </span>
                                        </td>
                                        <td class="tf__pro_status" data-title="Total">
                                            {{
                                                $t("currency.price", { price: parseFloat(order.total_amount).toFixed(2) })
                                            }}
                                            pour
                                            {{ Object.keys(order.elements_order).length }} article(s)
                                        </td>
                                        <td class="tf__pro_status" data-title="Paiement">
                                            <span class="" v-if="order.is_paid">
                                                {{ $t("components.pages.details_order.details.payement.type.effectue")
                                                }}
                                            </span>
                                            <span v-else-if="!order.is_paid && order.type == 'cac'">
                                                {{ $t("components.pages.details_order.details.payement.type.caisse") }}
                                            </span>
                                            <span v-else-if="!order.is_paid && order.type == 'liv'">
                                                {{ $t("components.pages.details_order.details.payement.type.livraison")
                                                }}
                                            </span>
                                            <span v-else-if="!order.is_paid && order.type == 'at_place'">
                                                {{ $t("components.pages.details_order.details.payement.type.caisse") }}
                                            </span>
                                        </td>
                                        <td class="tf__pro_status" data-title="Actions">
                                            <a class=" buttons buttons-themex buttons-themex-border buttons-md  "
                                                :href="`commandes/${order.id}`">
                                                {{ $t("button.show") }}
                                            </a>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <notfound-component v-else title="Aucun résultat"
                            description="Désolé, le produit que vous cherchez est indisponible ." img="" />
                    </div>
                    <paginationComponent v-if="paginationList" :pagination="paginationList"
                        @paginate-event="handlePaginateEvent" />
                </div>
            </div>
        </div>
    </section>
</template>

<script>
import { mapActions, mapState } from "vuex";
import dayjs from "dayjs";
import paginationComponent from "../elements/pagination.vue";

/**Import components */
export default {
    components: {
        paginationComponent,
    },
    data() {
        return {
            current_page: "page=" + 1,
            pagination: null,
            etat_arr: [
                {
                    pending: "En attente",
                    accepted: "Accepté",
                    canceled: "Annulé",
                    delivered: "Livrée",
                },
            ],
            type_livraison: [
                { cac: "Click & Collect", liv: "Livraison", at_place: "Sur place" },
            ],
        };
    },

    async mounted() {
        this.fetchDataOrders();
    },
    methods: {
        ...mapActions(['fetchOrders']),
        async fetchDataOrders() {
            await this.fetchOrders(this.current_page);
            this.pagination = this.ordersData;
        },
        async handlePaginateEvent(pageNumber) {
            this.current_page = "page=" + pageNumber;
            await this.fetchDataOrders();
        },
        async refreshData() {
            this.current_page = "page=" + 1
            await this.fetchDataOrders();
            let option = {
                showToast: true,
                type: 'success',
                toastMessage: "Votre historique des commandes a été mis à jour",
                duration: 3200
            }
            this.$store.commit('showCustomNotification', option)
        },
        voirDetailsCommande(order_id) {
            window.location.href = `/commandes/${order_id}`
        },
        formatDate(date) {
            return dayjs(date).format("DD/MM/YYYY HH:mm");
        },
    },
    computed: {
        ...mapState(['ordersData']),
        paginationList() {
            return (this.pagination?.last_page > 1) ? this.pagination : []
        }
    }
};
</script>
