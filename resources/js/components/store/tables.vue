<template>
    <CustomModal @close="closeModalTable" :modalsize="'modal-sm'">
        <template v-slot:content>
            <div class="row justify-content-center wow fadeInUp">
                <div class="col-md-12">
                    <h4 class="title mb-4 text-center">Sélectionner une table</h4>
                    <div class="list-tables">
                        <div class="item-table" v-for="(table, indexT) in storeData?.tables" @click="selectTable(table)">
                            <svgTable style="margin: 0 auto" />
                            <p>Table : {{ table.table_number }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </template>
    </CustomModal>
</template>

<script lang="ts">
import { mapActions, mapState, mapMutations, Store, mapGetters } from "vuex";

export default {
    data() {
        return {
            isModalTableOpen: false,
        };
    },
    components: {
    },
    async mounted() {
        await this.getTables()
    },
    methods: {
        ...mapActions(['getTables']),
        selectTable(table) {
            if (table?.id) {
                this.cartStore.table = { id: table?.id, table_number: table?.table_number };
                localStorage?.setItem("cart", JSON.stringify(this.cartStore));
                document.body.classList.remove('modal-open');
                //window.location.href = "/checkout";
                if (this.userStore?.isLoggedIn) {
                    window.location.href = "/checkout";
                } else {
                    window.location.href = "/signin/?to=checkout";
                }
            }
        },
        closeModalTable() {
            this.$emit("toggleSelectTable", false);
        },
    },
    computed: {
        ...mapState(['cartStore', 'storeData', 'userStore'])
    }
};
</script>
