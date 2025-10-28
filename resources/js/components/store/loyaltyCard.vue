<template>
    <section class="loyalty-card" v-if="Loyalty">
        <div class="container">
            <div class="row">
                <div class="col-md-6 d-flex justify-content-start align-items-center">
                    <div class="content mb-0">
                        <strong> {{ $t('components.pages.store.Loyaltycard.title') }}</strong>
                        <p>
                            {{
                                $t('components.pages.store.Loyaltycard.subtitle', {
                                    percentage: config_loyalty?.percentage, nb_orders:
                                        config_loyalty?.nb_orders
                                }) }}
                        </p>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="rewards">
                        <div class="d-flex-center">
                            <div class="reward" v-for="(value, index) in Loyalty" :key="value" :class="{
                                checked: value.checked,
                            }">
                                <span :class="{
                                    checked: value.checked,
                                }" :data-checked="value.checked" class="primary-color">
                                    <span v-if="value.percentage" class="text-color primary-color">
                                        -{{ value.percentage }} %
                                    </span>
                                    <span v-else class="text-color primary-color"> </span>
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</template>

<script>
import { mapActions, mapState } from "vuex";

export default {
    props: ['config_loyalty'],
    data() {
        return {
            Loyalty: [],
        }
    },
    async mounted() {
        await this.getLoyaltyCard();
        this.listLoyaltyCard();
    },
    methods: {
        ...mapActions(['getLoyaltyCard']),
        listLoyaltyCard() {
            if (this.Loyalty.length == 0) {
                this.Loyalty = this.$LoyaltyCardUtils.prepareLoyaltyCard(
                    this.config_loyalty,
                    this.userStore?.loyaltyCard
                );
                /**Re-calculate total for all discounts */
                this.$DiscountUtils.ReCalculateAllDiscounts();
            }
        },
    },
    computed: {
        ...mapState(['userStore', 'storeData'])
    },
};
</script>