<template>
    <div class="  deliveries_addresses">
        <div class="container">
            <div class="row">
                <div class="col-xl-12 col-lg-12 wow fadeInUp" data-wow-duration="1s"
                    style="visibility: visible; animation-duration: 1s; animation-name: fadeInUp">
                    <div class=" ">
                        <div class="tf__check_form">
                            <h5 class="title title-h5">
                                Liste des adresses
                                <AddAddressComponent />
                            </h5>
                            <div v-if="$store.state.deliveryAddresses?.length > 0" class="row mt_30">
                                <div v-for="(liv, index) in $store.state.deliveryAddresses" class="col-md-4 equal">
                                    <div class="card-content item-bg-color" :class="{ actif: liv.default }">
                                        <div class="form-check">
                                            <label class="form-check-label">
                                                <span class="icon text-color"><i class="fas fa-home"
                                                        aria-hidden="true"></i>
                                                    {{ liv.firstName }} {{ liv.lastName }}</span>
                                                <span class="address text-color">{{ liv.address }} </span>
                                                <span v-if="liv.phone" class="text-color">
                                                    <small>
                                                        <span class="fs1" aria-hidden="true" data-icon=""></span>
                                                    </small>
                                                    <small>{{ liv.phone }}</small>
                                                </span>
                                            </label>
                                        </div>
                                        <div class="buttons buttons-crud">
                                            <EditAddressComponent :index="index" :address="liv" />
                                            <DefaultAddressComponent :index="index" :address="liv" />
                                            <DeleteAddressComponent :index="index" :address="liv" />
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div v-else class="row mt_30">
                                <div class="col-md-12">
                                    <notfound-component title="Aucun résultat"
                                        description="Désolé, le produit que vous cherchez est indisponible ." img="" />
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script lang="ts">
import { mapActions, mapState, mapMutations, Store, mapGetters } from "vuex";
/**Import component */
import AddAddressComponent from "./Add.vue";
import EditAddressComponent from "./Edit.vue";
import DefaultAddressComponent from "./Default.vue";
import DeleteAddressComponent from "./Delete.vue";

export default {
    components: {
        AddAddressComponent,
        EditAddressComponent,
        DeleteAddressComponent,
        DefaultAddressComponent
    },
    data() {
        return {
        }
    },
    created() {
    },
    mounted() {
        this.getDeliveriesAddresses()
    },
    methods: {
        ...mapActions(['getDeliveriesAddresses']),
    },
    computed: {
        ...mapState['deliveryAddresses']
    }
}

</script>