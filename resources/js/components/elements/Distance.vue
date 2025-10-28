<template>
    <div v-if="distance>0">
        <div v-if="distance >= 0 && distance <= 5" class="col-md-12 mb_20">
            <div class="alert-store alert alert-danger">
                <p>
                    La distance entre notre restaurant et votre adresse est de {{ distance }} km.
                </p>
                <b> Note : </b> La livraison est disponible à partir d’un minimum de commande de {{
                storeData?.data?.feeses[0]['min_price_liv'] }} € dans un rayon de {{ distance_km }} km.
            </div>
        </div>
        <div v-else-if="distance > 5 && distance <= 10" class="col-md-12 mb_20">
            <div class="alert-store alert alert-danger">
                <p>
                    La distance entre notre restaurant et votre adresse est de {{ distance }} km.
                </p>
                <b> Note : </b> La livraison est disponible à partir d’un minimum de commande de {{
                storeData?.data?.feeses[0]['min_price_liv'] }} € dans un rayon de {{ distance_km }} km.
            </div>
        </div>
        <div v-if="distance > 10" class="col-md-12 mb_20">
            <div class="alert-store alert alert-danger">
                <p>
                    La distance entre notre restaurant et votre adresse est de {{ distance }} km.
                </p>
                <b> Note : </b> La livraison est disponible à partir d’un minimum de commande de {{
                storeData?.data?.feeses[0]['min_price_liv'] }} € dans un rayon de {{ distance_km }} km.
            </div>
        </div>
    </div>
</template>
<script lang="ts">
import { mapActions, mapState, mapMutations, Store, mapGetters } from "vuex";

export default {
    props: ['distance', 'distance_km'],
    data() {
        return {
        }
    },
    mounted() {
    },
    methods: {
    },
    computed: {
        ...mapGetters(['getCartStore']),
        ...mapState(['cartStore', 'storeData', 'checkout', 'deliveryAddresses', 'alertStore', 'geolocation', 'addressesGooglePlace']),

    }
};
</script>
